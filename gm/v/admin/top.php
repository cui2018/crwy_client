<link href="<?php echo uv('/css/admin/top.css'); ?>" rel="stylesheet" type="text/css">
<div class="topbg">
  <table width="100%" height="64" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="100" align="center" valign="middle"><img src="<?php echo uv('/images/admin/logo.jpg'); ?>" height="50" class="mt5p"></td>
      <td width="300" class="title"><?php echo $webconfig['admintitle']; ?></td>
      <td align="center">&nbsp;</td>
      <td width="160" align="right">
        <table id="ctrls"cellpadding="0" cellspacing="0">
          <tr>
            <td align="center"><a href="javascript:void(0);" id="refresh" class="refresh" title="刷新"></a></td>
            <td align="center"><a href="javascript:void(0);" id="home" class="home" title="后台首页"></a></td>
            <td align="center"><a href="javascript:void(0);" id="logout" class="logout" title="退出后台"></a></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</div>
<table width="100%" height="32" border="0" cellpadding="0" cellspacing="0" background="<?php echo u('/images/admin/topbgd.gif'); ?>">
  <tr>
    <td width="30"></td>
    <td width="190" align="left"><div class="h30p lh30p oh">欢迎您，<span class="c_red fw"><?php echo $me['name'] ? $me['name'] : $me['uname']; ?></span></div></td>
    <td>&nbsp;</td>
    <td width="230" align="right">服务器时间：<span id="time"></span></td>
    <td width="30"></td>
  </tr>
</table>
</body>
</html>
<script>
String.prototype.add = function(s,l,m) {
	var str = this.toString();
	s = s.toString();
	for ( var i = str.length; i < l; i++ ) {
		if ( m == 0 ) {
			str = s + str;
		}
		else if ( m == 1 ) {
			str += s;
		}
	}
	return str;
};
$( function() {
	$("#refresh").tap( function() {
		top.main.location.reload();
	} );
	$("#home").tap( function() {
		top.main.location.href = "main";
	} );
	$("#logout").tap( function() {
		top.main.confirm("是否确定离开后台管理系统？", function(is) {
			if ( is ) top.location.href = "<?php echo ua('/login/out'); ?>";
		} );
	} );
	var serverTime = <?php echo NOW_TIME; ?>;
	setInterval( function() {
		getCurTime();
	}, 1000 );
	function getCurTime() {
		/*
		//获取客户端时间
		var now = new Date();
		var y = now.getFullYear().toString();
		var m = (now.getMonth() + 1).toString();
		var d = now.getDate().toString();
		var h = now.getHours().toString();
		var i = now.getMinutes().toString();
		var s = now.getSeconds().toString();
		var time = y + "年" + m.add(0,2,0) + "月" + d.add(0,2,0) + "日 " + h.add(0,2,0) + ":" + i.add(0,2,0) + ":" + s.add(0,2,0);
		*/
		//获取服务端时间
		var time = serverTime.timeFormat("%Y年%m月%d日 %H:%i:%s");
		serverTime++;
		$("#time").text(time);
	}
	getCurTime();
} );
</script>