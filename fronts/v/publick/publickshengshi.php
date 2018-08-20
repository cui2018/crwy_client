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
	p:nth-of-type(6){
		text-indent: 6vw;
	}
	p:nth-of-type(7){
		font-weight: bold;
		position: relative;
		left:20vw;
		top:10vw;
	}
	p:nth-of-type(8){
		font-weight: bold;
		position: relative;
		left:20vw;
		top:10vw;
	}
	</style>
</head>
<body>
	<div style="padding:0 2.67vw;">
		<p>关于《盛世九州》停服的通知</p>
		<p>《盛世九州》游戏客户:</p>
		<p>《盛世九州》游戏代理商通知：该游戏因重大技术问题需要对版本进行大规模的调整处理，较长时间内不会开服。以下为官方给出的退款措施，具体如下：</p>
		<p>1、因未开服导致部分用户无法等待的玩家可以添加《盛世九州》官方人员客服<span style="color:red;">QQ：2631572796</span>，提交个人信息，平台账号，平台，最近3个月充值记录及游戏账号剩余元宝数等信息给与官方人员。官方人员信息收集截止日期：2018年5月15日23:59（节假日除外），逾期将视为自动放弃。</p>
		<p>2、《盛世九州》官方人员在2018年5月16日至2018年5月24日（节假日除外）和平台核对用户充值记录等信息，并按照中华人民共和国文化部颁的《网络游戏暂行管理办法》之第二十二条“网络游戏运营企业终止运营网络游戏，或者网络游戏运营权发生转移的，应当提前60日予以公告。网络游戏用户尚未使用的网络游戏虚拟货币及尚未失效的游戏服务，应当按用户购买时的比例，以法定货币退还用户或者用户接受的其他方式进行退换。网络游戏因停止服务接入、技术故障等网络游戏运营企业自身原因连续中断服务超过30日的，视为终止。”的规定，与玩家协商并退还玩家账号下的剩余元宝对应的法定货币。</p>
		<p>《盛世九州》游戏已于  2018  年 1  月 19  日起开始停服，且我公司本着对广大客户负责的态度已于 2018 年 1  月 19  日发出一次停服公告，并告知了相关退款渠道。经过我公司争取该游戏代理商再次办理相关退款事宜，也是最后一次，望该游戏相关客户抓紧时间，在通知期限内通过游戏官方渠道办理退款事宜。我公司对该游戏停服给相关客户带来的不便深表歉意。</p>
		<p>沈阳小罗潮人网络科技有限公司</p>
		<p> 2018年4月27日</p>
	</div>
		<script>
                var USER = <?php echo json_encode($user); ?>;
                $( function() {

                  share.appMessage(
                      "不小心火了 - 潮人资讯",
                      "你知道的太多了",
                      "http://crwy.edisonluorui.com/publick/publickshengshi.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                      ufv("/img/logo.jpg")
                    );
                    share.timeline(
                      "不小心火了 - 潮人资讯",
                      "你知道的太多了",
                      "http://crwy.edisonluorui.com/publick/publickshengshi.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
                      ufv("/img/logo.jpg")
                    );

                });
                </script>
</body>
</html>