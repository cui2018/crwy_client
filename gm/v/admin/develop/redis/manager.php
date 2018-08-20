<?php
function redis_remark($prefix,$key) {
	$config = array(
		'prop' => '道具配置',
		'setting' => '系统配置',
		'subject' => '题目配置',
		'class' => '主分类配置',
		'gift(\d+)' => '礼包%s领取记录',
		'log' => 'log服入库队列',
		'server_users' => '服务器在线人数记录',
		'shortcutprice' => '添加桌面用户记录',
		'user' => '用户数据',
		'subcode' => '关注用户记录',
		'server' => '服务器配置',
		'sign' => '签到记录',
		'subject_difficulty' => '题目以难度划分配置',
		'shop' => '商店配置',
		'user_rank' => '用户排名记录',
		'classes' => '子分类配置',
		'rank' => '用户排行榜列表',
		'error_log' => 'log入库失败记录',
		'wechat' => '微信公众号token'
	);
	if ( array_isset($config,$key) ) return array_value($config,$key);
	else {
		foreach ( $config as $k => $v ) {
			preg_match_all('/^' . $k . '$/',$key,$matches);
			if ( !$matches[0] ) continue;
			return str_replace('%s','ID:' . $matches[1][0],$v);
			break;
		}
	}
}
?>
<style>
.rbg {position:fixed; top:0; right:0; bottom:0; left:0; background-color:rgba(0,0,0,0.4);}
.rbox {position:absolute; top:5%; right:3%; bottom:5%; left:3%; background-color:#FFF; border:1px #DEDEDE solid; box-sizing:border-box; box-shadow:5px 5px 5px rgba(0,0,0,0.4); overflow:hidden;}
.rbox h3 {position:absolute; top:30px; right:2%; left:2%; height:36px; background-color:#036; color:#FFF; margin:0; padding:0 10px; font:bold 14px/36px "微软雅黑"; box-sizing:border-box;}
.rbox h3 .curr {display:inline-block; width:30px; border:1px #DEDEDE solid; line-height:16px; height:16px; padding:2px; color:#333; margin:0 2px; text-align:center;}
.rbox h3 .seastr {display:inline-block; width:150px; border:1px #DEDEDE solid; line-height:16px; height:16px; padding:2px; color:#333; text-align:center;}
.rbox h3 .close {float:right; margin-top:6px;}
.rdata {position:absolute; top:80px; left:2%; bottom:30px; width:48%; border:1px #DEDEDE solid; box-sizing:border-box; overflow-x:hidden; overflow-y:auto;}
.rdata li {height:25px; clear:both; border-bottom:1px #DEDEDE dashed; padding:3px 2%; font:14px/25px "微软雅黑";}
.rdata li p {float:left; height:25px;}
.rdata li p.kv {width:75%; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; border-right:1px #DEDEDE dashed; box-sizing:border-box; padding:0 5px;}
.rdata li p.k {width:10%; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; border-right:1px #DEDEDE dashed; box-sizing:border-box; padding:0 5px;}
.rdata li p.v {width:65%; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; border-right:1px #DEDEDE dashed; box-sizing:border-box; padding:0 5px;}
.rdata li p.ops {width:25%; text-align:center;}
.rdata li p.ops button {margin:0 2px;}
.rdata li p.ops .save {display:none;}
.rdata li p.ops .change {display:none;}
.rdata li p.ops .cancel {display:none;}
.rop {position:absolute; top:80px; right:2%; bottom:30px; width:47%; border:1px #DEDEDE solid; padding:20px; box-sizing:border-box; line-height:30px; word-break:break-all; overflow-x:hidden; overflow-y:auto; color:#063; font-family:Tahoma, Geneva, sans-serif;}
.rop textarea {width:100%; height:100%; border:1px #DEDEDE solid; padding:10px; box-sizing:border-box; line-height:25px; resize:none;}
.rop .key {border:1px #DEDEDE solid; width:50px; line-height:16px; height:16px; padding:2px; text-align:center; color:#900; font-weight:bold; font-family:Tahoma, Geneva, sans-serif;}
.rop .value {border:0; border-bottom:1px #DEDEDE solid; width:65%; line-height:16px; height:16px; padding:2px; color:#333;}
.rop .add {display:inline-block; background:url(<?php echo uv('/images/admin/jia.gif'); ?>) no-repeat center/100% 100%; width:9px; height:9px; margin:0 2px; cursor:pointer;}
.rop .reduce {display:inline-block; background:url(<?php echo uv('/images/admin/jian.gif'); ?>) no-repeat center/100% 100%; width:9px; height:9px; margin:0 2px; cursor:pointer;}
.rop .s2o {display:inline-block; background:url(<?php echo uv('/images/admin/edit.gif'); ?>) no-repeat center/100% 100%; width:14px; height:15px; margin:0 2px; cursor:pointer;}
</style>
<script>
var serv = "<?php echo $serv; ?>";
$( function() {
	$(".data").tap( function() {
		var key = $(this).data("key");
		$.api("<?php echo ua('/develop/rediser/data'); ?>", {
			serv : serv,
			key : key
		}, function() {
			switch ( this.type ) {
				case "string":
					redis.showString(key,this.data);
					break;
				case "hash":
					redis.showHash(key,this.data,this.all,this.pages);
					break;
				case "list":
					redis.showList(key,this.data,this.all,this.pages);
					break;
			}
		} );
	} );
	$(".delete").tap( function() {
		var key = $(this).data("key");
		confirm("是否确定删除键“" + key + "”，删除后将不能恢复？！", function(is) {
			if ( is ) confirm("请再次确认删除键“" + key + "”？！", function(is) {
				if ( is ) $.api("<?php echo ua('/develop/rediser/delkey'); ?>", {
					serv : serv,
					key : key
				}, function() {
					dialog("删除成功！", function() {
						refresh();
					} );
				} );
			} );
		} );
	} );
	$(".line").hover( function() {
		$(this).siblings(".line").andSelf().css3("background:#FFF;");
	}, function() {
		$(this).siblings(".line").andSelf().css3("background:#EFF5FA;");
	} );
	redis.init();
} );
var redis = {
	o : new Object(),
	init : function() {
		var that = this;
		$(".add").live("click", function() {
			var refer = $(this).parent().children("label").length == 0 ? $(this).next() : $(this).parent().children("label:last");
			var depth = parseInt($(this).data("depth")) + 1;
			refer.after('<label>' + '　　'.repeat(depth) + '<input type="text" class="key"><a href="javascript:void(0);" class="reduce"></a> : <input type="text" class="value"><a href="javascript:void(0);" class="s2o" data-depth="' + depth + '"></a><br></label>');
		} );
		$(".reduce").live("click", function() {
			var that = $(this);
			confirm("是否确定删除此项？", function(is) {
				if ( is ) that.parent().remove();
			} );
		} );
		$(".s2o").live("click", function() {
			var that = $(this);
			var depth = parseInt($(this).data("depth"));
			confirm("是否确定将此项切换为对象数据类型？", function(is) {
				if ( is ) {
					that.prev().remove().end().replaceWith('<span>array(<a href="javascript:void(0);" class="add" data-depth="' + depth + '"></a><br><label>' + '　　'.repeat(depth + 1) + '<input type="text" class="key"><a href="javascript:void(0);" class="reduce"></a> : <input type="text" class="value"><a href="javascript:void(0);" class="s2o" data-depth="' + ( depth + 1 ) + '"></a><br></label>' + '　　'.repeat(depth) + ')</span>');
				}
			} );
		} );
		$(".close").live("click", function() {
			that.o.all.remove();
		} );
		return this;
	},
	showString : function(key,data) {
		var box = this.createBox();
		var t = this.getType(data);
		box.title.html('<button class="close">关闭</button>键：' + key + "　　　键数据类型：字符串　　　值数据类型：" + t.name);
		box.data.append('<li><p class="kv d">' + t.data + '</p><p class="ops"><button class="edit">修改</button><button class="save">保存</button><button class="change">切换格式</button><button class="cancel">取消</button></p></li>');
		this.setOps(box,key,"string");
		return this;
	},
	showHash : function(key,data,all,pages,curr) {
		var that = this;
		var box = curr ? this.o : this.createBox();
		if ( curr ) {
			box.data.empty();
			box.op.empty();
		}
		curr = curr ? curr : 1;
		box.title.html('<button class="close">关闭</button>键：' + key + "　　　键数据类型：哈希散列　　　共" + all + '条，每页100条，当前<input type="text" class="curr" value="' + curr + '">/' + pages + '页　　　<input type="text" class="seastr" placeholder="搜索键"> <button class="search">搜索</button>');
		$.each(data, function(k,v) {
			var t = that.getType(v);
			box.data.append('<li><p class="k" title="' + k + '">' + k + '</p><p class="v d">' + t.data + '</p><p class="ops"><button class="edit">修改</button><button class="del">删除</button><button class="save">保存</button><button class="change">切换格式</button><button class="cancel">取消</button></p></li>');
		} );
		this.setOps(box,key,"hash");
		box.title.children(".curr").blur( function() {
			var new_curr = $(this).val();
			if ( isNaN(new_curr) ) {
				dialog("页码必须是数字");
				return;
			}
			new_curr = parseInt(new_curr);
			if ( new_curr < 1 || new_curr > pages ) new_curr = 1;
			$.api("<?php echo ua('/develop/rediser/getHash'); ?>", {
				serv : serv,
				key : key,
				curr : new_curr
			}, function() {
				that.showHash(key,this,all,pages,new_curr);
			} );
		} );
		return this;
	},
	createBox : function() {
		var html = '<div class="rbg"><div class="rbox"><h3></h3><ul class="rdata"></ul><div class="rop"></div></div></div>';
		var box = $(html).appendTo(document.body);
		this.o = {
			all : box,
			stage : box.children(".rbox"),
			title : box.find("h3"),
			data : box.find(".rdata"),
			op : box.find(".rop")
		};
		return this.o;
	},
	setOps : function(box,key,type) {
		var that = this;
		box.data.find(".ops").each( function() {
			$(this).children(".edit").tap( function() {
				var data = $(this).closest("li").children(".d").text();
				try {
					data = $.parseJSON(data);
				}
				catch ( e ) {}
				var t = that.getType(data);
				box.stage.find(".edit").hide();
				$(this).parent().children(".del").hide();
				if ( t.type == "array" || t.type == "object" ) box.op.html(that.formatData(data,t.type));
				else box.op.html('<textarea></textarea>').children("textarea").val(JSON.stringify(data));
				$(this).parent().children(".save,.change,.cancel").show();
			} );
			$(this).children(".save").tap( function() {
				var op = $(this).parent();
				var data = box.op.children("textarea").length == 0 ? that.getFormatData(box.op.children("span")) : box.op.children("textarea").val();
				var index = type == "string" ? "" : op.parent().children(".k").text();
				$.api("<?php echo ua('/develop/rediser/save'); ?>", {
					serv : serv,
					key : key,
					index : index,
					data : data,
					type : type
				}, function() {
					op.prev().text(JSON.stringify(data));
					op.children(".save,.change,.cancel").hide();
					box.stage.find(".edit,.del").show();
					box.op.empty();
				} );
			} );
			$(this).children(".change").tap( function() {
				if ( box.op.children("textarea").length == 0 ) {
					var data = that.getFormatData(box.op.children("span"));
					if ( data ) box.op.html('<textarea></textarea>').children("textarea").val(JSON.stringify(data));
					else dialog("抱歉，请填写完整数据结构");
				}
				else {
					var data = box.op.children("textarea").val();
					try {
						data = $.parseJSON(data);
					}
					catch ( e ) {
						dialog("数据格式不是JSON格式，不能切换");
						return;
					}
					var t = that.getType(data);
					var html = that.formatData(data,t.type);
					box.op.html(html);
				}
			} );
			$(this).children(".cancel").tap( function() {
				$(this).parent().children(".save,.change,.cancel").hide();
				box.stage.find(".edit,.del").show();
				box.op.empty();
			} );
		} );
		return this;
	},
	getType : function(data) {
		var name = "未知";
		var type = $.type(data);
		switch ( type ) {
			case "array":
				name = "数组";
				data = JSON.stringify(data);
				break;
			case "object":
				name = "对象";
				data = JSON.stringify(data);
				break;
			case "number":
				name = "数字";
				break;
			case "string":
				name = "字符串";
				break;
		}
		return {
			type : type,
			name : name,
			data : data
		};
	},
	formatData : function(data,type) {
		if ( type == "number" || type == "string" ) return data;
		else return this.jsonFormat(data,0);
	},
	jsonFormat : function(data,depth) {
		var that = this;
		var html = '<span>array(<a href="javascript:void(0);" class="add" data-depth="' + depth + '"></a><br>';
		$.each(data, function(key,item) {
			var isObj = $.type(item) == "array" || $.type(item) == "object";
			var next = isObj ? that.jsonFormat(item,depth + 1) : '<input type="text" class="value" value="' + item.toString().format() + '"><a href="javascript:void(0);" class="s2o" data-depth="' + (depth + 1) + '"></a>';
			html += '<label>' + '　　'.repeat(depth + 1) + '<input type="text" class="key" value="' + key + '"><a href="javascript:void(0);" class="reduce"></a> : ' + next + '<br></label>';
		} );
		html += '　　'.repeat(depth) + ')</span>';
		return html;
	},
	getFormatData : function(span) {
		var that = this;
		var data = new Object();
		var returns = true;
		span.children("label").children(".key").each( function() {
			if ( !$(this).val() ) {
				returns = false;
				return false;
			}
			if ( $(this).next().next().is("span") ) {
				data[$(this).val()] = that.getFormatData($(this).next().next());
				if ( data[$(this).val()] === false ) {
					returns = false;
					return false;
				}
			}
			else data[$(this).val()] = $(this).next().next().val();
		} );
		return returns ? data : false;
	}
};
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="lists">
  <tr class="title">
    <td align="center" colspan="4"><?php echo $title; ?></td>
  </tr>
  <tr class="title">
    <td width="10%" align="center">分组名</td>
    <td width="20%" align="center">键名</td>
    <td>备注</td>
    <td width="10%" align="center">操作</td>
  </tr>
<?php foreach ($prev as $key => $item): ?>
  <?php foreach ($item as $i => $keys): ?>
  <tr>
    <?php if ( $i == 0 ): ?>
    <td align="center" class="lineall" rowspan="<?php echo count($item); ?>"><?php echo $key; ?></td>
    <?php endif; ?>
    <td class="line"><?php echo $keys; ?></td>
    <td class="line"><?php echo redis_remark($key,$keys); ?></td>
    <td class="line" align="center">
      <a href="javascript:void(0);" data-key="<?php echo $keys; ?>" class="current data">数据</a>
      <a href="javascript:void(0);" data-key="<?php echo $keys; ?>" class="delete">删除</a>
    </td>
  </tr>
  <?php endforeach; ?>
<?php endforeach; ?>
</table>
</body>
</html>