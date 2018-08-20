<?php
$title = '好友在玩';
require_once('main.php');
?>
<link rel="stylesheet" href="<?php echo uv('/css/goodsfrienddetails.css'); ?>">
</head>
<body>
    <div class="content">
        <div class="header">
           <div>
                <img src="<?php echo ufv('/img/friendsdetails.png'); ?>">
            </div>
            <span></span>
        </div>
        <div class="footer">

        </div>
        <div class="bottomTitle"></div>
    </div>
    <script src="<?php echo ujv('/js/goodsfrienddetails.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/emoji-list-with-image.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/punycode.min.js'); ?>"></script>
    <script src="<?php echo ujv('/js/emoji-lib/emoji.js'); ?>"></script>
</body>
</html>