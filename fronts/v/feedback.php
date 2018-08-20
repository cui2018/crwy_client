<?php
$title = '问题反馈';
require_once('main.php');
?>
<link rel="stylesheet" href="<?php echo uv('/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo uv('/css/modal.css'); ?>">
<link rel="stylesheet" href="<?php echo uv('/css/feedback.css'); ?>">
</head>
<body>
<div id="modal" class="modal">
    <div class="modal-content">
        <header class="modal-header">
            <h id="title"><span class="icon-wenxin"></span><p>温馨提示</p></h>
            <span class="close">×</span>
        </header>
        <div class="modal-body">
            <p id="content">请必须正确填写所有内容</p>
        </div>
        <footer class="modal-footer">
            <button id="cancel">确认</button>
        </footer>
    </div>
</div>
<?php if ( $page == '' ): ?>
<ul>
    <li class="feedbackul">
        <p>游戏体验问题</p>
        <span class="icon-right iconmoon"></span>
    </li>
    <li class="feedbackul">
        <p>充值问题</p>
        <span class="icon-right iconmoon"></span>
    </li>
    <li class="feedbackul">
        <p>游戏建议</p>
        <span class="icon-right iconmoon"></span>
    </li>
     <li class="feedbackul">
         <p>涉嫌返利、多级分销代理</p>
         <span class="icon-right iconmoon"></span>
    </li>
    <li class="feedbackul">
        <p>以招募兼职(刷单等)为由骗钱</p>
        <span class="icon-right iconmoon"></span>
    </li>
    <li class="feedbackul">
        <p>涉嫌色情、赌博</p>
        <span class="icon-right iconmoon"></span>
    </li>
    <li class="feedbackul">
        <p>电视竞猜、有奖问答诱导付款</p>
        <span class="icon-right iconmoon"></span>
    </li>
    <li class="feedbackul">
        <p>其他</p>
        <span class="icon-right iconmoon"></span>
    </li>
</ul>
<script src="<?php echo ujv('/js/feedback.js'); ?>"></script>
<?php elseif ( $page == 'game' ): ?>
<div class="game">
    <p >选择游戏</p>
    <div class="impxing">
        <span class="xing">*</span><input type="text" placeholder="请选择游戏" id="gamesearch" class="bt"/>
    </div>
    <ul class="aboalert">
        <li></li>
    </ul>
    <span></span>
    <div class="impxing">
        <span class="xing">*</span><input type="text" placeholder="所在区服" id="gamearea" class="bt"/>
    </div>
    <span class="line"></span>
    <div class="impxing">
        <span class="xing">*</span><input type="text" placeholder="角色名" id="usergamename" class="bt"/>
    </div>
    <span></span>
    <input type="text" placeholder="联系电话(选填)" id="tel"/>
    <span></span>
    <p>游戏问题</p>
    <ul class="gameul">
        <li>
            <label for="gamelist01">
                <input type="radio" name="gamelist" id="gamelist01" checked class="question" value="1"/>
                <i>✓</i>
                卡顿</label>
        </li>
        <li>

            <label for="gamelist02">
                <input type="radio" name="gamelist" id="gamelist02" class="question" value="2"/>
                <i>✓</i>闪退</label>
        </li>
        <li>

            <label for="gamelist03">
                <input type="radio" name="gamelist" id="gamelist03" class="question" value="3"/>
                <i>✓</i>其他</label>
        </li>

    </ul>
    <div class="impxing textareadiv">
        <span class="xing">*</span>
        <textarea name="" rows="" cols="" placeholder="请描述问题" id="questioninfo" onfocus="limitTextarea(this,'.state');"></textarea>
        <span class="afterdom">0/100</span>
    </div>

    <p>图片证据(选填)  <span class="p_right"><span class="righthtml">0</span>/4</span></p>
     <ul class="pitureul">
        <li class="pitureulli">
            <form method="post"  class="formdata formdata0" enctype="multipart/form-data" id="formdata0">
                <input type="file" class="files" name="file">
                 <img src="<?php echo ufv('/img/jiajia.png'); ?>" alt="">
            </form>

        </li>

    </ul>
    <div class="but">
        <p id="gamebtn">提交</p>
    </div>
</div>
<script src="<?php echo ujv('/js/feedbackall.js'); ?>"></script>
<?php elseif ( $page == 'pay' ): ?>
<div class="pay">
    <p >选择游戏</p>
    <div class="impxing">
        <span class="xing">*</span>
        <input type="text" placeholder="请选择游戏" id="gamesearch"  class="bt"/>
    </div>
    <ul class="aboalert">
        <li></li>
    </ul>
    <span></span>
    <div class="impxing">
        <span class="xing">*</span>
        <input type="text" placeholder="所在区服" class="bt" id="gamearea"/>
    </div>
    <span class="line"></span>
    <div class="impxing">
        <span class="xing">*</span>
        <input type="text" placeholder="角色名"  class="bt" id="usergamename"/>
    </div>
    <span></span>
    <div class="impxing">
        <span class="xing">*</span>
    <input type="datetime-local" placeholder="充值时间"  class="bt paylocal" id="paytime"/>

    </div>
    <span></span>
    <input type="text" placeholder="联系电话(选填)" id="tel"/>
    <span></span>

     <div class="impxing">
             <span class="xing xingpay">*</span>
              <p>图片证据 <span class="p_right"><span class="righthtml">0</span>/4</span></p>
     </div>
    <ul class="pitureul">
        <li class="pitureulli">
            <form method="post"  class="formdata formdata0" enctype="multipart/form-data" id="formdata0">
                <input type="file" class="files" name="file">
                 <img src="<?php echo ufv('/img/jiajia.png'); ?>" alt="">
            </form>

        </li>

    </ul>
    <div class="but">
        <p id="paybtn">提交</p>
    </div>
</div>
<script src="<?php echo ujv('/js/feedbackpay.js'); ?>"></script>
<?php elseif ( $page == 'advice' ): ?>
<div class="advice">
    <p>用户信息</p>
    <div class="impxing">
           <span class="xing">*</span>
       <input type="text" placeholder="微信号"  class="bt" id="wxname"/>
    </div>
    <input type="text" placeholder="姓名(选填)"  id="username"/>
    <input type="text" placeholder="联系电话(选填)"   id="tel"/>


    <span></span>
    <p>游戏建议</p>
    <div class="impxing textareadiv">
                <span class="xing">*</span>
                <textarea name="" rows="" cols="" placeholder="请描述问题" id="gameadvise" onfocus="limitTextarea(this,'.state');"></textarea>
                <span class="afterdom">0/100</span>
    </div>

    <p>图片证据(选填)  <span class="p_right"><span class="righthtml">0</span>/4</span></p>
    <ul class="pitureul">
        <li class="pitureulli">
            <form method="post"  class="formdata formdata0" enctype="multipart/form-data" id="formdata0">
                <input type="file" class="files" name="file">
                 <img src="<?php echo ufv('/img/jiajia.png'); ?>" alt="">
            </form>

        </li>

    </ul>
    <div class="but">
         <p id="advbtn">提交</p>
    </div>
</div>
<script src="<?php echo ujv('/js/feedbackadv.js'); ?>"></script>
<?php elseif ( $page == 'agent' ): ?>
<div class="agent">

    <p>返利、分销渠道</p>
    <div class="impxing">
           <span class="xing">*</span>
       <input type="text" placeholder="公众号名/渠道名" id="QDName"/>
    </div>
   <span class="caline"></span>
   <p>描述(选填)</p>
   <div class="textareadiv">
   		<textarea name="" rows="" cols="" placeholder="请描述问题" id="describe" onfocus="limitTextarea(this,'.state');"></textarea>
   		<span class="afterdom">0/100</span>
   </div>
   <p>图片证据(选填)  <span class="p_right"><span class="righthtml">0</span>/4</span></p>
    <ul class="pitureul">
        <li class="pitureulli">
            <form method="post"  class="formdata formdata0" enctype="multipart/form-data" id="formdata0">
                <input type="file" class="files" name="file">
                 <img src="<?php echo ufv('/img/jiajia.png'); ?>" alt="">
            </form>

        </li>

    </ul>
   <div class="but">
            <p id="agentbtn">提交</p>
   </div>
</div>
<script src="<?php echo ujv('/js/feedbackagent.js'); ?>"></script>
<?php elseif ( $page == 'cheat' ): ?>
<div class="cheat">
    <p>招募渠道</p>
    <div class="impxing">
               <span class="xing">*</span>
                <input type="text" placeholder="招募渠道名" id="QDName"/>
   </div>
   <span class="caline"></span>
   <p>描述(选填)</p>
   <div class="textareadiv">
   		<textarea name="" rows="" cols="" placeholder="请描述问题" id="describe" onfocus="limitTextarea(this,'.state');"></textarea>
   		<span class="afterdom">0/100</span>
   </div>
   
   <p>图片证据(选填)  <span class="p_right"><span class="righthtml">0</span>/4</span></p>
    <ul class="pitureul">
        <li class="pitureulli">
            <form method="post"  class="formdata formdata0" enctype="multipart/form-data" id="formdata0">
                <input type="file" class="files" name="file">
                 <img src="<?php echo ufv('/img/jiajia.png'); ?>" alt="">
            </form>

        </li>

    </ul>
   <div class="but">
            <p id="cheatbtn">提交</p>
   </div>
</div>
<script src="<?php echo ujv('/js/feedbackcheat.js'); ?>"></script>
<?php elseif ( $page == 'jec' ): ?>
<div class="jec">
    <p>涉嫌色情、赌博的名称</p>
     <div class="impxing">
                   <span class="xing">*</span>
   <input type="text" placeholder="游戏名称" id="gamesearch"/>
   </div>
    <ul class="aboalert">
           <li></li>
       </ul>
   <span class="caline"></span>
   <p>描述(选填)</p>
   <div class="textareadiv">
   		<textarea name="" rows="" cols="" placeholder="请描述问题" id="describe" onfocus="limitTextarea(this,'.state');"></textarea>
   		<span class="afterdom">0/100</span>
   </div>
   <p>图片证据(选填)  <span class="p_right"><span class="righthtml">0</span>/4</span></p>
   <ul class="pitureul">
        <li class="pitureulli">
            <form method="post"  class="formdata formdata0" enctype="multipart/form-data" id="formdata0">
                <input type="file" class="files" name="file">
                 <img src="<?php echo ufv('/img/jiajia.png'); ?>" alt="">
            </form>

        </li>

    </ul>
   <div class="but">
            <p id="jecbtn">提交</p>
   </div>
</div>
<script src="<?php echo ujv('/js/feedbackjec.js'); ?>"></script>
<?php elseif ( $page == 'watch' ): ?>
<div class="watch">
    <p>诱导付款渠道名称</p>
    <div class="impxing">
                       <span class="xing">*</span>
   <input type="text" placeholder="游戏名称/公众号名称" id="QDName"/>
   </div>
   <span class="caline"></span>
   <p>描述(选填)</p>
   <div class="textareadiv">
   		<textarea name="" rows="" cols="" placeholder="请描述问题" id="describe" onfocus="limitTextarea(this,'.state');"></textarea>
   		<span class="afterdom">0/100</span>
   </div>
   <p>图片证据(选填)  <span class="p_right"><span class="righthtml">0</span>/4</span></p>
   <ul class="pitureul">
        <li class="pitureulli">
            <form method="post"  class="formdata formdata0" enctype="multipart/form-data" id="formdata0">
                <input type="file" class="files" name="file">
                 <img src="<?php echo ufv('/img/jiajia.png'); ?>" alt="">
            </form>

        </li>

    </ul>
   <div class="but">
            <p id="watchbtn">提交</p>
   </div>
</div>
<script src="<?php echo ujv('/js/feedbackwatch.js'); ?>"></script>

<?php elseif ( $page == 'others' ): ?>
<div class="advice">
    <p>用户信息</p>
     <div class="impxing">
                           <span class="xing">*</span>
    <input type="text" placeholder="微信号" id="wxname"/>
    </div>
    <input type="text" placeholder="姓名(选填)" id="username"/>
    <input type="text" placeholder="联系电话(选填)" id="tel"/>
    <span></span>
    <p>游戏建议</p>
    <div class="impxing textareadiv">
                               <span class="xing">*</span>
   		<textarea name="" rows="" cols="" placeholder="请描述问题" id="describe" onfocus="limitTextarea(this,'.state');"></textarea>
   </div>
    <p>图片证据(选填)  <span class="p_right"><span class="righthtml">0</span>/4</span></p>
     <ul class="pitureul">
        <li class="pitureulli">
            <form method="post"  class="formdata formdata0" enctype="multipart/form-data" id="formdata0">
                <input type="file" class="files" name="file">
                 <img src="<?php echo ufv('/img/jiajia.png'); ?>" alt="">
            </form>

        </li>

    </ul>
    <div class="but">
         <p id="othersbtn">提交</p>
    </div>
</div>
<script src="<?php echo ujv('/js/feedbackothers.js'); ?>"></script>
<?php endif; ?>
<script src="<?php echo ujv('/js/feedbackgame.js'); ?>"></script>
</body>
</html>