<table width="100%" border="0" cellpadding="0" cellspacing="1" class="lists">
  <tr class="title">
    <td align="center" colspan="5">登录日志</td>
  </tr>
  <tr class="btns">
    <td colspan="5"><input type="button" value="查看后台操作日志" class="listbtn goto" data-url="<?php echo ua('/administrator/log/operate'); ?>"></td>
  </tr>
  <tr class="title">
    <td width="10%" align="center">ID</td>
    <td width="25%">姓名</td>
    <td width="25%">登录帐号</td>
    <td width="20%">登录时间</td>
    <td width="20%">登录IP</td>
  </tr>
<?php
if ( $login ):
	foreach ($login as $item):
?>
  <tr>
    <td align="center"><?php echo $item['id']; ?></td>
    <td><?php echo $item['name']; ?></td>
    <td><?php echo $item['uname']; ?></td>
    <td><?php echo date('Y-m-d H:i:s',$item['time']); ?></td>
    <td><?php echo $item['ip']; ?></td>
  </tr>
<?php endforeach; ?>
  <tr class="btns">
    <td colspan="5" align="right" class="page"><?php echo $page; ?></td>
  </tr>
<?php else: ?>
  <tr class="btns">
    <td colspan="5" align="center">暂无数据</td>
  </tr>
<?php endif; ?>
</table>
</body>
</html>