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
<!--<link rel="stylesheet" href="<?php echo uv('/css/publick.css'); ?>">-->
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
	body{
	       background: transparent;
	}
    section:nth-of-type(1) {
         background: transparent;
         margin:0;
         width:100%;
    }
    
    div{
    	padding: 5vw 2.66vw;
    font-size:3.66vw;
    }
    th{
        font-size:3.66vw;
        font-weight:normal;
    }
    td{
         font-size:2.66vw;
    }

	</style>
</head>
<body>
	<div >
		【传奇来了】5月4日更新公告<br><br>尊敬的玩家：<br>《传奇来了》将于2018年5月4日上午9:30-11:30进行全服更新（当日新开服除外不受影响），本次更新预计2小时，如预计时间内无法更新  完毕，将继续顺延，请大家相互转告。<br><br>本次更新内容：<br>1、解锁各职业第3个觉醒技能；<br>2、优化石墓阵玩法；<br>3、优化材料副本显示； 
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