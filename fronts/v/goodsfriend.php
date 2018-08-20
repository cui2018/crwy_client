<?php
$title = '我的好友';
require_once('main.php');
?>
<link rel="stylesheet" href="<?php echo uv('/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo uv('/css/goodsfriend.css'); ?>">
</head>
<body>
    <div class="goodsfriend">
        <ul class="goodcontent">
        </ul>
        <div class="bottomTitle"></div>
    </div>
    <script src="<?php echo ujv('/js/goodsfriend.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/emoji-list-with-image.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/punycode.min.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/emoji.js'); ?>"></script>
</body>
</html>