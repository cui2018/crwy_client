<?php
$title = '豪杰榜';
require_once('main.php');
?>
<link rel="stylesheet" href="<?php echo uv('/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo uv('/css/herolist.css'); ?>">
</head>
<body>
<div class="herolist">
    <div class="herotop"></div>
    <div class="herolistcontent">
        <div class="heroower"></div>
       <!-- <p class="datetime timedeta"></p>
        <p class="ranking"></p>-->
        <ul class="herolistbody">

        </ul>
        <ul class="oneself">

        </ul>

    </div>
    <div class="herolistbox">

    </div>
    <div class="tellmycont">

    </div>

    <div class="herobot"></div>
</div>
<div class="herolistalert">
    <div class="herolistitem">
        <span class="close"><img src="<?php echo ufv('/img/close.png'); ?>"></span>
        <h1>我要上榜</h1>
        <p class="yeafter">我的信息</p>
        <p>暂未上榜(还差<span class="codenumber"></span>可上榜)</p>
        <p>注:玩家需要在游戏内充值金额才可上榜</p>
        <p class="yeafter">最近在玩</p>
        <ul class="herolistul">
           <!-- <li>
                <img src="img/headerimg.png" alt="">
            </li>
            <li>
                <img src="img/headerimg.png" alt="">
            </li>
            <li>
                <img src="img/headerimg.png" alt="">
            </li>-->
        </ul>
        <p class="known">我知道了</p>
    </div>
</div>
<div class="fenxiangalert">
	<span class="icon-shoti"><span class="path1"></span><span class="path2"></span></span>
	<p>分享给朋友</p>
</div>
	<script src="<?php echo ujv('/js/herolist.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/emoji-list-with-image.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/punycode.min.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/emoji.js'); ?>"></script>
</body>
</html>