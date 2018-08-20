<table width="100%" border="0" cellpadding="0" cellspacing="1" class="lists">
  <tr class="title">
    <td align="center" colspan="7">操作日志</td>
  </tr>
  <tr class="btns">
    <td colspan="7"><input type="button" value="查看后台登录日志" class="listbtn goto" data-url="<?php echo ua('/administrator/log/login'); ?>"></td>
  </tr>
  <tr class="title">
    <td width="5%" align="center">ID</td>
    <td width="10%">姓名</td>
    <td width="10%">登录帐号</td>
    <td width="10%">登录时间</td>
    <td width="10%">登录IP</td>
    <td>操作说明</td>
    <td width="10%" align="center">涉及数据</td>
  </tr>
<?php
if ( $operate ):
	foreach ($operate as $item):
?>
  <tr>
    <td align="center"><?php echo $item['id']; ?></td>
    <td><?php echo $item['name']; ?></td>
    <td><?php echo $item['uname']; ?></td>
    <td><?php echo date('Y-m-d H:i:s',$item['time']); ?></td>
    <td><?php echo $item['ip']; ?></td>
    <td><?php echo $item['remark']; ?></td>
    <td align="center">
      <a href="javascript:void(0);" class="showData<?php echo $item['data'] ? ' current' : ''; ?>">查看数据</a>
      <?php if ( $item['data'] ): ?>
      <div class="datamask">
        <pre><?php echo printr2(json_decode($item['data'],TRUE)); ?></pre>
      </div>
      <?php endif; ?>
    </td>
  </tr>
<?php endforeach; ?>
  <tr class="btns">
    <td colspan="7" align="right" class="page"><?php echo $page; ?></td>
  </tr>
<?php else: ?>
  <tr class="btns">
    <td colspan="7" align="center">暂无数据</td>
  </tr>
<?php endif; ?>
</table>
</body>
</html>