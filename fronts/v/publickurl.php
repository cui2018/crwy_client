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
<title><?php echo $title; ?></title>
<?php
$js->jquery('2.0.0');
$js->main();
$wx->jssdk();
?>
<script>
var USER = <?php echo json_encode($user); ?>;
</script>
<link rel="stylesheet" href="<?php echo uv('/css/publickurl.css'); ?>">
</head>
<body>
    <!--侧边栏划出划入-->
    <div id="slide">
                <header>

                </header>

                <nav>
                    <ul>
                        <li class="current"><div class="navimg"></div><div>游戏</div></li>
                        <li><div class="navimg"></div><div>礼包</div></li>
                        <li><div class="navimg"></div><div>联系客服</div></li>
                    </ul>
                </nav>

                <dl>
                    <dt>
                        <p id="hot">热门推荐</p>
                            <ul id = "gameL">

                            </ul>
                    </dt>
                    <dt>
                        <ul id="gameList">

                        </ul>
                    </dt>
                    <dt>
                        <p>1.关注潮人微游公众号</p>
                        <p>2.点美女客服</p>
                        <p>3.说出你遇到的问题</p>
                        <p><img src="img/kefu.jpg" alt=""></p>
                        <p>关注潮人客服</p>
                    </dt>
                </dl>
        <div id="back"><p class="goback"></p><span>返回</span></div>
        <div id="refresh"><p class="gorefresh"></p><span>刷新</span></div>

                <div id="shade">
                    <div>

                    </div>
                </div>
    </div>
    <!--小圆点-->
    <div id="circle" style="display: none">

    </div>
    <!--遮罩层-->
    <div id="cover">

    </div>

    <img id="loadimg" src="http://p0oqd5s9w.bkt.clouddn.com/jiazai.jpg" style="width:100%;height:100%;position:fixed; top:0;left:0;right:0;bottom:0;"/>
    <script src="<?php echo ujv('/js/publickjs.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/emoji-list-with-image.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/punycode.min.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/emoji.js'); ?>"></script>
</body>
</html>