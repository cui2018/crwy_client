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
</head>
<body>
	<section>
			 <p>潮人资讯</p>
			  <p>《百战天下》4月30日关服停止运营公告：</p>
			 <p>您好！《百战天下》将于2018年4月30日12:00正式终止游戏运营，关闭《百战天下》所有服务器，服务器关闭后玩家将无法登录游戏。在此期间如遇到游戏任何问题请联系平台客服进行咨询反馈：</p>
			 <p>关服流程时间安排: <br>

			 	一、2018年4月15日12:00关闭充值服务，同时将停止游戏版本更新，包括但不限于任何游戏活动的举办。<br>二、2018年4月30日12:00正式停止游戏运营，所有服务器关闭。<br>三，2018年5月31日17：00：关闭论坛，玩家咨询及投诉渠道。

			 </p>

			<p>感谢各位玩家一直以来对我们游戏的支持！谢谢大家！我们会尽最大的努力做好游戏最后的运营工作，希望您可以陪伴我们一起回味体验剩下的游戏时间。</p>
			 <p>《潮人微游》运营团队</p>
			 <p style="font-size: 0.6rem;color: #fff;margin-top: 0.1rem;padding: 0 0.5rem 0 0.5rem;">发布日期：2018/04/02</p>
	</section>	


<script>
var USER = <?php echo json_encode($user); ?>;
$( function() {

  share.appMessage(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/baizhantianxia.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );
    share.timeline(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/baizhantianxia.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );

});
</script>
</body>
</html>