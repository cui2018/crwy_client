<?php
$title = '绑定手机';
require_once('main.php');
?>
<link rel="stylesheet" href="<?php echo uv('/css/modal.css'); ?>">
<link rel="stylesheet" href="<?php echo uv('/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo uv('/css/accountsafe.css'); ?>">
</head>
<body>
    <div>
        <p class="headerurl"><img src="<?php echo ufv('/img/safe.jpg'); ?>" alt=""></p>
        <p class="titlename"></p>
        <div class="inpform">
            <div>
                <label for="">
                    <i class="icon-icon-10"></i>
                </label>
                <input type="text" placeholder="请输入真实姓名" class="username">
            </div>
            <div>
                <label for="">
                    <i class="icon-icon-11"></i>
                </label>
                <input type="text" placeholder="请输入手机号" class="password">
            </div>
            <div class="realcode">
                <label for="">
                    <i class="icon-icon-08"></i>
                </label>
                <input type="text" placeholder="请输入验证码" class="codename">
                <button class="codebtn">获取验证码</button>
            </div>
        </div>
        <div class="btnsure" id="sure">
            <p>确定</p>
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
    <script src="<?php echo ujv('/js/accountsafe.js'); ?>"></script>
</body>
</html>