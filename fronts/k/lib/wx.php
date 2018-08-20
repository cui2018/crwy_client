<?php
/* 
 * 微信核心类
 * @Package Name: Wx
 * @Author: Keboy xolox@163.com
 * @Modifications:No20171117
 *
 */
class Wx extends Controller {
	public function __construct() {
		$this->redis = Load::redis();
		$this->curl = Load::library('curl');
		$this->sender = get('openid');
	}
	//Oauth2授权登录
	public function oauth2($id) {
		$cookie = Load::library('cookie');
		$user = $cookie->get('user1');
		if ( get('oauth2') == 'logout' ) {
			$cookie->delete('user1');
			redirect(str_replace('logout','login',URL));
			$user = '';
		}
		if ( $user ) {
			$user = decrypt($user);
			if ( $user ) {
				if ( parent::$data['upqd'] && $user['qd'] != parent::$data['qd'] ) {
					$user['qd'] = parent::$data['qd'];
					$cookie->set('user1',encrypt($user));
					$u = $this->redis->hget('user',$user['openid']);
					if ( $u ) {
						$u['updateQD'] = $user['qd'];
						$this->redis->hset('user',$user['openid'],$u);
					}
					$this->redis->rpush('log',array(
						'type' => 'updateQD',
						'ip' => ip_address(),
						'time' => NOW_TIME,
						'data' => array(
							'openid' => $user['openid'],
							'qd' => parent::$data['qd']
						)
					));
				}
				if ( $this->sender ) $this->redis->rpush('log',array(
					'type' => 'friendship',
					'ip' => ip_address(),
					'time' => NOW_TIME,
					'data' => array(
						'openid' => $user['openid'],
						'sender' => $this->sender
					)
				));
				return $user;
			}
		}
		$token = get('oauth2');
		if ( $token && $token != 'login' && $token != 'logout' ) {
			$user = $this->curl->post('https://oauth2.edisonluorui.com/login/api',$token);
			if ( $user['status'] ) {
				$user = decrypt($user['data']);
				$user['qd'] = parent::$data['qd'];
				$cookie->set('user1',encrypt($user));
				$this->_saveUser($user);
				if ( $this->sender ) $this->redis->rpush('log',array(
					'type' => 'friendship',
					'ip' => ip_address(),
					'time' => NOW_TIME,
					'data' => array(
						'openid' => $user['openid'],
						'sender' => $this->sender
					)
				));
				return $user;
			}
			else show_error('抱歉，获取用户信息失败，请退出重新登录~');
		}
		else redirect('https://oauth2.edisonluorui.com/login/' . encrypt($id) . '/' . encrypt(URL));
	}
	//保存用户信息
	private function _saveUser($user) {
		if ( !$this->redis->hget('user',$user['openid']) ) $this->redis->hset('user',$user['openid'],array(
			'id' => 0,
			'openId' => $user['openid'],
			'nickName' => $user['nick'],
			'country' => $user['country'],
			'province' => $user['province'],
			'city' => $user['city'],
			'headImgUrl' => $user['headimg'],
			'sex' => $user['sex'],
			'phone' => $user['tel'],
			'vipId' => 0,
			'money' => 0,
			'integral' => 0,
			'qd' => $user['qd'],
			'updateQD' => $user['qd'],
			'trueName' => '',
			'loginQD' => 'wx_h5'
		));
		$this->redis->rpush('log',array(
			'type' => 'login',
			'ip' => ip_address(),
			'time' => NOW_TIME,
			'data' => array(
				'user' => $user,
				'qd' => $user['qd']
			)
		));
	}
	//微信jssdk
	public function jssdk() {
		echo '<script src="' . ufv('/js/share.js') . '"></script>' . "\r\n";
		if ( !ONLINE ) return;
		if ( !ISWECHAT ) return;
		$redis = Load::redis('wechat');
		$wechat = Load::config('wechat');
		$wechat = $wechat['crwy'];
		$wx = $redis->hget('wechat','crwy');
		$token = array();
		if ( $wx && ( NOW_TIME - $wx['timestamp'] < 60 ) ) {
			$token['timestamp'] = array_value($wx,'timestamp');
			$token['access_token'] = array_value($wx,'access_token');
			$token['ticket'] = array_value($wx,'ticket');
		}
		else {
			$token = $this->curl->post('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $wechat['appid'] . '&secret=' . $wechat['secret']);
			if ( array_isset($token,'access_token') ) $token['timestamp'] = NOW_TIME;
			//else show_error('抱歉，微信jssdk加载失败，请刷新重新打开~');
			else return;
		}
		$ticket = array_value($token,'ticket');
		if ( !$ticket ) {
			$getTicket = $this->curl->post('https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=' . $token['access_token'] . '&type=jsapi');
			if ( array_isset($getTicket,'ticket') ) {
				$token['ticket'] = $getTicket['ticket'];
				$redis->hset('wechat','crwy',$token);
				$ticket = $token['ticket'];
			}
			//else show_error('抱歉，微信ticket加载失败，请刷新重新打开~');
			else return;
		}
		$s = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$noncestr = '';
		for ( $i = 0; $i < 16; $i++ ) $noncestr .= substr($s,mt_rand(0,strlen($s)),1);
		$signature = sha1('jsapi_ticket=' . $ticket . '&noncestr=' . $noncestr . '&timestamp=' . $token['timestamp'] . '&url=' . URL);
		echo '<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>' . "\r\n";
		echo '<script src="' . ufv('/js/jssdk.js') . '"></script>' . "\r\n";
		echo '<script>' . "\r\n";
		echo 'wechat.config.debug = ' . (JSSDKDEBUG ? 'true' : 'false') . ';' . "\r\n";
		echo 'wechat.config.appId = "' . $wechat['appid'] . '";' . "\r\n";
		echo 'wechat.config.timestamp = "' . $token['timestamp'] . '";' . "\r\n";
		echo 'wechat.config.nonceStr = "' . $noncestr . '";' . "\r\n";
		echo 'wechat.config.signature = "' . $signature . '";' . "\r\n";
		echo 'if ( typeof wx != "undefined" ) {' . "\r\n";
		echo '	wx.config(wechat.config);' . "\r\n";
		echo '	wx.ready( function() {' . "\r\n";
		echo '		wechat.configLoaded = true;' . "\r\n";
		echo '		wx.hideOptionMenu();' . "\r\n";
		echo '		wechat.callFunctions();' . "\r\n";
		echo '	} );' . "\r\n";
		echo '}' . "\r\n";
		echo '</script>' . "\r\n";
	}
}