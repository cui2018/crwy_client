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
	p{
		word-break: break-word;
		color: #fff;
		font-size: 2.66vw;
		    margin-top: 0.5rem;
	}
	div img{
		width: 100%;
	}
	section:nth-of-type(1){
		height: auto;
	}
</style>
</head>
<body>	
	<section>
			 <p>《金庸侠客行》财神也来混江湖 少侠五一要发财</p>
			  <p>出来走江湖最不能少的是什么？当然是钱啊，没钱你买不了神兵利器，买不到好衣装更泡不到妹子，五一财神出没《金庸侠客行》，江湖拯救你！只要投入越多财神就能送你更多，参与充值还可获得高额大返利！请少侠好好把握发达机会，在节日大赚一笔吧！</p>
		<div>
			<img src="<?php echo ufv('/img/publick/jinyongxiakexing.png'); ?>" alt="" />
		</div>
		<p>
			活动范围：具体开放情况请见游戏内详细介绍	
		</p>
		<p>
			活动内容：
		</p>
		<p>
			活动一、财神现江湖
		</p>
		<p>
			活动时间：2018年4月29日至5月1日
		</p>
		<p>
			活动期间进行充值的少侠，可获赠抽奖次数，一次投入元宝越多财神就会送你更多，少侠你稳赚不赔哟；
		</p>
		<br />
		<p>
			活动二、五一在即神兵出世
		</p>
		<p>
		活动时间：2018年4月29日
		</p>
		<p>
			（1）活动期间进行充值，可获得多倍充值返利；
		</p>
		<p>
			（2）此时不团购更待何时，本日团购排行榜的豪气少侠可获翻倍奖励；
		</p>
		<p>
			（3）活动期间，少侠可享受至尊印兑换低折扣优惠；
		</p>
		<p>
			（4）为庆祝五一到来，全新神兵上线，请留意抢购哦。
		</p>
		<br />
		<p>
			活动三、侠客岛乐夺宝
		</p>
		<p>
			活动时间：2018年4月30日
		</p>
		<p>
			（1）活动期间进行充值，可获得多倍充值返利；
		</p>
		<p>
			（2）活动期间，侠客岛夺宝产出奖励大提升，并且排行榜奖励翻倍送；
侠客岛产出提升
		</p>
		<br />
		<p>
			活动四、黑木令大比拼
		</p>
		<p>
			活动时间：2018年5月1日
		</p>
		<p>
			（1）活动期间进行充值，可获得多倍充值返利；
		</p>
		<p>
			（2）活动期间，少侠可享受黑木令8折兑换优惠；
侠客岛产出提升
		</p>
		<p>
			（3）活动期间，黑木令排行榜奖励翻倍送；
		</p>
		<br />
		<p>
			活动五、五一飞升有惊喜
		</p>
		<p>
			活动时间：2018年4月29日至5月1日
		</p>
		<p>
			活动期间，进行飞升大比拼，排行有名者奖励翻倍！
		</p>
		<p>
			（注：以上内容请以游戏实际活动为准）
		</p>
	</section>	


<script>
var USER = <?php echo json_encode($user); ?>;
$( function() {

  share.appMessage(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/jinyongxiakexing.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );
    share.timeline(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/jinyongxiakexing.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );

});
</script>
</body>
</html>