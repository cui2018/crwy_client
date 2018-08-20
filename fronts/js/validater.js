function validater() {
	this.name = "数据验证类";
	this.author = "Keboy";
	this.version = "v1.4.3";
	this.create = "2014-11-13";
}
validater.prototype = {
	lang : "cn",
	err : {
		"cn" : {
			"required"		: "%s不能为空",
			"email"			: "%s必须是一个Email地址",
			"url"			: "%s必须是一个URL地址",
			"ip"			: "%s必须是一个IP地址",
			"idcard"		: "%s必须是一个有效的身份证号",
			"tel"			: "%s必须是一个电话号码",
			"qq"			: "%s必须是一个QQ号码",
			"postcode"		: "%s必须是一个邮政编码",
			"idNum"			: "%s必须是一个有效的身份证号码",
			"datetime"		: "%s必须是一个日期时间",
			"min"			: "%s长度不得少于%s个字符",
			"max"			: "%s长度不得超过%s个字符",
			"exact"			: "%s长度必须是%s个字符",
			"alpha"			: "%s只能是字母字符",
			"alpha_num"		: "%s只能是字母和数字字符",
			"alpha_dash"	: "%s只能是字母、数字和下划线",
			"alpha_first"	: "%s必须以字母开头",
			"num"			: "%s只能是数字",
			"int"			: "%s只能是一个整数",
			"match"			: "%s与必须与%s相同",
			"less_than"		: "%s必须是一个小于%s的数字",
			"more_than"		: "%s必须是一个大于%s的数字",
			"max_check"		: "%s最多能选择%s个选项",
			"min_check"		: "%s至少要选择%s个选项",
			"check_one"		: "请选择一个%s选项",
			"regex"			: "%s格式不正确",
			"ajaxFail"		: "数据读取失败"
		},
		"en" : {
			"required"		: "The %s field is required",
			"email"			: "The %s field must contain a valid email address",
			"url"			: "The %s field must contain a valid URL",
			"ip"			: "The %s field must contain a valid IP",
			"idcard"		: "The %s field must contain a valid id number",
			"tel"			: "The %s field must contain a valid telephone",
			"qq"			: "The %s field must contain a valid QQ number",
			"postcode"		: "The %s field must contain a valid post code",
			"idNum"			: "The %s field must contain a valid identity card number",
			"datetime"		: "The %s field must contain a valid date and time",
			"min"			: "The %s field must be at least %s characters in length",
			"max"			: "The %s field can not exceed %s characters in length",
			"exact"			: "The %s field must be exactly %s characters in length",
			"alpha"			: "The %s field may only contain alphabetical characters",
			"alpha_num"		: "The %s field may only contain alpha-numeric characters",
			"alpha_dash"	: "The %s field may only contain alpha-numeric characters, and underscores",
			"alpha_first"	: "The %s must start with a alphabetical characters",
			"num"			: "The %s field must contain only numbers",
			"int"			: "The %s field must contain an integer",
			"match"			: "The %s field does not match the %s field",
			"less_than"		: "The %s field must contain a number less than %s",
			"more_than"		: "The %s field must contain a number greater than %s",
			"max_check"		: "The %s please select up to %s options",
			"min_check"		: "The %s please select at least %s options",
			"check_one"		: "Please select a %s option",
			"regex"			: "The %s field is not in the correct format",
			"ajaxFail"		: "Data read failure"
		}
	},
	regular : {
		"required"		: "^(.|\\n)+$",
		"email"			: "^([a-z0-9\\+_\\-]+)(\\.[a-z0-9\\+_\\-]+)*@([a-z0-9\\-]+\\.)+[a-z]{2,6}$",
		"url"			: "^[a-z]+://[^\\s]+$",
		"ip"			: "^\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}$",
		"idcard"		: "^([a-z0-9]{15}|[a-z0-9]{18})$",
		"tel"			: "^(\\d+|\\d+\\-{1}\\d+|\\d+\\-{1}\\d+\\-{1}\\d+)$",
		"qq"			: "^[1-9]{1}\\d+$",
		"postcode"		: "^[1-9]{1}\\d{5}$",
		"min"			: "^(.|\\n){(:num),}$",
		"max"			: "^(.|\\n){0,(:num)}$",
		"exact"			: "^(.|\\n){(:num)}$",
		"alpha"			: "^[A-Za-z]+$",
		"alpha_num"		: "^[A-Za-z0-9]+$",
		"alpha_dash"	: "^\\w+$",
		"alpha_first"	: "^[A-Za-z][.\\n]*",
		"num"			: "^(\\d+|\\d+\\.\\d+)$",
		"int"			: "^-?\\d+$"
	},
	rules : new Array(),
	rightHtml : new String(),
	rightHtmlEnd : new String(),
	rightWord : new String(),
	wrongHtml : '<span style="color:red;">',
	wrongHtmlEnd : '</span>',
	wildcard : "%s",
	regularcard : "(:num)",
	returns : true,
	checkOver : new Array(),
	setRightHtml : function(start,end) {
		this.rightHtml = start ? start : "";
		this.rightHtmlEnd = end ? end : "";
	},
	setWrongHtml : function(start,end) {
		this.wrongHtml = start ? start : "";
		this.wrongHtmlEnd = end ? end : "";
	},
	run : function(bind) {
		var $this = this;
		bind = ( bind == null || bind == "blur" ) ? "blur" : bind + " blur";
		bind = bind == "input blur" ? "propertychange input blur" : bind;
		bind = "blur";
		$.each(this.rules, function(i,obj) {
			if ( obj.prompt != null ) {
				$(obj.field).focus( function() {
					if ( $(this).val() == "" ) {
						if ( ( typeof obj.notice ).toLowerCase() == "string" ) {
							$(obj.notice).html(obj.prompt);
						}
						else if ( ( typeof obj.notice ).toLowerCase() == "function" ) {
							obj.notice.call($(obj.field), {
								obj : obj,
								get : false,
								err : obj.prompt,
								errHtml : obj.prompt
							} );
						}
					}
				} );
			}
			$(obj.field).bind(bind, function() {
				$this.checkOne(obj);
			} );
		} );
	},
	check : function(fn) {
		this.returns = true;
		this.checkOver = new Array();
		var $this = this;
		$.each(this.rules, function(i,obj) {
			$this.checkOne(obj);
		} );
		if ( fn != null ) {
			fn.call(this,this.checkOver);
		}
		return this.returns;
	},
	checkOne : function(obj) {
		var $this = this;
		var object = $(obj.field);
		if ( object.length == 0 ) {
			return;
		}
		var val = object.val();
		var rules = obj.rules.split("|");
		var right = true, reason, num;
		$.each(rules, function(j,v) {
			var p = [], x = v.indexOf("[");
			if ( x >= 0 ) {
				p = v.slice(x + 1,v.length - 1).split("][");
				v = v.slice(0,x);
			}
			switch ( v ) {
				case "trim":
					val = val.replace(/^( +)|( +)$/g,"");
					object.val(val);
					break;
				case "trim_all":
					val = $.trim(val);
					object.val(val);
					break;
				case "required":
					right = ( val.match($this.getRegular(v,p[0])) != null );
					break;
				case "idNum":
					right = ( val == "" || $this.checkIdNum(val) );
					break;
				case "datetime":
					p[0] = p.length > 0 ? p[0] : "%Y-%m-%d %H:%i:%s";
					right = ( val == "" || $this.checkDateTime(val,p[0]) );
					break;
				case "match":
					right = ( val == $(p[0]).val() );
					p[0] = p[1];
					break;
				case "less_than":
					right = ( val == "" || ( /^(\d+|\d+\.\d+)$/.test(val) && /^\d+$/.test(p[0]) && parseFloat(val) < parseFloat(p[0]) ) );
					break;
				case "more_than":
					right = ( val == "" || ( /^(\d+|\d+\.\d+)$/.test(val) && /^\d+$/.test(p[0]) && parseFloat(val) > parseFloat(p[0]) ) );
					break;
				case "max_check":
					right = /^\d+$/.test(p[0]) && object.filter( function() {
						return $(this).attr("checked");
					} ).length <= parseFloat(p[0]);
					break;
				case "min_check":
					right = /^\d+$/.test(p[0]) && object.filter( function() {
						return $(this).attr("checked");
					} ).length >= parseFloat(p[0]);
					break;
				case "check_one":
					right = object.filter( function() {
						return $(this).attr("checked");
					} ).length == 1;
					break;
				case "ajax":
					var ajaxBack = $this.ajax(p[0],object);
					right = ajaxBack.result;
					v = ajaxBack.err;
					break;
				default:
					right = ( val == "" || val.match($this.getRegular(v,p[0])) != null );
					break;
			}
			if ( !right ) {
				reason = v;
				num = p[0];
				return false;
			}
		} );
		if ( ( typeof obj.notice ).toLowerCase() == "string" ) {
			var word;
			if ( right ) {
				word = $this.rightHtml + ( obj.rightWord ? obj.rightWord : $this.rightWord ) + $this.rightHtmlEnd;
			}
			else {
				word = $this.wrongHtml + $this.getWord(reason,obj.label,num) + $this.wrongHtmlEnd;
			}
			this.checkOver.push( {
				obj : obj,
				get : right,
				err : word
			} );
			$(obj.notice).html(word);
		}
		else if ( ( typeof obj.notice ).toLowerCase() == "function" ) {
			var word, wordHtml;
			if ( right ) {
				word = obj.rightWord ? obj.rightWord : $this.rightWord;
				wordHtml = $this.rightHtml + word + $this.rightHtmlEnd;
			}
			else {
				word = $this.getWord(reason,obj.label,num);
				wordHtml = $this.wrongHtml + word + $this.wrongHtmlEnd;
			}
			this.checkOver.push( {
				obj : obj,
				get : right,
				err : word,
				errHtml : wordHtml
			} );
			obj.notice.call(object,this.checkOver[this.checkOver.length - 1]);
		}
		this.returns = this.returns && right;
	},
	getWord : function(reason,label,num) {
		if ( !label ) {
			return "";
		}
		else {
			var err = this.err[this.lang][reason];
			if ( !err ) {
				err = this.err[this.lang]["regex"];
			}
			err = err.replace(this.wildcard,label);
			if ( num ) {
				err = err.replace(this.wildcard,num);
			}
			return err;
		}
	},
	getRegular : function(rule,num) {
		var regular = this.regular[rule];
		if ( regular ) {
			return new RegExp(regular.replace(this.regularcard,num));
		}
		else {
			return "";
		}
	},
	setErr : function(err,value,regular) {
		if ( typeof err == "string" ) {
			this.err[this.lang][err] = value;
			this.regular[err] = regular;
		}
		else if ( typeof err == "object" ) {
			for ( var i in err ) {
				if ( typeof err[i] == "string" ) {
					this.err[this.lang][i] = err[i];
				}
				else if ( typeof err[i] == "object" ) {
					this.err[this.lang][i] = err[i][0];
					if ( err[i].length > 1 ) {
						this.regular[i] = err[i][1];
					}
				}
			}
		}
	},
	ajax : function(param,$this) {
		var getBack = new Object();
		if ( !param ) {
			getBack.result = false;
			getBack.err = "ajaxFail";
			return getBack;
		}
		var arr = param.split(";");
		if ( arr.length == 0 ) {
			getBack.result = false;
			getBack.err = "ajaxFail";
			return getBack;
		}
		var ajax = {
			type : "POST",
			cache : false,
			async : false,
			dataType : "text",
			error : function() {
				getBack.result = false;
				getBack.err = "ajaxFail";
			},
			success : function(result) {
				if ( parseInt(result) == 1 ) {
					getBack.result = true;
				}
				else {
					getBack.result = false;
				}
				getBack.err = ajax.err;
			}
		};
		$.each(arr, function(i,item) {
			var one = item.split("(");
			if ( one.length > 1 ) {
				ajax[one[0]] = one[1].replace(")","");
			}
		} );
		if ( !ajax.url ) {
			getBack.result = false;
			getBack.err = "ajaxFail";
		}
		if ( !ajax.data ) {
			ajax.data = "";
		}
		else {
			var query = ajax.data.split("&");
			$.each(query, function(i,item) {
				var one = item.split("=");
				if ( one.length == 1 ) {
					one[1] = "";
				}
				if ( one[1].indexOf(".val") > 0 ) {
					var selector = one[1].split(".")[0];
					var object = $this;
					if ( selector != "this" ) {
						object = $(selector);
					}
					switch ( object.length ) {
						case 0:
							one[1] = "";
							break;
						case 1:
							one[1] = object.val();
							break;
						default:
							one[1] = object.filter( function() {
								return $(this).attr("checked");
							} ).map( function() {
								return $(this).val();
							} ).get().join(",");
							break;
					}
				}
				query[i] = one.join("=");
			} );
			ajax.data = query.join("&");
		}
		$.ajax(ajax);
		return getBack;
	},
	checkIdNum : function(idcard) {
		if ( idcard == "" ) {
			return true;
		}

		var area = { "11" : "北京", "12" : "天津", "13" : "河北", "14" : "山西", "15" : "内蒙古", "21" : "辽宁", "22" : "吉林", "23" : "黑龙江", "31" : "上海", "32" : "江苏", "33" : "浙江", "34" : "安徽", "35" : "福建", "36" : "江西", "37" : "山东", "41" : "河南", "42" : "湖北", "43" : "湖南", "44" : "广东", "45" : "广西", "46" : "海南", "50" : "重庆", "51" : "四川", "52" : "贵州", "53" : "云南", "54" : "西藏", "61" : "陕西", "62" : "甘肃", "63" : "青海", "64" : "宁夏", "65" : "新疆", "71" : "台湾", "81" : "香港", "82" : "澳门", "91" : "国外" };
		var Y,JYM;
		var S,M;
		var idcard_array = new Array();
		idcard_array = idcard.split("");
		
		//地区检验
		if ( area[parseInt(idcard.substr(0,2))] == null ) {
			return false;
		}
		
		//身份号码位数及格式检验
		switch (idcard.length) {
			case 15:
				if (
					( parseInt(idcard.substr(6,2)) + 1900 ) % 4 == 0
					|| (
						( parseInt(idcard.substr(6,2)) + 1900 ) % 100 == 0 && ( parseInt(idcard.substr(6,2)) + 1900 ) % 4 == 0
					)
				) {
					//测试出生日期的合法性
					ereg = /^[1-9][0-9]{5}[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9]))[0-9]{3}$/;
				}
				else {
					//测试出生日期的合法性
					ereg = /^[1-9][0-9]{5}[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8]))[0-9]{3}$/;
				}
				if ( ereg.test(idcard) ) {
					return true;
				}
				else {
					return false;
				}
				break;
			case 18:
				//18位身份号码检测
				//出生日期的合法性检查
				//闰年月日:((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9]))
				//平年月日:((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8]))
				if ( parseInt(idcard.substr(6,4)) % 4 == 0 || ( parseInt(idcard.substr(6,4)) % 100 == 0 && parseInt(idcard.substr(6,4)) % 4 == 0 ) ) {
					//闰年出生日期的合法性正则表达式
					ereg = /^[1-9][0-9]{5}19[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9]))[0-9]{3}[0-9Xx]$/;
				}
				else {
					//平年出生日期的合法性正则表达式
					ereg = /^[1-9][0-9]{5}19[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8]))[0-9]{3}[0-9Xx]$/;
				}
				if ( ereg.test(idcard) ) {	//测试出生日期的合法性
					//计算校验位
					S = ( parseInt(idcard_array[0]) + parseInt(idcard_array[10]) ) * 7
					+ ( parseInt(idcard_array[1]) + parseInt(idcard_array[11]) ) * 9
					+ ( parseInt(idcard_array[2]) + parseInt(idcard_array[12]) ) * 10
					+ ( parseInt(idcard_array[3]) + parseInt(idcard_array[13]) ) * 5
					+ ( parseInt(idcard_array[4]) + parseInt(idcard_array[14]) ) * 8
					+ ( parseInt(idcard_array[5]) + parseInt(idcard_array[15]) ) * 4
					+ ( parseInt(idcard_array[6]) + parseInt(idcard_array[16]) ) * 2
					+ parseInt(idcard_array[7]) * 1
					+ parseInt(idcard_array[8]) * 6
					+ parseInt(idcard_array[9]) * 3;
					Y = S % 11;
					M = "F";
					JYM = "10X98765432";
					M = JYM.substr(Y,1);	//判断校验位
					if ( M == idcard_array[17] ) {
						return true;	//检测ID的校验位
					}
					else {
						return false;
					}
				}
				else {
					return false;
				}
				break;
			default:
				return false;
				break;
		}
	},
	checkDateTime : function(datatime,rule) {
		var $Y = "([0-9]{1}[0-9]?|[1-9]{1}[0-9]{1,3})";
		var $m = "(0?[1-9]{1}|1{1}[0-2]{1})";
		var $d = "(0?[1-9]{1}|[1-2]{1}[0-9]{1}|3{1}[0-1]{1})";
		var $H = "(0?[0-9]{1}|1{1}[0-9]{1}|2{1}[0-3]{1})";
		var $i = "(0?[0-9]{1}|[1-5]{1}[0-9]{1})";
		var $s = "(0?[0-9]{1}|[1-5]{1}[0-9]{1})";
		
		var str = rule.match(/%Y|%m|%d|%H|%i|%s/g);
		var map = new Array();
		for ( var i in str ) {
			map[str[i]] = parseInt(i);
		}
		
		rule = "^" + rule.replace(/%Y/g,$Y).replace(/%m/g,$m).replace(/%d/g,$d).replace(/%H/g,$H).replace(/%i/g,$i).replace(/%s/g,$s) + "$";
		var checks = datatime.match(rule);
		if ( checks != null ) {
			map["year"] = parseInt(checks[map["%Y"] + 1],10);
			map["month"] = parseInt(checks[map["%m"] + 1],10);
			map["day"] = parseInt(checks[map["%d"] + 1],10);
			if ( map["month"] == 4 || map["month"] == 6 || map["month"] == 9 || map["month"] == 11 ) {
				return map["day"] <= 30;
			}
			else if ( map["month"] == 2 ) {
				if ( ( map["year"] % 4 == 0 && map["year"] % 100 != 0 ) || map["year"] % 400 == 0 ) {
					return map["day"] <= 29;
				}
				else {
					return map["day"] <= 28;
				}
			}
			else {
				return map["day"] <= 31;
			}
		}
		return false;
	}
};