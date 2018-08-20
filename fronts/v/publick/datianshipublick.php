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
<link rel="stylesheet" href="<?php echo uv('/css/publick.css'); ?>">
<script src = "<?php echo ujv('/js/rem.js'); ?>"></script>
</head>
<body>	
	
	<section>
			 <p>潮人资讯</p>
			  <p>尊敬的《大天使之剑h5》游戏玩家：</p>
			 <p> 《大天使之剑H5》部分区服将于4月13日进行合服</p>
			 <p>【维护时间】2018.4.13 14：30-17:30</p>
<p>同时为了给玩家们提供更好的游戏体验并活跃游戏气氛，让玩家们结识更多的游戏伙伴、体验更多的挑战，《大天使之剑H5》顺应广大玩家的需求，将对部分区服进行合区处理。对以下服务器进行重组合服。合服完成后玩家可以通过原有账号登陆数据互通后的服务器.</p>
			 <p>公测（52,58）服</p>
			 <p style = 'font-size: 0.6rem; color: #fff;padding: 0 0.5rem 0 0.5rem'>公测（53,59）服</p>
			 <p style = 'font-size: 0.6rem; color: #fff;padding: 0 0.5rem 0 0.5rem'>公测（54,63）服</p>
			 <p style = 'font-size: 0.6rem; color: #fff;padding: 0 0.5rem 0 0.5rem'>公测（55,57）服 </p>
			 <p style = 'font-size: 0.6rem; color: #fff;padding: 0 0.5rem 0 0.5rem'>公测（56,70）服 </p>
			 <p style = 'font-size: 0.6rem; color: #fff;padding: 0 0.5rem 0 0.5rem'>公测（60,61）服 </p>
			 <p style = 'font-size: 0.6rem; color: #fff;padding: 0 0.5rem 0 0.5rem'>公测（62,69）服 </p>
			 <p style = 'font-size: 0.6rem; color: #fff;padding: 0 0.5rem 0 0.5rem'>公测（64,67）服 </p>
			 <p style = 'font-size: 0.6rem; color: #fff;padding: 0 0.5rem 0 0.5rem'>公测（65,66）服</p>
			 <p style = 'font-size: 0.6rem; color: #fff;padding: 0 0.5rem 0 0.5rem;margin-top:1rem;'>《潮人微游》运营团队</p>
			 <p style="font-size: 0.6rem;color: #fff;margin-top: 0.1rem;padding: 0 0.5rem 0 0.5rem;">发布日期：2018/03/08</p>
	</section>	

<script>
var USER = <?php echo json_encode($user); ?>;
$( function() {

  share.appMessage(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/datianshipublick.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );
    share.timeline(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/datianshipublick.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );

});
</script>
	
</body>
</html>