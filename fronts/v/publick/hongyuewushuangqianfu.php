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
<script src = "<?php echo ujv('/js/rem.js'); ?>"></script>
<title><?php echo $title; ?></title>
<?php
$js->jquery('2.0.0');
$js->main();
$wx->jssdk();
?>
<style>
@font-face{
font-family:"Times New Roman";
}

@font-face{
font-family:"宋体";
}

@font-face{
font-family:"Calibri";
}

@font-face{
font-family:"Wingdings";
}

@font-face{
font-family:"MS Mincho";
}

@list l0:level1{
mso-level-number-format:japanese-counting;
mso-level-suffix:tab;
mso-level-text:"%1、";
mso-level-tab-stop:none;
mso-level-number-position:left;
margin-left:36.0000pt;text-indent:-36.0000pt;font-family:'Times New Roman';}

@list l0:level2{
mso-level-number-format:alpha-lower;
mso-level-suffix:tab;
mso-level-text:"%2)";
mso-level-tab-stop:none;
mso-level-number-position:left;
margin-left:42.0000pt;text-indent:-21.0000pt;font-family:'Times New Roman';}

@list l0:level3{
mso-level-number-format:lower-roman;
mso-level-suffix:tab;
mso-level-text:"%3.";
mso-level-tab-stop:none;
mso-level-number-position:right;
margin-left:63.0000pt;text-indent:-21.0000pt;font-family:'Times New Roman';}

@list l0:level4{
mso-level-number-format:decimal;
mso-level-suffix:tab;
mso-level-text:"%4.";
mso-level-tab-stop:none;
mso-level-number-position:left;
margin-left:84.0000pt;text-indent:-21.0000pt;font-family:'Times New Roman';}

@list l0:level5{
mso-level-number-format:alpha-lower;
mso-level-suffix:tab;
mso-level-text:"%5)";
mso-level-tab-stop:none;
mso-level-number-position:left;
margin-left:105.0000pt;text-indent:-21.0000pt;font-family:'Times New Roman';}

@list l0:level6{
mso-level-number-format:lower-roman;
mso-level-suffix:tab;
mso-level-text:"%6.";
mso-level-tab-stop:none;
mso-level-number-position:right;
margin-left:126.0000pt;text-indent:-21.0000pt;font-family:'Times New Roman';}

@list l0:level7{
mso-level-number-format:decimal;
mso-level-suffix:tab;
mso-level-text:"%7.";
mso-level-tab-stop:none;
mso-level-number-position:left;
margin-left:147.0000pt;text-indent:-21.0000pt;font-family:'Times New Roman';}

@list l0:level8{
mso-level-number-format:alpha-lower;
mso-level-suffix:tab;
mso-level-text:"%8)";
mso-level-tab-stop:none;
mso-level-number-position:left;
margin-left:168.0000pt;text-indent:-21.0000pt;font-family:'Times New Roman';}

@list l0:level9{
mso-level-number-format:lower-roman;
mso-level-suffix:tab;
mso-level-text:"%9.";
mso-level-tab-stop:none;
mso-level-number-position:right;
margin-left:189.0000pt;text-indent:-21.0000pt;font-family:'Times New Roman';}

p.MsoNormal{
mso-style-name:正文;
mso-style-parent:"";
margin:0pt;
margin-bottom:.0001pt;
mso-pagination:none;
text-align:justify;
text-justify:inter-ideograph;
font-family:Calibri;
font-size:10.5000pt;
mso-font-kerning:1.0000pt;
}

span.10{
font-family:Calibri;
}

span.15{
font-family:Calibri;
font-size:9.0000pt;
}

span.16{
font-family:Calibri;
font-size:9.0000pt;
}

span.17{
font-family:Calibri;
font-size:9.0000pt;
}

p.MsoHeader{
mso-style-name:页眉;
mso-style-noshow:yes;
margin:0pt;
margin-bottom:.0001pt;
border-bottom:1.0000pt solid windowtext;
mso-border-bottom-alt:0.7500pt solid windowtext;
padding:0pt 0pt 1pt 0pt ;
layout-grid-mode:char;
mso-pagination:none;
text-align:center;
font-family:Calibri;
font-size:9.0000pt;
mso-font-kerning:1.0000pt;
}

p.MsoFooter{
mso-style-name:页脚;
mso-style-noshow:yes;
margin:0pt;
margin-bottom:.0001pt;
layout-grid-mode:char;
mso-pagination:none;
text-align:left;
font-family:Calibri;
font-size:9.0000pt;
mso-font-kerning:1.0000pt;
}

p.MsoAcetate{
mso-style-name:批注框文本;
mso-style-noshow:yes;
margin:0pt;
margin-bottom:.0001pt;
mso-pagination:none;
text-align:justify;
text-justify:inter-ideograph;
font-family:Calibri;
font-size:9.0000pt;
mso-font-kerning:1.0000pt;
}

p.21{
mso-style-name:列出段落;
margin:0pt;
margin-bottom:.0001pt;
text-indent:21.0000pt;
mso-char-indent-count:2.0000;
mso-pagination:none;
text-align:justify;
text-justify:inter-ideograph;
font-family:Calibri;
font-size:10.5000pt;
mso-font-kerning:1.0000pt;
}

span.msoIns{
mso-style-type:export-only;
mso-style-name:"";
text-decoration:underline;
text-underline:single;
color:blue;
}

span.msoDel{
mso-style-type:export-only;
mso-style-name:"";
text-decoration:line-through;
color:red;
}

table.MsoNormalTable{
mso-style-name:普通表格;
mso-style-parent:"";
mso-style-noshow:yes;
mso-tstyle-rowband-size:0;
mso-tstyle-colband-size:0;
mso-padding-alt:0.0000pt 5.4000pt 0.0000pt 5.4000pt;
mso-para-margin:0pt;
mso-para-margin-bottom:.0001pt;
mso-pagination:widow-orphan;
font-family:'Times New Roman';
font-size:10.0000pt;
mso-ansi-language:#0400;
mso-fareast-language:#0400;
mso-bidi-language:#0400;
}
@page{mso-page-border-surround-header:no;
	mso-page-border-surround-footer:no;}@page Section0{
margin-top:72.0000pt;
margin-bottom:72.0000pt;
margin-left:90.0000pt;
margin-right:90.0000pt;
size:595.3000pt 841.9000pt;
layout-grid:15.6000pt;
}
div.Section0{page:Section0;}</style></head><body style="tab-interval:21pt;text-justify-trim:punctuation;" ><!--StartFragment--><div class="Section0"  style="layout-grid:15.6000pt;" ><p class=MsoNormal  align=center  style="text-align:center;" ><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:24.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >千服活动</font></span></b><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:24.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></b></p><p class=MsoNormal  style="text-align:left;" ><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></b></p><p class=21  style="margin-left:36.0000pt;text-indent:-36.0000pt;mso-char-indent-count:0.0000;text-align:left;mso-list:l0 level1 lfo1;" ><![if !supportLists]><span style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><span style='mso-list:Ignore;' >一、<span>&nbsp;</span></span></span><![endif]><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >幸运抽奖</font></span></b><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></b></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >消费每达到一定金额，即可获得一次抽奖机会，每次抽奖皆可获得转盘上的一种奖励，直到转盘上的奖励全部获取完毕。总计两个转盘，</font>20<font face="宋体" >种奖励，第二个转盘更有</font></span><b><span style="mso-spacerun:'yes';font-family:宋体;color:rgb(255,0,0);font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >至尊屠龙刀，屠龙战甲</font></span></b><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >等极品奖励</font></span><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p><p class=MsoNormal  style="mso-pagination:widow-orphan;text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:0.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=MsoNormal  style="text-align:left;" ><img width="346"  height="482"  src="<?php echo ufv('/img/publick/hongyuewushuangqianfu.files/hongyuewushuangqianfu102.png'); ?>" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=21  style="margin-left:36.0000pt;text-indent:-36.0000pt;mso-char-indent-count:0.0000;text-align:left;mso-list:l0 level1 lfo1;" ><![if !supportLists]><span style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><span style='mso-list:Ignore;' >二、<span>&nbsp;</span></span></span><![endif]><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >千服回馈</font></span></b><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></b></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >活动期间，等级达到</font>80<font face="宋体" >级以上的玩家可以领取一份回馈礼包</font></span><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p><p class=MsoNormal  style="text-align:left;" ><img width="371"  height="517"  src="<?php echo ufv('/img/publick/hongyuewushuangqianfu.files/hongyuewushuangqianfu138.png'); ?>" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=21  style="margin-left:36.0000pt;text-indent:-36.0000pt;mso-char-indent-count:0.0000;text-align:left;mso-list:l0 level1 lfo1;" ><![if !supportLists]><span style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><span style='mso-list:Ignore;' >三、<span>&nbsp;</span></span></span><![endif]><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >限时抢购</font></span></b><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></b></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >活动期间羽毛、龙魂、圣珠、特戒有</font>VIP<font face="宋体" >特权限时抢购里面，超低价回馈。</font></span><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p><p class=MsoNormal  style="text-align:left;" ><img width="386"  height="542"  src="<?php echo ufv('/img/publick/hongyuewushuangqianfu.files/hongyuewushuangqianfu181.png'); ?>" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=21  style="margin-left:36.0000pt;text-indent:-36.0000pt;mso-char-indent-count:0.0000;text-align:left;mso-list:l0 level1 lfo1;" ><![if !supportLists]><span style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><span style='mso-list:Ignore;' >四、<span>&nbsp;</span></span></span><![endif]><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >勤劳致富</font></span></b><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></b></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >活动期间，击杀一转及以上</font>BOSS<font face="宋体" >都会获得</font><font face="Calibri" >1</font><font face="宋体" >个烟花，收集后的烟花可以兑换以下奖励，每种奖励每天只能兑换一次。</font></span><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p><p class=MsoNormal  style="text-align:left;" ><img width="394"  height="544"  src="<?php echo ufv('/img/publick/hongyuewushuangqianfu.files/hongyuewushuangqianfu243.png'); ?>" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=21  style="margin-left:36.0000pt;text-indent:-36.0000pt;mso-char-indent-count:0.0000;text-align:left;mso-list:l0 level1 lfo1;" ><![if !supportLists]><span style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><span style='mso-list:Ignore;' >五、<span>&nbsp;</span></span></span><![endif]><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >累充礼包</font></span></b><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></b></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >活动期间，充值达到</font>1000<font face="宋体" >、</font><font face="Calibri" >10000</font><font face="宋体" >、</font><font face="Calibri" >20000</font><font face="宋体" >元宝可领取充值奖励，每天领取一次。</font></span><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p><p class=MsoNormal  style="text-align:left;" ><img width="392"  height="547"  src="<?php echo ufv('/img/publick/hongyuewushuangqianfu.files/hongyuewushuangqianfu294.png'); ?>" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=21  style="margin-left:36.0000pt;text-indent:-36.0000pt;mso-char-indent-count:0.0000;text-align:left;mso-list:l0 level1 lfo1;" ><![if !supportLists]><span style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><span style='mso-list:Ignore;' >六、<span>&nbsp;</span></span></span><![endif]><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >连充返利</font></span></b><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></b></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >活动期间每天充值任意金额，累计充值达到</font>2<font face="宋体" >、</font><font face="Calibri" >4</font><font face="宋体" >、</font><font face="Calibri" >6</font><font face="宋体" >天，可领取对应的连充礼包。特权、月卡充值不算入内。</font></span><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p><p class=MsoNormal  style="text-align:left;" ><img width="391"  height="550"  src="<?php echo ufv('/img/publick/hongyuewushuangqianfu.files/hongyuewushuangqianfu352.png'); ?>" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=21  style="margin-left:36.0000pt;text-indent:-36.0000pt;mso-char-indent-count:0.0000;text-align:left;mso-list:l0 level1 lfo1;" ><![if !supportLists]><span style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><span style='mso-list:Ignore;' >七、<span>&nbsp;</span></span></span><![endif]><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >集字有奖</font></span></b><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></b></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >活动期间，寻宝获得千服字帖，</font></span><span style="mso-spacerun:'yes';font-family:宋体;mso-ascii-font-family:'MS Mincho';mso-hansi-font-family:'MS Mincho';mso-bidi-font-family:'MS Mincho';font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >收集对应字帖获得元宝奖励。</font></span><span style="mso-spacerun:'yes';font-family:宋体;mso-ascii-font-family:'MS Mincho';mso-hansi-font-family:'MS Mincho';mso-bidi-font-family:'MS Mincho';font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p><p class=MsoNormal  style="text-align:left;" ><img width="395"  height="551"  src="<?php echo ufv('/img/publick/hongyuewushuangqianfu.files/hongyuewushuangqianfu388.png'); ?>" ><span style="mso-spacerun:'yes';font-family:宋体;mso-ascii-font-family:'MS Mincho';mso-hansi-font-family:'MS Mincho';mso-bidi-font-family:'MS Mincho';font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;mso-ascii-font-family:'MS Mincho';mso-hansi-font-family:'MS Mincho';mso-bidi-font-family:'MS Mincho';font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p><p class=21  style="margin-left:36.0000pt;text-indent:-36.0000pt;mso-char-indent-count:0.0000;text-align:left;mso-list:l0 level1 lfo1;" ><![if !supportLists]><span style="font-family:Calibri;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><span style='mso-list:Ignore;' >八、<span>&nbsp;</span></span></span><![endif]><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >千服寻宝</font></span></b><b><span style="mso-spacerun:'yes';font-family:宋体;font-weight:bold;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></b></p><p class=MsoNormal  style="text-align:left;" ><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><font face="宋体" >活动期间，寻宝武器、衣服、首饰提升</font>3<font face="宋体" >倍产出，有机率获得时装、幻武、翅膀、龙装、屠龙装备。</font></span><span style="mso-spacerun:'yes';font-family:宋体;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p></o:p></span></p><p class=MsoNormal  style="text-align:left;" ><img width="391"  height="553"  src="<?php echo ufv('/img/publick/hongyuewushuangqianfu.files/hongyuewushuangqianfu441.png'); ?>" ><span style="mso-spacerun:'yes';font-family:Calibri;font-size:12.0000pt;mso-font-kerning:1.0000pt;" ><o:p>&nbsp;</o:p></span></p></div><!--EndFragment-->
	<script>
var USER = <?php echo json_encode($user); ?>;
$( function() {

  share.appMessage(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/hongyuewushuangqianfu.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );
    share.timeline(
      "不小心火了 - 潮人资讯",
      "你知道的太多了",
      "http://crwy.edisonluorui.com/publick/hongyuewushuangqianfu.html?qd=<?php echo $qd; ?>&openid=" + USER.openid,
      ufv("/img/logo.jpg")
    );

});
</script>
</body></html>