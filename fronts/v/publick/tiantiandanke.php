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
		text-align: left;
		padding: 10px;
	}
	#content>li:nth-of-type(6)>img{
		width:72vw;
	}

	#content>li:nth-of-type(7)>p{
		text-align: center;
		padding: 10px;
	}
	#content>li:nth-of-type(7)>img{
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
	<p id="title">天天坦克大战更新</p>
	<p id="time">
		游戏将于4月27日中午15：00-15:30进行在线更新，预计半小时左右，届时可能会出现将无法进入游戏，请悉知
	</p>
	<div id="middle">
		 <ul id="content">
			<li>
				<p>活动一：疯狂彩蛋100%送限定皮肤</p>
				<p>
					活动时间 ：活动时间4.27-5.1
					<br>
					活动内容：详情请游戏内查看

				</p>
				<img src="<?php echo ufv('/img/publick/tiantian1.png'); ?>">
			</li>

			<li>
				<p>活动二：红包福利消费钻石返利</p>				
				<p>
					活动时间 ：4.27-5.3
					<br>
					活动内容:：详情请游戏内查看
				</p>
			</li>

			<li>
				<p>活动三：新坦克限时打折</p>
				<p>
					活动时间 ：4.27-5.1
					<br>
					活动内容:：详情请游戏内查看
				</p>
				<img src="<?php echo ufv('/img/publick/tiantian2.png'); ?>">
			</li>
			
			<li>
				<p>活动四：新增特惠礼包（新增战地机甲系列坦克礼包）</p>
				<p>
					活动时间 ：4.20-4.24
					<br>
					活动内容:：详情请游戏内查看
				</p>
				<img src="<?php echo ufv('/img/publick/tiantian2.png'); ?>">
			</li>

			<li>
				<p>活动五：登陆送礼</p>
				<p>
					活动时间 ：4.29-5.1
					<br>
					活动内容:：详情请游戏内查看
				</p>
			</li>

			<li>
				<p>活动六：限时双倍经验（排位）</p>
				<p>
					活动时间 ：4.29-5.1
					<br>
					活动内容:：详情请游戏内查看
				</p>
				<img src="<?php echo ufv('/img/publick/tiantian3.png'); ?>">
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
                  "http://crwy.edisonluorui.com/publick/tiantiandanke.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                  ufv("/img/logo.jpg")
                );
                share.timeline(
                  "不小心火了 - 潮人资讯",
                  "你知道的太多了",
                  "http://crwy.edisonluorui.com/publick/tiantiandanke.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                  ufv("/img/logo.jpg")
                );

            });
            </script>
</body>
</html>