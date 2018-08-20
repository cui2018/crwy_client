<?php
/* 
 * 全局配置
 * @Package Name: config
 * @Author: Keboy xolox@163.com
 * @Modifications:No20170629
 *
 */

$config = array(
	//允许的uri地址后缀
	'suffix' => array('.html','.do','.js','.css',''),
	//aes
	'aes' => array(
		'mode' => 'ecb',
		'cipher' => 128,
		'padding' => 'pkcs7',
		'key' => 'c8o060EpkW296da3',
		'iv' => 'y9Ns04Mkldd6es8P'
	),
	//默认允许上传文件类型
	'upload_allow' => array('jpg','png','gif','xls','xlsx','zip','mp3','mp4','swf','txt','doc','docx','sql'),
	//默认允许上传文件大小
	'upload_maxsize' => 20 * 1024 * 1024,
	//同步服务器
	'servers' => array(
		array(
			'hostname' => '10.135.158.214',
			'username' => 'bestresource',
			'password' => '72G2EEhDaX',
			'port' => 21
		)
	)
);