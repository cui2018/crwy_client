<style>
html,body {height:100%; padding:0;}
#console {width:100%; height:100%; background-color:#000; color:#FFF; padding:20px; box-sizing:border-box; overflow-x:hidden; overflow-y:auto; font:14px/22px Tahoma, Geneva, sans-serif;}
#console > div {padding-left:30px;}
#console > div:before {content:"<?php echo strtoupper(NAME); ?>>"; margin-left:-35px;}
#console > div input {display:inline-block; width:100%; color:#FFF; background-color:#000; border:0; transform:translateY(-2px); -webkit-transform:translateY(-2px);}
.error {padding-left:30px; color:#F00;}
.error:before {content:"" !important; margin-left:0 !important;}
.result {padding-left:30px; color:#0F0;}
.result:before {content:"" !important; margin-left:0 !important;}
</style>
<script>
$( function() {
	var pointer = 0;
	$.fn.extend( {
		line : function(i) {
			return this.children(".line:eq(" + i + ")");
		},
		last : function() {
			return this.children(".line:last");
		},
		newline : function() {
			this.text(this.children("input").val());
			var line = $('<div class="line"><input type="text"></div>').appendTo(consoles);
			pointer = consoles.children(".line").length - 1;
			line.children("input").focus();
			return line;
		},
		error : function(msg) {
			return this.after('<div class="error">' + msg + '</div>');
		},
		showAfter : function(msg) {
			return this.after('<div class="result"><pre>' + msg + '</pre></div>');
		}
	} );
	var uselist = {
		get : 2,
		set : 3,
		del : 2,
		hkeys : 2,
		hget : 3,
		hset : 4,
		hdel : 3,
		lpush : 3,
		rpush : 3,
		lpop : 2,
		rpop : 2,
		lrange : [2,4],
		cls : 1,
		help : 1
	};
	var consoles = $("#console").click( function() {
		$(this).find("input").focus();
	} );
	consoles.find("input").live("keydown", function(e) {
		if ( e.keyCode == 13 ) {
			var line = consoles.last();
			var code = line.children("input").val().replace(/(\s+)/g," ");
			code = code.split(" ");
			if ( code[0] == "cls" && code.length == 1 ) consoles.empty().newline();
			else if ( code[0] == "help" && code.length == 1 ) {
				line.showAfter("支持以下命令： " + Object.getOwnPropertyNames(uselist).join(", "));
				line.newline();
			}
			else if (
				!uselist[code[0]] ||
				( typeof uselist[code[0]] == "number" && code.length != uselist[code[0]] ) || 
				( typeof uselist[code[0]] == "object" && ( code.length < uselist[code[0]][0] || code.length > uselist[code[0]][1] ) )
			) {
				line.error("不支持的控制台命令");
				line.newline();
			}
			else $.ajax( {
				type : "POST",
				url : "<?php echo ua('/develop/rediser/console'); ?>",
				data : {
					command : code[0],
					table : code[1],
					key : code.length >= 3 ? code[2] : "",
					value : code.length >= 4 ? code[3] : ""
				},
				dataType : "json",
				success : function(json) {
					if ( jsonChecker(json) ) line.showAfter(json.data);
					else line.error("Redis服务器错误");
					line.newline();
				},
				error : function() {
					line.error("Redis服务器错误");
					line.newline();
				}
			} );
		}
		else if ( e.keyCode == 38 ) {
			var line = consoles.last();
			pointer--;
			pointer = pointer < 0 ? 0 : pointer;
			line.children("input").val(consoles.line(pointer).text());
			return false;
		}
		else if ( e.keyCode == 40 ) {
			var line = consoles.last();
			pointer++;
			var len = consoles.children(".line").length - 1;
			pointer = pointer > len ? len : pointer;
			line.children("input").val(consoles.line(pointer).text());
			return false;
		}
	} );
	consoles.newline();
} );
</script>
<div id="console"></div>