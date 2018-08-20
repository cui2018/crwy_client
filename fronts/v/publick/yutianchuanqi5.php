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
			 <p>五一约战武动巅峰！《御天传奇》天梯赛燃情再战</p>
			  <p>哪位主公在《御天传奇》里不是四方征战，为创建大业操碎心了心，五一劳动节将至，是时候给主公们来一波犒赏了。不过主公们可是精力无限啊，没有架打怎么行？那就比拼武力，看谁能在天梯赛上撼动乾坤吧。巅峰约战，我们五一不见不散！</p>
		<div>
			<img src="<?php echo ufv('/img/publick/yutianchuaqiurl.png'); ?>" alt="" />
		</div>
		<p>
			活动范围：具体开放情况请见游戏内详细介绍
		</p>
		<p>
			活动时间：2018年5月1日至5月3日
		</p>
		<p>
			活动内容：
		</p>
		<p>
			活动一、财神犒劳你
		</p>
		<p>
			主公矜矜业业不容易，财神在劳动节怎能不犒赏一番，小手一点黄金万两，望主公笑纳；
		</p>
		<p>
			活动二、五一黄金雨
		</p>
		<p>
		节日期间，天公可劲儿降下黄金雨，15倍金子送不停，主公能怎么做？乖乖接受吧；
		</p>
		<p>
			活动三、劳动有宝拿
		</p>
		<p>
			节日期间，参与超值大寻宝，称号、神将大放送机不可失；
		</p>
		<p>
			活动四、跨服拼搏夺称号
		</p>
		<p>
			节日期间，主公若跨服排行榜上有名，或能拿到“八荒无极”称号哟；
		</p>
		<p>
			活动五、限时Boss闹五一
		</p>
		<p>
			节日期间，快来暴打限时boss，秘银玄铁掉不停，丰富豪礼随你挑；
		</p>
		<p>
			活动六、武动巅峰天梯赛
		</p>
		<p>
			谁将武动巅峰，战夺荣耀？五一天梯赛热血开打，等你来战！
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
      "http://crwy.edisonluorui.com/publick/yutianchuanqi5.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );
    share.timeline(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/yutianchuanqi5.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );

});
</script>
</body>
</html>