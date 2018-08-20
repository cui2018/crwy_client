<?php
class Manager extends Controller {
    public function login() {
        $noncestr = post('noncestr');
        $openid = post('openid');
        $sign = post('sign');
        $timestamp = post('timestamp');
        $signature = sha1('noncestr=' . $noncestr . '&openid=' . $openid . '&timestamp=' . $timestamp . '&key=crwy3&autoLogin');
        if ( $sign != $signature ) return show_error('签名错误！');
        $cookie = Load::library('cookie');
        $user = Load::redis()->hget('user',$openid);
        if ( !$user ) return show_error('用户不存在！');
        $u = array(
        	'openid' => $user['openId'],
        	'tel' => $user['phone'],
        	'nick' => $user['nickName'],
        	'headimg' => $user['headImgUrl'],
        	'sex' => $user['sex'],
        	'country' => $user['country'],
        	'province' => $user['province'],
        	'city' => $user['city'],
        	'qd' => parent::$data['qd']
        );
        $cookie->set('user1',encrypt($u));
        redirect(u('/'));
    }
}