<?php
$title = '实名认证'; 
require_once('main.php'); ?>
<link rel="stylesheet" href="<?php echo uv('/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo uv('/css/modal.css'); ?>">
	<link rel="stylesheet" href="<?php echo uv('/css/realname.css'); ?>">
</head>
<body>
<div>
    <p class="prompt"></p>
    <ul class="ulform">
        <li>
            <label for="">真实姓名</label>
            <input type="text" placeholder="请输入您的真实姓名" class="username">
        </li>
        <li>
            <label for="">身份证号</label>
            <input type="password" placeholder="请输入身份证号码" class="password">
        </li>
    </ul>
    <div class="surebtn">
        <!--<p>提交认证</p>-->
    </div>

</div>
<div id="modal" class="modal" style="display: none;">
    <div class="modal-content">
        <header class="modal-header">
            <h id="title"><span class='icon-wenxin'></span><p>温馨提示</p></h>
            <span class="close">×</span>
        </header>
        <div class="modal-body">
            <p id="content">暂无用户信息</p>
        </div>
        <footer class="modal-footer">
            <button id="cancel">确认</button>
        </footer>
    </div>
</div>
   <script src="<?php echo ujv('/js/validater.js'); ?>"></script>
   <script src="<?php echo ujv('/js/realname.js'); ?>"></script>
</body>
</html>