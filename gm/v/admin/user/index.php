<script>
$( function() {
  $(".submitbtn").click( function() {
    $.search( {
      openid : $("#openid").val(),
      nick : $("#nick").val(),
      name : $("#name").val(),
      tel : $("#tel").val()
    } );
  } );
  var form = $("#form");
  $(".loginTest").click( function() {
    var tr = $(this).closest("tr");
    var noncestr = tr.data("noncestr");
    var openid = tr.data("openid");
    var sign = tr.data("sign");
    var timestamp = tr.data("timestamp");
    form.attr("action","http://fronts.edisonluorui.com/manager/login");
    form.children("input[name=noncestr]").val(noncestr);
    form.children("input[name=openid]").val(openid);
    form.children("input[name=sign]").val(sign);
    form.children("input[name=timestamp]").val(timestamp);
    form.submit();
  } );
  $(".login").click( function() {
    var tr = $(this).closest("tr");
    var noncestr = tr.data("noncestr");
    var openid = tr.data("openid");
    var sign = tr.data("sign");
    var timestamp = tr.data("timestamp");
    form.attr("action","http://www.edisonluorui.com/manager/login");
    form.children("input[name=noncestr]").val(noncestr);
    form.children("input[name=openid]").val(openid);
    form.children("input[name=sign]").val(sign);
    form.children("input[name=timestamp]").val(timestamp);
    form.submit();
  } );
} );
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="lists">
  <tr class="title">
    <td align="center" colspan="8">用户列表</td>
  </tr>
  <tr class="btns">
    <td colspan="8">
      <input type="text" id="openid" value="<?php echo array_value($seastr,'openid'); ?>" placeholder="OpenId" class="input w200p">
      <input type="text" id="nick" value="<?php echo array_value($seastr,'nick'); ?>" placeholder="昵称" class="input w200p">
      <input type="text" id="name" value="<?php echo array_value($seastr,'name'); ?>" placeholder="姓名" class="input w200p">
      <input type="text" id="tel" value="<?php echo array_value($seastr,'tel'); ?>" placeholder="手机号" class="input w200p">
      <input type="button" value="搜索" class="submitbtn">
    </td>
  </tr>
  <tr class="title">
    <td width="4%" align="center">ID</td>
    <td>头像/昵称</td>
    <td width="10%">OpenId</td>
    <td width="10%" align="center">地市</td>
    <td width="8%" align="center">姓名</td>
    <td width="8%" align="center">手机号</td>
    <td width="5%" align="center">性别</td>
    <td width="25%" align="center">操作</td>
  </tr>
<?php
if ( $user ):
  $sex = ['保密','男','女'];
	foreach ($user as $item):
?>
  <tr data-noncestr="<?php echo $item['noncestr']; ?>" data-openid="<?php echo $item['openId']; ?>" data-sign="<?php echo $item['sign']; ?>" data-timestamp="<?php echo $item['timestamp']; ?>">
    <td align="center"><?php echo $item['id']; ?></td>
    <td><img src="<?php echo $item['headImgUrl']; ?>" width="20" height="20"> <?php echo $item['nickName']; ?></td>
    <td align="center"><?php echo $item['openId']; ?></td>
    <td align="center"><?php echo $item['country'] . $item['province'] . $item['city']; ?></td>
    <td align="center"><?php echo $item['trueName']; ?></td>
    <td align="center"><?php echo $item['phone']; ?></td>
    <td align="center"><?php echo $sex[$item['sex']]; ?></td>
    <td align="center">
      <a href="javascript:void(0);" class="current loginTest">模拟登录测试服</a>
      <a href="javascript:void(0);" class="current login">模拟登录正式服</a>
    </td>
  </tr>
<?php endforeach; ?>
  <tr class="btns">
    <td colspan="8" align="right" class="page"><?php echo $page; ?></td>
  </tr>
<?php else: ?>
  <tr class="btns">
    <td colspan="8" align="center">暂无数据</td>
  </tr>
<?php endif; ?>
</table>
<form method="post" class="dn" id="form" target="_blank">
  <input type="hidden" name="noncestr">
  <input type="hidden" name="openid">
  <input type="hidden" name="sign">
  <input type="hidden" name="timestamp">
</form>
</body>
</html>