<style>
html,body {height:100%; padding:0;}
#coder {position:fixed; top:0; left:0; width:50%; height:100%; background-color:#000; color:#FFF; padding:20px; box-sizing:border-box; overflow-x:hidden; overflow-y:auto; font:14px/22px Tahoma, Geneva, sans-serif;}
#list {position:fixed; top:0; left:50%; width:10%; height:100%; background-color:#CCC; padding:10px; box-sizing:border-box;}
#list li {position:relative; height:30px; line-height:30px; color:#111; padding:0 5px; background-color:#DDD; border-bottom:1px #AAA solid; cursor:pointer;}
#list li:hover {background-color:#FFF;}
#list li:hover:after {content:""; display:block; position:absolute; right:-14px; top:1px; width:28px; height:28px; background:url(<?php echo u('/images/admin/enter_on.png'); ?>) no-repeat center/100% 100%;}
#iframe {position:fixed; top:0; left:60%; width:40%; height:100%; border:0;}
#run {position:fixed; top:50%; left:50%; width:28px; height:28px; background:url(<?php echo u('/images/admin/enter.png'); ?>) no-repeat center/100% 100%; transform:translate(-14px,-14px); -webkit-transform:translate(-14px,-14px); cursor:pointer; -webkit-transition:all 1s ease-in-out; transition:all 1s ease-in-out;}
#run:hover {background-image:url(<?php echo u('/images/admin/enter_on.png'); ?>);}
</style>
<script>
$.fn.extend( {
	setRange : function(str) {
		//IE support
		if ( document.selection ) {
			this.focus();
			sel = document.selection.createRange();
			sel.text = str;
			sel.select();
		}
		//MOZILLA/NETSCAPE support
		else if ( this.get(0).selectionStart || this.get(0).selectionStart == "0" ) {
			var startPos = this.get(0).selectionStart;
			var endPos = this.get(0).selectionEnd;
			// save scrollTop before insert
			var restoreTop = this.scrollTop();
			this.val(this.val().substring(0,startPos) + str + this.val().substring(endPos,this.val().length));
			if ( restoreTop > 0 ) {
				// restore previous scrollTop
				this.scrollTop(restoreTop);
			}
			this.focus();
			this.get(0).selectionStart = startPos + str.length;
			this.get(0).selectionEnd = startPos + str.length;
		}
		else {
			this.val(this.val() + str);
			this.focus();
		}
		return this;
	}
} );
$( function() {
	var coder = $("#coder").keydown( function(e) {
		if ( e.keyCode == 9 ) {
			e.preventDefault();
			$(this).setRange("\t");
		}
		else if ( e.ctrlKey && e.keyCode == 83 ) {
			e.preventDefault();
			run.tap();
		}
	} ), list = $("#list"), iframe = $("#iframe"), run = $("#run").tap( function() {
		$.api("<?php echo ua('/develop/coder/save2run'); ?>", {
			code : coder.val()
		}, function() {
			list.empty();
			$.each(this, function(i,item) {
				list.append('<li>' + item + '</li>');
			} );
		} );
	} );
	$("#list li").live("click", function() {
		var methods = $(this).text();
		methods = methods == "index" ? "" : "/" + methods;
		iframe.attr("src","<?php echo ua('/develop/run'); ?>" + methods);
	} );
} );
</script>
<textarea id="coder"><?php echo $code; ?></textarea>
<ul id="list">
  <?php foreach ( $methods as $item ): ?>
  <li><?php echo $item; ?></li>
  <?php endforeach; ?>
</ul>
<iframe id="iframe" src="" scrolling="auto"></iframe>
<div id="run"></div>