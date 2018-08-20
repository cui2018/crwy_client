<style>
html,body {height:100%;}
body {padding:0; overflow:hidden;}
#tblist {width:12%; height:100%; float:left; padding:5px 0; background-color:#EEE; overflow-x:hidden; overflow-y:auto; box-sizing:border-box;}
#tblist li {height:30px; font:14px/30px Tahoma, Geneva, sans-serif; padding:0 15px; overflow:hidden; cursor:pointer;}
#tblist li:hover {background-color:#FFF; font-weight:bold;}
#tblist li.current {background-color:#FFF; font-weight:bold; color:#900;}
#tblist li#createTable {text-align:center; margin:5px 10px 10px 10px; border:1px #DDD solid;}
#tbinfo {position:relative; width:88%; height:100%; float:left; padding:20px; overflow-x:hidden; overflow-y:auto; box-sizing:border-box;}
#tbinfo small {font-style:italic; font-size:12px; color:#888;}
#tbbox {position:fixed; top:0; right:0; bottom:0; left:12%; background-color:#FFF; padding:50px 20px 20px 20px; overflow:auto; box-sizing:border-box; display:none;}
#tbbox td {white-space:nowrap;}
#tbbox .title .pri:after {content:""; display:inline-block; width:16px; height:16px; margin-left:3px; background:url(<?php echo u('/images/admin/key.png'); ?>) no-repeat;}
#tbbox .column {cursor:url(<?php echo u('/images/admin/edit.gif'); ?>),auto;}
#tbbox .column.current {background-color:#F00;}
#tbbox .field:hover {background-color:#C00; color:#FFF;}
#tbbox .headline {position:fixed; top:0; left:12%; right:0; height:40px; padding:0 20px; line-height:40px; background-color:rgba(0,0,0,0.6); box-sizing:border-box;}
#tbbox .headline h3 {display:inline-block; margin:0; margin-right:20px; color:#FFF;}
#tbbox .headline p {display:inline-block; margin:0; padding:0 5px; color:#FFF;}
#tbbox .headline .close {float:right; margin-right:10px; margin-top:6px; width:28px; height:28px; background:url(<?php echo u('/images/admin/back.png'); ?>) no-repeat; transition:all 0.3s ease-in-out; -webkit-transition:all 0.3s ease-in-out; cursor:pointer;}
#tbbox .headline .close:hover {background-image:url(<?php echo u('/images/admin/back_on.png'); ?>);}
#tbbox .headline .help {float:right; margin-right:10px; margin-top:12px; width:14px; height:15px; background:url(<?php echo u('/images/admin/help.gif'); ?>) no-repeat; cursor:help; display:block;}
#tbbox .headline .error {background:url(<?php echo u('/images/admin/wrong.png'); ?>) no-repeat left/auto 60%; color:#F00; padding-left:30px;}
.helps li {text-align:left;}
.helps li:before {content:"●"; padding-right:5px;}
.mask {position:fixed; top:0; right:0; bottom:0; left:0; background-color:rgba(255,255,255,0.1);}
.mask .tip {position:absolute; width:350px; height:220px; background-color:#686868; box-shadow:1px 1px 3px rgba(0,0,0,0.4); color:#FFF;}
.mask .tip h3,.mask .tip div,.mask .tip ul {padding-left:20px;}
.mask .box {position:absolute; left:12%; right:0; top:0; bottom:0; background-color:#FFF;}
.mask .box .tags {position:absolute; top:0; left:0; right:0; height:40px; padding:0 20px; line-height:40px; background-color:rgba(0,0,0,0.6); box-sizing:border-box;}
.mask .box .tags h3 {display:inline-block; margin:0; margin-right:20px; color:#FFF;}
.mask .box .tags p {display:inline-block; margin:0; padding:0 5px; color:#FFF;}
.mask .box .tags .close {float:right; margin-right:10px; margin-top:6px; width:28px; height:28px; background:url(<?php echo u('/images/admin/back.png'); ?>) no-repeat; transition:all 0.3s ease-in-out; -webkit-transition:all 0.3s ease-in-out; cursor:pointer;}
.mask .box .tags .close:hover {background-image:url(<?php echo u('/images/admin/back_on.png'); ?>);}
.mask .box .modify {position:absolute; top:40px; left:0; right:0; bottom:40px; padding:20px;}
.mask .box .modify .creator {padding:10px 0;}
.mask .box .modify .creator .funs {padding:10px 0;}
.mask .box .modify .creator form {display:inline-block; margin-left:5px;}
.mask .box .modify .typer {padding:10px; background-color:#6C6C6C; color:#FFF;}
.mask .box .modify .typer:after {content:""; display:block; clear:left;}
.mask .box .btn {position:absolute; left:0; right:0; bottom:0; height:40px; padding:0 20px;}
#tbbox .newline {background:url(<?php echo u('/images/admin/add.gif'); ?>) no-repeat center; transition:all 0.3s ease-in-out; -webkit-transition:all 0.3s ease-in-out; cursor:pointer;}
#tbbox .newline:hover {background-image:url(<?php echo u('/images/admin/add_on.gif'); ?>); background-color:#DDD;}
</style>
<script src="<?php echo uv('/js/calenda.js'); ?>"></script>
<script src="<?php echo uv('/editor/kindeditor.js'); ?>"></script>
<script>
var tables = {};
function tableClass(tablename) {
  this.table = tablename;
}
tableClass.prototype = {
  data : function(page,where,order,pagesize,fn) {
    var that = this;
    $.api("<?php echo ua('/develop/databaser/tbdata'); ?>", {
      table : this.table,
      page : page,
      where : where,
      order : order,
      pagesize : pagesize
    }, function() {
      var priindex = this.column.findBy("COLUMN_KEY","PRI");
      if ( priindex === false ) that.pri = "";
      else that.pri = this.column[priindex].COLUMN_NAME;
      if ( fn ) fn.call(that,this);
    } );
    return this;
  },
  structure : function(fn) {
    var that = this;
    $.api("<?php echo ua('/develop/databaser/structure'); ?>", {
      table : this.table
    }, function() {
      if ( fn ) fn.call(that,this);
    } );
    return this;
  },
  truncate : function(fn) {
    var that = this;
    $.api("<?php echo ua('/develop/databaser/truncate'); ?>", {
      table : this.table
    }, function() {
      if ( fn ) fn.call(that);
    } );
    return this;
  },
  drop : function(fn) {
    var that = this;
    $.api("<?php echo ua('/develop/databaser/drop'); ?>", {
      table : this.table
    }, function() {
      if ( fn ) fn.call(that);
    } );
    return this;
  },
  delete : function(privalue,fn) {
    var that = this;
    $.api("<?php echo ua('/develop/databaser/deleteOne'); ?>", {
      table : this.table,
      prikey : this.pri,
      privalue : privalue
    }, function() {
      if ( fn ) fn.call(that);
    } );
    return this;
  },
  deleteAll : function(privalues,fn) {
    var that = this;
    $.api("<?php echo ua('/develop/databaser/deleteAll'); ?>", {
      table : this.table,
      prikey : this.pri,
      privalues : privalues
    }, function() {
      if ( fn ) fn.call(that);
    } );
    return this;
  },
  setOne : function(privalue,key,value,fn) {
    var that = this;
    $.api("<?php echo ua('/develop/databaser/setOne'); ?>", {
      table : this.table,
      prikey : this.pri,
      privalue : privalue,
      column : key,
      value : value
    }, function() {
      if ( fn ) fn.call(that);
    } );
    return this;
  },
  create : function(data,fn) {
    var that = this;
    data.table = this.table;
    $.api("<?php echo ua('/develop/databaser/create'); ?>", data, function() {
      if ( fn ) fn.call(that);
    } );
    return this;
  },
  structured : function(data,fn) {
    var that = this;
    data.table = this.table;
    $.api("<?php echo ua('/develop/databaser/structured'); ?>", data, function() {
      //if ( fn ) fn.call(that);
    } );
    return this;
  }
};
function newTable(tablename) {
  if ( tables[tablename] ) return tables[tablename];
  else return tables[tablename] = new tableClass(tablename);
}
$( function() {
  var face = {
    box : $("#tbbox").mousewheel( function(e) {
      e.preventDefault();
    }, 60 ),
    list : $("#tblist"),
    showBox : function() {
      this.box.empty().show();
      return this;
    },
    close : function() {
      face.box.empty().hide();
      face.list.children("li.current").removeClass("current");
      return this;
    },
    table : {
      param : {
        page : 1,
        where : {},
        order : {},
        pagesize : 50
      },
      reset : function() {
        this.param.page = 1;
        this.param.where = {};
        this.param.order = {};
        this.param.pagesize = 50;
        return this;
      },
      data : function(tablename,data) {
        var that = this;
        face.showBox();
        var html = '<div class="headline">';
        html += '  <h3>表：' + tablename + '</h3>';
        html += '  <p>共 ' + data.setting.total + ' 条记录</p>';
        html += '  <p>第 <input type="text" value="' + this.param.page + '" class="curpage w40p tc int"> 页/共 ' + data.setting.pages + ' 页</p>';
        html += '  <p>每页 <input type="text" value="' + this.param.pagesize + '" class="pagesize w40p tc int"> 条</p>';
        html += '  <p><button type="button" class="deleteCurrent">删除选中记录</button></p>';
        html += '  <div class="close"></div>';
        html += '  <div class="help"></div>';
        html += '</div>';
        html += '<table width="100%" border="0" cellpadding="0" cellspacing="1" class="lists">';
        html += '  <tr class="title">';
        html += '    <td align="center"><input type="checkbox"></td>';
        $.each(data.column, function(i,item) {
          var isCurrent = false;
          var pat = new RegExp("^" + item.COLUMN_NAME + "( >| >=| <| <=| !=| LIKE| IN)?");
          $.each(that.param.where, function(thekey,thevalue) {
            if ( pat.test(thekey) ) {
              isCurrent = true;
              return false;
            }
          } );
          if ( !isCurrent ) $.each(that.param.order, function(thekey,thevalue) {
            if ( thekey == item.COLUMN_NAME ) {
              isCurrent = true;
              return false;
            }
          } );
          html += '  <td class="column' + (item.COLUMN_KEY == 'PRI' ? ' pri' : '') + (isCurrent ? " current" : "") + '" data-type="' + item.DATA_TYPE + '" align="center"' + (item.COLUMN_COMMENT ? ' title="' + item.COLUMN_COMMENT + '"' : '') + '>' + item.COLUMN_NAME + '</td>'
        } );
        html += '    <td align="center">操作</td>';
        html += '  </tr>';
        $.each(data.data, function(i,line) {
          html += '<tr data-i="' + i + '">';
          html += '  <td align="center"><input type="checkbox"></td>'
          $.each(line, function(key,item) {
            html += '<td align="center" class="field">' + $.trim(item.dropHTML()).left(100) + '</td>'
          } );
          html += '  <td align="center">';
          html += '    <a href="javascript:void(0);" class="current coledit">修改</a>';
          html += '    <a href="javascript:void(0);" class="coldelete">删除</a>';
          html += '  </td>'
          html += '</tr>';
        } );
        html += '</table>';
        face.box.html(html);
        var table = newTable(tablename);
        var headline = face.box.children(".headline");
        headline.children(".close").tap( function() {
          face.close();
        } );
        headline.children(".help").tap( function() {
          cue('<ol class="helps"><li>双击记录中的单元格可以单独编辑该单元格的数据</li><li>按住ctrl键，滚动鼠标滚轮，可以横向滚动表格</li></ol>',$.noop,0);
        } );
        headline.find(".curpage").blur( function() {
          var curpage = parseInt($(this).val());
          curpage = isNaN(curpage) ? 1 : curpage;
          $(this).val(curpage);
          that.param.page = curpage;
          table.data(that.param.page, that.param.where, that.param.order, that.param.pagesize, function(data) {
            face.table.data(tablename,data);
          } );
        } );
        headline.find(".pagesize").blur( function() {
          var pagesize = parseInt($(this).val());
          pagesize = isNaN(pagesize) ? 50 : pagesize;
          $(this).val(pagesize);
          that.param.pagesize = pagesize;
          table.data(that.param.page, that.param.where, that.param.order, that.param.pagesize, function(data) {
            face.table.data(tablename,data);
          } );
        } );
        headline.find(".deleteCurrent").tap( function() {
          var titleline = face.box.find("tr.title");
          var pri = titleline.children("td.pri");
          if ( pri.length == 0 ) return cue("此表未定义主键，不能删除数据");
          var prikey = pri.text();
          var priIndex = pri.index();
          var privalues = face.box.find("tr:not(.title) input:checkbox:checked").map( function() {
            return $(this).closest("tr").children("td:eq(" + priIndex + ")").text();
          } ).get();
          if ( privalues.length == 0 ) return cue("请选择至少一条记录~");
          confirm("是否确定删除这些记录？", function(is) {
            if ( is ) table.deleteAll(privalues, function() {
              table.data(that.param.page, that.param.where, that.param.order, that.param.pagesize, function(data) {
                face.table.data(tablename,data);
              } );
            } );
          } );
        } );
        face.box.find("tr.title > td:first input:checkbox").tap( function() {
          var isChecked = $(this).attr("checked") ? true : false;
          face.box.find("tr:not(.title)").each( function() {
            $(this).find("td:first input:checkbox").attr("checked",isChecked);
          } );
        } );
        face.box.find(".column").tap( function() {
          var obj = $(this);
          var key = obj.text();
          var pat = new RegExp("^" + key + "( >| >=| <| <=| !=| LIKE| IN)?");
          var position = {
            left : obj.offset().left,
            top : obj.offset().top + obj.outerHeight()
          };
          var mask = $('<div class="mask"></div>').appendTo(document.body).tap( function() {
            $(this).remove();
          } );
          var tip = $('<div class="tip"></div>').css(position).appendTo(mask).tap( function(e) {
            e.stopPropagation();
          } );
          if ( tip.offset().left + tip.outerWidth() > $(window).width() ) tip.css("left",$(window).width() - tip.outerWidth());
          tip.append('<h3>条件：</h3><div><span>' + key + '</span> <select><option value="">取消</option><option>=</option><option>></option><option>>=</option><option><</option><option><=</option><option>!=</option><option>LIKE</option><option>IN</option></select> <input type="text" class="w100p tc"> <button type="button">GO</button></div>');
          $.each(that.param.where, function(thekey,thevalue) {
            if ( pat.test(thekey) ) {
              var operator = $.trim(pat.exec(thekey)[1]) || "=";
              tip.find("select").val(operator);
              tip.find("input:text").val(thevalue);
              return false;
            }
          } );
          tip.append('<h3>排序：</h3><ul class="flul"><li>' + key + '</li><li><label><input type="checkbox" value="ASC">正序</label></li><li><label><input type="checkbox" value="DESC">倒序</label></li><li><button type="button">GO</button></li></ul>');
          $.each(that.param.order, function(thekey,thevalue) {
            if ( thekey == key ) {
              tip.find("input:checkbox").filter( function() {
                return $(this).val() == thevalue;
              } ).attr("checked",true);
              return false;
            }
          } );
          tip.find("input:checkbox").tap( function() {
            if ( $(this).attr("checked") ) tip.find("input:checkbox").not(this).attr("checked",false);
          } );
          tip.find("button:eq(0)").tap( function() {
            var operator = tip.find("select").val();
            var value = tip.find("input:text").val();
            $.each(that.param.where, function(thekey,thevalue) {
              if ( pat.test(thekey) ) delete that.param.where[thekey];
            } );
            if ( operator ) {
              that.param.where[key + (operator == "=" ? "" : " " + operator)] = value;
              obj.addClass("current");
            }
            else obj.removeClass("current");
            that.param.page = 1;
            table.data(that.param.page, that.param.where, that.param.order, that.param.pagesize, function(data) {
              face.table.data(tablename,data);
            } );
            mask.tap();
          } );
          tip.find("button:eq(1)").tap( function() {
            var order = tip.find("input:checkbox:checked").val();
            $.each(that.param.order, function(thekey,thevalue) {
              if ( thekey == key ) delete that.param.order[thekey];
            } );
            if ( order ) {
              that.param.order[key] = order;
              obj.addClass("current");
            }
            else obj.removeClass("current");
            that.param.page = 1;
            table.data(that.param.page, that.param.where, that.param.order, that.param.pagesize, function(data) {
              face.table.data(tablename,data);
            } );
            mask.tap();
          } );
        } );
        face.box.find(".field").dbltap( function() {
          var field = $(this);
          var index = $(this).index();
          var line = $(this).parent();
          var i = line.data("i");
          var titleline = $(this).closest("table").find("tr.title");
          var pri = titleline.children("td.pri");
          if ( pri.length == 0 ) return cue("此表未定义主键，不能更新数据");
          var prikey = pri.text();
          var privalue = line.children("td:eq(" + pri.index() + ")").text();
          var column = titleline.children("td:eq(" + index + ")");
          var type = column.data("type");
          var key = column.text();
          var value = data.data[i][key];
          var mask = $('<div class="mask"></div>').appendTo(document.body);
          var box = $('<div class="box"></div>').appendTo(mask);
          var html = '<div class="tags">';
          html += '  <h3>表：' + tablename + '</h3>';
          html += '  <p>字段：' + key + '</p>';
          html += '  <p>字段类型：' + type + '</p>';
          html += '  <p>主键约束：' + prikey + '=' + data.data[i][prikey] + '</p>';
          html += '  <div class="close"></div>';
          html += '</div>';
          var tags = $(html).appendTo(box);
          tags.children(".close").tap( function() {
            mask.remove();
          } );
          var modify = $('<div class="modify"></div>').appendTo(box);
          var creator = $('<div class="creator"></div>').appendTo(modify);
          var element = face.creator[type](value);
          creator.append(element);
          var html = '<ul class="flul typer">';
          html += '  <li>切换输入插件：</li>';
          html += '  <li><label><input type="radio" name="typer" value="default" checked>默认</label></li>';
          html += '  <li><label><input type="radio" name="typer" value="time">时间选择</label></li>';
          html += '  <li><label><input type="radio" name="typer" value="upload">文件上传</label></li>';
          html += '  <li><label><input type="radio" name="typer" value="editor">编辑器</label></li>';
          html += '</ul>';
          var typer = $(html).appendTo(modify);
          typer.find("input:radio").tap( function() {
            var mode = $(this).val();
            if ( mode == "default" ) mode = type;
            var value = element.first().val();
            creator.empty();
            element = face.creator[mode](value);
            creator.append(element);
            if ( mode == "editor" ) {
              var name = element.first().attr("name");
              KindEditor.create("textarea[name=" + name + "]", {
                themeType : "simple",
                resizeType : 1,
                uploadJson : u("/editor/php/upload_json.php"),
                fileManagerJson : u("/editor/php/file_manager_json.php"),
                allowFileManager : true,
                width : "100%",
                height : "600px",
                afterBlur : function() {
                  this.sync();
                }
              } );
            }
          } );
          var btn = $('<div class="btn"><button type="button" class="submitbtn">保 存</button></div>').appendTo(box);
          btn.children(".submitbtn").tap( function() {
            var value = element.first().val();
            table.setOne(privalue, key, value, function() {
              data.data[i][key] = value;
              field.text($.trim(value.dropHTML()).left(100));
              cue("修改成功~");
              mask.remove();
            } );
          } );
        } );
        face.box.find(".coledit").tap( function() {
          cue("修改整条记录功能暂未开放，暂请双击要修改的字段进行编辑~",$.noop,false);
        } );
        face.box.find(".coldelete").tap( function() {
          var titleline = face.box.find("tr.title");
          var pri = titleline.children("td.pri");
          if ( pri.length == 0 ) return cue("此表未定义主键，不能删除数据");
          var prikey = pri.text();
          var priIndex = pri.index();
          var privalue = $(this).closest("tr").children("td:eq(" + priIndex + ")").text();
          confirm("是否确定删除这条记录？", function(is) {
            if ( is ) table.delete(privalue, function() {
              table.data(that.param.page, that.param.where, that.param.order, that.param.pagesize, function(data) {
                face.table.data(tablename,data);
              } );
            } );
          } );
        } );
        return this;
      },
      structure : function(tablename,data) {
        var that = this;
        face.showBox();
        var html = '<div class="headline">';
        html += '  <h3>表名：<input type="text" class="tablename w200p"></h3>';
        html += '  <p class="error"></p>';
        html += '  <p>引擎：<select class="engine">';
        html += '    <option>MyISAM</option>';
        html += '    <option>InnoDB</option>';
        html += '  </select></p>';
        html += '  <p>备注：<input type="text" class="comment w320p"></p>';
        html += '  <p><button type="button" class="save">保 存</button></p>';
        html += '  <div class="close"></div>';
        html += '</div>';
        html += '<table width="100%" border="0" cellpadding="0" cellspacing="1" class="lists">';
        html += '  <tr class="title">';
        html += '    <td align="center" width="30"></td>';
        html += '    <td align="center" width="15%">字段名</td>';
        html += '    <td align="center" width="8%">数据类型</td>';
        html += '    <td align="center" width="8%">长度</td>';
        html += '    <td align="center" width="8%">小数位数</td>';
        html += '    <td align="center" width="5%">非null</td>';
        html += '    <td align="center" width="5%">无符号</td>';
        html += '    <td align="center" width="8%">默认值</td>';
        html += '    <td align="center" width="5%">主键</td>';
        html += '    <td align="center" width="7%">索引</td>';
        html += '    <td align="center">备注</td>';
        html += '    <td align="center" width="13%">操作</td>';
        html += '  </tr>';
        html += '  <tr class="end">';
        html += '    <td align="center" class="newline"></td>';
        html += '    <td colspan="11"></td>';
        html += '  </tr>';
        html += '</table>';
        face.box.html(html);
        var headline = face.box.children(".headline");
        headline.children(".close").tap( function() {
          face.close();
        } );
        var newTablename = "";
        headline.find(".tablename").bind("input", function() {
          var error = $(this).parent().next(".error");
          newTablename = $.trim($(this).val());
          if ( $("#tblist li:not(#createTable)").filter( function() {
            return $(this).text() == newTablename && $(this).text() != tablename;
          } ).length > 0 ) {
            newTablename = tablename;
            error.text("表名重复");
          }
          else error.empty();
        } ).val(data.table.TABLE_NAME);
        headline.find(".engine").val(data.table.ENGINE);
        headline.find(".comment").val(data.table.TABLE_COMMENT);
        face.box.find(".newline").tap( function() {
          $(this).parent().before(face.table.newline());
        } );
        $.each(data.column, function(i,column) {
          var line = face.table.newline();
          face.box.find(".end").before(line);
          line.find(".column_name").val(column.COLUMN_NAME).data("name",column.COLUMN_NAME);
          line.find(".column_type").val(column.DATA_TYPE);
          var longs = column.COLUMN_TYPE.replace(' unsigned','').replace(column.DATA_TYPE,'').replace('(','').replace(')','').split(",");
          line.find(".column_long").val(longs[0] ? longs[0] : 0);
          line.find(".column_decimal").val(longs[1] ? longs[1] : 0);
          line.find(".column_notnull").attr("checked",column.IS_NULLABLE == "NO" ? true : false);
          var unsigned = /^.+ unsigned$/.test(column.COLUMN_TYPE);
          line.find(".column_unsigned").attr("checked",unsigned ? true : false);
          line.find(".column_default").val(column.COLUMN_DEFAULT);
          line.find(".column_pri").attr("checked",column.COLUMN_KEY == "PRI" ? true : false);
          var key = data.keys.findBy("Column_name",column.COLUMN_NAME);
          if ( key !== false ) {
            key = data.keys[key];
            if ( key.Key_name != "PRIMARY" ) {
              if ( key.Non_unique == "0" ) key = "Unique";
              else if ( key.Index_type == "FULLTEXT" ) key = "Full Text";
              else key = "Normal";
              line.find(".column_key").val(key);
            }
          }
          line.find(".column_comment").val(column.COLUMN_COMMENT);
        } );
        headline.find(".save").tap( function() {
          if ( !newTablename ) return cue("请填写表名~");
          var lines = face.box.find(".line").map( function() {
            return {
              name : $(this).find(".column_name").val(),
              oldname : $(this).find(".column_name").data("name"),
              type : $(this).find(".column_type").val(),
              long : $(this).find(".column_long").val(),
              decimal : $(this).find(".column_decimal").val(),
              notnull : $(this).find(".column_notnull").attr("checked") ? 1 : 0,
              unsigned : $(this).find(".column_unsigned").attr("checked") ? 1 : 0,
              def : $(this).find(".column_default").val(),
              pri : $(this).find(".column_pri").attr("checked") ? 1 : 0,
              key : $(this).find(".column_key").val(),
              comment : $(this).find(".column_comment").val()
            };
          } ).get();
          for ( var i = 0; i < lines.length; i++ ) {
            var line = lines[i];
            if ( !line.name ) return cue("请填写完整字段名~");
            for ( var j = i + 1; j < lines.length; j++ ) {
              if ( lines[j].name == line.name ) return cue("字段 " + line.name + " 重名~");
            }
            if ( line.type == "char" || line.type == "varchar" || line.type == "text" || line.type == "longtext" ) {
              lines[i].unsigned = 0;
              lines[i].pri = 0;
            }
            if ( line.type == "text" || line.type == "longtext" ) {
              lines[i].def = "";
              lines[i].key = "";
            }
          }
          var engine = headline.find(".engine").val();
          var comment = headline.find(".comment").val();
          var data = {
            newTablename : newTablename,
            engine : engine,
            comment : comment,
            lines : lines
          };
          var table = newTable(tablename);
          table.structured(data, function() {
            dialog("修改成功~", function() {
              refresh();
            } );
          } );
        } );
        return this;
      },
      newTable : function() {
        var that = this;
        face.showBox();
        var html = '<div class="headline">';
        html += '  <h3>表名：<input type="text" class="tablename w200p"></h3>';
        html += '  <p class="error"></p>';
        html += '  <p>引擎：<select class="engine">';
        html += '    <option>MyISAM</option>';
        html += '    <option>InnoDB</option>';
        html += '  </select></p>';
        html += '  <p>备注：<input type="text" class="comment w320p"></p>';
        html += '  <p><button type="button" class="save">保 存</button></p>';
        html += '  <div class="close"></div>';
        html += '</div>';
        html += '<table width="100%" border="0" cellpadding="0" cellspacing="1" class="lists">';
        html += '  <tr class="title">';
        html += '    <td align="center" width="30"></td>';
        html += '    <td align="center" width="15%">字段名</td>';
        html += '    <td align="center" width="8%">数据类型</td>';
        html += '    <td align="center" width="8%">长度</td>';
        html += '    <td align="center" width="8%">小数位数</td>';
        html += '    <td align="center" width="5%">非null</td>';
        html += '    <td align="center" width="5%">无符号</td>';
        html += '    <td align="center" width="8%">默认值</td>';
        html += '    <td align="center" width="5%">主键</td>';
        html += '    <td align="center" width="7%">索引</td>';
        html += '    <td align="center">备注</td>';
        html += '    <td align="center" width="13%">操作</td>';
        html += '  </tr>';
        html += '  <tr class="end">';
        html += '    <td align="center" class="newline"></td>';
        html += '    <td colspan="11"></td>';
        html += '  </tr>';
        html += '</table>';
        face.box.html(html);
        var headline = face.box.children(".headline");
        headline.children(".close").tap( function() {
          face.close();
        } );
        var tablename = "";
        headline.find(".tablename").bind("input", function() {
          var error = $(this).parent().next(".error");
          tablename = $.trim($(this).val());
          if ( $("#tblist li:not(#createTable)").filter( function() {
            return $(this).text() == tablename;
          } ).length > 0 ) {
            tablename = "";
            error.text("表名重复");
          }
          else error.empty();
        } );
        face.box.find(".newline").tap( function() {
          $(this).parent().before(face.table.newline());
        } );
        headline.find(".save").tap( function() {
          if ( !tablename ) return cue("请填写表名~");
          var lines = face.box.find(".line").map( function() {
            return {
              name : $(this).find(".column_name").val(),
              type : $(this).find(".column_type").val(),
              long : $(this).find(".column_long").val(),
              decimal : $(this).find(".column_decimal").val(),
              notnull : $(this).find(".column_notnull").attr("checked") ? 1 : 0,
              unsigned : $(this).find(".column_unsigned").attr("checked") ? 1 : 0,
              def : $(this).find(".column_default").val(),
              pri : $(this).find(".column_pri").attr("checked") ? 1 : 0,
              key : $(this).find(".column_key").val(),
              comment : $(this).find(".column_comment").val()
            };
          } ).get();
          for ( var i = 0; i < lines.length; i++ ) {
            var line = lines[i];
            if ( !line.name ) return cue("请填写完整字段名~");
            for ( var j = i + 1; j < lines.length; j++ ) {
              if ( lines[j].name == line.name ) return cue("字段 " + line.name + " 重名~");
            }
            if ( line.type == "char" || line.type == "varchar" || line.type == "text" || line.type == "longtext" ) {
              lines[i].unsigned = 0;
              lines[i].pri = 0;
            }
            if ( line.type == "text" || line.type == "longtext" ) {
              lines[i].def = "";
              lines[i].key = "";
            }
          }
          var engine = headline.find(".engine").val();
          var comment = headline.find(".comment").val();
          var data = {
            engine : engine,
            comment : comment,
            lines : lines
          };
          var table = newTable(tablename);
          table.create(data, function() {
            dialog("创建成功~", function() {
              refresh();
            } );
          } );
        } );
        return this;
      },
      newline : function(data) {
        if ( !data ) data = {
          name : "",
          type : "int",
          long : 10,
          decimal : 0,
          notnull : 1,
          unsigned : 1,
          def : "",
          pri : 0,
          key : "",
          comment : ""
        };
        var html = '<tr class="line">'
        html += '  <td align="center" class="newline"></td>';
        html += '  <td align="center"><input type="text" class="w100per column_name"></td>';
        html += '  <td align="center"><select class="w100per column_type">';
        html += '    <option>int</option>';
        html += '    <option>char</option>';
        html += '    <option>varchar</option>';
        html += '    <option>text</option>';
        html += '    <option>tinyint</option>';
        html += '    <option>bigint</option>';
        html += '    <option>decimal</option>';
        html += '    <option>longtext</option>';
        html += '  </select></td>';
        html += '  <td align="center"><input type="text" class="w100per tc int column_long"></td>';
        html += '  <td align="center"><input type="text" class="w100per tc int column_decimal"></td>';
        html += '  <td align="center"><input type="checkbox" class="column_notnull" checked></td>';
        html += '  <td align="center"><input type="checkbox" class="column_unsigned" checked></td>';
        html += '  <td align="center"><input type="text" class="w100per tc column_default"></td>';
        html += '  <td align="center"><input type="checkbox" class="column_pri"></td>';
        html += '  <td align="center"><select class="w100per column_key">';
        html += '    <option></option>';
        html += '    <option>Normal</option>';
        html += '    <option>Unique</option>';
        html += '    <option>Full Text</option>';
        html += '  </select></td>';
        html += '  <td align="center"><input type="text" class="w100per column_comment"></td>';
        html += '  <td align="center">';
        html += '    <a href="javascript:void(0);" class="current column_copy">复制</a>';
        html += '    <a href="javascript:void(0);" class="current column_moveup">上移</a>';
        html += '    <a href="javascript:void(0);" class="current column_movedown">下移</a>';
        html += '    <a href="javascript:void(0);" class="column_delete">删除</a>';
        html += '  </td>';
        html += '</tr>';
        var line = $(html);
        line.find(".newline").tap( function() {
          line.before(face.table.newline());
        } );
        var columns = {
          name : line.find(".column_name").val(data.name),
          type : line.find(".column_type").val(data.type).change( function() {
            switch ( true ) {
              case $(this).val() == "int" || $(this).val() == "bigint" || $(this).val() == "tinyint":
                columns.long.val(10);
                columns.decimal.val(0);
                columns.notnull.attr("checked",true);
                columns.unsigned.attr("checked",true);
                break;
              case $(this).val() == "char" || $(this).val() == "varchar":
                columns.long.val(100);
                columns.decimal.val(0);
                columns.notnull.attr("checked",true);
                columns.unsigned.attr("checked",false);
                break;
              case $(this).val() == "decimal":
                columns.long.val(10);
                columns.decimal.val(2);
                columns.notnull.attr("checked",true);
                columns.unsigned.attr("checked",true);
                break;
              case $(this).val() == "text" || $(this).val() == "longtext":
                columns.long.val(0);
                columns.decimal.val(0);
                columns.notnull.attr("checked",true);
                columns.unsigned.attr("checked",false);
                columns.def.val("");
                break;
            }
            columns.pri.attr("checked",false);
            columns.key.val("");
          } ),
          long : line.find(".column_long").val(data.long),
          decimal : line.find(".column_decimal").val(data.decimal),
          notnull : line.find(".column_notnull").attr("checked",data.notnull ? true : false),
          unsigned : line.find(".column_unsigned").attr("checked",data.unsigned ? true : false),
          def : line.find(".column_default").val(data.def),
          pri : line.find(".column_pri").attr("checked",data.pri ? true : false),
          key : line.find(".column_key").val(data.key),
          comment : line.find(".column_comment").val(data.comment)
        };
        line.find(".column_copy").tap( function() {
          var data = {
            name : columns.name.val(),
            type : columns.type.val(),
            long : columns.long.val(),
            decimal : columns.decimal.val(),
            notnull : columns.notnull.attr("checked") ? 1 : 0,
            unsigned : columns.unsigned.attr("checked") ? 1 : 0,
            def : columns.def.val(),
            pri : columns.pri.attr("checked") ? 1 : 0,
            key : columns.key.val(),
            comment : columns.comment.val()
          };
          line.after(face.table.newline(data));
        } );
        line.find(".column_moveup").tap( function() {
          if ( line.prev().is(".title") ) return;
          line.insertBefore(line.prev());
        } );
        line.find(".column_movedown").tap( function() {
          if ( line.next().is(".end") ) return;
          line.insertAfter(line.next());
        } );
        line.find(".column_delete").tap( function() {
          confirm("是否确定删除此字段？", function(is) {
            if ( is ) line.remove();
          } );
        } );
        return line;
      }
    },
    creator : {
      char : function(value) {
        return $('<input type="text" class="w400p">').val(value);
      },
      varchar : function(value) {
        return $('<input type="text" class="w100per">').val(value);
      },
      int : function(value) {
        return $('<input type="text" class="w200p tc ints">').val(value);
      },
      bigint : function(value) {
        return $('<input type="text" class="w250p tc ints">').val(value);
      },
      tinyint : function(value) {
        return $('<input type="text" class="w100p tc ints">').val(value);
      },
      decimal : function(value) {
        return $('<input type="text" class="w200p tc doubles">').val(value);
      },
      text : function(value) {
        var textarea = $('<textarea class="w100per h400p"></textarea>').val(value);
        var funs = $('<div class="funs"><button class="formatJSON">格式化json</button> <button class="compressJSON">压缩json</button></div>');
        funs.children(".formatJSON").tap( function() {
          var value = textarea.val();
          value = jsonFormat(value);
          textarea.val(value);
        } );
        funs.children(".compressJSON").tap( function() {
          var value = textarea.val();
          value = jsonFormat(value,true);
          textarea.val(value);
        } );
        return textarea.add(funs);
      },
      longtext : function(value) {
        return this.text(value);
      },
      time : function(value) {
        var input = $('<input type="text" class="w200per">').val(value);
        input.calenda();
        var funs = $('<div class="funs"><button class="toDate">转日期时间格式</button> <button class="toTimeStamp">转时间戳</button></div>');
        funs.children(".toDate").tap( function() {
          var value = input.val();
          value = value.timeFormat();
          input.val(value);
        } );
        funs.children(".toTimeStamp").tap( function() {
          var value = input.val();
          value = strtotime(value);
          input.val(value);
        } );
        return input.add(funs);
      },
      upload : function(value) {
        var input = $('<input type="text" class="w400p" value="' + value + '">');
        var form = $('<form method="post" enctype="multipart/form-data" action="<?php echo ua('/develop/databaser/upload'); ?>" target="uploadframe"></form>');
        var uploader = $('<input type="file" name="upfile">').appendTo(form).change( function() {
          form.submit();
        } );
        var iframe = $('<iframe src="" id="uploadframe" name="uploadframe" class="dn"></iframe>').appendTo(form).load( function() {
          var src = $(this).contents().find("body").text();
          if ( src ) input.val(src);
        } );
        return input.add(form);
      },
      editor : function(value) {
        var name = "editor" + rand(10000,99999);
        return $('<textarea name="' + name + '"></textarea>').val(value);
      }
    }
  };
  $("#table .tbdata").tap( function() {
    var tablename = $(this).closest("tr").children("td:first").text();
    var table = newTable(tablename);
    table.data(1, {}, {}, 50, function(data) {
      face.table.reset();
      face.table.data(tablename,data);
    } );
    $("#tblist li.current").removeClass("current");
    $("#tblist li").filter( function() {
      return $(this).text() == tablename;
    } ).addClass("current");
  } );
  $("#table .tbstructure").tap( function() {
    var tablename = $(this).closest("tr").children("td:first").text();
    var table = newTable(tablename);
    table.structure( function(data) {
      face.table.reset();
      face.table.structure(tablename,data);
    } );
    $("#tblist li.current").removeClass("current");
    $("#tblist li").filter( function() {
      return $(this).text() == tablename;
    } ).addClass("current");
  } );
  $("#table .tbtruncate").tap( function() {
    var tablename = $(this).closest("tr").children("td:first").text();
    confirm("是否确定清空此表？", function(is) {
      if ( !is ) return;
      var table = newTable(tablename);
      table.truncate( function() {
        dialog("清空成功~", function() {
          refresh();
        } );
      } );
    } );
  } );
  $("#table .tbdrop").tap( function() {
    var tablename = $(this).closest("tr").children("td:first").text();
    confirm("是否确定删除此表？", function(is) {
      if ( !is ) return;
      var table = newTable(tablename);
      table.drop( function() {
        dialog("删除成功~", function() {
          refresh();
        } );
      } );
    } );
  } );
  $("#tblist li:not(#createTable)").tap( function() {
    var tablename = $(this).text();
    var table = newTable(tablename);
    table.data(1, {}, {}, 50, function(data) {
      face.table.reset();
      face.table.data(tablename,data);
    } );
    $("#tblist li.current").removeClass("current");
    $(this).addClass("current");
  } );
  $("#createTable").tap( function() {
    face.table.reset();
    face.table.newTable();
    $("#tblist li.current").removeClass("current");
    $(this).addClass("current");
  } );
} );
</script>
<ul id="tblist">
  <li id="createTable">新建表</li>
  <?php foreach ( $tables as $item ): ?>
  <li><?php echo $item['TABLE_NAME']; ?></li>
  <?php endforeach; ?>
</ul>
<div id="tbinfo">
  <table id="table" width="100%" border="0" cellpadding="0" cellspacing="1" class="lists">
    <tr class="title">
      <td width="10%">表名</td>
      <td width="5%" align="center">引擎</td>
      <td width="7%" align="center">记录数</td>
      <td width="7%" align="center">大小</td>
      <td width="7%" align="center">索引长度</td>
      <td width="7%" align="center">自增</td>
      <td width="12%" align="center">创建时间</td>
      <td width="12%" align="center">更新时间</td>
      <td>备注</td>
      <td width="19%" align="center">操作</td>
    </tr>
    <?php foreach ( $tables as $item ): ?>
    <tr>
      <td class="fw"><?php echo $item['TABLE_NAME']; ?></td>
      <td align="center"><?php echo $item['ENGINE']; ?></td>
      <td align="center"><?php echo $item['TABLE_ROWS']; ?></td>
      <td align="center"><?php echo format_data_size($item['DATA_LENGTH'],2,TRUE); ?></td>
      <td align="center"><?php echo format_data_size($item['INDEX_LENGTH'],2,TRUE); ?></td>
      <td align="center"><?php echo $item['AUTO_INCREMENT']; ?></td>
      <td align="center"><?php echo $item['CREATE_TIME']; ?></td>
      <td align="center"><?php echo $item['UPDATE_TIME']; ?></td>
      <td><?php echo $item['TABLE_COMMENT']; ?></td>
      <td align="center">
        <a href="javascript:void(0);" class="current<?php echo $item['TABLE_ROWS'] > 0 ? ' tbdata' : ''; ?>">数据</a>
        <a href="javascript:void(0);" class="current tbstructure">结构</a>
        <a href="javascript:void(0);" class="current tbexport">导出</a>
        <a href="javascript:void(0);" class="tbcopy">复制</a>
        <a href="javascript:void(0);" class="tbtruncate">清空</a>
        <a href="javascript:void(0);" class="tbdrop">删除</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
  <div id="tbbox"></div>
</div>
</body>
</html>