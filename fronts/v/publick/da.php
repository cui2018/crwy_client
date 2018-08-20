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
	<p id="title">04月27日14:30--16:30进行停服维护更新</p>
	<p id="time">2018-04-26</p>
	<div id="middle">
		 <ul id="content">
			<li>
				<p>一.新增：新功能预告</p>
				<p>
					1:通过完成3轮的线索任务和竞猜后即可解锁功能预告，提前获知即将更新的内容
					<br>
					2:每轮竞猜猜对均可获得奖励
				</p>
				<img src="<?php echo ufv('/img/publick/da1.png'); ?>">
			</li>

			<li>
				<p>二.新增：强化套装精炼</p>
				<p>
					1:强化精炼是每个角色互相独立的
					<br>
					2:可以对8个部件进行强化套装精炼，分别是项链、左戒、右戒、铠甲、头盔、护腿、护手、鞋子，对应强化套装的各个部位
					<br>
					3:消耗强化精炼石，即可对强化套装部件进行精炼，每次精炼必定提升精炼等级
					<br>
					4:当多件同类型强化套装的部件满足精炼等级要求时，立即激活对应的组合属性，获得大量属性加成。组合属性永不消失，还有极品属性“套装攻防血加成”，直接百分比增加原强化套装的攻防血属性。
					<br>
					强化套装精炼石可通过现有的强化套装石合成得到
				</p>
				<img src="<?php echo ufv('/img/publick/da2.png'); ?>">
				<img src="<?php echo ufv('/img/publick/da3.png'); ?>">
			</li>

			<li>
				<p>三.成就勋章优化</p>
				<p>
					1:成就勋章新增15至20层
					<br>
					2:新增单层重置功能
				</p>
			</li>

			<li>
				<p>四.出售优化</p>
				<p>部分道具改为可出售，包括再生淬炼材料，转职专用道具、升级神兵材料、称号卡、套装精炼石、强化套装精炼石。</p>
			</li>

			<li>
				<p>五.守护优化</p>
				<p>新增骨龙合成，合成材料：未穿戴过的小恶魔一个，骨龙精魄一个。骨龙属性：增加伤害+30%,减少伤害+20%，杀怪经验+25%,防御力+100</p>
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
                  "http://crwy.edisonluorui.com/publick/da.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                  ufv("/img/logo.jpg")
                );
                share.timeline(
                  "不小心火了 - 潮人资讯",
                  "你知道的太多了",
                  "http://crwy.edisonluorui.com/publick/da.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                  ufv("/img/logo.jpg")
                );

            });
            </script>
</body>
</html>