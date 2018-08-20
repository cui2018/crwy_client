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
		padding:0;
	}
	p:nth-of-type(1){
		text-align: center;
		font-weight: bold;
		line-height: 15vw;
	}
	p:nth-of-type(3){
		text-indent: 6vw;
	}
	p:nth-of-type(4){
		text-indent: 6vw;
	}
	p:nth-of-type(5){
		text-indent: 6vw;
	}

	</style>
</head>
<body>
	<div style="padding:0 2.67vw;">
		<p>【传奇来了】4月27日临时维护公告 </p>
		<p>服务器将于4月27日14:30进行临时维护</p>
		<p>尊敬的玩家：<br>服务器将于4月27日14:30进行临时维护，本次维护预计5分钟，如预计时间内无法更新完毕，将继续顺延 ，请大家相互转告。本次维护内容：优化觉醒技能升级显示异常</p>
		
		<p>沈阳小罗潮人网络科技有限公司</p>
		<p> 2018年4月27日</p>
	</div>
	<script>
    var USER = <?php echo json_encode($user); ?>;
    $( function() {

      share.appMessage(
          "不小心火了 - 潮人资讯",
          "你知道的太多了",
          "http://crwy.edisonluorui.com/publick/chuanqilaile.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
          ufv("/img/logo.jpg")
        );
        share.timeline(
          "不小心火了 - 潮人资讯",
          "你知道的太多了",
          "http://crwy.edisonluorui.com/publick/chuanqilaile.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
          ufv("/img/logo.jpg")
        );

    });
    </script>
</body>
</html>