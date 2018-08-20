<?php require_once('main.php'); ?>
<link rel="stylesheet" href="<?php echo uv('/css/searchGift.css'); ?>">
</head>
<body>
    <!-- 此处放置搜索消息 -->
    <div id="header">
        <input type="text"  id = "search" placeholder="输入游戏名...">
        <img src="<?php echo ufv('/img/search.png'); ?>"  id = "img">
        <input type="button" value="取消" id="cancel">
    </div>
    <div id="defaultHtml">
            <div id="rencently">最近在玩</div>
            <section id="recentlyPlay">
                 <ul>
                     <div id="clearrencen" class = "clearfix"></div>
                 </ul>
            </section>
            <div id="hotly">热门游戏</div>
            <section id="hotPlay">
                <ul>
                    <div id="clearhot" class = "clearfix"></div>
                </ul>
            </section>
    </div>
    <!--点击搜索游戏后请求接口游戏数据-->
    <div id = "gameList">

        <!--<img src="img/22345.jpg" id = "nonesearch">-->
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
    <script src="<?php echo ujv('/js/searchGift.js'); ?>"></script>
</body>
</html>