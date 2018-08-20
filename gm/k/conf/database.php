<?php
/* 
 * 数据库配置
 * @Package Name: database
 * @Author: Keboy xolox@163.com
 * @Modifications:No20171223
 *
 */

$config = array(
	//默认数据库
	'default' => array(
		'hostname' => ONLINE ? 'localhost' : 'localhost',
		'username' => ONLINE ? 'crwygm' : 'root',
		'password' => ONLINE ? 'fcccZm2DiFNSDYbs' : 'q1w2e3r4',
		'database' => ONLINE ? 'crwygm' : 'crwygm',
		'prefix' => 'gm_',
		'driver' => 'mysqli'
	),
	//项目数据库
	'v3' => array(
		'hostname' => ONLINE ? 'rm-m5enf4d2o78qyk26w.mysql.rds.aliyuncs.com' : 'localhost',
		'username' => ONLINE ? 'crxl2018' : 'root',
		'password' => ONLINE ? 'ASDasd19981018' : 'q1w2e3r4',
		'database' => ONLINE ? 'gamev3' : 'gamev3',
		'prefix' => '',
		'driver' => 'mysqli'
	)
);