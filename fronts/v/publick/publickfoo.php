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
			  <img src="http://p0oqd5s9w.bkt.clouddn.com/yurenjiehuodong.png" style="width:100%;">
	</section>	


	<script>
    var USER = <?php echo json_encode($user); ?>;
    $( function() {

      share.appMessage(
          "不小心火了 - 潮人资讯",
          "你知道的太多了",
          "http://crwy.edisonluorui.com/publick/publickfoo.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
          ufv("/img/logo.jpg")
        );
        share.timeline(
          "不小心火了 - 潮人资讯",
          "你知道的太多了",
          "http://crwy.edisonluorui.com/publick/publickfoo.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
          ufv("/img/logo.jpg")
        );

    });
    </script>
</body>
</html>