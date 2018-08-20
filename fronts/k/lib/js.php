<?php
/* 
 * 脚本加载类
 * @Package Name: Js
 * @Author: Keboy xolox@163.com
 * @Modifications:No20170629
 *
 */
class Js {
	//jquery
	public function jquery($version = '1.7.2') {
		//if ( ONLINE ) echo '<script src="https://libs.baidu.com/jquery/' . $version . '/jquery.min.js"></script>' . "\r\n";
		if ( ONLINE ) echo '<script src="/'. (ROOT ? '' : PROJECT . '/') . 'js/jquery.min.js"></script>' . "\r\n";
		else echo '<script src="/'. (ROOT ? '' : PROJECT . '/') . 'js/jquery-' . $version . '.min.js?v=' . VERSION . '"></script>' . "\r\n";
	}
	//Vue
	public function vue() {
		if ( ONLINE ) echo '<script src="' . ujv('/js/vue.min.js') . '"></script>' . "\r\n";
		else echo '<script src="/'. (ROOT ? '' : PROJECT . '/') . 'js/vue.min.js"></script>' . "\r\n";
	}
	//main
	public function main() {		
		echo '<script>var TEST=' . (TEST ? 'true' : 'false') . ',VERSION="' . VERSION . '",ROOT=' . (ROOT ? 'true' : 'false') . ',ONLINE=' . (ONLINE ? 'true' : 'false') . ',PROJECT="' . PROJECT . '",nowtime="' . NOW_TIME . '";</script>' . "\r\n";		
		if ( ONLINE ) echo '<script src="' . ujv('/js/main.js') . '"></script>' . "\r\n";
		else echo '<script src="/'. (ROOT ? '' : PROJECT . '/') . 'js/main.js?v=' . VERSION . '"></script>' . "\r\n";
	}
	//手机号验证
	public function phone() {
		if ( ONLINE ) echo '<script src="' . ujv('/js/phone.js') . '"></script>' . "\r\n";
		else echo '<script src="/'. (ROOT ? '' : PROJECT . '/') . 'js/phone.js?v=' . VERSION . '"></script>' . "\r\n";
	}
}