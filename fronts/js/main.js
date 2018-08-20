/*
 * Main.js ****************************
 * @Package Name: main ****************
 * @Author: Keboy xolox@163.com *******
 * @Version: v1.3 *********************
 * @Modifications: No20170629 *********
 * ************************************
 */

function u(url,params) {
	var param = new Array();
	if ( $.isArray(params) ) $.each(params, function(i,key) {
		param.push(key + "=" + request[key]);
	} );
	else if ( params ) param.push(params + "=" + request[params]);
	if ( param.length > 0 ) {
		param = param.join("&");
		param = ( url.indexOf("?") >= 0 ? "&" : "?" ) + param;
	}
	return ( ROOT ? "" : ("/" + PROJECT) ) + url + param;
}
function uv(url,params) {
	var param = "";
	if ( $.isArray(params) ) $.each(params, function(i,key) {
		param = "&" + key + "=" + request[key];
	} );
	else if ( params ) param = "&" + params + "=" + request[params];
	param = ( url.indexOf("?") >= 0 ? "&" : "?" ) + "v=" + VERSION + param;
	return ( ROOT ? "" : ("/" + PROJECT) ) + url + param;
}
function ufv(url) {
	if ( ONLINE ) return "http://crwy.edisonluorui.com" + url + "?v=" + VERSION;
	else return "http://resource.crwy" + url + "?v=" + VERSION;
}
function ucv(url) {
	if ( ONLINE ) return "http://crwy.edisonluorui.com" + url;
	else return "http://resource.crwy" + url;
}

//获取设备类型
var isMobile = false, isApple = false, isAndroid = false, isWechat = false, isQQ = (typeof mqq != "undefined");
$.each(["Android","iPhone","SymbianOS","Windows Phone","iPad","iPod"], function(i,item) {
	if ( navigator.userAgent.indexOf(item) > 0 ) {
		isMobile = true;
		return false;
	}
} );
$.each(["iPhone","iPad","iPod"], function(i,item) {
	if ( navigator.userAgent.indexOf(item) > 0 ) {
		isApple = true;
		return false;
	}
} );
$.each(["Android"], function(i,item) {
	if ( navigator.userAgent.indexOf(item) > 0 ) {
		isAndroid = true;
		return false;
	}
} );
$.each(["MicroMessenger"], function(i,item) {
	if ( navigator.userAgent.indexOf(item) > 0 ) {
		isWechat = true;
		return false;
	}
} );

//jQuery 1.9以后兼容$.browser
if ( parseInt($.fn.jquery.replace(/\./g,"")) >= 190 ) {
	$.browser = new Object();
	$.browser.mozilla = /firefox/.test(navigator.userAgent.toLowerCase());
	$.browser.webkit = /webkit/.test(navigator.userAgent.toLowerCase());
	$.browser.opera = /opera/.test(navigator.userAgent.toLowerCase());
	$.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());
}

//屏幕尺寸兼容算法
var compatible = {
	long : false,
	middle : false,
	short : false,
	pad : false,
	vertical : false,
	horizontal : false
};
function reSetCompatible() {
	var w = $(window).width();
	var h = $(window).height();
	if ( w / h >= 1 ) {
		compatible.vertical = false;
		compatible.horizontal = true;
	}
	else {
		compatible.vertical = true;
		compatible.horizontal = false;
	}
	if ( (compatible.vertical && w / h < 0.6) || (compatible.horizontal && h / w < 0.6) ) {
		compatible.long = true;
		compatible.middle = false;
		compatible.short = false;
		compatible.pad = false;
	}
	else if ( (compatible.vertical && w / h < 0.65) || (compatible.horizontal && h / w < 0.65) ) {
		compatible.long = false;
		compatible.middle = true;
		compatible.short = false;
		compatible.pad = false;
	}
	else if ( (compatible.vertical && w / h < 0.7) || (compatible.horizontal && h / w < 0.7) ) {
		compatible.long = false;
		compatible.middle = false;
		compatible.short = true;
		compatible.pad = false;
	}
	else if ( (compatible.vertical && w / h < 0.85) || (compatible.horizontal && h / w < 0.85) ) {
		compatible.long = false;
		compatible.middle = false;
		compatible.short = false;
		compatible.pad = true;
	}
}
reSetCompatible();
$(window).resize( function() {
	reSetCompatible();
} );




/*弹出提示模块*/
	var dialogConfig = {
		color : "#FFF",
		bgcolor : "#E30077"
	};
	//提示框
	function dialog(msg,fn) {
		var html = '';
		if ( isMobile ) {
			html += '<div style="display:block;position:fixed;z-index:1001010;top:0;right:0;bottom:0;left:0;background-color:rgba(0,0,0,0.5);">';
			html += '  <div style="position:absolute;width:90%;left:5%;background:#FFF;color:#222;border-radius:10px;box-shadow:2px 2px 10px #000;">';
			html += '    <div style="padding:5% 5% 0 5%;font-size:6vmin;line-height:10vmin;text-align:' + ( msg.length > 20 ? "left" : "center" ) + ';">' + msg + '</div>';
			html += '    <div style="text-align:center;padding:3% 0 7% 0;">';
			html += '      <button style="padding:1% 6%;font-size:6vmin;background:' + dialogConfig.bgcolor + ';color:' + dialogConfig.color + ';border:none;border-radius:5px;">确认</button>';
			html += '    </div>';
			html += '  </div>';
			html += '</div>';
		}
		else {
			html += '<div style="display:block;position:fixed;z-index:1001010;padding:0 10px;top:0;right:0;bottom:0;left:0;background-color:rgba(0,0,0,0.5);">';
			html += '  <div style="max-width:400px;margin:0 auto;background:#FFF;color:#222;border-radius:10px;box-shadow:2px 2px 10px #000;">';
			html += '    <div style="padding:20px 20px 0 20px;line-height:22px;text-align:' + ( msg.length > 25 ? "left" : "center" ) + ';">' + msg + '</div>';
			html += '    <div style="text-align:center;padding:10px 0 20px 0;">';
			html += '      <button style="padding:3px 10px;background:' + dialogConfig.bgcolor + ';color:' + dialogConfig.color + ';border:none;border-radius:5px;">确认</button>';
			html += '    </div>';
			html += '  </div>';
			html += '</div>';
		}
		var obj = $(html).appendTo(document.body);
		var box = obj.children();
		var mt = ($(window).height() - box.outerHeight()) * (1 - Math.gold);
		box.css(isMobile ? "top" : "margin-top",mt);
		obj.find("a").tap( function () {
			obj.fadeOut( function() {
				$(this).remove();
			} );
		} );
		obj.find("button").tap( function () {
			obj.fadeOut( function() {
				$(this).remove();
			} );
			if ( fn ) fn.call();
		} );
	}
	//确认框
	function confirm(msg,fn,web) {
		var html = '';
		if ( isMobile ) {
			html += '<div style="display:block;position:fixed;z-index:1001010;top:0;right:0;bottom:0;left:0;background-color:rgba(0,0,0,0.5);">';
			html += '  <div style="position:absolute;width:90%;left:5%;background:#FFF;color:#222;border-radius:10px;box-shadow:2px 2px 10px #000;">';
			html += '    <div style="padding:5% 5% 0 5%;font-size:6vmin;line-height:10vmin;text-align:' + ( msg.length > 20 ? "left" : "center" ) + ';">' + msg + '</div>';
			html += '    <div style="text-align:center;padding:3% 0 7% 0;">';
			html += '      <button style="padding:1% 6%;font-size:6vmin;background:' + dialogConfig.bgcolor + ';color:' + dialogConfig.color + ';border:none;border-radius:5px;">确认</button>';
			html += '      <button style="padding:1% 6%;font-size:6vmin;background:#BBB;color:' + dialogConfig.color + ';border:none;border-radius:5px;margin-left:5%;">取消</button>';
			html += '    </div>';
			html += '  </div>';
			html += '</div>';
		}
		else {
			html += '<div style="display:block;position:fixed;z-index:1001010;padding:0 10px;top:0;right:0;bottom:0;left:0;background-color:rgba(0,0,0,0.5);">';
			html += '  <div style="max-width:400px;margin:0 auto;background:#FFF;color:#222;border-radius:10px;box-shadow:2px 2px 10px #000;">';
			html += '    <div style="padding:20px 20px 0 20px;line-height:22px;text-align:' + ( msg.length > 25 ? "left" : "center" ) + ';">' + msg + '</div>';
			html += '    <div style="text-align:center;padding:10px 0 20px 0;">';
			html += '      <button style="padding:3px 10px;background:' + dialogConfig.bgcolor + ';color:' + dialogConfig.color + ';border:none;border-radius:5px;">确认</button>';
			html += '      <button style="padding:3px 10px;background:#BBB;color:' + dialogConfig.color + ';border:none;border-radius:5px;margin-left:10px;">取消</button>';
			html += '    </div>';
			html += '  </div>';
			html += '</div>';
		}
		var obj = $(html).appendTo(document.body);
		var box = obj.children();
		var mt = ($(window).height() - box.outerHeight()) * (1 - Math.gold);
		box.css(isMobile ? "top" : "margin-top",mt);
		obj.find("button").tap( function () {
			obj.fadeOut( function() {
				$(this).remove();
			} );
			var index = $(this).index();
			if ( fn ) fn.call(window,!index);
		} );
		obj.find("a").tap( function () {
			obj.fadeOut( function() {
				$(this).remove();
			} );
			var index = $(this).index();
			if ( fn ) fn.call(window,0);
		} );
	}
	//提示
	function cue(msg,fn,time) {
		if ( typeof time == "undefined" ) time = 3000;
		var html = '<div style="display:block;position:fixed;z-index:1001010;top:0;right:0;bottom:0;left:0;background-color:rgba(0,0,0,0.05);">';
		html += '  <div style="position:absolute;background-color:rgba(0,0,0,0.75);color:#FFF;padding:3px 10px;box-sizing:border-box;border:1px #CACACA;box-shadow:0px 2px 5px #000;min-width:100px;min-height:30px;font:16px/30px 微软雅黑;text-align:center;opacity:0;">' + msg + '</div>';
		html += '</div>';
		var obj = $(html).appendTo(document.body);
		var box = obj.children();
		var ml = ($(window).width() - box.outerWidth()) / 2;
		var mt = ($(window).height() - box.outerHeight()) * (1 - Math.gold);
		var timer;
		box.css3("left:" + ml + "px;top:" + (mt + 10) + "px").animate( {
			top : mt,
			opacity : 1
		}, function() {
			if ( time ) timer = setTimeout( function() {
				box.animate( {
					top : mt - 10,
					opacity : 0
				}, function() {
					obj.remove();
					if ( fn ) fn.call();
				} );
			}, time );
		} );
		obj.click( function() {
			clearTimeout(timer);
			$(this).remove();
			if ( fn ) fn.call();
		} );
	}
	var keyboard = {
		number : function(val,fn,max) {
			max = max ? max : 0;
			var html = '';
			html += '<div style="display:block;position:fixed;z-index:1001010;top:0;right:0;bottom:0;left:0;background-color:rgba(255,255,255,0.1);">';
			html += '  <div style="position:absolute;right:0;bottom:-50%;left:0;height:50%;background-color:#DEDEDE;opacity:0;box-shadow:-3px 0 10px rgba(0,0,0,0.4);">';
			html += '    <div style="height:7vh;background-color:#EDEDED;box-shadow:inset 0 0 10px rgba(0,0,0,0.4);font:bold 5vh/7vh Tahoma, Geneva, sans-serif;color:#222;text-align:center;text-shadow:2px 2px 5px rgba(0,0,0,0.4);">' + val + '</div>';
			html += '    <div style="width:80%;height:36vh;margin:3.5vh auto;">';
			html += '      <div style="width:30%;height:7vh;margin:1vh 1.5%;border:1px #999 solid;border-radius:2vw;box-sizing:border-box;float:left;text-align:center;font:4vh/6.5vh Tahoma, Geneva, sans-serif;background-color:#EFEFEF;">1</div>';
			html += '      <div style="width:30%;height:7vh;margin:1vh 1.5%;border:1px #999 solid;border-radius:2vw;box-sizing:border-box;float:left;text-align:center;font:4vh/6.5vh Tahoma, Geneva, sans-serif;background-color:#EFEFEF;">2</div>';
			html += '      <div style="width:30%;height:7vh;margin:1vh 1.5%;border:1px #999 solid;border-radius:2vw;box-sizing:border-box;float:left;text-align:center;font:4vh/6.5vh Tahoma, Geneva, sans-serif;background-color:#EFEFEF;">3</div>';
			html += '      <div style="width:30%;height:7vh;margin:1vh 1.5%;border:1px #999 solid;border-radius:2vw;box-sizing:border-box;float:left;text-align:center;font:4vh/6.5vh Tahoma, Geneva, sans-serif;background-color:#EFEFEF;">4</div>';
			html += '      <div style="width:30%;height:7vh;margin:1vh 1.5%;border:1px #999 solid;border-radius:2vw;box-sizing:border-box;float:left;text-align:center;font:4vh/6.5vh Tahoma, Geneva, sans-serif;background-color:#EFEFEF;">5</div>';
			html += '      <div style="width:30%;height:7vh;margin:1vh 1.5%;border:1px #999 solid;border-radius:2vw;box-sizing:border-box;float:left;text-align:center;font:4vh/6.5vh Tahoma, Geneva, sans-serif;background-color:#EFEFEF;">6</div>';
			html += '      <div style="width:30%;height:7vh;margin:1vh 1.5%;border:1px #999 solid;border-radius:2vw;box-sizing:border-box;float:left;text-align:center;font:4vh/6.5vh Tahoma, Geneva, sans-serif;background-color:#EFEFEF;">7</div>';
			html += '      <div style="width:30%;height:7vh;margin:1vh 1.5%;border:1px #999 solid;border-radius:2vw;box-sizing:border-box;float:left;text-align:center;font:4vh/6.5vh Tahoma, Geneva, sans-serif;background-color:#EFEFEF;">8</div>';
			html += '      <div style="width:30%;height:7vh;margin:1vh 1.5%;border:1px #999 solid;border-radius:2vw;box-sizing:border-box;float:left;text-align:center;font:4vh/6.5vh Tahoma, Geneva, sans-serif;background-color:#EFEFEF;">9</div>';
			html += '      <div style="width:30%;height:7vh;margin:1vh 1.5%;border:1px #999 solid;border-radius:2vw;box-sizing:border-box;float:left;text-align:center;font:4vh/6vh Tahoma, Geneva, sans-serif;background-color:#EFEFEF;">x</div>';
			html += '      <div style="width:30%;height:7vh;margin:1vh 1.5%;border:1px #999 solid;border-radius:2vw;box-sizing:border-box;float:left;text-align:center;font:4vh/6.5vh Tahoma, Geneva, sans-serif;background-color:#EFEFEF;">0</div>';
			html += '      <div style="width:30%;height:7vh;margin:1vh 1.5%;border:1px #999 solid;border-radius:2vw;box-sizing:border-box;float:left;text-align:center;font:4vh/6.5vh 微软雅黑;background-color:#FFF;">确定</div>';
			html += '    </div>';
			html += '  </div>';
			html += '</div>';
			var box = $(html).appendTo(document.body).tap( function() {
				kb.animate( {
					bottom : "-50%",
					opacity : 0
				}, 100, function() {
					box.remove();
				} );
			} );
			var kb = box.children("div").animate( {
				bottom : 0,
				opacity : 0.9
			}, 100 ).tap( function(e) {
				e.stopPropagation();
			} );
			var title = kb.children("div:first");
			title.next().children("div").tap( function() {
				var n = $(this).text();
				var txt = title.text();
				if ( n == "x" ) {
					txt = txt.left(txt.length - 1,"");
					title.text(txt);
				}
				else if ( n == "确定" ) {
					if ( fn ) fn.call(txt);
					box.tap();
				}
				else {
					if ( max && txt.length >= max ) return;
					txt += n.toString();
					title.text(txt);
				}
			} );
		}
	};
	//Loading
	$( function() {
		$.keyframes("keboy-bouncedelay", {
			0 : "transform:scale(0.0)",
			40 : "transform:scale(1.0)",
			80 : "transform:scale(0.0)",
			100 : "transform:scale(0.0)"
		} );
		$.css3( {
			".keboy-loading-box" : "margin:0 auto;width:30px;height:30px;padding:30px;background-color:rgba(0,0,0,0.4);border-radius:5px;position:relative;",
			".keboy-loading" : "width:30px;height:30px;position:relative;",
			".keboy-loading-container1 > div,.keboy-loading-container2 > div,.keboy-loading-container3 > div" : "width:9px;height:9px;background-color:#FFF;border-radius:100%;position:absolute;animation:keboy-bouncedelay 1.2s infinite ease-in-out both;",
			".keboy-loading .keboy-loading-container" : "position:absolute;width:100%;height:100%;",
			".keboy-loading-container2" : "transform:rotateZ(45deg);",
			".keboy-loading-container3" : "transform:rotateZ(90deg);",
			".keboy-loading-circle1" : "top:0;left:0;",
			".keboy-loading-circle2" : "top:0;right:0;",
			".keboy-loading-circle3" : "right:0;bottom:0;",
			".keboy-loading-circle4" : "left:0;bottom:0;",
			".keboy-loading-container2 .keboy-loading-circle1" : "animation-delay:-1.1s;",
			".keboy-loading-container3 .keboy-loading-circle1" : "animation-delay:-1.0s;",
			".keboy-loading-container1 .keboy-loading-circle2" : "animation-delay:-0.9s;",
			".keboy-loading-container2 .keboy-loading-circle2" : "animation-delay:-0.8s;",
			".keboy-loading-container3 .keboy-loading-circle2" : "animation-delay:-0.7s;",
			".keboy-loading-container1 .keboy-loading-circle3" : "animation-delay:-0.6s;",
			".keboy-loading-container2 .keboy-loading-circle3" : "animation-delay:-0.5s;",
			".keboy-loading-container3 .keboy-loading-circle3" : "animation-delay:-0.4s;",
			".keboy-loading-container1 .keboy-loading-circle4" : "animation-delay:-0.3s;",
			".keboy-loading-container2 .keboy-loading-circle4" : "animation-delay:-0.2s;",
			".keboy-loading-container3 .keboy-loading-circle4" : "animation-delay:-0.1s;"
		} );
	} );
	var loading = {
		isloading : false,
		show : function() {
			var html = '<div style="display:block;position:fixed;z-index:1001100;top:0;right:0;bottom:0;left:0;background-color:rgba(255,255,255,0.3);"></div>';
			this.box = $(html).appendTo(document.body).show();
			html = '<div class="keboy-loading-box">';
			html += '  <div class="keboy-loading">';
			html += '    <div class="keboy-loading-container keboy-loading-container1">';
			html += '      <div class="keboy-loading-circle1"></div>';
			html += '      <div class="keboy-loading-circle2"></div>';
			html += '      <div class="keboy-loading-circle3"></div>';
			html += '      <div class="keboy-loading-circle4"></div>';
			html += '    </div>';
			html += '    <div class="keboy-loading-container keboy-loading-container2">';
			html += '      <div class="keboy-loading-circle1"></div>';
			html += '      <div class="keboy-loading-circle2"></div>';
			html += '      <div class="keboy-loading-circle3"></div>';
			html += '      <div class="keboy-loading-circle4"></div>';
			html += '    </div>';
			html += '    <div class="keboy-loading-container keboy-loading-container3">';
			html += '      <div class="keboy-loading-circle1"></div>';
			html += '      <div class="keboy-loading-circle2"></div>';
			html += '      <div class="keboy-loading-circle3"></div>';
			html += '      <div class="keboy-loading-circle4"></div>';
			html += '    </div>';
			html += '  </div>';
			html += '</div>';
			this.loading = $(html).appendTo(this.box).css("marginTop",( $(window).height() - 90 ) / 2 + "px").show();
			this.isloading = true;
			return this.box;
		},
		hide : function() {
			if ( !this.isloading ) return this;
			this.loading.remove();
			this.box.remove();
			this.isloading = false;
		}
	};
	//打印对象
	function dump(obj) {
		var txt = '';
		$.each(obj, function(i,item) {
			txt += '<p><a href="javascript:void(0);" style="color:#09C;">' + i + '</a> : ' + item + '</p>';
		} );
		var box = $("#testShow").length > 0 ? $("#testShow") : $('<div id="testShow"></div>').css( {
			"position"		: "fixed",
			"top"			: "3%",
			"right"			: "2%",
			"bottom"		: "3%",
			"left"			: "2%",
			"padding"		: "10px",
			"overflow-x"	: "hidden",
			"overflow-y"	: "auto",
			"border"		: "1px #666 solid",
			"border-radius"	: "5px",
			"box-shadow"	: "5px 5px 10px #666",
			"background"	: "#FFF",
			"z-index"		: "9999",
			"color"			: "#666"
		} ).appendTo(document.body).dbltap( function() {
			$(this).remove();
		} ).mousewheel( function(event) {
			event.preventDefault();
		} );
		box.html(txt).find("a").tap( function() {
			dump(obj[$(this).text()]);
		} );
	}
	//输出对象
	function printr(obj) {
		var txt = '';
		function getChild(obj,depth) {
			$.each(obj, function(i,item) {
				txt += '<div style="padding-left:' + (depth * 20) + 'px">' + i + ' : ';
				if ( typeof item == "object" ) {
					txt += "{<div>";
					getChild(item,depth + 1);
					txt += "</div><div>}</div>";
				}
				else txt += item;
				txt += '</div>';
			} );
		}
		getChild(obj,0);
		var box = $("#testShow").length > 0 ? $("#testShow") : $('<div id="testShow"></div>').css( {
			"position"		: "fixed",
			"top"			: "3%",
			"right"			: "2%",
			"bottom"		: "3%",
			"left"			: "2%",
			"padding"		: "10px",
			"overflow-x"	: "hidden",
			"overflow-y"	: "auto",
			"border"		: "1px #666 solid",
			"border-radius"	: "5px",
			"box-shadow"	: "5px 5px 10px #666",
			"background"	: "#FFF",
			"z-index"		: "9999",
			"color"			: "#666"
		} ).appendTo(document.body).dbltap( function() {
			$(this).remove();
		} ).mousewheel( function(event) {
			event.preventDefault();
		} );
		box.html(txt);
	}
	//功能未开启
	function closed() {
		dialog('抱歉，功能暂未开启，敬请期待');
	}
/*弹出提示模块结束*/




/*页面跳转模块*/
	//跳转地址
	function goto(url) {
		window.location.href = url;
	}
	//刷新
	function refresh() {
		window.location.reload();
	}
	//返回
	function goback() {
		window.history.back();
	}
	//跳转提示页
	function notice(msg) {
		goto(u("/notice.html") + ( msg ? "?msg=" + encodeURI(msg) : "" ));
		return false;
	}
    //跳转错误页
	function error(msg) {
		goto(u("/notice/error.html") + ( msg ? "?msg=" + encodeURI(msg) : "" ));
		return false;
	}
/*页面跳转模块结束*/




/*内置对象及功能扩展*/
	//本地存储模块
	var local = {
		formatName : function(name) {
			return ("k_" + ( ROOT ? "" : (PROJECT + "_") ) + name).toLocaleUpperCase();
		},
		get : function(name) {
			var value = localStorage.getItem(this.formatName(name));
			if ( !value ) return "";
			var first = value.left(1,"");
			var last = value.right(1,"");
			if ( ( first == "{" && last == "}" ) || ( first == "[" && last == "]" ) ) {
				var v = $.parseJSON(value);
				return typeof(v) == "object" ? v : value;
			}
			else return value;
		},
		set : function(name,value) {
			if ( typeof(value) == "object" ) value = JSON.stringify(value);
			localStorage.setItem(this.formatName(name),value);
		},
		del : function(name) {
			localStorage.removeItem(this.formatName(name));
		},
		clear : function() {
			localStorage.clear();
		}
	};
	//get方式参数获取类
	function urlSearch() {
		var name, value;
		var str = window.location.href;
		var num = str.indexOf("?");
		str = str.substr(num + 1);
		var arr = str.split("&");
		for ( var i = 0; i < arr.length; i++ ) {
			num = arr[i].indexOf("=");
			if ( num > 0 ) {
				name = arr[i].substring(0,num);
				value = arr[i].substr(num + 1);
				this[name] = value;
			}
		}
	}
	var request = new urlSearch();
	//json数据检验
	function jsonChecker(json) {
		if ( !json.status ) dialog(json.msg);
		return json.status;
	}
	//黄金分割
	Math.gold = (Math.sqrt(5) - 1) / 2;
	//显示错误提示
	String.prototype.err = function(str) {
		return this.replace(/%s/g,str);
	};
	//去掉html标记
	String.prototype.dropHTML = function() {
		return this.replace(/<[^>].*?>/g,"");
	};
	//去掉html标记并替换全角空格
	String.prototype.dropFormatHTML = function() {
		return this.replace(/<[^>].*?>/g," ").replace(/　/g," ");
	};
	//转义特殊字符
	String.prototype.format = function() {
		return this
			.replace(/"/g,"&quot;")
			.replace(/</g,"&lt;")
			.replace(/>/g,"&gt;")
			.replace(/\n/g,"<br>");
	};
	//左截取字符串
	String.prototype.left = function(n,str) {
		str = str != null ? str : "...";
		var rtn = this;
		if ( this.length > n ) rtn = this.slice(0,n) + str;
		return rtn;
	};
	//右截取字符串
	String.prototype.right = function(n,str) {
		str = str != null ? str : "...";
		var rtn = this;
		if ( this.length > n ) rtn = str + this.slice(this.length - n);
		return rtn;
	};
	//二维数组合并
	Array.prototype.joinBy = function(key,str) {
		var arr = new Array();
		$.each(this, function(i,item) {
			if ( item[key] != null ) arr.push(item[key]);
		} );
		return arr.join(str);
	};
	//数组乱序
	Array.prototype.shuffle = function() {
		var b = [];
		while ( this.length > 0 ) {
			var index = rand(0,this.length - 1);
			b.push(this[index]);
			this.splice(index,1);
		}
		return b;
	};
	//数组搜索
	Array.prototype.search = function(where,getObj) {
		var that = this, res = false;
		if ( typeof where == "object" ) $.each(this, function(i,item) {
			var bingo = true;
			$.each(where, function(field,value) {
				if ( item[field] != value ) {
					bingo = false;
					return false;
				}
			} );
			if ( bingo ) {
				res = getObj ? that[i] : i;
				return false;
			}
		} );
		else $.each(this, function(i,item) {
			if ( item == where ) {
				res = getObj ? that[i] : i;
				return false;
			}
		} );
		return res;
	};
	//时间戳格式化函数
	function timeFormat(time,reg) {
		var times = "";
		if ( reg == "due" ) {
			var ago = now() - time;
			if ( ago / ( 3600 * 24 * 365 ) > 1 ) return parseInt(ago / ( 3600 * 24 * 365 )) + "年前";
			else if ( ago / ( 3600 * 24 * 30 ) > 1 ) return parseInt(ago / ( 3600 * 24 * 30 )) + "个月前";
			else if ( ago / ( 3600 * 24 * 7 ) > 1 ) return parseInt(ago / ( 3600 * 24 * 7 )) + "周前";
			else if ( ago / ( 3600 * 24 ) > 1 ) return parseInt(ago / ( 3600 * 24 )) + "天前";
			else if ( ago / 3600 > 1 ) return parseInt(ago / 3600) + "小时前";
			else if ( ago / 60 > 1 ) return parseInt(ago / 60) + "分钟前";
			else if ( ago > 1 ) return ago + "秒前";
			else return "刚刚";
			return times;
		}
		reg = reg ? reg : "%Y-%m-%d %H:%i:%s";
		with ( new Date(parseInt(time) * 1000) ) {
			times = reg.replace(/%Y/g,getFullYear())
					   .replace(/%m/g,( getMonth() + 1 ).leading())
					   .replace(/%d/g,getDate().leading())
					   .replace(/%H/g,getHours().leading())
					   .replace(/%i/g,getMinutes().leading())
					   .replace(/%s/g,getSeconds().leading());
		}
		return times;
	}
	//时间戳格式化String扩展
	String.prototype.timeFormat = function(reg) {
		return timeFormat(this,reg);
	};
	//时间戳格式化Number扩展
	Number.prototype.timeFormat = function(reg) {
		return timeFormat(this,reg);
	};
	//当前时间戳
	function now() {
		return parseInt(new Date().getTime() / 1000);
	}
	//时间转时间戳
	function strtotime(str) {
		if ( !str ) return "";
		var date = new Date(str);
		var time = date.getTime();
		return time / 1000;
	}
	//前导函数
	function leading(str,figure,leader) {
		figure = figure ? figure : 2;
		leader = leader ? leader : 0;
		return ( leader.toString().repeat(figure) + str.toString() ).right(figure,"")
	}
	//前导String扩展
	String.prototype.leading = function(figure,leader) {
		return leading(this,figure,leader);
	};
	//前导Number扩展
	Number.prototype.leading = function(figure,leader) {
		return leading(this,figure,leader);
	};
	//重复函数
	function repeat(str,n) {
		return new Array(n + 1).join(str);
	}
	//重复String扩展
	String.prototype.repeat = function(n) {
		return repeat(this,n);
	};
	//重复Number扩展
	Number.prototype.repeat = function(n) {
		return repeat(this,n);
	};
	//生成随机整数
	function rand(from,to) {
		return parseInt(Math.random() * (to - from + 1)) + from;
	}
	//数组随机项扩展
	Array.prototype.rand = function() {
		return this[rand(0,this.length - 1)];
	};
	//全角转换半角
	function CtoH(val) {
		var str = val;
		var result = "";
		for ( var i = 0; i < str.length; i++ ) {
			if ( str.charCodeAt(i) == 12288 ) {
				result += String.fromCharCode(str.charCodeAt(i) - 12256);
				continue;
			}
			if ( str.charCodeAt(i) > 65280 && str.charCodeAt(i) < 65375 ) result += String.fromCharCode(str.charCodeAt(i) - 65248);
			else result += String.fromCharCode(str.charCodeAt(i));
		}
		return result;
	}
	//微信基础处理函数
	function htmlEncode(e){return e.replace(/&/g,"&amp;").replace(/ /g,"&nbsp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/\n/g,"<br />").replace(/"/g,"&quot;")}function htmlDecode(e){return e.replace(/&#39;/g,"'").replace(/<br\s*(\/)?\s*>/g,"\n").replace(/&nbsp;/g," ").replace(/&lt;/g,"<").replace(/&gt;/g,">").replace(/&quot;/g,'"').replace(/&amp;/g,"&")}function parseParams(e){e==undefined&&(e=window.location.search);var t=e.replace(/^\?/,"").split("&"),n=0,r,i={},s,o,u;while((r=t[n++])!==undefined)s=r.match(/^([^=&]*)=(.*)$/),s&&(o=decodeURIComponent(s[1]),u=decodeURIComponent(s[2]),i[o]=u);return i}function parseUrl(e){var t=new RegExp("(http[s]{0,1}|ftp)://([a-zA-Z0-9\\.\\-]+\\.[a-zA-Z]{2,4})(:\\d+)?(/[a-zA-Z0-9\\.\\-~!@#$%^&amp;*+:_/<>]*)?([\\?a-zA-Z0-9\\.\\-~!@$%^&amp;*+?:_/<>=]*)?(#\\w+)?"),n=e.match(t);return n!=null?{protocol:n[1],domain:n[2],port:n[3],path:n[4],query_str:n[5],sharp:n[6]}:null}
	function share_scene(link,scene_type) {
		var parse_link = parseUrl(link);
		if ( !parse_link ) return link;
		var query_obj = parseParams(parse_link["query_str"]);
		query_obj["scene"] = scene_type;
		var share_url = "http://" + parse_link["domain"] + parse_link["path"] + "?" + $.param(query_obj) + (parse_link["sharp"] ? parse_link["sharp"] : "");
		return share_url;
	}
/*内置对象及功能扩展结束*/




/*jQuery系统插件扩展*/
$.extend( {
	//滑动触发距离
	swipeStep : 30,
	//按住触发时间
	holdTime : 750,
	//双触触发时间
	dblTime : 300,
	//滑动触发时间
	swipeTime : 1000,
	//资源加载
	loading : function(resource,callback) {
		var that = this;
		var data = new Object();
		data.quantity = resource.length;
		data.loaded = 0;
		if ( $.type(callback) == "function" ) callback = {
			before : $.noop,
			loading : $.noop,
			complete : callback
		};
		else if ( $.type(callback) == "object" ) {
			if ( !callback.before ) callback.before = $.noop;
			if ( !callback.loading ) callback.loading = $.noop;
			if ( !callback.complete ) callback.complete = $.noop;
		}
		if ( callback.before ) callback.before.call(this,data);
		var img = new Array();
		$.each(resource, function(i,src) {
			img[i] = new Image();
			img[i].src = src;
			if ( img[i].complete ) loadOne(img[i],i);
			img[i].onload = function() {
				loadOne(this,i);
			};
		} );
		function loadOne(image,i) {
			if ( img[i].isComplete ) return;
			img[i].isComplete = true;
			data.loaded++;
			if ( callback.loading ) callback.loading.call(image,data);
			if ( data.loaded == data.quantity ) {
				if ( callback.complete ) callback.complete.call(that,data);
			}
		}
		return this;
	},
	//接口ajax请求
	api : function(url,data,fn,isload,txt) {
		txt = txt ? txt : "抱歉，请求超时，请稍后重新访问~！";
		url = u(url);
		if ( $.isFunction(data) ) {
			isload = fn ? fn : 1;
			fn = data;
			data = "";
		}
		else {
			if ( !data ) {
				data = "";
				fn = $.noop;
				isload = 1;
			}
			else if ( !isNaN(data) ) {
				isload = data;
				fn = $.noop;
				data = "";
			}
			else if ( !$.isFunction(fn) ) {
				isload = fn;
				fn = $.noop;
			}
		}
		isload = isload ? isload : 1;
		if ( isload == 1 ) loading.show();
		if ( typeof token != "undefined" ) data.token = token;
		$.ajax( {
			type : "POST",
			url : url,
			data : data,
			dataType : "json",
			timeout : 30000,
			success : function(json) {
				if ( isload == 1 ) loading.hide();
				if ( typeof token != "undefined" ) token = json.token;
				if ( jsonChecker(json) ) {
					fn.call(json.data);
				}
			},
			error : function() {
				if ( isload == 1 ) loading.hide();
				if ( TEST ) dialog("测试模式：接口报错，请检查代码~！");
				else dialog(txt);
			}
		} );
	},
	//接口调用
	https : function(path,data,success,error,time) {
		time = time || 500;
		if ( $.isFunction(data) ) {
			error = success;
			success = data;
			data = "";
		}
        var domain = ONLINE ? "https://crwy.api.edisonluorui.com" : "http://192.168.1.21:6106";
		/*var domain = ONLINE ? "https://apis.edisonluorui.com" : "http://192.168.1.21:6106";*/
		var ajax = $.ajax( {
			type : "POST",
			url : domain + path,
			dataType : "json",
			data : data,
			success : function(callback) {
				loading.hide();
				if ( success ) success(callback);
			},
			error : function(err) {
				if ( error ) error(err);
			},
			complete : function() {
				clearTimeout(timer);
			}
		} );
		var timer = setTimeout( function() {
			ajax.abort();
			if ( !loading.isloading ) loading.show();
			$.https(path,data,success,error,time + 1000);
		}, time );
	},
	//接口调用
	phphttps : function(path,data,success,error,time) {
		time = time || 500;
		if ( $.isFunction(data) ) {
			error = success;
			success = data;
			data = "";
		}
        var domain = ONLINE ? "http://crwy.edisonluorui.com/api" : "http://192.168.1.21:6106";
		/*var domain = ONLINE ? "https://apis.edisonluorui.com" : "http://192.168.1.21:6106";*/
		var ajax = $.ajax( {
			type : "POST",
			url : domain + path,
			dataType : "json",
			data : data,
			success : function(callback) {
				loading.hide();
				if ( success ) success(callback);
			},
			error : function(err) {
				if ( error ) error(err);
			},
			complete : function() {
				clearTimeout(timer);
			}
		} );
		var timer = setTimeout( function() {
			ajax.abort();
			if ( !loading.isloading ) loading.show();
			$.https(path,data,success,error,time + 1000);
		}, time );
	},
	httpsOnce : function(path,data,success,error) {
		if ( $.isFunction(data) ) {
			error = success;
			success = data;
			data = "";
		}
		var domain = ONLINE ? "https://crwy.api.edisonluorui.com" : "http://192.168.1.21:6106";
		/*var domain = ONLINE ? "https://apis.edisonluorui.com" : "http://192.168.1.21:6106";*/
		var ajax = $.ajax( {
			type : "POST",
			url : domain + path,
			dataType : "json",
			data : data,
			success : function(callback) {
				if ( success ) success(callback);
			},
			error : function(err) {
				if ( error ) error(err);
			}
		} );
	},
	httpsPay : function(data,success,error) {
		if ( $.isFunction(data) ) {
			error = success;
			success = data;
			data = "";
		}
		var ajax = $.ajax( {
			type : "POST",
			//url : "https://gamev3.pay.edisonluorui.com:6106/order",
			// url : "http://gamev3.admin.edisonluorui.com/CRWYGameV3/get/gamePay/user.do",
			url : "https://gamev3.pay.edisonluorui.com:6106/wftpay",
			dataType : "json",
			data : data,
			success : function(callback) {
				if ( success ) success(callback);
			},
			error : function(err) {
				if ( error ) error(err);
			}
		} );
	},
	httpsSns : function(data,success,error) {
		if ( $.isFunction(data) ) {
			error = success;
			success = data;
			data = "";
		}
		var ajax = $.ajax( {
			type : "POST",
			url : "https://gamev3.pay.edisonluorui.com:6106/sns/sendcode",
			dataType : "json",
			data : data,
			success : function(callback) {
				if ( success ) success(callback);
			},
			error : function(err) {
				if ( error ) error(err);
			}
		} );
	}
} );
/*jQuery系统插件扩展结束*/




/*CSS3扩展*/
	//CSS3字典(待完善)
	var css3Dictionary = {
		keyframes : ["webkit","moz","o"],
		animation : ["webkit","moz","o"],
		transform : ["webkit","moz","ms","o"],
		perspective : ["webkit"],
		transition : ["webkit","moz","o"],
		column : ["webkit","moz"]
	};
	//jQuery.fn CSS3插件扩展
	$.fn.extend( {
		//fn.css3替代方法
		css3 : function(name,value) {
			var that = this;
			if ( $.type(name) == "string" ) {
				if ( value ) setCSS3(name,value);
				else {
					if ( name.indexOf(":") >= 0 ) {
						$.each(name.split(";"), function(i,props) {
							var props = $.trim(props);
							if ( props == "" ) return true;
							var prop = props.split(":")[0];
							var propValue = props.split(":")[1];
							setCSS3(prop,propValue);
						} );
					}
					else return this.css(name);
				}
			}
			else if ( $.type(name) == "object" ) $.each(name, function(key,item) {
				setCSS3(key,item);
			} );
			function setCSS3(key,value) {
				var css3 = key.split("-")[0];
				if ( css3 in css3Dictionary ) {
					$.each(css3Dictionary[css3], function(i,compatible) {
						that.css("-" + compatible + "-" + key,value);
					} );
				}
				if ( key == "color-from" || key == "background-color-from" ) {
					$(this).data("color-from",value);
					var to = $(this).data("color-to") || "#FFFFFF";
					that.css("background-image","linear-gradient(to bottom," + value + " 0%," + to + " 100%)");
				}
				if ( key == "color-to" || key == "background-color-to" ) {
					$(this).data("color-to",value);
					var from = $(this).data("color-from") || "#FFFFFF";
					that.css("background-image","linear-gradient(to bottom," + from + " 0%," + value + " 100%)");
				}
				if ( key == "color-from" || key == "color-to" ) that.css( {
					"-webkit-background-clip" : "text",
					"-webkit-text-fill-color" : "transparent"
				} );
				that.css(key,value);
			}
			return this;
		}
	} );
	//jQuery CSS3插件扩展
	$.extend( {
		//自定义CSS3样式
		css3 : function(css3) {
			var css = '<style type="text/css">\n';
			$.each(css3, function(name,value) {
				css += name + " {"
				if ( $.type(value) == "string" ) $.each(value.split(";"), function(i,props) {
					props = $.trim(props);
					if ( props == "" ) return true;
					var prop = props.split(":")[0];
					var propValue = props.split(":")[1];
					var propName = prop.split("-")[0];
					if ( propName in css3Dictionary ) {
						$.each(css3Dictionary[propName], function(i,compatible) {
							css += "-" + compatible + "-" + prop + ":" + propValue + ";";
						} );
					}
					css += prop + ":" + propValue + ";";
				} );
				else if ( $.type(value) == "object" ) $.each(value, function(prop,propValue) {
					var propName = prop.split("-")[0];
					if ( propName in css3Dictionary ) {
						$.each(css3Dictionary[propName], function(i,compatible) {
							css += "-" + compatible + "-" + prop + ":" + propValue + ";";
						} );
					}
					css += prop + ":" + propValue + ";";
				} );
				css += "}\n"
			} );
			css += "</style>\n"
			$("head").append(css);
			return this;
		},
		//自定义动画样式
		keyframes : function(name,animation) {
			var animate = "";
			$.each(animation, function(per,value) {
				animate += "	" + per + "% {";
				if ( $.type(value) == "string" ) $.each(value.split(";"), function(i,props) {
					props = $.trim(props);
					if ( props == "" ) return true;
					var prop = props.split(":")[0];
					var propValue = props.split(":")[1];
					var propName = prop.split("-")[0];
					if ( propName in css3Dictionary ) {
						$.each(css3Dictionary[propName], function(i,compatible) {
							animate += "-" + compatible + "-" + prop + ":" + propValue + ";";
						} );
					}
					animate += prop + ":" + propValue + ";";
				} );
				else if ( $.type(value) == "object" ) $.each(value, function(prop,propValue) {
					var propName = prop.split("-")[0];
					if ( propName in css3Dictionary ) {
						$.each(css3Dictionary[propName], function(i,compatible) {
							animate += "-" + compatible + "-" + prop + ":" + propValue + ";";
						} );
					}
					animate += prop + ":" + propValue + ";";
				} );
				animate += "}\n";
			} );
			var css = '<style type="text/css">\n';
			$.each(css3Dictionary.keyframes, function(i,compatible) {
				css += "@-" + compatible + "-keyframes " + name + " {\n";
				css += animate;
				css += "}\n";
			} );
			css += "@keyframes " + name + " {\n";
			css += animate;
			css += "}\n";
			css += "</style>\n"
			return $(css).appendTo($("head"));
		}
	} );
/*CSS3扩展结束*/




/*jQuery事件扩展*/
$.fn.extend( {
	//鼠标中键滚轮事件
	mousewheel : function(fn,step) {
		var that = this;
		step = step || 30;
		if ( $.browser.mozilla ) {
			this.get(0).addEventListener("DOMMouseScroll", function(event) {
				event.forward = event.detail > 0;
				if ( fn.call(that,event) !== false ) {
					if ( e.ctrlKey ) that.scrollLeft(that.scrollLeft() + ( event.forward ? step : -step ));
					else that.scrollTop(that.scrollTop() + ( event.forward ? step : -step ));
				}
			} );
		}
		else {
			this.on("mousewheel", function(e) {
				e.forward = event.wheelDelta < 0;
				if ( fn.call(that,e) !== false ) {
					if ( e.ctrlKey ) that.scrollLeft(that.scrollLeft() + ( e.forward ? step : -step ));
					else that.scrollTop(that.scrollTop() + ( e.forward ? step : -step ));
				}
			} );
		}
		return this;
	},
	//触屏滑动事件
	swiping : function(fns) {
		if ( $.type(fns) == "function" ) fns = {
			start : $.noop,
			move : fns,
			end : $.noop
		};
		else if ( $.type(fns) == "object" ) {
			if ( !fns.start ) fns.start = $.noop;
			if ( !fns.move ) fns.move = $.noop;
			if ( !fns.end ) fns.end = $.noop;
		}
		this.each( function() {
			if ( isMobile ) {
				var touches, lock = false, moving = false, time;
				var data = {
					lock : function() {
						lock = true;
					},
					unlock : function() {
						lock = false;
					}
				};
				$(this).on("touchstart", function() {
					if ( lock ) return;
					moving = true;
					touches = new Array();
					if ( event.touches ) $.each(event.touches, function(i,item) {
						touches[i] = {
							x : item.pageX,
							y : item.pageY,
							cx : item.clientX,
							cy : item.clientY
						};
					} );
					time = event.timeStamp;
					data = fns.start.call(this,event,data);
				} ).on("touchmove", function() {
					if ( lock ) return;
					if ( !moving ) return;
					if ( event.touches ) {
						$.each(event.touches, function(i,item) {
							event.touches[i].changedX = item.pageX - touches[i].x;
							event.touches[i].changedY = item.pageY - touches[i].y;
							event.touches[i].changed = Math.sqrt(event.touches[i].changedX * event.touches[i].changedX + event.touches[i].changedY * event.touches[i].changedY);
							event.touches[i].clientChangedX = item.clientX - touches[i].cx;
							event.touches[i].clientChangedY = item.clientY - touches[i].cy;
							event.touches[i].clientChanged = Math.sqrt(event.touches[i].clientChangedX * event.touches[i].clientChangedX + event.touches[i].clientChangedY * event.touches[i].clientChangedY);
							event.touches[i].direction = 90 - Math.atan2(-event.touches[i].changedY,event.touches[i].changedX) / Math.PI * 180;
							event.touches[i].direction = event.touches[i].direction >= 0 ? event.touches[i].direction : event.touches[i].direction + 360;
						} );
						event.changedX = event.touches[0].changedX;
						event.changedY = event.touches[0].changedY;
						event.changed = Math.sqrt(event.changedX * event.changedX + event.changedY * event.changedY);
						event.clientChangedX = event.touches[0].clientChangedX;
						event.clientChangedY = event.touches[0].clientChangedY;
						event.clientChanged = Math.sqrt(event.clientChangedX * event.clientChangedX + event.clientChangedY * event.clientChangedY);
						event.direction = 90 - Math.atan2(-event.changedY,event.changedX) / Math.PI * 180;
						event.direction = event.direction >= 0 ? event.direction : event.direction + 360;
					}
					event.timer = event.timeStamp - time;
					var newdata = fns.move.call(this,event,data);
					if ( newdata ) data = newdata;
				} ).on("touchend", function() {
					event.preventDefault();
					if ( lock ) return;
					if ( !moving ) return;
					if ( event.changedTouches ) {
						$.each(event.changedTouches, function(i,item) {
							event.changedTouches[i].changedX = item.pageX - touches[i].x;
							event.changedTouches[i].changedY = item.pageY - touches[i].y;
							event.changedTouches[i].changed = Math.sqrt(event.changedTouches[i].changedX * event.changedTouches[i].changedX + event.changedTouches[i].changedY * event.changedTouches[i].changedY);
							event.changedTouches[i].clientChangedX = item.clientX - touches[i].cx;
							event.changedTouches[i].clientChangedY = item.clientY - touches[i].cy;
							event.changedTouches[i].clientChanged = Math.sqrt(event.changedTouches[i].clientChangedX * event.changedTouches[i].clientChangedX + event.changedTouches[i].clientChangedY * event.changedTouches[i].clientChangedY);
							event.changedTouches[i].direction = 90 - Math.atan2(-event.changedTouches[i].changedY,event.changedTouches[i].changedX) / Math.PI * 180;
							event.changedTouches[i].direction = event.changedTouches[i].direction >= 0 ? event.changedTouches[i].direction : event.changedTouches[i].direction + 360;
						} );
						event.changedX = event.changedTouches[0].changedX;
						event.changedY = event.changedTouches[0].changedY;
						event.changed = Math.sqrt(event.changedX * event.changedX + event.changedY * event.changedY);
						event.clientChangedX = event.changedTouches[0].clientChangedX;
						event.clientChangedY = event.changedTouches[0].clientChangedY;
						event.clientChanged = Math.sqrt(event.clientChangedX * event.clientChangedX + event.clientChangedY * event.clientChangedY);
						event.direction = 90 - Math.atan2(-event.changedY,event.changedX) / Math.PI * 180;
						event.direction = event.direction >= 0 ? event.direction : event.direction + 360;
					}
					event.timer = event.timeStamp - time;
					fns.end.call(this,event,data);
					moving = false;
				} );
			}
			else {
				var touches = {
					x : 0,
					y : 0
				}, lock = false, moving = false, time;
				var data = {
					lock : function() {
						lock = true;
					},
					unlock : function() {
						lock = false;
					}
				};
				$(this).mousedown( function(e) {
					if ( lock ) return;
					moving = true;
					touches.x = e.pageX;
					touches.y = e.pageY;
					time = e.timeStamp;
					data = fns.start.call(this,e,data);
				} ).mousemove( function(e) {
					if ( lock ) return;
					if ( !moving ) return;
					e.changedX = e.pageX - touches.x;
					e.changedY = e.pageY - touches.y;
					e.changed = Math.sqrt(e.changedX * e.changedX + e.changedY * e.changedY);
					e.direction = 90 - Math.atan2(-e.changedY,e.changedX) / Math.PI * 180;
					e.direction = e.direction >= 0 ? e.direction : e.direction + 360;
					e.timer = e.timeStamp - time;
					var newdata = fns.move.call(this,e,data);
					if ( newdata ) data = newdata;
				} ).mouseup( function(e) {
					if ( lock ) return;
					if ( !moving ) return;
					e.changedX = e.pageX - touches.x;
					e.changedY = e.pageY - touches.y;
					e.changed = Math.sqrt(e.changedX * e.changedX + e.changedY * e.changedY);
					e.direction = 90 - Math.atan2(-e.changedY,e.changedX) / Math.PI * 180;
					e.direction = e.direction >= 0 ? e.direction : e.direction + 360;
					e.timer = e.timeStamp - time;
					fns.end.call(this,e,data);
					moving = false;
				} );
			}
		} );
		return this;
	},
	//触碰
	tap : function(fn,ontap,over,overfn,upfn) {
		if ( fn ) {
			var that = this;
			if ( isMobile ) {
				this.swiping( {
					start : function() {
						if ( $(this).hasClass("tap-waiting") ) return;
						if ( ontap ) $(this).addClass(ontap);
						if ( overfn ) overfn.call(this);
					},
					end : function(e) {
						var that = $(this);
						if ( $(this).hasClass("tap-waiting") ) return;
						if ( e.changedTouches ) {
							if ( Math.abs(e.changedTouches[0].clientChangedX) < $.swipeStep && Math.abs(e.changedTouches[0].clientChangedY) < $.swipeStep && e.timer < $.holdTime && fn ) {
								$(this).addClass("tap-waiting");
								fn.call(this, e, function() {
									that.removeClass("tap-waiting");
								} );
							}
						}
						else {
							if ( e.timer < $.holdTime && fn ) {
								$(this).addClass("tap-waiting");
								fn.call(this, e, function() {
									that.removeClass("tap-waiting");
								} );
							}
						}
						if ( !over ) $(this).removeClass("tap-waiting");
						if ( ontap ) $(this).removeClass(ontap);
					}
				} );
				if ( ontap ) $(document).bind("touchend", function() {
					$(that).removeClass(ontap);
					if ( upfn ) upfn.call(that);
				} );
			}
			else {
				this.mousedown( function(e) {
					if ( $(this).hasClass("tap-waiting") ) return;
					if ( ontap ) $(this).addClass(ontap);
					if ( overfn ) overfn.call(this);
				} ).mouseup( function(e) {
					var that = $(this);
					if ( $(this).hasClass("tap-waiting") ) return;
					$(this).addClass("tap-waiting");
					fn.call(this, e, function() {
						that.removeClass("tap-waiting");
					} );
					if ( !over ) $(this).removeClass("tap-waiting");
					if ( ontap ) $(this).removeClass(ontap);
				} );
				if ( ontap ) $(document).mouseup( function() {
					$(that).removeClass(ontap);
					if ( upfn ) upfn.call(that);
				} );
			}
			this.data("tap",fn);
		}
		else {
			if ( this.data("tap") ) this.data("tap").call(this);
		}
		return this;
	},
	//取消触碰
	untap : function() {
		if ( isMobile ) this.unbind("touchstart").unbind("touchmove").unbind("touchend");
		else this.unbind("mousedown").unbind("mouseup");
		this.removeData("tap");
		return this;
	},
	//双触
	dbltap : function(fn) {
		if ( isMobile ) {
			var counter = 0,dbltimer;
			this.tap( function(e) {
				if ( e.timer < $.dblTime ) {
					counter++;
					dbltimer = setTimeout( function() {
						counter = 0;
					}, $.dblTime );
				}
				else counter = 0;
				if ( counter == 2 ) {
					fn.call(this,e);
					clearTimeout(dbltimer);
					counter = 0;
				}
			} );
		}
		else this.dblclick(fn);
		return this;
	},
	//按住
	taphold : function(fn) {
		var holding;
		this.swiping( {
			start : function(e) {
				var that = this;
				holding = setTimeout( function() {
					fn.call(that,e);
				}, $.holdTime );
			},
			move : function(e) {
				if ( Math.abs(e.changedX) >= $.swipeStep || Math.abs(e.changedY) >= $.swipeStep ) clearTimeout(holding);
			},
			end : function() {
				clearTimeout(holding);
			}
		} );
		return this;
	},
	//长触碰
	longtap : function(fn) {
		this.swiping( {
			end : function(e) {
				if ( Math.abs(e.changedX) < $.swipeStep && Math.abs(e.changedY) < $.swipeStep && e.timer >= $.holdTime && fn ) fn.call(this,e);
			}
		} );
		return this;
	},
	//滑动
	swipe : function(fn) {
		this.swiping( {
			end : function(e) {
				if ( Math.abs(e.changedX) >= $.swipeStep || Math.abs(e.changedY) >= $.swipeStep && e.timer < $.swipeTime && fn ) fn.call(this,e);
			}
		} );
		return this;
	},
	//向上滑动
	swipeup : function(fn) {
		this.swiping( {
			end : function(e) {
				if ( e.changedY <= -$.swipeStep && e.timer < $.swipeTime && fn ) fn.call(this,e);
			}
		} );
		return this;
	},
	//向右滑动
	swiperight : function(fn) {
		this.swiping( {
			end : function(e) {
				if ( e.changedX >= $.swipeStep && e.timer < $.swipeTime && fn ) fn.call(this,e);
			}
		} );
		return this;
	},
	//向下滑动
	swipedown : function(fn) {
		this.swiping( {
			end : function(e) {
				if ( e.changedY >= $.swipeStep && e.timer < $.swipeTime && fn ) fn.call(this,e);
			}
		} );
		return this;
	},
	//向左滑动
	swipeleft : function(fn) {
		this.swiping( {
			end : function(e) {
				if ( e.changedX <= -$.swipeStep && e.timer < $.swipeTime && fn ) fn.call(this,e);
			}
		} );
		return this;
	},
	//触摸滚屏
	touchScroll : function(fn) {
		$(document).unbind("touchstart").bind("touchstart", function(e) {
			e.preventDefault();
		} );
		$("input").bind("touchstart", function(e) {
			e.stopPropagation();
		} );
		this.swiping( {
			start : function(e,data) {
				data.start = $(this).scrollTop();
				return data;
			},
			move : function(e,data) {
				$(this).scrollTop(data.start - e.changedY);
			}
		} );
		return this;
	},
	//物件拖拽
	drag : function(fn) {
		this.swiping( {
			start : function(e,data) {
				data.x = $(this).offset().left;
				data.y = $(this).offset().top;
				return data;
			},
			move : function(e,data) {
				$(this).css( {
					left : data.x + e.changedX,
					top : data.y + e.changedY
				} );
				return data;
			},
			end : function(e,data) {
				if ( fn ) fn.call(this,e,data);
			}
		} );
	}
} );
/*jQuery事件扩展结束*/