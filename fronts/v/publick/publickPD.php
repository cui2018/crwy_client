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
		text-align: center;
		padding: 10px;
	}
	#content>li:nth-of-type(4)>img{
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
	<p id="title">潮人微游平台上线公告</p>
	<p id="time">2018-04-22</p>
	<div id="middle">
		 <ul id="content">
			<li>
				<p>1:新的用户界面体验</p>
				<img src="<?php echo ufv('/img/publick/game.png'); ?>">
				<img src="<?php echo ufv('/img/publick/gift.png'); ?>">
				<img src="<?php echo ufv('/img/publick/person.png'); ?>">
			</li>

			<li>
				<p>2:新增好友等体验功能</p>
				<img src="<?php echo ufv('/img/publick/friend.png'); ?>">
				<img src="<?php echo ufv('/img/publick/gamelist.png'); ?>">
			</li>

			<li>
				<p>3:新增富豪榜体验功能</p>
				<img src="<?php echo ufv('/img/publick/rich.png'); ?>">
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
                  "http://crwy.edisonluorui.com/publick/publickPD.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                  ufv("/img/logo.jpg")
                );
                share.timeline(
                  "不小心火了 - 潮人资讯",
                  "你知道的太多了",
                  "http://crwy.edisonluorui.com/publick/publickPD.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                  ufv("/img/logo.jpg")
                );

            });
            </script>
</body>
</html>