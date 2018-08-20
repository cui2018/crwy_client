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
<link rel="stylesheet" href="<?php echo uv('/css/publick.css'); ?>">
<script src = "<?php echo ujv('/js/rem.js'); ?>"></script>
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
	<p id="title">悟空传</p>
	<p id="time">
		活动时间：4月29日~~5月3日，共5日
	</p>
	<div id="middle">
		 <ul id="content">
			<li>
				<p>一.每日嗨点奖励：</p>
				<p>
					活动期间内在进行以下功能时均可获得五一活动特有道具“神农铲”
					“女仆”“大闹天宫”“闯幽冥”“遭遇战”“竞技场”“全民妖王”“探宝”
					注：每日最多可获得400个神农铲还将可以在节日期间的每日充值与每日消费活动中获得
					收集到的“神农铲”可在节日兑换商店内兑换相应的物品
				</p>
				<img src="<?php echo ufv('/img/publick/chatone.jpg'); ?>">
			</li>

			<li>
				<p>活动二：神农铲兑换消耗每日达标活动</p>	
				<p>
					据每日兑换消耗的“神农铲”数量，达到指定数量可领取对应奖励
				</p>			
				<img src="<?php echo ufv('/img/publick/chattwo.jpg'); ?>">
			</li>

			<li>
				<p>活动三：神农铲兑换消耗每日排行榜（跨服）</p>
				<p>
					根据每日兑换消耗的“神农铲”数量排行，排名靠前的玩家获得奖励
				</p>
				<img src="<?php echo ufv('/img/publick/chatthree.jpg'); ?>">
			</li>

			<li>
				<p>活动四：五一跨服团购活动</p>
				<p>
					活动期间将根据跨服玩家们充值总额度开放团购物品
					<br>
					团购物品包含：图鉴红卡，图鉴碎片，独有称号，元神，高等天赋，高等法宝等，详情请游戏内查看
				</p>
				<img src="<?php echo ufv('/img/publick/wukongzhuan1.png'); ?>">
			</li>

			<li>
				<p>活动五：五一每日充值活动</p>
				<p>
					活动期间充值将会获得特有道具“神农铲”详情请游戏内查看
				</p>
				<img src="<?php echo ufv('/img/publick/wukongzhuan2.png'); ?>">
			</li>

			<li>
				<p>活动六：五一每日消费活动</p>
				<p>
					活动期间消费将会获得特有道具“神农铲”详情请游戏内查看
				</p>
				<img src="<?php echo ufv('/img/publick/wukongzhuan3.png'); ?>">
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
                      "http://crwy.edisonluorui.com/publick/danaotiangong.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                      ufv("/img/logo.jpg")
                    );
                    share.timeline(
                      "不小心火了 - 潮人资讯",
                      "你知道的太多了",
                      "http://crwy.edisonluorui.com/publick/danaotiangong.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                      ufv("/img/logo.jpg")
                    );

                });
                </script>
</body>
</html>