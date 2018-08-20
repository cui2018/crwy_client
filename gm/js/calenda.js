var calendaCss = '',calendaHtml = '';
/*-----∵∵∵ 时间设置窗口样式表开始 ∵∵∵-----*/
calendaCss += '<style type="text/css">\n';
calendaCss += '	#calendaBox { width:256px; border:1px #999999 outset; background:#EEE; position:absolute; z-index:9998; font-size:12px; font-family:"Comic Sans MS", cursive; color:#000000; text-align:center; line-height:20px; cursor:default; text-indent:0; display:none; -moz-user-focus:ignore; -moz-user-input:disabled; -moz-user-select:none; }\n';
calendaCss += '		#calendaBox .calendalineHeight25 { line-height:25px; }\n';
calendaCss += '		#calendaBox .calendaDate { font-weight:bold; font-size:13px; cursor:move; }\n';
calendaCss += '		#calendaBox .calendaShallow { color:#FFFFFF; cursor:pointer; }\n';
calendaCss += '		#calendaBox .calendaHelp,#calendaBox .calendaClose { cursor:pointer; }\n';
calendaCss += '		#calendaBox .calendaToday,#calendaBox .calendaDay { cursor:pointer; }\n';
calendaCss += '		#calendaBox	.calendaHour,#calendaBox .calendaMinute { border:1px #000 solid; background:#FFFFFF; padding:0 2px; margin-right:2px; }\n';
calendaCss += '		#calendaBox .calendaWeek td.selected { font-weight:bold; font-size:13px; color:#FFFFFF; background:#444444; }\n';
calendaCss += '		#calendaBox .calendaWeek td.disable { color:#BBBBBB; }\n';
calendaCss += '		#calendaBox .calendaText { cursor:move; }\n';
calendaCss += '		#calendaBox .calendaDropList { cursor:default; border:1px #AAAAAA solid; border-top:none; background:#FFFFFF; margin:0; padding:0; list-style-type:none; position:absolute; z-index:9999; display:none; }\n';
calendaCss += '			#calendaBox .calendaDropList li { height:14px; line-height:14px; font-size:8px; overflow:hidden; }\n';
calendaCss += '			#calendaBox .calendaDropList li:hover { background:#444444; color:#FFFFFF; }\n';
calendaCss += '			#calendaBox .calendaDropList li.selected { background:#444444; color:#FFFFFF; }\n';
calendaCss += '</style>\n';
/*-----∴∴∴ 时间设置窗口样式表结束 ∴∴∴-----*/
document.write(calendaCss);

/*-----∵∵∵ 时间设置窗口标签开始 ∵∵∵-----*/
calendaHtml += '<div id="calendaBox">\n';
calendaHtml += '	<table width="100%" cellpadding="0" cellspacing="1" bgcolor="#AAAAAA">\n';
calendaHtml += '		<tr class="calendalineHeight25">\n';
calendaHtml += '			<td height="25" bgcolor="#D8F5FE" class="calendaHelp" align="center">?</td>\n';
calendaHtml += '			<td colspan="6" bgcolor="#FFFFFF" class="calendaDate" align="center"></td>\n';
calendaHtml += '			<td bgcolor="#D8F5FE" class="calendaClose" align="center">×</td>\n';
calendaHtml += '		</tr>\n';
calendaHtml += '		<tr bgcolor="#EEEEEE" class="calendalineHeight25">\n';
calendaHtml += '			<td height="25" bgcolor="#444444" class="calendaShallow" align="center">&lt;&lt;</td>\n';
calendaHtml += '			<td bgcolor="#444444" class="calendaShallow" align="center">&lt;</td>\n';
calendaHtml += '			<td colspan="4" bgcolor="#D8F5FE" class="calendaToday" align="center">今天</td>\n';
calendaHtml += '			<td bgcolor="#444444" class="calendaShallow" align="center">&gt;</td>\n';
calendaHtml += '			<td bgcolor="#444444" class="calendaShallow" align="center">&gt;&gt;</td>\n';
calendaHtml += '		</tr>\n';
calendaHtml += '		<tr bgcolor="#E6FFFD" class="calendaWeekTitle">\n';
calendaHtml += '			<td width="12.5%" height="20" align="center" nowrap="nowrap">周</td>\n';
calendaHtml += '			<td width="12.5%" align="center" nowrap="nowrap">周日</td>\n';
calendaHtml += '			<td width="12.5%" align="center" nowrap="nowrap">周一</td>\n';
calendaHtml += '			<td width="12.5%" align="center" nowrap="nowrap">周二</td>\n';
calendaHtml += '			<td width="12.5%" align="center" nowrap="nowrap">周三</td>\n';
calendaHtml += '			<td width="12.5%" align="center" nowrap="nowrap">周四</td>\n';
calendaHtml += '			<td width="12.5%" align="center" nowrap="nowrap">周五</td>\n';
calendaHtml += '			<td width="12.5%" align="center" nowrap="nowrap">周六</td>\n';
calendaHtml += '		</tr>\n';
calendaHtml += '		<tr bgcolor="#EEEEEE">\n';
calendaHtml += '			<td colspan="8" height="20" align="center"><span class="calendaHour">Null</span>：<span class="calendaMinute">Null</span></td>\n';
calendaHtml += '		</tr>\n';
calendaHtml += '		<tr bgcolor="#FFFFFF">\n';
calendaHtml += '			<td colspan="8" height="20" class="calendaText" align="center">选择日期</td>\n';
calendaHtml += '		</tr>\n';
calendaHtml += '	</table>\n';
calendaHtml += '	<ul class="calendaDropList"></ul>\n';
calendaHtml += '</div>\n';
/*-----∴∴∴ 时间设置窗口标签结束 ∴∴∴-----*/



var numberChinese = new Array("一","二","三","四","五","六","七","八","九","十","十一","十二");
var weekChinese = new Array("日","一","二","三","四","五","六");
String.prototype.addZero = function(n) {	//给字符串不足n位长度的前缀加0
	var newStr = "";
	for ( var i = this.length; i < n; i++ ) {
		newStr += "0";
	}
	newStr += this;
	return newStr;
};
Date.prototype.formatDateTime = function(i) {	//将Date对象日期，格式化为各种页面格式
	switch(i) {
		case 1:
			return this.getFullYear() + "年" + ( this.getMonth() + 1 ).toString().addZero(2) + "月" + this.getDate().toString().addZero(2) + "日";
			break;
		case 3:
			return this.getFullYear() + "-" + ( this.getMonth() + 1 ).toString().addZero(2) + "-" + this.getDate().toString().addZero(2);
			break;
		case 4:
			return this.getFullYear() + "-" + ( this.getMonth() + 1 ).toString().addZero(2);
			break;
		case 5:
			return this.getHours().toString().addZero(2) + ":" + this.getMinutes().toString().addZero(2) + ":" + this.getSeconds().toString().addZero(2);
			break;
		case 6:
			return this.getHours().toString().addZero(2) + ":" + this.getMinutes().toString().addZero(2);
			break;
		case 7:
			return numberChinese[this.getMonth()] + "月, " + this.getFullYear();
			break;
		case 8:
			return this.getFullYear() + "年" + ( this.getMonth() + 1 ).toString().addZero(2) + "月" + this.getDate().toString().addZero(2) + "日，星期" + weekChinese[this.getDay()];
			break;
		default:
			return this.getFullYear() + "-" + ( this.getMonth() + 1 ).toString().addZero(2) + "-" + this.getDate().toString().addZero(2) + " " + this.getHours().toString().addZero(2) + ":" + this.getMinutes().toString().addZero(2) + ":" + this.getSeconds().toString().addZero(2);
			break;
	}
};
String.prototype.toDate = function() {	//将页面时期格式转换为Date对象
	return new Date(this.replace(/(-)/g,"/"));
};

function __firefox() {	//重写火狐的event事件
	HTMLElement.prototype.__defineGetter__("runtimeStyle", __element_style);
	window.constructor.prototype.__defineGetter__("event", __window_event);
	Event.prototype.__defineGetter__("srcElement", __event_srcElement);
}
function __element_style() {
	return this.style;
}
function __window_event() {
	return __window_event_constructor();
}
function __event_srcElement() {
	return this.target;
}
function __window_event_constructor() {
	if ( document.all ) {
		return window.event;
	}
	var _caller = __window_event_constructor.caller;
	while ( _caller != null ) {
		var _argument = _caller.arguments[0];
		if ( _argument ) {
			var _temp = _argument.constructor;
			if( _temp.toString().indexOf("Event") != -1 ) {
				return _argument;
			}
		}
		_caller = _caller.caller;
	}
	return null;
}
if ( window.addEventListener ) {
	__firefox();
}

var openCalenda = false;
$.fn.calenda = function(data) {	//calenda插件方法
	$.fn.setButton = function(data) {	//设置按钮样式的方法
		this.hover( function() {
			$(this).attr("bgColor",data.hoverColor);
		} , function() {
			$(this).attr("bgColor",data.defColor);
		} ).mousedown( function() {
			$(this).attr("bgColor",data.downColor);
		} ).mouseup( function() {
			$(this).attr("bgColor",data.hoverColor);
		} );
		return this;
	};
	var testYMDHMS = /^(?:(?!0000)[0-9]{4}-(?:(?:0{0,1}[1-9]|1[0-2])-(?:0{0,1}[1-9]|1[0-9]|2[0-8])|(?:0{0,1}[13-9]|1[0-2])-(?:29|30)|(?:0{0,1}[13578]|1[02])-31)|(?:[0-9]{2}(?:0{0,1}[48]|[2468][048]|[13579][26])|(?:0{0,1}[48]|[2468][048]|[13579][26])00)-0{0,1}2-29) (?:0{0,1}[0-9]|1[0-9]|2[0-3]):(?:0{0,1}[0-9]|[1-5][0-9]):(?:0{0,1}[0-9]|[1-5][0-9])$/;
	var testYMDHM = /^(?:(?!0000)[0-9]{4}-(?:(?:0{0,1}[1-9]|1[0-2])-(?:0{0,1}[1-9]|1[0-9]|2[0-8])|(?:0{0,1}[13-9]|1[0-2])-(?:29|30)|(?:0{0,1}[13578]|1[02])-31)|(?:[0-9]{2}(?:0{0,1}[48]|[2468][048]|[13579][26])|(?:0{0,1}[48]|[2468][048]|[13579][26])00)-0{0,1}2-29) (?:0{0,1}[0-9]|1[0-9]|2[0-3]):(?:0{0,1}[0-9]|[1-5][0-9])$/;
	var testYMDH = /^(?:(?!0000)[0-9]{4}-(?:(?:0{0,1}[1-9]|1[0-2])-(?:0{0,1}[1-9]|1[0-9]|2[0-8])|(?:0{0,1}[13-9]|1[0-2])-(?:29|30)|(?:0{0,1}[13578]|1[02])-31)|(?:[0-9]{2}(?:0{0,1}[48]|[2468][048]|[13579][26])|(?:0{0,1}[48]|[2468][048]|[13579][26])00)-0{0,1}2-29) (?:0{0,1}[0-9]|1[0-9]|2[0-3])$/;
	var testYMD = /^(?:(?!0000)[0-9]{4}-(?:(?:0{0,1}[1-9]|1[0-2])-(?:0{0,1}[1-9]|1[0-9]|2[0-8])|(?:0{0,1}[13-9]|1[0-2])-(?:29|30)|(?:0{0,1}[13578]|1[02])-31)|(?:[0-9]{2}(?:0{0,1}[48]|[2468][048]|[13579][26])|(?:0{0,1}[48]|[2468][048]|[13579][26])00)-0{0,1}2-29)$/;
	var testYM = /^(?:(?!0000)[0-9]{4}-(?:0{0,1}[1-9]|1[0-2]))$/;
	var testY = /^(?:(?!0000)[0-9]{4})$/;
	//以上为各种日期格式验证的正则表达式
	var helps = {	//提示语
		def : "选择日期",
		help : "帮助",
		drag : "拖动",
		close : "关闭",
		prevYear : "上一年（右键弹出菜单）",
		prevMonth : "上一月（右键弹出菜单）",
		today : "转到今天",
		nextMonth : "下一月（右键弹出菜单）",
		nextYear : "下一年（右键弹出菜单）",
		time : "单击增加（shift+单机减少）或左右拖动"
	};
	
	if ( $("#calendaBox").length == 0 ) {
		$(document.body).append(calendaHtml);
		var buttonData = {
			defColor : $("#calendaBox .calendaHelp").attr("bgColor"),
			hoverColor : "#33CCFF",
			downColor : "#00CCCC"
		};
		$("#calendaBox").bind("selectstart", function() {
			return false;
		} ).find(".calendaHelp").click( function() {
			autoHelp();
		} ).setButton(buttonData).end().find(".calendaClose").click( function() {
			autoHide();
		} ).setButton(buttonData);
		$(document).mousedown( function() {
			if ( !openCalenda ) return;
			$("#calendaBox .calendaDropList").hide();
			var isOnCalenda = getX() >= $("#calendaBox").offset().left;
			isOnCalenda = isOnCalenda && getY() >= $("#calendaBox").offset().top;
			isOnCalenda = isOnCalenda && getX() <= $("#calendaBox").offset().left + $("#calendaBox").outerWidth(true);
			isOnCalenda = isOnCalenda && getY() <= $("#calendaBox").offset().top + $("#calendaBox").outerHeight(true);
			if ( !isOnCalenda && $("#calendaBox").css("display") == "block" ) {
				autoHide();
			}
		} );
		setHelp();
		var posInBoxX = 0,posInBoxY = 0,isOnDrag = false;
		$("#calendaBox .calendaDate,#calendaBox .calendaText").mousedown( function() {
			posInBoxX = getX() - $("#calendaBox").offset().left;
			posInBoxY = getY() - $("#calendaBox").offset().top;
			isOnDrag = true;
		} );
		buttonData = {
			defColor : $("#calendaBox .calendaHour").css("backgroundColor"),
			hoverColor : "#33CCFF",
			downColor : "#00CCCC"
		};
		var isOnMove = false,timeMove,moveSpeed = 30,timeStartX = 0,addOrRed,moveObj;
		$("#calendaBox .calendaHour,#calendaBox .calendaMinute").hover( function() {
			$(this).css( { "backgroundColor" : "#DDDDDD" , "color" : "#000000" , "fontWeight" : "normal" } );
		} , function() {
			$(this).css( { "backgroundColor" : "#FFFFFF" , "color" : "#000000" , "fontWeight" : "normal" } );
		} ).mousedown( function() {
			isOnMove = true;
			timeStartX = getX();
			moveObj = $(this);
			$(this).css( { "backgroundColor" : "#222222" , "color" : "#FFFFFF" , "fontWeight" : "bold" } );
			autoTimeMove();
		} ).mouseup( function() {
			$(this).css( { "backgroundColor" : "#DDDDDD" , "color" : "#000000" , "fontWeight" : "normal" } );
		} );
		function autoTimeMove() {
			timeMove = setTimeout( function() {
				if ( moveSpeed > 30 && moveSpeed < 1500 ) {
					if ( moveObj.attr("class") == "calendaHour" ) {
						addTime(24,addOrRed,moveObj);
					}
					else if ( moveObj.attr("class") == "calendaMinute" ) {
						addTime(60,addOrRed,moveObj,$("#calendaBox .calendaHour"));
					}
				}
				autoTimeMove();
			} , moveSpeed );
		}
		$(document).mousemove( function() {
			if ( isOnDrag ) {
				$("#calendaBox").css( {
					"left" : ( getX() - posInBoxX ) + "px",
					"top" : ( getY() - posInBoxY ) + "px"
				} );
			}
			if ( isOnMove ) {
				addOrRed = ( timeStartX - getX() >= 0 );
				moveSpeed = Math.abs( 7500 / ( timeStartX - getX() ) );
				if ( moveSpeed < 30 ) {
					moveSpeed = 31;
				}
				else if ( moveSpeed > 1500 ) {
					moveSpeed = 1500;
				}
			}
		} ).mouseup( function() {
			if ( isOnDrag ) {
				isOnDrag = false;
			}
			if ( isOnMove ) {
				clearTimeout(timeMove);
				isOnMove = false;
				moveSpeed = 30;
				timeStartX = 0;
				addOrRed = null;
			}
		} );
		$("#calendaBox .calendaHour").click( function() {
			addTime(24,!event.shiftKey,$(this));
		} );
		$("#calendaBox .calendaMinute").click( function() {
			addTime(60,!event.shiftKey,$(this),$("#calendaBox .calendaHour"));
		} );
	}
	var obj = $("#calendaBox");

	resetData();

	this.bind(data.eventName, function() {	//为每个触发器绑定事件
		openCalenda = true;
		var forTag = $(data.forTag);
		if ( data.forTag == "" || data.forTag == null ) {
			forTag = $(this);
		}
		var pos = { "top" : ( forTag.offset().top + forTag.outerHeight(true) ) + "px" , "left" : ( forTag.offset().left ) + "px" };
		obj.hide().css(pos);
		
		var textObj = $(this);
		if ( data.forTag != null && data.forTag != "" ) {
			textObj = $(data.forTag);
		}
		var dateNow = textObj.val();
		if ( !testYMDHMS.test(dateNow) && !testYMDHM.test(dateNow) && !testYMDH.test(dateNow) && !testYMD.test(dateNow) && !testYM.test(dateNow) && !testY.test(dateNow) ) {
			dateNow = new Date().formatDateTime(2);
		}
		else {
			if ( testYMDHM.test(dateNow) ) {
				dateNow = dateNow + ":00"
			}
			else if ( testYMDH.test(dateNow) ) {
				dateNow = dateNow + ":00:00"
			}
			else if ( testYMD.test(dateNow) ) {
				dateNow = dateNow + " 00:00:00"
			}
			else if ( testYM.test(dateNow) ) {
				dateNow = dateNow + "-01 00:00:00"
			}
			else if ( testY.test(dateNow) ) {
				dateNow = dateNow + "-01-01 00:00:00"
			}
		}
		getDayList(dateNow,forTag);
		var buttonData = {
			defColor : obj.find(".calendaShallow").attr("bgColor"),
			hoverColor : "#555555",
			downColor : "#333333"
		};
		obj.find(".calendaShallow").setButton(buttonData);
		buttonData = {
			defColor : obj.find(".calendaHelp").attr("bgColor"),
			hoverColor : "#33CCFF",
			downColor : "#00CCCC"
		};
		obj.find(".calendaToday").setButton(buttonData);
		autoShow();
		return false;
	} );
	return this;
	
	function resetData() {	//重置可选参数的默认值
		if ( data == null || typeof data != "object" ) {
			data = new Object();
		}
		if ( data.mode == null || data.mode == "" ) {
			data.mode = "yyyy-mm-dd hh:mm:ss";
		}
		if ( data.min == "today" ) {
			data.min = new Date().formatDateTime(3);
		}
		else if ( data.min == "yesterday" ) {
			data.min = addDate(new Date().formatDateTime(3),-1);
		}
		else if ( data.min == "tomorrow" ) {
			data.min = addDate(new Date().formatDateTime(3),1);
		}
		if ( data.max == "today" ) {
			data.max = new Date().formatDateTime(3);
		}
		else if ( data.max == "yesterday" ) {
			data.max = addDate(new Date().formatDateTime(3),-1);
		}
		else if ( data.max == "tomorrow" ) {
			data.max = addDate(new Date().formatDateTime(3),1);
		}
		if ( data.min != null && !testYMDHMS.test(data.min) && !testYMDHM.test(data.min) && !testYMDH.test(data.min) && !testYMD.test(data.min) && !testYM.test(data.min) && !testY.test(data.min) ) {
			data.min = null;
		}
		if ( data.max != null && !testYMDHMS.test(data.max) && !testYMDHM.test(data.max) && !testYMDH.test(data.max) && !testYMD.test(data.max) && !testYM.test(data.max) && !testY.test(data.max) ) {
			data.max = null;
		}
		if ( data.max != null ) {
			data.max = data.max.toDate().formatDateTime(3);
		}
		if ( data.min != null ) {
			data.min = data.min.toDate().formatDateTime(3);
		}
		if ( data.showMode == null || data.showMode == "" ) {
			data.showMode = 0;
		}
		if ( data.eventName == null || data.eventName == "" || data.eventName == "mousedown" ) {
			data.eventName = "click";
		}
	}
	function addDate(d,add) {	//增加减少日数，返回日期
		var newDate = d.toDate().valueOf() + add * 24 * 60 * 60 * 1000;
		newDate = new Date(newDate);
		return newDate.getFullYear() + "-" + ( newDate.getMonth() + 1 ).toString().addZero(2) + "-" + newDate.getDate().toString().addZero(2);
	}
	function getYearWeek(date) {	//返回日期对应当年的第几周
		var yearDayCount = date.toDate().getFullYear() + "-01-01",yearWeek = 0;
		while( yearDayCount < date ) {
			yearDayCount = addDate(yearDayCount,1);
			if ( yearDayCount.toDate().getDay() == 0 ) {
				yearWeek++;
			}
		}
		if ( yearWeek == 0 ) {
			yearWeek = getYearWeek( ( date.toDate().getFullYear() - 1 ) + "-12-31" );
		}
		return yearWeek;
	}
	function getMonthMax(y,m) {	//返回当年月的日数
		if ( m == 4 || m == 6 || m == 9 || m == 11 ) {
			return 30;
		}
		else if ( m == 2 ) {
			if ( ( y % 4 == 0 && y % 100 != 0 ) || y % 400 == 0 ) {
				return 29;
			}
			else {
				return 28;
			}
		}
		else {
			return 31;
		}
	}
	function getDayList(dateNow,forTag) {	//列出当日所在月的列表
		obj.find(".calendaWeek").remove();
		var toYear = dateNow.toDate().getFullYear();
		var toMonth = dateNow.toDate().getMonth() + 1;
		var toDay = dateNow.toDate().getDate();
		var toHour = obj.find(".calendaHour").text();
		var toMinute = obj.find(".calendaMinute").text();
		if ( toHour == "Null" ) {
			toHour = dateNow.toDate().getHours().toString().addZero(2);
		}
		if ( toMinute == "Null" ) {
			toMinute = dateNow.toDate().getMinutes().toString().addZero(2);
		}
		var toSecond = dateNow.toDate().getSeconds().toString().addZero(2);
		var monthFirstDay = dateNow.toDate().formatDateTime(4) + "-01";
		var monthMax = getMonthMax(toYear,toMonth);
		var hoverColor = obj.find(".calendaWeekTitle").attr("bgColor");
		var html = '';
		html += '		<tr bgcolor="#F7EEFF" class="calendaWeek">\n';
		html += '			<td width="12.5%" height="20" bgcolor="' + hoverColor + '" align="center">' + getYearWeek(monthFirstDay) + '</td>\n';
		for ( var i = 0; i < monthFirstDay.toDate().getDay(); i++ ) {
			html += '			<td width="12.5%" class="hasNothing" align="center">&nbsp;</td>\n';
		}
		for ( var i = 1; i <= monthMax; i++ ) {
			if ( ( dateNow.toDate().formatDateTime(4) + "-" + i.toString().addZero(2) ).toDate().getDay() == 0 && i > 1 ) {
				html += '		</tr>\n';
				html += '		<tr bgcolor="#F7EEFF" class="calendaWeek">\n';
				html += '			<td width="12.5%" height="20" bgcolor="' + hoverColor + '" align="center">' + getYearWeek(dateNow.toDate().formatDateTime(4) + "-" + i.toString().addZero(2)) + '</td>\n';
			}
			html += '			<td width="12.5%" align="center" class="calendaDay">' + i + '</td>\n';
		}
		for ( var i = ( dateNow.toDate().formatDateTime(4) + "-" + monthMax ).toDate().getDay(); i < 6; i++ ) {
			html += '			<td width="12.5%" class="hasNothing" align="center">&nbsp;</td>\n';
		}
		html += '		</tr>\n';
		obj.find(".calendaWeekTitle").after(html);
		obj.find(".calendaWeek td").filter( function() {
			return !$(this).hasClass("hasNothing") && $(this).parent().find("td").index($(this)) != 0;
		} ).filter( function() {
			var isDisable = false;
			if ( data.max != null ) {
				isDisable = isDisable || ( ( toYear + "-" + toMonth.toString().addZero(2) + "-" + $(this).text().addZero(2) ) > data.max );
			}
			if ( data.min != null ) {
				isDisable = isDisable || ( ( toYear + "-" + toMonth.toString().addZero(2) + "-" + $(this).text().addZero(2) ) < data.min );
			}
			return isDisable;
		} ).addClass("disable");
		obj.find(".calendaWeek").each( function() {
			$(this).find("td:eq(1):not(.disable)").css("color","#900").end().find("td:eq(7):not(.disable)").css("color","#090");
		} ).hover( function() {
			$(this).attr("bgColor",hoverColor);
		} , function() {
			$(this).attr("bgColor","#F7EEFF");
		} ).find("td").filter( function() {
			return $(this).text() == toDay && $(this).parent().find("td").index($(this)) != 0;
		} ).addClass("selected").css("color","#FFFFFF");
		
		obj.find(".calendaHour").text(toHour).end().find(".calendaMinute").text(toMinute);
		obj.find(".calendaDate").text(dateNow.toDate().formatDateTime(7));
		
		obj.find(".calendaShallow").unbind("click").unbind("contextmenu").eq(0).click( function() {
			var newYear = toYear - 1,newDay = toDay;
			if ( getMonthMax(newYear,toMonth) < newDay ) {
				newDay = getMonthMax(newYear,toMonth);
			}
			var newdate = newYear + "-" + toMonth.toString().addZero(2) + "-" + newDay.toString().addZero(2) + " " + toHour + ":" + toMinute + ":" + toSecond;
			getDayList(newdate,forTag);
		} ).bind("contextmenu", function() {
			selectYear($(this));
			return false;
		} ).end().eq(1).click( function() {
			var newYear = toYear,newMonth = toMonth - 1,newDay = toDay;
			if ( newMonth == 0 ) {
				newYear = toYear - 1;
				newMonth = 12;
			}
			if ( getMonthMax(newYear,newMonth) < newDay ) {
				newDay = getMonthMax(newYear,newMonth);
			}
			var newdate = newYear + "-" + newMonth.toString().addZero(2) + "-" + newDay.toString().addZero(2) + " " + toHour + ":" + toMinute + ":" + toSecond;
			getDayList(newdate,forTag);
		} ).bind("contextmenu", function() {
			selectMonth($(this));
			return false;
		} ).end().eq(2).click( function() {
			var newYear = toYear,newMonth = toMonth + 1,newDay = toDay;
			if ( newMonth == 13 ) {
				newYear = toYear + 1;
				newMonth = 1;
			}
			if ( getMonthMax(newYear,newMonth) < newDay ) {
				newDay = getMonthMax(newYear,newMonth);
			}
			var newdate = newYear + "-" + newMonth.toString().addZero(2) + "-" + newDay.toString().addZero(2) + " " + toHour + ":" + toMinute + ":" + toSecond;
			getDayList(newdate,forTag);
		} ).bind("contextmenu", function() {
			selectMonth($(this));
			return false;
		} ).end().eq(3).click( function() {
			var newYear = toYear + 1,newDay = toDay;
			if ( getMonthMax(newYear,toMonth) < newDay ) {
				newDay = getMonthMax(newYear,toMonth);
			}
			var newdate = newYear + "-" + toMonth.toString().addZero(2) + "-" + newDay.toString().addZero(2) + " " + toHour + ":" + toMinute + ":" + toSecond;
			getDayList(newdate,forTag);
		} ).bind("contextmenu", function() {
			selectYear($(this));
			return false;
		} );
		obj.find(".calendaToday").unbind("click").click( function() {
			getDayList(new Date().formatDateTime(2),forTag);
		} );

		obj.find(".calendaWeek td").filter( function() {
			return !$(this).hasClass("disable") && !$(this).hasClass("hasNothing") && $(this).parent().find("td").index($(this)) != 0;
		} ).click( function() {
			var newdate = toYear + "-" + toMonth.toString().addZero(2) + "-" + $(this).text().toString().addZero(2) + " " + $("#calendaBox .calendaHour").text() + ":" + $("#calendaBox .calendaMinute").text() + ":" + toSecond;
			switch(data.mode) {
				case "yyyy-mm-dd hh:mm:ss":
					newdate = newdate.toDate().formatDateTime(2);
					break;
				case "yyyy年mm月dd日":
					newdate = newdate.toDate().formatDateTime(1);
					break;
				case "yyyy-mm-dd":
					newdate = newdate.toDate().formatDateTime(3);
					break;
				case "yyyy-mm":
					newdate = newdate.toDate().formatDateTime(4);
					break;
				case "yyyy":
					newdate = newdate.toDate().getFullYear();
					break;
				case "hh:mm:ss":
					newdate = newdate.toDate().formatDateTime(5);
					break;
				case "hh:mm":
					newdate = newdate.toDate().formatDateTime(6);
					break;
				case "yyyy-mm-dd hh:mm":
					newdate = newdate.toDate().formatDateTime(3) + " " + newdate.toDate().formatDateTime(6);
					break;
			}
			if ( data.callback ) data.callback.call(forTag,newdate);
			else forTag.val(newdate);
			autoHide();
		} ).hover( function() {
			var newdate = toYear + "-" + toMonth.toString().addZero(2) + "-" + $(this).text().toString().addZero(2);
			$("#calendaBox .calendaText").text(newdate.toDate().formatDateTime(8));
		} , function() {
			$("#calendaBox .calendaText").text(helps.def);
		} );
		$(".calendaDay").setButton( {
			defColor : "#FFFFFF",
			hoverColor : "#CCCCCC",
			downColor : "#33CCFF"
		} );
		
		function selectYear(thisObj) {
			var newLi = "";
			obj.find(".calendaDropList").empty();
			for ( var i = toYear + 5; i >= toYear - 6; i-- ) {
				newLi += "<li";
				if ( i == toYear ) {
					newLi += ' class="selected"';
				}
				newLi += ">" + i + "</li>";
			}
			var top = thisObj.offset().top - obj.offset().top + thisObj.outerHeight(true);
			var left = thisObj.offset().left - obj.offset().left - 2;
			var width = thisObj.width();
			if ( $.browser.msie && $.browser.version == "8.0" ) {
				width += 2;
			}
			obj.find(".calendaDropList").append(newLi).css( {
				"top" : top + "px",
				"left" : left + "px",
				"width" : width + "px"
			} ).show().find("li").mousedown( function() {
				var newYear = $(this).text(),newDay = toDay;
				if ( getMonthMax(newYear,toMonth) < newDay ) {
					newDay = getMonthMax(newYear,toMonth);
				}
				var newdate = newYear + "-" + toMonth + "-" + newDay.toString().addZero(2) + " " + toHour + ":" + toMinute + ":" + toSecond;
				getDayList(newdate,forTag);
			} );
		}
		function selectMonth(thisObj) {
			var newLi = "";
			obj.find(".calendaDropList").empty();
			for ( var i = 0; i < 12; i++ ) {
				newLi += "<li";
				if ( i == parseInt(toMonth) - 1 ) {
					newLi += ' class="selected"';
				}
				newLi += ' month="' + ( i + 1 ).toString().addZero(2) + '">' + numberChinese[i] + '月</li>';
			}
			var top = thisObj.offset().top - obj.offset().top + thisObj.outerHeight(true);
			var left = thisObj.offset().left - obj.offset().left - 2;
			var width = thisObj.width();
			if ( $.browser.msie && $.browser.version == "8.0" ) {
				width += 2;
			}
			obj.find(".calendaDropList").append(newLi).css( {
				"top" : top + "px",
				"left" : left + "px",
				"width" : width + "px"
			} ).show().find("li").mousedown( function() {
				var newMonth = $(this).attr("month"),newDay = toDay;
				if ( getMonthMax(toYear,newMonth) < newDay ) {
					newDay = getMonthMax(toYear,newMonth);
				}
				var newdate = toYear + "-" + newMonth + "-" + newDay.toString().addZero(2) + " " + toHour + ":" + toMinute + ":" + toSecond;
				getDayList(newdate,forTag);
			} );
		}
	}
	function autoHelp() {	//显示帮助
		var help = "jQuery日期插件\n";
		help += "\n";
		help += "Author：Keboy\n";
		help += "Version：v1.4.1\n";
		help += "Date：2014-11-17\n";
		help += "\n";
		help += "日期选择：\n";
		help += "　　左键点击 << 、 >> 选择年份，右键点击 << 、 >> 弹出年份选择列表\n";
		help += "　　左键点击 < 、 > 选择月份，右键点击 < 、 > 弹出月份选择列表\n";
		help += "　　左键点击 日期对应的数字 选择日\n";
		help += "\n";
		help += "时间选择：\n";
		help += "　　左键点击时间，以增加时间\n";
		help += "　　shift+左键点击时间，以减少时间\n";
		help += "　　左右拖动时间，以快速调整时间\n";
		alert(help);
	}
	function autoShow() {	//显示
		switch( data.showMode ) {
			case 1:
				obj.slideDown("fast");
				break;
			case 2:
				obj.show("fast");
				break;
			case 3:
				obj.fadeIn("fast");
				break;
			default:
				obj.show();
				break;
		}
	}
	function autoHide() {	//隐藏
		obj.hide();
		$("#calendaBox .calendaHour,#calendaBox .calendaMinute").text("Null");
		openCalenda = false;
	}
	function getX() {	//获取鼠标x轴坐标
		var cx = event.x?event.x:event.pageX;
		if ( typeof(cx) == "undefined" ) {
			cx = 0;
		}
		cx += Math.max(document.documentElement.scrollLeft,document.body.scrollLeft);
		return cx;
	}
	function getY() {	//获取鼠标y轴坐标
		var cy = event.y?event.y:event.pageY;
		if ( typeof(cy) == "undefined" ) {
			cy = 0;
		}
		cy += Math.max(document.documentElement.scrollTop,document.body.scrollTop);
		return cy;
	}
	function addTime(max,aod,obj,forObj) {	//增加减少天数
		var now = parseFloat(obj.text());
		if ( aod ) {
			now++;
		}
		else {
			now--;
		}
		if ( now < 0 ) {
			now = max - 1;
			if ( forObj != null ) {
				addTime(24,aod,forObj);
			}
		}
		else if ( now >= max ) {
			now = 0;
			if ( forObj != null ) {
				addTime(24,aod,forObj);
			}
		}
		now = now.toString().addZero(2);
		obj.text(now);
	}
	function setHelp() {	//设置提示语显示
		var objText = $("#calendaBox .calendaText");
		$("#calendaBox .calendaHelp").hover( function() {
			objText.text(helps.help);
		} , function() {
			objText.text(helps.def);
		} );
		$("#calendaBox .calendaDate,#calendaBox .calendaText").hover( function() {
			objText.text(helps.drag);
		} , function() {
			objText.text(helps.def);
		} );
		$("#calendaBox .calendaClose").hover( function() {
			objText.text(helps.close);
		} , function() {
			objText.text(helps.def);
		} );
		$("#calendaBox .calendaShallow").eq(0).hover( function() {
			objText.text(helps.prevYear);
		} , function() {
			objText.text(helps.def);
		} ).end().eq(1).hover( function() {
			objText.text(helps.prevMonth);
		} , function() {
			objText.text(helps.def);
		} ).end().eq(2).hover( function() {
			objText.text(helps.nextMonth);
		} , function() {
			objText.text(helps.def);
		} ).end().eq(3).hover( function() {
			objText.text(helps.nextYear);
		} , function() {
			objText.text(helps.def);
		} );
		$("#calendaBox .calendaToday").hover( function() {
			objText.text(helps.today);
		} , function() {
			objText.text(helps.def);
		} );
		$("#calendaBox .calendaHour,#calendaBox .calendaMinute").hover( function() {
			objText.text(helps.time);
		} , function() {
			objText.text(helps.def);
		} );
	}
};