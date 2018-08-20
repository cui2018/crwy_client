<form method="post">
  <table width="80%" align="center" border="0" cellpadding="0" cellspacing="1" class="tables c_admin_green">
    <tr class="title">
      <td align="center" colspan="2">权限修改</td>
    </tr>
    <tr>
      <td width="15%">模块名称：</td>
      <td><input type="text" name="name" value="<?php echo $module['name']; ?>" class="input w160p"></td>
    </tr>
    <tr>
      <td>模块标识：</td>
      <td><input type="text" name="sign" value="<?php echo $module['sign']; ?>" class="input w100p"><span class="c_green">（请填写模块英文名称）</span></td>
    </tr>
    <tr>
      <td>父级模块：</td>
      <td>
        <select id="pid" name="pid" class="select">
          <option value="0">=作为顶级模块=</option>
<?php foreach ($powers as $item): ?>
          <option value="<?php echo $item['id']; ?>"<?php echo $item['id'] == $module['pid'] ? ' selected' : ''; ?>><?php echo $item['name']; ?>(<?php echo $item['id']; ?>)</option>
<?php endforeach; ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>跳转地址：</td>
      <td><input type="text" name="url" value="<?php echo $module['url']; ?>" class="input w200p"><span class="c_green db mt5p">（地址不需包含后台目录，如新闻添加页地址可以写为/news/add，对应控制器是后台目录下的news控制器的add方法。如果不填写则菜单点击不会跳转，一般用来做二级菜单的父类模块）</span></td>
    </tr>
    <tr id="icos"<?php echo $module['pid'] == 0 ? '' : ' class="dn"'; ?>>
      <td>列表图标：</td>
      <td><ul class="flulimg">
        <?php foreach ( $icos as $item ): ?>
        <li><label><input type="radio" name="ico" value="<?php echo $item['name']; ?>"<?php echo $item['name'] == $module['ico'] ? ' checked' : ''; ?>><img src="<?php echo $item['url']; ?>" width="20" height="20"></label></li>
        <?php endforeach; ?>
      </ul><span class="c_green clear_l db">（仅当模块设置为顶级模块时有效）</span></td>
    </tr>
    <tr>
      <td>排序：</td>
      <td><input type="text" name="orderby" class="input w50p tc" value="<?php echo $module['orderby']; ?>"><span class="c_green">（数值越大排序越靠前）</span></td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" value="修改模块" class="submitbtn">
        <input type="button" value="返回列表" class="listbtn goto" data-url="<?php echo ua('/develop/module'); ?>">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<script>
$( function() {
  $("#pid").change( function() {
    var val = parseInt($(this).val());
    if ( val == 0 ) $("#icos").show();
    else $("#icos").hide();
  } );
} );
</script>