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
section:nth-of-type(1)>p:nth-of-type(1) {
    line-height: 3.66vw;
    color: #fff;
    font-size: 1rem;
    text-align: left;
}
th{
		color: #fff;
		font-weight: normal;
		font-size:3.66vw;
	}
	p{
		color:#fff;
	font-size:2.66vw!important;
		    margin-top: 0.5rem;
	}
	td{
		font-size:2.66vw;
		color: #fff;
		font-weight: normal;
	}
	div img{
		margin-top: 0.3rem;
		width:100%;
	}
	section:nth-of-type(1){
		height: auto;
	}

	div{
    	    background: #23252F;
    	    padding:0 2.66vw;
    	    padding-bottom:2.66vw;
    	}
</style>
</head>
<body>
	<div>
			 <p>更新区服：全服</p>
			  <p>更新时间：5月3日06:00-07:30</p>
			 <p>更新内容：</p>
			 <p>一、新增跨服BOSS系统</p>

			<p>开启条件：开服第7天开启，等级达到2转的玩家均可参加</p>
			<p>活动时间：每天10：00—10：30、14：00—14：30 </p>
			<p>活动规则：</p>
			<p>跨服boss每局参加人数为10人，进入地图后随机抽取一名玩家变身为强力BOSS;</p>
			<p>剩余玩家在对应的时间内击杀BOSS玩家可获得奖励，击杀时间越短奖励越多；</p>
			<p>同样BOSS玩家在相应时间内存活也可获得奖励，存活时间越长奖励越多。击杀玩家可获得威名值；</p>
			<p>每次成为跨服boss玩家均能获得1次幸运转盘的机会。</p>


	</div>


<script>
var USER = <?php echo json_encode($user); ?>;
$( function() {

  share.appMessage(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/hongyuewushuang.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );
    share.timeline(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/hongyuewushuang.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );

});
</script>
</body>
</html>