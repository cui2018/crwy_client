<?php require_once('main.php'); ?>
<link rel="stylesheet" href="<?php echo uv('/css/searchGame.css'); ?>">
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
        <ul id = "gameL">
        </ul>
        <img src="<?php echo ufv('/img/22345.jpg'); ?>"  id = "nonesearch">
    </div>

   <script src="<?php echo ujv('/js/searchGame.js'); ?>"></script>
</body>
</html>