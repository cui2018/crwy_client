<?php
$title = '详情';
require_once('main.php');
?>
<link rel="stylesheet" href="<?php echo uv('/css/gameDetail.css'); ?>">
<link rel="stylesheet" href="<?php echo uv('/css/swiper-3.4.2.min.css'); ?>">
</head>
<body>
    <div id = "gameList">
        <ul id = "gameL"></ul>
    </div>
    <!--banner存放-->
    <div id="slideBanner">
        <div class="swiper-container" id="swiperone">
            <div class="swiper-wrapper">
            </div>
        </div>
    </div>
    <!--好友也在玩-->
    <div id="friendplay" style="display: none">
       <div id="imgposition">
       </div>
        <div>
            <p id="p"></p>
        </div>
    </div>
    <!--游戏礼包-->
    <div id="gameDetailgift">
        <p>游戏礼包</p>
        <ul></ul>
    </div>

    <!--遮罩层-->
    <div id="shade" >
        <div>
        </div>
    </div>

    <!--游戏简介-->
    <div id="gamedescription">
        <p>游戏简介</p>
    </div>

    <!--近期热门-->
    <div id="recentHot">
        <p>近期热门</p>
        <div class="swiper-container" id="swipertwo">
            <div class="swiper-wrapper"></div>
        </div>
    </div>

    <!--开始游戏-->
    <div id="startGame">
        <div></div>
    </div>

    <!--出现banner大图滑动效果-->
    <div id="bigBanner" style="display:none;">

    </div>

    <script src = "<?php echo ujv('/js/swiper-3.4.2.min.js'); ?>"></script>
    <script src = "<?php echo ujv('/js/gameDetail.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/emoji-list-with-image.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/punycode.min.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/emoji.js'); ?>"></script>
</body>
</html>