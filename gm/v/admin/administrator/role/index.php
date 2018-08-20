<table width="100%" border="0" cellpadding="0" cellspacing="1" class="lists">
  <tr class="title">
    <td align="center" colspan="6">角色列表</td>
  </tr>
  <tr class="btns">
    <td colspan="6"><input type="button" value="添加角色" class="editbtn goto" data-url="<?php echo ua('/administrator/role/add'); ?>"></td>
  </tr>
  <tr class="title">
    <td width="8%">角色名称</td>
    <td width="63%">权限</td>
    <td width="8%">建立者</td>
    <td width="11%">建立时间</td>
    <td width="10%" align="center">操作</td>
  </tr>
<?php
if ( $roles ):
	foreach ($roles as $item):
?>
  <tr>
    <td><?php echo $item['rolename']; ?></td>
    <td>
      <ul class="flul">
        <?php foreach ($item['powers'] as $module): ?>
        <li><?php echo $module['name']; ?>(<?php echo $module['id']; ?>)</li>
        <?php endforeach; ?>
      </ul>
    </td>
    <td><?php echo $item['mothername']; ?></td>
    <td><?php echo date('Y-m-d H:i:s',$item['birthday']); ?></td>
    <td align="center">
	  <?php if ( $me['roleid'] != $item['id'] ): ?>
      <a href="<?php echo ua('/administrator/role/edit/' . $item['id']); ?>">修改</a>
      <a href="<?php echo ua('/administrator/role/del/' . $item['id']); ?>" class="ondelete">删除</a>
      <?php endif; ?>
    </td>
  </tr>
<?php
	endforeach;
else:
?>
  <tr class="btns">
    <td colspan="6" align="center">暂无数据</td>
  </tr>
<?php endif; ?>
</table>
</body>
</html>