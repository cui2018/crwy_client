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
	div{
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
			 <p>五一天赐神力风暴再起！《传世H5》神具共鸣解封羁绊</p>
			  <p>五一将至，《传奇世界之仗剑天涯H5》又有大动作，推出”神力”新系统！说来已有不少大佬的实力等同于神了吧，而神力系统将为大家开启一个前所未有的新境界。获得天赐神力既是你打开新领域的钥匙，还将让你神一般的实力再度升华并为成神正名！</p>
		<div>
			<img src="<?php echo ufv('/img/publick/chuanshih5.png'); ?>" alt="" />
		</div>
		<p>
			相信勇士们都是不甘在强者之路上停滞的人，因为在最高处俯瞰山河才是最美的！神力开启则会带大家进入一个新世界，那里将有前所未见的强大BOSS、更精彩的挑战等着你去征服，等着你去主宰！神力系统与勇士们现有的战力属性大为不同，是一套全新的“灵力”属性系统。在五一期间，我们就会推出“天赐神力”活动，助勇士们获取神力脱胎换骨！
		</p>
		<p>
			如何激活神力？拥有法宝、天神卡及勋章道具的勇士们，赶紧看看自己是否搭得上成神的第一班车!只要你集齐这些指定的道具，经过组合就能让它们产生共鸣，激活属性羁绊召唤神力！想不到法宝、天神卡、勋章还有这样的作用吧？惊喜不惊喜，意外不意外？
		</p>
		<p>
			五一来临我们还给法师送来了全新套装“天霄”。穿起来银装素裹霸气侧漏啊，更吊炸天的是套装拥有“不屈之魂”的技能，会在你复活用完的情况下，另外送你一次满血复活的机会。如此战局有法师在，你可以放心地说“稳了”。
		</p>
		<div>
			<img src="<?php echo ufv('/img/publick/chuanshih5url.png'); ?>" alt="" />
		</div>
		<p>
			全新属性的神力系统开启，无疑为《传奇世界之仗剑天涯H5》带来一场前所未有的新风暴，为本就纷争不断的传奇世界，再添一把火！兄弟们一起来吧！是时候以神之名，为神正名了！
		</p>
	</section>	


<script>
var USER = <?php echo json_encode($user); ?>;
$( function() {

  share.appMessage(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/chuanshih5.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );
    share.timeline(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/chuanshih5.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );

});
</script>
</body>
</html>