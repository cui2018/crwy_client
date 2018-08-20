<form method="post" id="upMe">
  <table width="100%" border="0" cellpadding="0" cellspacing="1" class="tables">
    <tr class="title">
      <td width="35%" colspan="2">我的基本信息</td>
      <td width="65%" colspan="2">我拥有的权限</td>
    </tr>
    <tr>
      <td width="8%">用户名：</td>
      <td><?php echo $me['uname']; ?></td>
      <td colspan="2" rowspan="5" valign="top">
        <ul class="flul">
          <?php foreach ($myPowers as $module): ?>
          <li><?php echo $module['name']; ?>(<?php echo $module['id']; ?>)</li>
          <?php endforeach; ?>
        </ul>
      </td>
    </tr>
    <tr>
      <td>姓名：</td>
      <td><input type="text" name="name" value="<?php echo $me['name']; ?>" class="input w120p"> <span id="name_error"></span></td>
    </tr>
    <tr>
      <td>邮箱：</td>
      <td><input type="text" id="email" name="email" value="<?php echo $me['email']; ?>" class="input w120p"> <span id="email_error">找回密码时使用</span></td>
    </tr>
    <tr>
      <td>密码：</td>
      <td><input type="password" id="upass1" name="upass1" class="input w120p"> <span id="upass1_error">不修改请留空</span></td>
    </tr>
    <tr>
      <td>密码确认：</td>
      <td><input type="password" id="upass2" name="upass2" class="input w120p"> <span id="upass2_error">不修改请留空</span></td>
    </tr>
    <tr>
      <td>身份：</td>
      <td><?php echo $me['sa'] ? '超级管理员' : '网站管理员'; ?></td>
      <td width="10%">角色：</td>
      <td><?php echo $me['rolename']; ?></td>
    </tr>
    <tr>
      <td>建立者：</td>
      <td><?php echo $me['mothername']; ?></td>
      <td>上次登录IP：</td>
      <td><?php echo $me['lastip']; ?></td>
    </tr>
    <tr>
      <td>建立时间：</td>
      <td><?php echo date('Y-m-d H:i:s',$me['birthday']); ?></td>
      <td>上次登录时间：</td>
      <td><?php echo date('Y-m-d H:i:s',$me['lastlogin']); ?></td>
    </tr>
    <tr>
      <td colspan="4"><input type="submit" value="修改我的基本信息" class="submitbtn"></td>
    </tr>
  </table>
</form>
<hr>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="lists">
  <tr class="title">
    <td align="center" colspan="7">其他管理员</td>
  </tr>
  <tr class="btns">
    <td colspan="7"><input type="button" value="添加管理员" class="editbtn goto" data-url="<?php echo ua('/administrator/admin/add'); ?>"></td>
  </tr>
  <tr class="title">
    <td width="8%">用户名</td>
    <td width="6%">姓名</td>
    <td width="6%">角色</td>
    <td>权限</td>
    <td width="8%">上次登录IP</td>
    <td width="8%">上次登录时间</td>
    <td width="10%" align="center">操作</td>
  </tr>
<?php
if ( $users ):
	foreach ($users as $item):
?>
  <tr>
    <td><?php echo $item['uname']; ?></td>
    <td><?php echo $item['name']; ?></td>
    <td><?php echo $item['rolename']; ?></td>
    <td>
      <ul class="flul">
        <?php foreach ($item['powers'] as $module): ?>
        <li><?php echo $module['name']; ?>(<?php echo $module['id']; ?>)</li>
        <?php endforeach; ?>
      </ul>
    </td>
    <td><?php echo $item['lastip']; ?></td>
    <td><?php echo date('Y-m-d H:i:s',$item['lastlogin']); ?></td>
    <td align="center">
      <a href="<?php echo ua('/administrator/admin/edit/' . $item['id']); ?>">修改</a>
      <a href="<?php echo ua('/administrator/admin/del/' . $item['id']); ?>" class="ondelete">删除</a>
    </td>
  </tr>
<?php
	endforeach;
else:
?>
  <tr class="btns">
    <td colspan="7" align="center">暂无数据</td>
  </tr>
<?php endif; ?>
</table>
</body>
</html>
<script>
$( function() {
	$("#upMe").submit( function() {
		var email = $("#email").val();
		var upass1 = $("#upass1").val();
		var upass2 = $("#upass2").val();
		var rtn = true;
		$("#name_error").text("正确");
		if ( email && !/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/.test(email) ) {
			$("#email_error").text("邮箱格式不正确").addClass("c_red");
			rtn = false;
		}
		else $("#email_error").text("正确").removeClass("c_red");
		if ( ( upass1 || upass2 ) && upass1 != upass2 ) {
			$("#upass1_error").text("密码必须与密码确认一致").addClass("c_red");
			$("#upass2_error").text("密码确认必须与密码一致").addClass("c_red");
			rtn = false;
		}
		else {
			$("#upass1_error").text("正确").removeClass("c_red");
			$("#upass2_error").text("正确").removeClass("c_red");
		}
		return rtn;
	} );
} );
</script>