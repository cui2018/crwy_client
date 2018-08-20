<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="keywords" content="<?php echo $title; ?>">
<meta name="description" content="<?php echo $title; ?>">
<meta name="author" content="Keboy">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" name="email=no">
<meta name="apple-mobile-web-app-title" content="<?php echo $title; ?>">
<meta name="apple-mobile-web-app-capable" content="no">
<meta name="format-detection" content="telephone=no">
<link rel="icon" href="<?php echo ufv('/img/logo.jpg'); ?>" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo ufv('/img/logo.jpg'); ?>" type="image/x-icon">
<title><?php echo $title; ?></title>
<?php
$js->jquery('2.0.0');
$js->main();
$wx->jssdk();
?>
<style>
	*{
		margin:0;
		padding: 0
	}
	
	html{
		width:100%;
		height:100%;
	}
	body{
		width:100%;
		height:100%;
		overflow-y: auto;
		background: #F5F5F5;
	}
	#title{
		line-height: 16vw;
		text-align: center;
		font-weight: bold;
	}
	#time{
		text-align: center;
		padding-bottom: 7vw;
	}
	#middle{
		width:94.6vw;
		background: #fff;
		margin:0 auto;
		border-radius: 2vw;
		border:1px solid #81511C;
		margin-bottom: 3vw;
	}
	#content>li{
		text-align: center;
		list-style: none;
	}
	#content>li:nth-of-type(1)>p{
		text-align: left;
		padding: 10px;
	}
	#content>li:nth-of-type(1)>img{
		width:72vw;
	}

	#content>li:nth-of-type(2)>p{
		text-align: left;
		padding: 10px;
	}
	#content>li:nth-of-type(2)>img{
		width:72vw;
	}

	#content>li:nth-of-type(3)>p{
		text-align: left;
		padding: 10px;
	}
	#content>li:nth-of-type(3)>img{
		width:72vw;
	}

	#content>li:nth-of-type(4)>p{
		text-align: left;
		padding: 10px;
	}
	#content>li:nth-of-type(4)>img{
		width:72vw;
	}

	#content>li:nth-of-type(5)>p{
		text-align: left;
		padding: 10px;
	}
	#content>li:nth-of-type(5)>img{
		width:72vw;
	}

	#content>li:nth-of-type(6)>p{
		text-align: center;
		padding: 10px;
	}
	#content>li:nth-of-type(6)>img{
		width:36vw;
	}
	#go{
		width:100%;
		height:10.4vw;
		background: #FFA400;
		text-align: center;
		line-height: 10.4vw;
		border-radius: 2vw 2vw 0 0;
	}
	#go>a{
		text-decoration: none;
		color:#fff;
	}
	</style>
</head>
<body>
	<p id="title">梦道-双倍返利</p>
	<p id="time">《梦道》安排于本周四（04月26日）更新线上服</p>
	<div id="middle">
		 <ul id="content">
			<li>
				<p>一.【充值功能优化】</p>
				<p>新增3个充值档次、新增档次都可获得首次充值双倍返利</p>
				<img src="<?php echo ufv('/img/publick/meng1.png'); ?>">
			</li>

			<li>
				<p>二.新增成长丹功能，可通过阶级奖励和活动来获得</p>
				<img src="<?php echo ufv('/img/publick/meng2.png'); ?>">
			</li>

			<li>
				<p>三.新增角色属性查看、对比功能，可通过排行版进行查询高玩神装</p>
				<img src="<?php echo ufv('/img/publick/meng3.png'); ?>">
				<img src="<?php echo ufv('/img/publick/meng4.png'); ?>">
			</li>

			<li>
				<p>四.新增聊天增加默认语句设置，可便捷发送设定对白；</p>
				<img src="<?php echo ufv('/img/publick/meng5.png'); ?>">
			</li>

			<li>
				<p>五.新增进阶奖励成就，满足成就奖励即可领取大量成长丹及进阶丹奖励</p>
				<img src="<?php echo ufv('/img/publick/meng6.png'); ?>">
			</li>

			<li>
				<img src="<?php echo ufv('/img/publick/chaoren.jpg'); ?>">
				<p>如有问题可识别二维码咨询哦</p>
			</li>
		</ul>
	</div>
	<div id="go"><a href="http://crwy.edisonluorui.com/">立马体验</a></div>
		<script>
            var USER = <?php echo json_encode($user); ?>;
            $( function() {

              share.appMessage(
                  "不小心火了 - 潮人资讯",
                  "你知道的太多了",
                  "http://crwy.edisonluorui.com/publick/publickmegndao.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                  ufv("/img/logo.jpg")
                );
                share.timeline(
                  "不小心火了 - 潮人资讯",
                  "你知道的太多了",
                  "http://crwy.edisonluorui.com/publick/publickmegndao.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                  ufv("/img/logo.jpg")
                );

            });
            </script>
</body>
</html>