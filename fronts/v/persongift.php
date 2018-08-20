<?php
$title = '个人礼包';
 require_once('main.php'); ?>
 <link rel="stylesheet" href="<?php echo uv('/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo uv('/css/persongift.css'); ?>">
</head>
<body>
    <div class="persongift">
        <ul class="giftcontent">
            <!--<li>
                <div>
                    <img src="img/headerimg.png" alt="">
                </div>
                <div>
                    <p><span>天龙八部:</span><span>公众号礼包元宝*20，金币*50W，印蛟剪*5</span></p>
                    <p>关注公众账号回复游戏名称领取</p>
                </div>
                <p>查看</p>
            </li>-->
        </ul>
        <div class="bottomTitle"></div>
    </div>
    <div id="shade">
        <div>
        	
            <header>
            	<img src="<?php echo ufv('/img/giftget.png'); ?>"></header>
            <p class="shadetitle"></p>
            <p class="shadedesc"></p>
            <p>兑换码每个服可用一次，明日可再次领取</p>
            <p style="text-align: center;word-wrap: break-word;" class="codenum"></p>
            <p>进入游戏开始使用</p>
            <a class="shadehref">开始游戏</a><span class="close"><img src="<?php echo ufv('/img/whiteclose.png'); ?>" alt="" /></span>
        </div>
    </div>
	<script src="<?php echo ujv('/js/persongift.js'); ?>"></script>
</body>
</html>