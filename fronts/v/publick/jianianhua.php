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

<script src = "<?php echo ujv('/js/rem.js'); ?>"></script>
<title><?php echo $title; ?></title>
<?php
$js->jquery('2.0.0');
$js->main();
$wx->jssdk();
?>
<style>
	body{
		background: transparent;
	}
	section:nth-of-type(1){
		background: transparent;
	}
	div img{
		width: 100%;
	}
	p{
		font-size:2.66vw;
	}
</style>
</head>
<body>	
	<section>
			 <p>活动一：节日登录</p>
			  <p>1.活动时间：2018年04月28日 00:00:00 - 2018年05月03日 23:59:59</p>
			 <p>2.活动规则：活动期间，每天登陆游戏即可领取一份奖励，还可获得称号【勤劳的小蜜蜂】。</p>
			 <p>3.活动范围：全区全服</p>
			<p>4.活动奖励：</p>
			<div>
				<img src="<?php echo ufv('/img/publick/jianianhuaurl.png'); ?>" alt="" />
			</div>
			<br />
			<p>活动二：云游商人</p>	
			<p>1.活动时间：2018年04月28日 00:00:00 - 2018年05月03日23:59:59</p>
			<p>2.活动规则：在活动期间，云游商人每日12点将会带着超酷道具将会带来拍卖行。</p>
			<p>3.活动范围：全区全服</p>
			<p>4.活动奖励：</p>
			<div>
				<img src="<?php echo ufv('/img/publick/jianianhua02.png'); ?>" alt="" />
			</div>
			<br />
			<p>活动三：节日兑换</p>	
			<p>1.活动时间：2018年04月28日 00:00:00 - 2018年05月03日23:59:59</p>
			<p>2.活动规则：在线野外战斗将会掉落“劳”、“动”、“节”3个物品，收集物品可在免费节日活动兑换换取好礼。</p>
			<p>3.活动范围：全区全服</p>
			<p>4.活动奖励：</p>
			<div>
				<img src="<?php echo ufv('/img/publick/jianianhua03.png'); ?>" alt="" />
			</div>
			<br />
			<p>活动四：单笔充值</p>	
			<p>1.活动时间：2018年04月28日 00:00:00 - 2018年05月03日23:59:59</p>
			<p>2.活动规则：活动期间，满足指定【单笔】充值500元宝，即可获得劳动节称号【锄禾日当午】；满足指定【单笔】充值1000元宝，即可获得一份超值礼包，满足指定【单笔】充值2000元宝，即可获得一份超值礼包；满足置顶【单笔】5000元宝，即可获得酷炫坐骑【耕地神牛】。</p>
			<p>3.活动范围：全区全服</p>
			<p>4.活动奖励：</p>
			<div>
				<img src="<?php echo ufv('/img/publick/jianianhua04.png'); ?>" alt="" />
			</div>
			<br />
			<p>活动五：节日特卖</p>	
			<p>活动时间：2018年04月28日 00:00:00 - 2018年05月03日23:59:59</p>
			<p>2.活动规则：活动期间，每日开放特卖道具，超低折扣。</p>
			<p>3.活动范围：全区全服</p>
			<p>4.活动奖励：</p>
			<div>
				<img src="<?php echo ufv('/img/publick/jianianhua05.png'); ?>" alt="" />
			</div>
			<br />
			<p>活动六：每日活跃</p>	
			<p>1.活动时间：2018年04月28日 00:00:00 - 2018年05月03日23:59:59</p>
			<p>2.活动规则：活动期间，每日根据开放活跃活动，完成次数即可领取奖励。</p>
			<p>3.活动范围：全区全服</p>
			<p>4.活动奖励：</p>
			<div>
				<img src="<?php echo ufv('/img/publick/jianianhua06.png'); ?>" alt="" />
			</div>
			<br />
			<p>活动七：兽王之息</p>	
			<p>1.活动时间：2018年04月28日 00:00:00 - 2018年05月03日23:59:59</p>
			<p>2.活动规则：活动期间，宠物秘境捕捉时间缩短90秒，赶紧去捕获你心爱的宠物吧！</p>
			<p>3.活动范围：全区全服</p>
			<p>4.活动奖励：</p>
			<div>
				<img src="<?php echo ufv('/img/publick/jianianhua07.png'); ?>" alt="" />
			</div>
	</section>	


<script>
var USER = <?php echo json_encode($user); ?>;
$( function() {

  share.appMessage(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/jianianhua.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );
    share.timeline(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/jianianhua.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );

});
</script>
</body>
</html>