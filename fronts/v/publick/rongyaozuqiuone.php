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
	<p id="title">荣耀足球-五一庆典活动</p>
	<p id="time">
		4月29日00:00~5月8日23:59
	</p>
	<div id="middle">
		 <ul id="content">
			<li>
				<p>活动一、豪门点将</p>
				<p>
					【活动时间】：4月29日00:00~5月8日23:59
					<br>
					【活动范围】：全区全服
					<br>
					【活动内容】：活动期间玩家参与活动，活动内充值88元即可获得任选SSR球员礼包，仅限一次！
				</p>
				<img src="<?php echo ufv('/img/publick/rongyao1.png'); ?>">
			</li>

			<li>
				<p>活动二、每日抢购</p>				
				<p>
					【活动时间】：4月29日00:00~5月8日23:59
					<br>
					【活动范围】：全区全服
					<br>
					【活动内容】：活动期间内累计充值达到5天领取绝版称号，首次充值加送超值礼包；每日限时抢购超低折扣道具
				</p>
				<img src="<?php echo ufv('/img/publick/rongyao2.png'); ?>">
			</li>

			<li>
				<p>活动三、赏金召唤</p>
				<p>
					【活动时间】：4月29日00:00~5月8日23:59
					<br>
					【活动范围】：全区全服
					<br>
					【活动内容】：活动期间十连抽八折优惠，每日首次购买十连抽立享五折，十连抽次数达到条件再送赏金礼包。
				</p>
				<img src="<?php echo ufv('/img/publick/rongyao3.png'); ?>">
			</li>
			
			<li>
				<p>活动四、单笔充值</p>
				<p>
					【活动时间】：4月29日00:00~5月8日23:59
					<br>
					【活动范围】：全区全服
					<br>
					活动内容】：活动期间内单笔充值达到对应档次即可领取奖励
				</p>
			</li>

			<li>
				<p>活动五、疯狂拉霸</p>
				<p>
					【活动时间】：4月29日00:00~5月8日23:59
					<br>
					【活动范围】：全区全服
					<br>
					【活动内容】：活动期间内,每日充值一定金额即可获得拉霸机会，每次拉霸可获得大量钻石返还；
				</p>
				<img src="<?php echo ufv('/img/publick/rongyao4.png'); ?>">
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
                      "http://crwy.edisonluorui.com/publick/rongyaozuqiuone.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                      ufv("/img/logo.jpg")
                    );
                    share.timeline(
                      "不小心火了 - 潮人资讯",
                      "你知道的太多了",
                      "http://crwy.edisonluorui.com/publick/rongyaozuqiuone.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                      ufv("/img/logo.jpg")
                    );

                });
                </script>
</body>
</html>