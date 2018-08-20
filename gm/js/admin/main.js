dialogConfig.bgcolor = "#900";
//数组倒序排序
Array.prototype.desc = function() {
  return this.sort( function(a,b) {
    return b - a;
  });
};
//数组参照字段正序排序
Array.prototype.ascBy = function(field) {
  return this.sort( function(a,b) {
    return a[field] - b[field];
  } );
};
//数组参照字段倒序排序
Array.prototype.descBy = function(field) {
  return this.sort( function(a,b) {
    return b[field] - a[field];
  } );
};
//数组查找指定元素，反馈布尔值表示是否找到
Array.prototype.search = function(obj) {
  var i = this.length;
  while (i--) {
    if ( this[i] === obj ) return true;
  }
  return false;
};
//数组参照字段查找指定元素，反馈布尔值表示是否找到
Array.prototype.searchBy = function(field, obj) {
  var i = this.length;
  while (i--) {
    if ( this[i][field] === obj ) return true;
  }
  return false;
};
//数组查找指定元素，反馈该元素索引
Array.prototype.find = function(obj) {
  var i = this.length;
  while (i--) {
    if ( this[i] === obj ) return i;
  }
  return false;
};
//数组参照字段查找指定元素，反馈该元素索引
Array.prototype.findBy = function(field,obj) {
  var i = this.length;
  while (i--) {
    if ( this[i][field] === obj ) return i;
  }
  return false;
};
//创建与原数组完全相同的新数组，但占用不同的内存空间
Array.prototype.newArray = function() {
  var arr = [];
  $.each(this, function(i,item) {
    arr.push(item);
  } );
  return arr;
};
//字符串逐个替换
String.prototype.replace1By1 = function(s,arr,apply) {
  var str = this;
  var i = 0;
  while ( str.indexOf(s) != -1 ) {
  	var txt = arr[i];
  	if ( apply ) txt = $.type(apply) == "function" ? apply.call(txt) : apply.replace(/%s/g,txt);
    str = str.replace(s,txt);
    i++;
  }
  return str;
};
$( function() {
	$(window).keydown( function(e) {
		if ( e.keyCode == 116 ) {
			e.preventDefault();
			e.keyCode = 0;
			e.cancelBubble = true;
			refresh();
			return false;
		}
	} );
	$(".ondelete").live("click", function() {
		var url = $(this).attr("href");
		confirm("是否确认删除吗？", function(is) {
			if ( is ) goto(url);
		} );
		return false;
	} );
	$(".onop").live("click", function() {
		var url = $(this).attr("href");
		confirm("是否确认操作吗？", function(is) {
			if ( is ) goto(url);
		} );
		return false;
	} );
	$(".int").live("input", function() {
		var value = $(this).val();
		if ( !/^\d+$/.test(value) ) {
			value = value.replace(/[^\d]/g,"");
			$(this).val(value);
		}
	} );
	$(".ints").live("input", function() {
		var value = $(this).val();
		if ( !/^-?\d+$/.test(value) ) {
			value = value.replace(/[^-\d]/g,"");
			$(this).val(value);
		}
	} );
	$(".double").live("input", function() {
		var value = $(this).val();
		if ( !/^[\d.]+$/.test(value) ) {
			value = value.replace(/[^\d.]/g,"");
			$(this).val(value);
		}
	} );
	$(".doubles").live("input", function() {
		var value = $(this).val();
		if ( !/^-?[\d.]+$/.test(value) ) {
			value = value.replace(/[^-\d.]/g,"");
			$(this).val(value);
		}
	} );
	$(".enchar").live("input", function() {
		var value = $(this).val();
		if ( !/^[A-Za-z0-9]+$/.test(value) ) {
			value = value.replace(/[^A-Za-z0-9]/g,"");
			$(this).val(value);
		}
	} );
	$(".encharfirst").live("input", function() {
		var value = $(this).val();
		if ( !/^[A-Za-z]{1}[A-Za-z0-9]*$/.test(value) ) {
			value = "";
			$(this).val(value);
		}
	} );
	$(".back").live("click", function() {
		window.history.back();
	} );
	$(".goto").live("click", function() {
		var url = $(this).data("url");
		if ( url ) goto(url);
	} );
	$(".showData").tap( function() {
		var datamask = $(this).next(".datamask");
		if ( datamask.length == 0 ) dialog("无数据");
		else datamask.show();
	} );
	$(".datamask").tap( function() {
		$(this).hide();
	} ).children("pre,table").tap( function(e) {
		e.stopPropagation();
	} );
} );
$.extend( {
	search : function(data) {
		var uri = window.location.pathname.split("&")[0];
		data = data || {};
		$.each(data, function(key,value) {
			uri += "&" + key + "=" + value;
		} );
		goto(uri);
	}
} );
$.fn.extend( {
	fileSrc : function() {
		var o = this.get(0);
		var url = ""; 
		if ( navigator.userAgent.indexOf("MSIE") >= 1 ) {// IE
			url = o.value;
		}
		else if ( navigator.userAgent.indexOf("Firefox") > 0 || navigator.userAgent.indexOf("Chrome") > 0 ) {// Firefox、Chrome
			url = window.URL.createObjectURL(o.files.item(0));
		}
		return url;
	},
	right : function(txt) {
		txt = txt || "&nbsp;";
		var o = this.next("span");
		if ( o.length > 0 && (o.hasClass("tip-right") || o.hasClass("tip-wrong")) ) o.remove();
		this.after('<span class="tip-right">' + txt + '</span>');
		return true;
	},
	wrong : function(txt) {
		txt = txt || "&nbsp;";
		var o = this.next("span");
		if ( o.length > 0 && (o.hasClass("tip-right") || o.hasClass("tip-wrong")) ) o.remove();
		this.after('<span class="tip-wrong">' + txt + '</span>');
		return false;
	},
	unwrong : function() {
		var o = this.next("span");
		if ( o.length > 0 && (o.hasClass("tip-right") || o.hasClass("tip-wrong")) ) o.remove();
		return true;
	},
	adder : function(fn) {
		var that = this;
		this.parent().addClass("unsel");
		var def = parseInt(this.data("def"));
		var num = parseInt(this.val());
		var adder = 0;
		this.after('<p class="adder"><span class="reduce"></span><input type="text" value="0" class="w50p tc ints"><span class="add"></span></p>');
		var add = this.next().children(".add").tap( function() {
			adder++;
			num = def + adder;
			if ( num < 0 ) {
				num = 0;
				adder = num - def;
			}
			input.val(adder);
			that.val(num);
			if ( fn ) fn.call(that,num,adder);
		} );
		var input = this.next().children("input").bind("input", function() {
			adder = parseInt($(this).val());
			if ( isNaN(adder) ) {
				adder = 0;
				$(this).val(adder);
			}
			num = def + adder;
			if ( num < 0 ) {
				num = 0;
				adder = num - def;
				$(this).val(adder);
			}
			that.val(num);
			if ( fn ) fn.call(that,num,adder);
		} );
		var reduce = this.next().children(".reduce").tap( function() {
			adder--;
			num = def + adder;
			if ( num < 0 ) {
				num = 0;
				adder = num - def;
			}
			input.val(adder);
			that.val(num);
			if ( fn ) fn.call(that,num,adder);
		} );
		this.bind("input", function() {
			num = parseInt($(this).val());
			if ( isNaN(num) ) num = 0;
			adder = num - def;
			input.val(adder);
			if ( fn ) fn.call(that,num,adder);
		} );
		return this;
	}
} );
function jsonFormat(txt,compress/*是否为压缩模式*/) {/* 格式化JSON源码(对象转换为JSON文本) */
    var indentChar = '    ';
    if ( /^\s*$/.test(txt) ) {
        alert('数据为空,无法格式化! ');
        return;
    }
    try {
      var data = eval('('+txt+')');
    }
    catch(e) {
        alert('数据源语法错误,格式化失败! 错误信息: ' + e.description,'err');
        return;
    };
    var draw = [], last = false, This = this, line = compress ? '' : '\n', nodeCount = 0, maxDepth = 0;
    var notify = function(name,value,isLast,indent/*缩进*/,formObj) {
        nodeCount++;/*节点计数*/
        for ( var i = 0,tab = ''; i < indent; i++ ) tab += indentChar;/* 缩进HTML */
        tab = compress ? '' : tab;/*压缩模式忽略缩进*/
        maxDepth = ++indent;/*缩进递增并记录*/
        if ( value && value.constructor == Array ) {/*处理数组*/
            draw.push(tab + ( formObj ? ('"' + name + '":') : '' ) + '[' + line);/*缩进'[' 然后换行*/
            for ( var i = 0; i < value.length; i++ )
                notify(i,value[i],i == value.length - 1,indent,false);
            draw.push(tab + ']' + ( isLast ? line : (',' + line) ));/*缩进']'换行,若非尾元素则添加逗号*/
        }
        else if ( value && typeof value == 'object' ) {/*处理对象*/
            draw.push(tab + ( formObj ? ('"' + name + '":') : '' ) + '{' + line);/*缩进'{' 然后换行*/
            var len = 0, i = 0;
            for ( var key in value ) len++;
            for ( var key in value ) notify(key,value[key],++i == len,indent,true);
            draw.push(tab + '}' + ( isLast ? line : (',' + line) ));/*缩进'}'换行,若非尾元素则添加逗号*/
        }
        else {
            if(typeof value == 'string' ) value = '"' + value + '"';
            draw.push(tab + ( formObj ? ('"' + name + '":') : '' ) + value + ( isLast ? '' : ',' ) + line);
        }
    }
    var isLast = true, indent = 0;
    notify('',data,isLast,indent,false);
    return draw.join('');
}