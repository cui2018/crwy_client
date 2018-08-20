<script>
$( function() {
  var setModuleEvent = function(o,txt,type,param) {
    param = param || {};
    param.type = type;
    $(o).tap( function() {
      confirm(txt, function(is) {
        if ( !is ) return;
        $.each(param, function(i,item) {
          if ( $.type(item) == "function" ) param[i] = item();
        } );
        $.api("<?php echo ua('/develop/rediser/refresh'); ?>", param, function() {
          dialog("刷新成功~");
        } );
      } );
    } );
  };
  setModuleEvent("#setting", "是否确定刷新配置？", "setting");
  $("#userAll").tap( function() {
    confirm("是否确定刷新所有用户？", function(is) {
      if ( !is ) return;
      $.api("<?php echo ua('/develop/rediser/refresh'); ?>", {
        type : "userAll"
      }, function() {
        var rows = parseInt(this);
        var page = parseInt(rows / 10000);
        setOneTime(0);
        function setOneTime(i) {
          if ( i > page ) return dialog("刷新成功~");
          $.api("<?php echo ua('/develop/rediser/refresh'); ?>", {
            type : "userAllPage",
            page : i
          }, function() {
            setOneTime(i + 1);
          } );
        }
      } );
    } );
  } );
  setModuleEvent("#userOne", "是否确定刷新该用户？", "userOne", {
    unionid : function() {
      return $("#unionid").val();
    }
  } );
  setModuleEvent("#classes", "是否确定刷新科目？", "classes");
  setModuleEvent("#subject", "是否确定刷新题目？", "subject");
  setModuleEvent("#prop", "是否确定刷新道具？", "prop");
  setModuleEvent("#shop", "是否确定刷新商店？", "shop");
  setModuleEvent("#server", "是否确定刷新服务器？", "server");
  setModuleEvent("#subjects", "是否确定注入题目测试数据？", "subjects");
} );
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="tables">
  <tr class="title">
    <td align="center" colspan="4">Redis刷新（将Redis中数据替换成数据库中的数据，由于数据库中数据可能不是最新实时数据，所以刷新时请谨慎）</td>
  </tr>
  <tr>
    <td>刷新配置：</td>
    <td colspan="3"><button type="button" class="submitbtn" id="setting">刷新</button></td>
  </tr>
  <tr>
    <td width="10%">刷新所有用户：</td>
    <td width="40%"><button type="button" class="submitbtn" id="userAll">刷新</button></td>
    <td width="10%">刷新指定用户：</td>
    <td>
      <input type="text" id="unionid" placeholder="unionid">
      <button type="button" class="submitbtn" id="userOne">刷新</button>
    </td>
  </tr>
  <tr>
    <td>刷新科目：</td>
    <td><button type="button" class="submitbtn" id="classes">刷新</button></td>
    <td>刷新题目：</td>
    <td><button type="button" class="submitbtn" id="subject">刷新</button></td>
  </tr>
  <tr>
    <td>刷新道具：</td>
    <td><button type="button" class="submitbtn" id="prop">刷新</button></td>
    <td>刷新商店：</td>
    <td><button type="button" class="submitbtn" id="shop">刷新</button></td>
  </tr>
  <tr>
    <td>刷新服务器：</td>
    <td><button type="button" class="submitbtn" id="server">刷新</button></td>
    <td>注入题目测试数据：</td>
    <td><button type="button" class="submitbtn" id="subjects" disabled>刷新</button></td>
  </tr>
</table>
</body>
</html>