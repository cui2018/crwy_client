<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $webconfig['admintitle']; ?>登录</title>
<link rel="icon" href="<?php echo uv('/images/admin/logo.jpg'); ?>" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo uv('/images/admin/logo.jpg'); ?>" type="image/x-icon">
<link href="<?php echo uv('/css/admin/login.css'); ?>" rel="stylesheet" type="text/css">
<?php
$js->jquery();
$js->main();
?>
<script>
$( function() {
  $(".logo").hover( function() {
    $(this).hide();
    $("h1,p").addClass("show");
    setTimer();
  } );
  $("#p").focus( function() {
    $(this).get(0).type = "password";
  } );
  $("#u,#p,#s").focus( function() {
    setTimer();
    $(".box,h1").addClass("current");
  } ).blur( function() {
    setTimer();
    $(".box,h1").removeClass("current");
  } );
	$("#u,#p").keypress( function(e) {
    setTimer();
		if ( e.keyCode == 13 ) {
			$("#s").tap();
			$(this).blur();
		}
	} );
	$("#s").tap( function() {
    setTimer();
    var u = $("#u").val();
    var p = $("#p").val();
    if ( !u ) return showError("请填写用户名");
    if ( !p ) return showError("请填写密码");
    var s = $(this).addClass("waiting").text("登录中...");
		$.api("/<?php echo ADMIN; ?>/login/api.do", {
			u : u,
			p : p
		}, function() {
      s.removeClass("waiting").text("重新登录");
			if ( this.login ) goto("<?php echo ua('/index'); ?>");
      else showError(this.msg);
		}, 2 );
	} );
  var errorTimer;
  function showError(txt) {
    clearTimeout(errorTimer);
    var tip = $(".tip").text(txt).addClass("show");
    errorTimer = setTimeout( function() {
      tip.removeClass("show");
    }, 3000 );
  }
  var loginTimer;
  function setTimer() {
    clearTimeout(loginTimer);
    loginTimer = setTimeout( function() {
      $("h1,p").removeClass("show");
      $(".logo").show();
    }, 60000 );
  }
} );
</script>
</head>
<body>
<div id="particles-js"></div>
<div class="box"></div>
<div class="logo"></div>
<h1><?php echo $webconfig['admintitle']; ?></h1>
<p class="username"><input type="text" id="u" autocomplete="off" placeholder="用户名"></p>
<p class="password"><input type="text" id="p" autocomplete="off" placeholder="密码"></p>
<p class="submit"><button type="button" id="s">登 录</button></p>
<div class="tip"></div>
<script src="<?php echo u('/js/admin/particles.min.js'); ?>"></script>
<script src="<?php echo u('/js/admin/canvas.js'); ?>"></script>
</body>
</html>