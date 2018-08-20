<?php
class Rediser extends Controller {
	public function index() {
		Load::view('/admin/develop/redis/console.php',parent::$data);
	}
	public function console() {
		$redis = Load::redis();
		$command = post('command');
		$table = post('table');
		$key = post('key');
		$value = post('value');
		$result = 'OK';
		switch ( $command ) {
			case 'get':
				$result = $redis->get($table);
				break;
			case 'set':
				$redis->set($table,$key);
				break;
			case 'del':
				$redis->del($table);
				break;
			case 'hkeys':
				$result = $redis->hkeys($table);
				break;
			case 'hget':
				$result = $redis->hget($table,$key);
				break;
			case 'hset':
				$redis->hset($table,$key,$value);
				break;
			case 'hdel':
				$redis->hdel($table,$key);
				break;
			case 'lpush':
				$redis->lpush($table,$key);
				break;
			case 'rpush':
				$redis->rpush($table,$key);
				break;
			case 'lpop':
				$result = $redis->lpop($table);
				break;
			case 'rpop':
				$result = $redis->rpop($table);
				break;
			case 'lrange':
				$result = $redis->lrange($table,$key ? $key : 0,$value ? $value : 1000);
				break;
		}
		if ( is_array($result) ) $result = printr2($result);
		api_success($result);
	}
	//当前服务器
	public function manager() {
		parent::$data['title'] = '当前服务器';
		parent::$data['serv'] = '';
		$this->_manage(Load::redis());
	}
	//管理页面
	private function _manage($redis) {
		$prev = array();
		$keys = $redis->conn->keys('*');
		foreach ( $keys as &$item ) {
			$pos = strpos($item,'::');
			$key = substr($item,0,$pos);
			if ( $key != strtoupper(NAME) ) continue;
			$item = substr($item,$pos + 2);
			if ( !array_isset($prev,$key) ) $prev[$key] = array();
			array_push($prev[$key],$item);
		}
		parent::$data['prev'] = $prev;
		Load::view('/admin/develop/redis/manager.php',parent::$data);
	}
	//分页记录数
	public $pagesize = 100;
	//数据读取
	public function data() {
		$serv = post('serv');
		$key = post('key');
		$redis = Load::redis($serv ? $serv : 'default');
		$type = '';
		$all = 0;
		$pages = 0;
		if ( $redis->exists($key) ) {
			$keys = $redis->hkeys($key);
			if ( $keys ) {
				$type = 'hash';
				$data = array();
				$all = count($keys);
				$pages = ceil($all / $this->pagesize);
				foreach ( array_slice($keys,0,$this->pagesize) as $id ) $data[$id] = $redis->hget($key,$id);
			}
			else {
				$type = 'string';
				$data = $redis->get($key);
			}
		}
		else {
			$data = $redis->lrange($key,0,$this->pagesize);
			if ( is_array($data) ) $type = 'list';
		}
		if ( !$type ) return api_error('抱歉，键' . $key . '的数据类型不明~');
		api_success(array(
			'type' => $type,
			'data' => $data,
			'all' => $all,
			'pages' => $pages
		));
	}
	//删除键
	public function delkey() {
		$serv = post('serv');
		$key = post('key');
		$redis = Load::redis($serv ? $serv : 'default');
		$redis->del($key);
		api_success();
	}
	//保存数据
	public function save() {
		$serv = post('serv');
		$key = post('key');
		$index = post('index');
		$data = post('data');
		$type = post('type');
		$redis = Load::redis($serv ? $serv : 'default');
		switch ( $type ) {
			case 'string':
				$redis->set($key,$data);
				break;
			case 'hash':
				$redis->hset($key,$index,$data);
				break;
		}
		api_success();
	}
	//获取散列型页数据
	public function getHash() {
		$serv = post('serv');
		$key = post('key');
		$curr = post('curr','intval');
		$redis = Load::redis($serv ? $serv : 'default');
		$keys = $redis->hkeys($key);
		$data = array();
		foreach ( array_slice($keys,($curr - 1) * $this->pagesize,$this->pagesize) as $id ) $data[$id] = $redis->hget($key,$id);
		api_success($data);
	}
	//Redis刷新
	public function refresh() {
		if ( post() ) {
			$db = Load::database();
			$redis = Load::redis();
			switch ( post('type') ) {
				case 'setting':
					$redis->del('setting');
					foreach ( $db->get('setting') as $item ) {
						$redis->hset('setting',$item['key'],json_decode($item['setting'],TRUE));
					}
					return api_success();
					break;
				case 'userAll':
					$rows = $db->rows('user');
					$redis->del('user');
					return api_success($rows);
					break;
				case 'userAllPage':
					$page = post('page','intval');
					$users = $db->get('user','','',($page * 10000) . ',10000');
					foreach ( $users as $user ) {
						$redis->hset('user',$user['unionid'],array(
							'userid' => intval($user['id']) + 10000000,
							'serv' => $user['serv'],
							'platform' => $user['platform'],
							'pf' => $user['pf'],
							'unionid' => $user['unionid'],
							'openid' => $user['openid'],
							'tel' => $user['tel'],
							'nick' => $user['nick'],
							'headimg' => $user['headimg'],
							'sex' => $user['sex'],
							'country' => $user['country'],
							'province' => $user['province'],
							'city' => $user['city'],
							'gold' => $user['gold'],
							'exp' => $user['exp'],
							'level' => $user['level'],
							'dan' => $user['dan'],
							'star' => $user['star'],
							'win' => $user['win'],
							'draw' => $user['draw'],
							'lose' => $user['lose'],
							'cdata' => array(
								1 => array($user['c1r'],$user['c1w']),
								2 => array($user['c2r'],$user['c2w']),
								3 => array($user['c3r'],$user['c3w']),
								4 => array($user['c4r'],$user['c4w']),
								5 => array($user['c5r'],$user['c5w']),
								6 => array($user['c6r'],$user['c6w'])
							),
							'combo' => $user['combo'],
							'knockout' => $user['knockout'],
							'suppress' => $user['suppress'],
							'recharge' => $user['recharge'],
							'knowledge' => $user['knowledge'] ? json_decode($user['knowledge'],TRUE) : array(),
							'prop' => $user['prop'] ? json_decode($user['prop'],TRUE) : array(),
							'bank' => $user['bank'],
							'state' => $user['state'],
							'buff' => $user['buff'] ? json_decode($user['buff'],TRUE) : array()
						));
					}
					return api_success();
					break;
				case 'userOne':
					$unionid = post('unionid');
					$user = $db->one('user',array(
						'unionid' => $unionid
					));
					if ( $user ) {
						$redis->hset('user',$user['unionid'],array(
							'userid' => intval($user['id']) + 10000000,
							'serv' => $user['serv'],
							'platform' => $user['platform'],
							'pf' => $user['pf'],
							'unionid' => $user['unionid'],
							'openid' => $user['openid'],
							'tel' => $user['tel'],
							'nick' => $user['nick'],
							'headimg' => $user['headimg'],
							'sex' => $user['sex'],
							'country' => $user['country'],
							'province' => $user['province'],
							'city' => $user['city'],
							'gold' => $user['gold'],
							'exp' => $user['exp'],
							'level' => $user['level'],
							'dan' => $user['dan'],
							'star' => $user['star'],
							'win' => $user['win'],
							'draw' => $user['draw'],
							'lose' => $user['lose'],
							'cdata' => array(
								1 => array($user['c1r'],$user['c1w']),
								2 => array($user['c2r'],$user['c2w']),
								3 => array($user['c3r'],$user['c3w']),
								4 => array($user['c4r'],$user['c4w']),
								5 => array($user['c5r'],$user['c5w']),
								6 => array($user['c6r'],$user['c6w'])
							),
							'combo' => $user['combo'],
							'knockout' => $user['knockout'],
							'suppress' => $user['suppress'],
							'recharge' => $user['recharge'],
							'knowledge' => $user['knowledge'] ? json_decode($user['knowledge'],TRUE) : array(),
							'prop' => $user['prop'] ? json_decode($user['prop'],TRUE) : array(),
							'bank' => $user['bank'],
							'state' => $user['state'],
							'buff' => $user['buff'] ? json_decode($user['buff'],TRUE) : array()
						));
						return api_success();
					}
					else return api_error('用户不存在~');
					break;
				case 'classes':
					$redis->del('class');
					$redis->del('classes');
					foreach ( $db->get('class') as $item ) {
						$redis->hset('classes',$item['id'],array(
							'pid' => $item['pid'],
							'title' => $item['title'],
							'logo' => $item['logo']
						));
					}
					foreach ( Load::config('class') as $classid => $classname ) {
						$redis->hset('class',$classid,$db->get('class',array(
							'pid' => $classid
						),'`orderby` ASC,`id` ASC','','id,title,logo'));
					}
					return api_success();
					break;
				case 'subject':
					$dan = $redis->hget('setting','dan');
					if ( !$dan ) {
						return api_error('请先刷新段位配置~');
						break;
					}
					foreach ( $dan as $item ) {
						$subids = array();
						foreach ( $db->get('subject',array(
							'state' => 1,
							'difficulty' => $item['level']
						),'','','id') as $ids ) {
							array_push($subids,intval($ids['id']));
						}
						$redis->hset('subject_difficulty',$item['level'],$subids);
					}
					$redis->del('subject');
					foreach ( $db->get('subject',array(
						'state' => 1
					)) as $item ) {
						$redis->hset('subject',$item['id'],array(
							'pid' => $item['pid'],
							'unionid' => $item['unionid'],
							'title' => $item['title'],
							'a1' => $item['a1'],
							'a2' => $item['a2'],
							'a3' => $item['a3'],
							'a4' => $item['a4'],
							'right' => $item['right'],
							'wrong' => $item['wrong'],
							'times' => $item['times'],
							'difficulty' => $item['difficulty']
						));
					}
					return api_success();
					break;
				case 'prop':
					$redis->del('prop');
					foreach ( $db->get('prop') as $item ) {
						$id = $item['id'];
						unset($item['id']);
						$item['prop'] = json_decode($item['prop'],TRUE);
						$redis->hset('prop',$id,$item);
					}
					return api_success();
					break;
				case 'shop':
					$redis->del('shop');
					foreach ( $db->get('shop',array(
						'state' => 1
					)) as $item ) {
						$id = $item['id'];
						unset($item['id']);
						$item['prop'] = json_decode($item['prop'],TRUE);
						unset($item['state']);
						$redis->hset('shop',$id,$item);
					}
					return api_success();
					break;
				case 'server':
					$redis->del('server');
					$redis->del('server_users');
					foreach ( $db->get('server',array(
						'state' => 1
					)) as $item ) {
						$id = $item['id'];
						unset($item['id']);
						$redis->hset('server',$id,$item);
						$redis->hset('server_users',$id,0);
					}
					return api_success();
					break;
				case 'subjects':
					$class = $db->get('class','','','','id');
					for ( $i = 0; $i < 10000; $i++ ) {
						$data = array(
							'pid' => $class[mt_rand(0,count($class) - 1)]['id'],
							'unionid' => '',
							'title' => $i . '+' . $i . '=?',
							'a1' => $i + $i,
							'a2' => $i + $i + 1,
							'a3' => $i + $i + 2,
							'a4' => $i + $i + 3
						);
						$db->insert('subject',array_merge($data,array(
							'state' => 1,
							'times' => 0,
							'right' => 0,
							'wrong' => 0
						)));
						$id = $db->insert_id();
						$redis->hset('subject',$id,$data);
					}
					return api_success();
					break;
			}
			return api_error('操作类型不存在~');
		}
		Load::view('/admin/develop/redis/refresh.php',parent::$data);
	}
}