<table width="100%" border="0" cellpadding="0" cellspacing="1" class="lists">
  <tr class="title">
    <td align="center" colspan="6">模块列表</td>
  </tr>
  <tr class="btns">
    <td colspan="6"><input type="button" value="添加模块" class="editbtn goto" data-url="<?php echo ua('/develop/module/add'); ?>"></td>
  </tr>
  <tr class="title">
    <td width="10%" align="center">模块ID</td>
    <td>模块名称</td>
    <td>模块标识</td>
    <td>父级模块</td>
    <td width="10%" align="center">排序</td>
    <td width="10%" align="center">操作</td>
  </tr>
<?php
if ( $module ):
	foreach ($module as $item):
?>
  <tr>
    <td align="center"><?php echo $item['id']; ?></td>
    <td><?php echo $item['name']; ?></td>
    <td><?php echo $item['sign']; ?></td>
    <td><?php echo $item['parentname']; ?></td>
    <td align="center"><?php echo $item['orderby']; ?></td>
    <td align="center">
      <a href="<?php echo ua('/develop/module/edit/' . $item['id']); ?>">修改</a>
      <a href="<?php echo ua('/develop/module/del/' . $item['id']); ?>" class="ondelete">删除</a>
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