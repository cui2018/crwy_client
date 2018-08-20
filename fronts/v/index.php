<?php require_once('main.php'); ?>
<link rel="stylesheet" href="<?php echo uv('/css/home.css'); ?>">
<link rel="stylesheet" href="<?php echo uv('/css/swiper-3.4.2.min.css'); ?>">
</head>
<body>
    <div id="alert">
 		<p>您的个人信息尚不完善</p>
 		<p>是否前往设置</p>
 		<div>
 			<div id="now">立即设置</div>
 			<div id="no">暂不完善</div>
 		</div>
 		<span>X</span>
 	</div>
    <div id="shadeperson"></div>

  <!-- 此处放置搜索消息 -->
  <div id="header">
    <div id="search">输入游戏名...</div>
    <img src="<?php echo ufv('/img/search.png'); ?>" id = "img">
  </div>


  <article id="article">
    <!--banner存放-->
    <div class="swiper-container">
      <div class="swiper-wrapper" id="swiperWrap">
      </div>
      <div class="swiper-pagination"></div>
    </div>

    <!--跑马灯效果-->
    <div id="news">
      <ul style="margin-top:0!important; padding-left:30px;" id="newsId">
      </ul>
    </div>
    <!--最近在玩-->
    <section id = "recently" style="display: none;">
      <p><span>最近在玩</span><span><a href="moreplayed.html">更多<span id="span">></span></a></span></p>
      <div id = "recentlyplay">

      </div>
    </section>

    <nav>
      <ul>
        <li>热门</li>
        <li>分类</li>
        <li>新游</li>
        <li>资讯</li>
      </ul>
    </nav>

    <dl>
      <dt>
        <div id = "gameList">
          <ul id = "gameL"></ul>
        </div>
      </dt>

      <dt>
        <div id = "gameClass">
          <ul id="gameC">

          </ul>
        </div>
      </dt>
      <dt>
        <div id = "gameNew">
          <ul id = "gameN">

          </ul>
        </div>
      </dt>
      <dt>
        <div id = "gameInfo">
          <ul id = "gameI">

          </ul>
        </div>
      </dt>
    </dl>
  </article>

<footer id = "nav" >
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
</body>
<script src = "<?php echo ujv('/js/swiper-3.4.2.min.js'); ?>"></script>
<script src="<?php echo ujv('/js/index.js'); ?>"></script>
<script src="<?php echo ujv('/js/emoji-lib/emoji-list-with-image.js'); ?>"></script>
<script src="<?php echo ujv('/js/emoji-lib/punycode.min.js'); ?>"></script>
<script src="<?php echo ujv('/js/emoji-lib/emoji.js'); ?>"></script>
</html>