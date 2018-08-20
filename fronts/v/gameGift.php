<?php
$title = '礼包';
require_once('main.php');
?>
<link rel="stylesheet" href="<?php echo uv('/css/gameGift.css'); ?>">
</head>
<body>


    <!-- 此处放置搜索消息 -->
      <div id="header">
        <div id="search">输入游戏名...</div>
        <img src="<?php echo ufv('/img/search.png'); ?>" id = "img">
      </div>



    <!--此处放置游戏对应的礼包-->
    <div id = "gameList">

    </div>

    <!--遮罩层-->
    <div id="shade">
        <div>
            <!--<header><img src="img/giftget.png" alt=""></header>
            <p>豪华礼包</p>
            <p>礼包内容: 礼包内容: 羽毛*50、龙魂碎片*20、护盾 碎片*20、金币*100万</p>
            <p>兑换码每个服可用一次，明日可再次领取</p>
            <p><input type="text" value="25465413246543"></p>
            <p>长按上方复制激活码</p>
            <a href="">开始游戏</a>
            <span>x</span>-->
        </div>
    </div>
    <!--底部导航-->
    <footer  id = "nav">
        <div>
            <a>游戏</a>
        </div>
        <div>
            <a>礼包</a>
        </div>
        <div>
            <a>个人中心</a>
        </div>
    </footer>
    <script src = "<?php echo ujv('/js/gameGift.js'); ?>"></script>
</body>
</html>