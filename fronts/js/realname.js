(function(){
	$(function(){
	    select();
	
	});
	var close = $(".close")[0];
	var cancel = $("#cancel")[0];
	var title = $("#title")[0];
	var content =$("#content");
	var sure = $("#sure")[0];
	var modalalert =$("#modal");
	close.addEventListener('touchstart', function() {
	    modalalert.css("display","none");
	    content.html("");
	});
	cancel.addEventListener('touchstart', function() {
	    modalalert.css("display","none");
	    content.html("");
	});
	function  select(){
		$.https("/userinfo/findrealname", {
	      openId: USER.openid
	  }, function(callback) {
	            if(callback.status == 2000) {
	                $(".prompt").html("<span class='icon-duihao'></span>&nbsp;您已通过实名认证");
	                $("input").attr("disabled",true);
	                $(".surebtn").css("display","none");
	                $(".username").val(callback.data.name);
	                $(".password").val(callback.data.identity)
	            } else {
	                $(".prompt").html("<span class='icon-wenxin'></span>&nbsp;根据最新监管要求，进行游戏需要身份验证");
	                $(".surebtn").html("<p>提交认证</p>");
	                $(".surebtn p")[0].addEventListener("click", function() {
	                    realname()
	
	                })
	            }
	  },function(err){
	     	content.html("认证失败");
	      modalalert.css("display","block");
	  } )
	}
	//var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
	var reg = new validater();  
	var  regget=/^([\u4e00-\u9fa5]){2,7}$/;   
	function realname(){
	var strnameval = $(".username").val();  
	    if(strnameval !== "" && $(".password").val() !== ""){
	      //if(reg.test($(".password").val())){
	      if(reg.checkIdNum($(".password").val()) && regget.test(strnameval)){
	      	$.httpsOnce("/userinfo/realname", {
	          openId: USER.openid,
	          "name": $(".username").val(),
	          "identity": $(".password").val()
	     		}, function(callback) {
	          if(callback.status == 2000) {
	              select();
	          } else {
	
	          }
	        }, function() {
	          content.html("认证失败");
	          modalalert.css("display","block");
	        } );
	      }else{
	          content.html("请正确填写所有内容");
	          modalalert.css("display","block")
	      }
	    }else{
	        content.html("所有内容必须全部填写");
	        modalalert.css("display","block")
	    }
	}
})();