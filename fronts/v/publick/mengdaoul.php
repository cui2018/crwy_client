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
section:nth-of-type(1) {
    width: 13.8rem;
    height: auto;
    background: #23252F;
    margin:auto;
    border-radius: 0.3rem;
}
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
		font-size:2.66vw!important;
		color: #fff;
		font-weight: normal;
	}
	div{
	    background: #23252F;
	    padding:0 2.66vw;
	    padding-bottom:2.66vw;
	}
	div img{
		margin-top: 0.3rem;
		width:100%;
	}
	section:nth-of-type(1){
		height: auto;
	}
</style>
</head>
<body>
	<div>
			 <p>《梦道》安排于本周四（05月03日）进行数据互通，请各位知晓。</p>
			  <p>【维护时间】5月3日 （周四） 14:00 开始</p>
			 <p>【维护时长】203-214区 维护3.5小时（17:30结束</p>
			 <p>【维护范围】203-208、209-214区数据互通</p>

			<p>【维护规则】</p>
			<p>一、账号清理 </p>
			<p>*以下条件都满足的角色将被清除</p>
			<p>1.最近14天没有登陆记录；</p>
			<p>2.角色等级＜50级；</p>
			<p>3.充值金额 = 0 </p>
			<p>注：公会长不会被清理</p>
			<p>二、相关数据处理</p>
			<p>* 玩家同名或公会同名的将会被系统自动改名，并获得1次免费改名次数</p>
			<p>* 活动数据相关处理</p>
			<p>1.为了保证活动的统一性，合服后将保留最新区服的活动，其他旧区的活动都将清除</p>
			<p>2.数据互通后【返利大厅】将消失，【合区活动】将代替【返利大厅】，并于次日凌晨0点开放【合区活动】</p>
			<p>3.数据互通后保留原来区服入口，玩家在互通前各个区的活跃角色都将保留注：数据互通前建议玩家注意活动奖励是否领取完毕，避免奖励丢失</p>
			<p>* 以下数据将清空</p>
			<p>1.竞技场排行榜(重置历史最高排名奖励)</p>
			<p>2.天罡地煞最快击杀记录</p>
			<p>3.天罡地煞首杀记录(清空排行榜、重置首杀奖励)</p>
			<p>4.天庭宝库获奖记录</p>
			<p>5.全民魔王伤害排行榜(先发奖后清榜)</p>
			<p>6.全民魔王击杀记录</p>
			<p>7.科举比赛答题排行榜</p>
			<p>8.超过7日未领取的邮件将删除</p>
			<p>* 以下排行榜将重新计算</p>
			<p>1.【主线通关、三界道场、戏嫦娥、封妖秘境】关卡排名</p>
			<p>2.【每日书院-答题排行榜】</p>
			<p>3.【排行榜】战力、等级、翅膀、坐骑、神兵、法宝、仙阵、境界、兽灵、血统、宠物、仙侣、玄女、兵书、神枪、灵甲排行榜</p>
			<p>4.【帮派排名】</p>
			<p>三、补偿</p>
			<p> 数据互通完成后1小时内，将发放奖励：绑定元宝*300，金装碎片*10，转生草*2。</p>


	</div>


<script>
var USER = <?php echo json_encode($user); ?>;
$( function() {

  share.appMessage(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/mengdaoul.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );
    share.timeline(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/mengdaoul.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );

});
</script>
</body>
</html>