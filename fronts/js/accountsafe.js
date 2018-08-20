(function(){
	/* 实名认证   */
	var wait = "";
	var close = $(".close")[0];
	var cancel = $("#cancel")[0];
	var title = $("#title")[0];
	var content =$("#content");
	var sure = $("#sure")[0];
	var modalalert =$("#modal");
	$(function(){
		realphone()
	})
	
	close.addEventListener('touchstart', function() {
	    modalalert.css("display","none");
	    content.html("");
	});
	cancel.addEventListener('touchstart', function() {
	    modalalert.css("display","none");
	    content.html("");
	});
	sure.addEventListener("touchstart", function() {
	    var username = $(".username").val();
	    var pass = $(".password").val();
	    var codenum = $(".codename").val();
	    if(username !== "" && (/^1[34578]\d{9}$/.test(pass)) && codenum !== "") {
	
	        $.httpsOnce('/dosomething', {
	                "openid" : USER.openid,
	                "code": codenum,
	                "name": username,
	                "tel": pass
	            }, function(response){
	
	                if(response.status == 2000) {
	                    content.html("绑定手机号成功");
	                    modalalert.css("display","block");
	                   
	                    realphone();
	                    return false
	                } else {
	                    content.html("认证失败");
	                    modalalert.css("display","block")
	                }
	
	            },function(){
	                content.html("认证失败");
	                modalalert.css("display","block")
	            })
	
	    } else {
	        content.html("请必须正确填写所有内容");
	        modalalert.css("display","block")
	    }
	})
	var code = $(".codebtn")[0];
	code.addEventListener("click", function() {
	    var pass = $(".password").val();
	    if((/^1[34578]\d{9}$/.test(pass))) {
			$(".codebtn").attr('disabled',"true");
	        $.httpsSns( {
	            "tel": pass,
	            "openid" : USER.openid
	        }, function(response){
	            if(response.status == 2000){
	                content.html("验证码发送成功");
	                modalalert.css("display","block");
	                var wait = 60;
	                var shi = setInterval(function(){
	                    wait--;
	                    if(wait == 0){
	                        $(".codebtn").html("已发送");
	                        clearInterval(shi);
	                    }else{
	                        $(".codebtn").html("已发送(" + wait + "s)");
	                    }
	                },1000)
	                function time() {
	                    if(wait == 0) {
	                        $(".codebtn").html("已发送");
	                        $(".codebtn").removeAttr("disabled");
	                    } else {
	                        setTimeout(function() {
	                                wait--;
	                                time()
	                                $(".codebtn").html("已发送(" + wait + "s)");
	                            },
	                            1000)
	                    }
	            }
	
	            }else{
	            	$(".codebtn").removeAttr("disabled");
	                content.html("验证码发送失败");
	                modalalert.css("display","block");
	            }
	        }, function(error) {
	        	 $(".codebtn").removeAttr("disabled");
	            content.html("验证码发送失败");
	            modalalert.css("display","block");
	        })
	
	    } else {
	        content.html("请填写正确的手机号");
	        modalalert.css("display","block");
	    }
	
	})
	
	function realphone(){
		$.https('/userinfo/getusertel', {
	            "openId" : USER.openid
	        }, function(response){
	            if(response.status == 2000){
	            	$(".titlename").html("绑定成功");
	                 $(".username").val(response.data.trueName);
	                 $(".password").val(response.data.phone);
	                 $(".username").attr('disabled',"true");
	                 $(".password").attr('disabled',"true");
	                 $(".realcode").css("display","none");
	                 $(".btnsure").css("display","none");
	            }else{
	            	
	            }
	        }, function(error) {
	        	
	        })
	}
})();


/* 实名认证   */
/*var wait = "";
var close = $(".close")[0];
var cancel = $("#cancel")[0];
var title = $("#title")[0];
var content =$("#content");
var sure = $("#sure")[0];
var modalalert =$("#modal");
$(function(){
	realphone()
})

close.addEventListener('touchstart', function() {
    modalalert.css("display","none");
    content.html("");
});
cancel.addEventListener('touchstart', function() {
    modalalert.css("display","none");
    content.html("");
});
sure.addEventListener("touchstart", function() {
    var username = $(".username").val();
    var pass = $(".password").val();
    var codenum = $(".codename").val();
    if(username !== "" && (/^1[34578]\d{9}$/.test(pass)) && codenum !== "") {

        $.httpsOnce('/dosomething', {
                "openid" : USER.openid,
                "code": codenum,
                "name": username,
                "tel": pass
            }, function(response){

                if(response.status == 2000) {
                    content.html("绑定手机号成功");
                    modalalert.css("display","block");
                   
                    realphone();
                    return false
                } else {
                    content.html("认证失败");
                    modalalert.css("display","block")
                }

            },function(){
                content.html("认证失败");
                modalalert.css("display","block")
            })

    } else {
        content.html("请必须正确填写所有内容");
        modalalert.css("display","block")
    }
})*/
/*var code = $(".codebtn")[0];
code.addEventListener("click", function() {
    var pass = $(".password").val();
    if((/^1[34578]\d{9}$/.test(pass))) {
		$(".codebtn").attr('disabled',"true");
        $.httpsSns( {
            "tel": pass,
            "openid" : USER.openid
        }, function(response){
            if(response.status == 2000){
                content.html("验证码发送成功");
                modalalert.css("display","block");
                var wait = 60;
                var shi = setInterval(function(){
                    wait--;
                    if(wait == 0){
                        $(".codebtn").html("已发送");
                        clearInterval(shi);
                    }else{
                        $(".codebtn").html("已发送(" + wait + "s)");
                    }
                },1000)
                function time() {
                    if(wait == 0) {
                        $(".codebtn").html("已发送");
                        $(".codebtn").removeAttr("disabled");
                    } else {
                        setTimeout(function() {
                                wait--;
                                time()
                                $(".codebtn").html("已发送(" + wait + "s)");
                            },
                            1000)
                    }
            }

            }else{
            	$(".codebtn").removeAttr("disabled");
                content.html("验证码发送失败");
                modalalert.css("display","block");
            }
        }, function(error) {
        	 $(".codebtn").removeAttr("disabled");
            content.html("验证码发送失败");
            modalalert.css("display","block");
        })

    } else {
        content.html("请填写正确的手机号");
        modalalert.css("display","block");
    }

})
*/
/*function realphone(){
	$.https('/userinfo/getusertel', {
            "openId" : USER.openid
        }, function(response){
            if(response.status == 2000){
            	$(".titlename").html("绑定成功");
                 $(".username").val(response.data.trueName);
                 $(".password").val(response.data.phone);
                 $(".username").attr('disabled',"true");
                 $(".password").attr('disabled',"true");
                 $(".realcode").css("display","none");
                 $(".btnsure").css("display","none");
            }else{
            	
            }
        }, function(error) {
        	
        })
}

*/