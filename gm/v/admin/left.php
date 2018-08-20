<link href="<?php echo uv('/css/admin/left.css'); ?>" rel="stylesheet" type="text/css">
<ul id="left">
<?php if ( $me['sa'] ): ?>
  <li><span style="background-image:url(<?php echo uv('/images/admin/left/develop.gif'); ?>);">超级管理</span></li>
  <ul>
    <li><a href="<?php echo ua('/develop/module'); ?>" target="main">模块管理</a></li>
    <li><a href="<?php echo ua('/develop/databaser'); ?>" target="main">数据库管理工具</a></li>
    <li><a href="<?php echo ua('/develop/rediser'); ?>" target="main">Redis控制台</a></li>
    <li><a href="<?php echo ua('/develop/rediser/manager'); ?>" target="main">Redis管理</a></li>
    <li><a href="<?php echo ua('/develop/rediser/refresh'); ?>" target="main">Redis刷新</a></li>
    <li><a href="<?php echo ua('/develop/coder'); ?>" target="main">运行代码</a></li>
  </ul>
<?php endif; ?>
<?php echo $left; ?>
</ul>
<span id="close" class="left"></span>
</body>
</html>
<script>
$( function() {
	$("#left > li").hover( function() {
		var img = $(this).children("span,a").css("background-image");
		img = img.replace("/images/admin/left/","/images/admin/left/hover/");
		$(this).children("span,a").css("background-image",img);
	}, function() {
		var img = $(this).children("span,a").css("background-image");
		img = img.replace("/images/admin/left/hover/","/images/admin/left/");
		$(this).children("span,a").css("background-image",img);
	} );
	if ( $.browser.msie ) $("#left li").each( function() {
		if ( $(this).children("ul").length > 0 ) $(this).children("ul").insertAfter(this);
	} );
	$("#left li").filter( function() {
		return $(this).next().is("ul");
	} ).addClass("def").tap( function() {
		$(this).toggleClass("def").toggleClass("cur").next().slideToggle("fast");
	} );
	$("#left a").tap( function() {
		$("#left a.current").removeClass("current");
		$(this).addClass("current");
	} );

	var colwidth = 220, speed = 7;
	var myscreen = false, width = 220, movemar;
	$("#close").tap( function() {
		if ( myscreen ) {
			$("#left").show();
			movemar = setInterval( function() {
				width += speed;
				top.document.getElementById("topwin").cols = width + ",*";
				if ( width >= colwidth ) {
					clearInterval(movemar);
					width = colwidth;
					top.document.getElementById("topwin").cols = "220,*";
					$("#close").removeClass("right").addClass("left");
					myscreen = false;
				}
			} , 1 );
		}
		else movemar = setInterval( function() {
			width -= speed;
			top.document.getElementById("topwin").cols = width + ",*";
			if ( width <= 20 ) {
				$("#left").hide();
				clearInterval(movemar);
				width = 20;
				top.document.getElementById("topwin").cols = "20,*";
				$("#close").removeClass("left").addClass("right");
				myscreen = true;
			}
		} , 1 );
	} );
	$(document.body).mousewheel( function(e) {
		var move = e.forward ? 30 : -30;
		$(document.body).scrollTop($(document.body).scrollTop() + move);
	} );
} );
</script>