<form method="post" id="addAdmin">
  <table width="100%" align="center" border="0" cellpadding="0" cellspacing="1" class="tables">
    <tr class="title">
      <td colspan="2">管理员的基本信息</td>
    </tr>
    <tr>
      <td width="10%">用户名：</td>
      <td><input type="text" id="uname" name="uname" class="input w160p"> <span id="uname_error"></span></td>
    </tr>
    <tr>
      <td>姓名：</td>
      <td><input type="text" id="name" name="name" class="input w160p"> <span id="name_error"></span></td>
    </tr>
    <tr>
      <td>邮箱：</td>
      <td><input type="text" id="email" name="email" class="input w160p"> <span id="email_error"></span></td>
    </tr>
    <tr>
      <td>密码：</td>
      <td><input type="password" id="upass1" name="upass1" class="input w160p"> <span id="upass1_error"></span></td>
    </tr>
    <tr>
      <td>密码确认：</td>
      <td><input type="password" id="upass2" name="upass2" class="input w160p"> <span id="upass2_error"></span></td>
    </tr>
    <tr>
      <td>角色：</td>
      <td><select name="roleid">
        <?php foreach ($roles as $id => $item): ?>
        <option value="<?php echo $id; ?>"><?php echo $item; ?></option>
        <?php endforeach; ?>
      </select> <span class="lh22p ml10p">选择角色后将使用角色的权限，而不需再设置管理员权限</span></td>
    </tr>
    <tr class="title">
      <td colspan="2">可管理模块</td>
    </tr>
    <tr>
      <td colspan="2">
        <ul class="flul">
          <?php foreach ($myPowers as $module): ?>
          <li><label><input type="checkbox" name="power[]" value="<?php echo $module['id']; ?>"><span><?php echo $module['name']; ?>(<?php echo $module['id']; ?>)</span></label></li>
          <?php endforeach; ?>
        </ul>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" value="添加管理员" class="submitbtn">
        <input type="button" value="返回列表" class="listbtn goto" data-url="<?php echo ua('/administrator/admin'); ?>">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<script>
$( function() {
	$("#addAdmin").submit( function() {
		var uname = $("#uname").val();
		var email = $("#email").val();
		var upass1 = $("#upass1").val();
		var upass2 = $("#upass2").val();
		var rtn = true;
		if ( !uname ) {
			$("#uname_error").text("请输入用户名").addClass("c_red");
			rtn = false;
		}
		else $("#uname_error").text("正确").removeClass("c_red");
		$("#name_error").text("正确");
		if ( email && !/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/.test(email) ) {
			$("#email_error").text("邮箱格式不正确").addClass("c_red");
			rtn = false;
		}
		else $("#email_error").text("正确").removeClass("c_red");
		if ( !upass1 ) {
			$("#upass1_error").text("请填写密码").addClass("c_red");
			rtn = false;
		}
		else $("#upass1_error").text("正确").removeClass("c_red");
		if ( !upass2 ) {
			$("#upass2_error").text("请填写密码确认").addClass("c_red");
			rtn = false;
		}
		else $("#upass2_error").text("正确").removeClass("c_red");
		if ( upass1 != upass2 ) {
			$("#upass1_error").text("密码必须与密码确认一致").addClass("c_red");
			$("#upass2_error").text("密码确认必须与密码一致").addClass("c_red");
			rtn = false;
		}
		else {
			if ( upass1 ) $("#upass1_error").text("正确").removeClass("c_red");
			if ( upass2 ) $("#upass2_error").text("正确").removeClass("c_red");
		}
		return rtn;
	} );
} );
</script>