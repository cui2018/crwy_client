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
			  <p>《修罗武神》将于4.4日凌晨00：00-01：30进行全服的更新，届时服务器将暂时关闭维护，预计维护时间为1.5小时</p>
			 <p>如遇到特殊情况将视情况顺延开服时间，请您提前做好下线准备，合理安排游戏时间，对您造成的不便我们深表歉意，感谢您的支持！</p>
			 <p>更新内容: <br>

			 	一、开启清明节日活动，70级以上的角色可参与，活动包括登录豪礼、祈福转盘、超值寻宝和限时送礼活动，4月4日~4月8日持续5天。<br>二、新增护送美女活动，80级以上角色可在活动-全天活动-护送美女参与，护送美女可获得异宝碎片、成就积分和铜钱奖励，美女品质越高奖励越多。<br>三，新增轮回系统，6转开启轮回，120级以上玩家可在主界面-轮回界面，通过降级获取业力提升轮回境界，轮回境界可提升圣神伤害属性。<br>四，新增天书特卖，开服第5天开启，持续7天，限时出售紫玉天书，购买可直接提升紫玉天书到1阶。<br>五，开服8~14天部分活动内容调整。<br>六，1元礼包按钮从超值界面调整到主界面。<br>七，优化修罗战场奖励数值

			 </p>

			<p>感谢各位玩家一直以来对我们游戏的支持！谢谢大家！我们会尽最大的努力做好游戏运营工作。</p>
			 <p>《潮人微游》运营团队</p>
			 <p style="font-size: 0.6rem;color: #fff;margin-top: 0.1rem;padding: 0 0.5rem 0 0.5rem;">发布日期：2018/04/03</p>
	</section>	

<script>
    var USER = <?php echo json_encode($user); ?>;
    $( function() {

      share.appMessage(
          "不小心火了 - 潮人资讯",
          "你知道的太多了",
          "http://crwy.edisonluorui.com/publick/publickxiuluo.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
          ufv("/img/logo.jpg")
        );
        share.timeline(
          "不小心火了 - 潮人资讯",
          "你知道的太多了",
          "http://crwy.edisonluorui.com/publick/publickxiuluo.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
          ufv("/img/logo.jpg")
        );

    });
    </script>
	
</body>
</html>