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
		text-align: left;
		padding-bottom: 7vw;
		padding-left: 2.67vw
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
	<p id="title">2018.04.27 05:00:00~2018.05.04 05:00:00</p>
	<p id="time">
		活动期间，玩家每天完成活动界面中显示的事件都可以获得对应的狂欢点数。每日的狂欢点数达到对应值，可以领取每日奖励
		<br>
		每天5:00重置当天的狂欢点数且每天的狂欢点数会累积到活动的总狂欢点数中，活动期间多天累积的总狂欢点数达到要求，则可以领取狂欢大礼。
	</p>
	<div id="middle">
		 <ul id="content">
			<li>
				<p>一.每日嗨点奖励：</p>
				<p>
					金币*1000W、宝石碎片*100、普通先魂*1、魂尘*15、魂尘*30、卓越先魂*1
				</p>
				<img src="<?php echo ufv('/img/publick/daa1.png'); ?>">
			</li>

			<li>
				<p>二.累计嗨点奖励：</p>				
				<img src="<?php echo ufv('/img/publick/daa2.png'); ?>">
				<img src="<?php echo ufv('/img/publick/daa3.png'); ?>">
			</li>

			<li>
				<p>三.奇迹奉献者称号：</p>
				<p>
					1:佩戴属性：攻击力+600，防御力+300，生命+9000，暴击伤害减免+3％
					<br>
					2:点亮属性：攻击力+400，防御力+200，生命+6000
				</p>
				<img src="<?php echo ufv('/img/publick/daa4.png'); ?>">
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
          "http://crwy.edisonluorui.com/publick/datianshisecond.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
          ufv("/img/logo.jpg")
        );
        share.timeline(
          "不小心火了 - 潮人资讯",
          "你知道的太多了",
          "http://crwy.edisonluorui.com/publick/datianshisecond.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
          ufv("/img/logo.jpg")
        );

    });
    </script>
</body>
</html>