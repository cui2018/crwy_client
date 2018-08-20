<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>玩过</title>
    <link rel="stylesheet" href="./css/moreplayed.css">
</head>
<?php require_once('main.php'); ?>
<link rel="stylesheet" href="<?php echo uv('/css/moreplayed.css'); ?>">
</head>
<body>
    <div id = "gameList">
        <ul id = "gameL" style="display: none">

            <!--<li>
                <div><img src="img/searchno.png" alt=""></div>
                <div>
                    <p>龙城霸业</p>
                    <p>经典传奇热血演义，经典传奇热血演义</p>
                </div>
                <div><a href = "">开始</a></div>
            </li>-->

        </ul>
        <div class="searchnone" style="display: none">
             <img src="<?php echo ufv('/img/searchno.png'); ?>"  id = "nonesearch">
        </div>

    </div>
        <script src="<?php echo ujv('/js/moreplayed.js'); ?>"></script>
</body>
</html>