<form id="passwordForm" method="post">
  <table width="100%" align="center" border="0" cellpadding="0" cellspacing="1" class="tables c_admin_green">
    <tr class="title">
      <td align="center" colspan="2">修改密码</td>
    </tr>
    <tr>
      <td width="20%" align="right">旧密码：</td>
      <td><input type="password" id="old_password" name="old_password" class="input w200p"> <span id="old_err"></span></td>
    </tr>
    <tr>
      <td align="right">新密码：</td>
      <td><input type="password" id="new_password" name="new_password" class="input w200p"> <span id="new_err"></span></td>
    </tr>
    <tr>
      <td align="right">密码确认：</td>
      <td><input type="password" id="new_password2" name="new_password2" class="input w200p"> <span id="new2_err"></span></td>
    </tr>
    <tr>
      <td colspan="2">
        <button type="submit" class="submitbtn">保存修改</button>
        <button type="reset" class="listbtn">重新修改</button>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<script>
$( function() {
	$("#passwordForm").submit( function() {
		var old_password = $("#old_password").val();
		var new_password = $("#new_password").val();
		var new_password2 = $("#new_password2").val();
		var rtn = true;
		if ( !old_password ) {
			$("#old_err").text("请输入旧密码").addClass("c_red");
			rtn = false;
		}
		else $("#old_err").text("正确").removeClass("c_red");
		if ( !new_password ) {
			$("#new_err").text("请输入新密码").addClass("c_red");
			rtn = false;
		}
		else $("#new_err").text("正确").removeClass("c_red");
		if ( !new_password2 ) {
			$("#new2_err").text("请输入密码确认").addClass("c_red");
			rtn = false;
		}
		else $("#new2_err").text("正确").removeClass("c_red");
		if ( new_password != new_password2 ) {
			$("#new_err").text("密码必须与密码确认一致").addClass("c_red");
			$("#new2_err").text("密码确认必须与密码一致").addClass("c_red");
			rtn = false;
		}
		else {
			if ( new_password ) $("#new_err").text("正确").removeClass("c_red");
			if ( new_password2 ) $("#new2_err").text("正确").removeClass("c_red");
		}
		return rtn;
	} );
} );
</script>