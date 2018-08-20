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
		color: #fff;
		margin-top: 0.5rem;
		font-size: 2.66vw;
	}
	section:nth-of-type(1){
		height: auto;
	}
</style>
</head>
<body>	
	<section>
			 <p>5.1劳动节活动</p>
             <p>1、招财猫</br>
                  活动时间：4.28~4.29</br>
                  活动规则：花费钻石抽取更多的钻石，包赚不亏！</br>
                  活动范围：开服时间大于4天的服</br>
                  核心奖励：钻石
			  </p>
			 <p>2、劳动节三叶草</br>
               活动时间：4.28~4.30</br>
               活动规则：活动时间内完成任务即可获得镰刀和锤子，兑换各种稀有道具！充值还能获得额外的镰刀和锤子！</br>
               活动范围：开服时间大于4天的服</br>
               核心奖励：高级宠物碎片、高级装备碎片、坐骑拉帝亚斯、拉帝欧斯、坐骑闪光裂空座
             </p>
             <p>3、限时特卖</br>
                活动时间：4.30~5.1</br>
                活动规则：活动期间内可以购买鞭炮，开启获得各种大奖</br>
                活动范围：开服时间大于4天的服</br>
                核心奖励：高级时装装备、树果盒子、创世宠物、自然宠物
              </p>
              <p>4、限时打折</br>
                  活动时间：4.30~5.1</br>
                  活动规则：活动期间内充值达到指定金额即可获得各种奖励！</br>
                  活动范围：开服时间大于4天的服</br>
                  核心奖励：翅膀流光羽翼、跟宠皮卡丘
            </p>
            <p>5、累计登录</br>
                  活动时间：4.28~5.2</br>
                  活动规则：活动期间内每日登录即送大奖！</br>
                  活动范围：开服时间大于4天的服</br>
                 核心奖励：钻石、体力药水、自然宠物碎片
            </p>
            <p>6、每日累充</br>
                  活动时间：4.29~5.1</br>
                  活动规则：活动期间，每天累计充值满指定金额即可领取奖励，连续充值满3天，还有
                  额外稀有奖励领取！</br>
                  活动范围：开服时间大于4天的服</br>
                 核心奖励：10级外观装备、超级万能碎片、
            </p>
            <p>（活动内容以线上版本为准）</p>
            <br />
	</section>	


<script>
var USER = <?php echo json_encode($user); ?>;
$( function() {

  share.appMessage(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/datianshih5.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );
    share.timeline(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/datianshih5.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );

});
</script>
</body>
</html>