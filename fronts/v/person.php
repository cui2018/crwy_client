<?php 
$title = '个人中心';
require_once('main.php'); ?>
<link rel="stylesheet" href="<?php echo uv('/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo uv('/css/person.css'); ?>">
</head>
<body>
    <div>
        <div class="header">
           <!-- <img src="img/personurl.jpg" alt="">-->
            <div class="header_content">
                <div class="header_url">
                	<img src="<?php echo ufv('/img/headerimg.png'); ?>" id = "img">
                </div>
                <div class="header_box">
                	<div class="titleimg">
                		<img src="" alt="" />
                	</div>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="iconlist" id="iconlist">
            <p></p>
            <ul>
                <li>
                   <!-- <span>
                         <img src="img/icon02.png" alt="">
                    </span>-->
                    <span class="icon-icon-06 iconmoon"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span></span>
                    <p>我的好友</p>
                    <span class="icon-right iconmoon"></span>                </li>
                <li>
                    <span class="icon-icon-04 iconmoon"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>                    <p>豪杰榜</p>
                    <span class="icon-right iconmoon"></span>                </li>
                <li>
                    <span class="icon-icon-01 iconmoon"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span></span>                    <p>我的礼包</p>
                    <span class="icon-right iconmoon"></span>                </li>
                <li class="safelist">
                    <span class="icon-icon-03 iconmoon"><span class="path1"></span><span class="path2"></span></span>                    <p>绑定手机&nbsp;&nbsp;</p><p class="bangding"></p>
                                  </li>
                <li>
                    <span class="icon-icon-02 iconmoon"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>                    <p>实名认证</p>
                    <span class="icon-right iconmoon"></span>                </li>
                <li>
                    <span class="icon-icon-07 iconmoon"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>                    <p>联系客服</p>
                    <span class="icon-right iconmoon"></span>
                </li>
                <li>
                                    <span class="icon-tousu iconmoon"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>                  <p>投诉反馈</p>
                                    <span class="icon-right iconmoon"></span>
                                </li>
            </ul>
        </div>
    </div>
    <div class="customalert">
        <div class="custom">
            <span class="known"><img src="<?php echo ufv('/img/close.png'); ?>" alt=""></span>
            <h1>联系客服</h1>
            <p>关注公众号</p>
            <div><img src="http://p0oqd5s9w.bkt.clouddn.com/%E5%BE%AE%E4%BF%A1%E5%9B%BE%E7%89%87_20180207210127.jpg" alt=""></div>
            <p>直接回复问题客服会及时处理</p>
            <p>↑长按二维码关注公众号</p>
            <p class="known">我知道了</p>
        </div>
    </div>

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
    <script src="<?php echo ujv('/js/person.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/emoji-list-with-image.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/punycode.min.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/emoji.js'); ?>"></script>
</body>
</html>