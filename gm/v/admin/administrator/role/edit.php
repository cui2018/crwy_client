<form method="post" id="editRole">
  <table width="80%" align="center" border="0" cellpadding="0" cellspacing="1" class="tables">
    <tr class="title">
      <td align="center" colspan="2">角色修改</td>
    </tr>
    <tr>
      <td width="15%">角色名称：</td>
      <td><input type="text" id="rolename" name="rolename" value="<?php echo $role['rolename']; ?>" class="input w160p"> <span id="rolename_error"></span></td>
    </tr>
    <tr>
      <td>角色拥有的权限：</td>
      <td>
        <ul class="flul">
          <?php foreach ($myPowers as $module): ?>
          <li><label><input type="checkbox" name="power[]" value="<?php echo $module['id']; ?>"<?php echo $module['checked'] ? ' checked' : ''; ?>><span><?php echo $module['name']; ?>(<?php echo $module['id']; ?>)</span></label></li>
          <?php endforeach; ?>
        </ul>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" value="修改角色" class="submitbtn">
        <input type="button" value="返回列表" class="listbtn goto" data-url="<?php echo ua('/administrator/role'); ?>">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<script>
$( function() {
	$("#editRole").submit( function() {
		var rolename = $("#rolename").val();
		var rtn = true;
		if ( !rolename ) {
			$("#rolename_error").text("请输入角色名称").addClass("c_red");
			rtn = false;
		}
		else $("#rolename_error").text("正确").removeClass("c_red");
		return rtn;
	} );
} );
</script>