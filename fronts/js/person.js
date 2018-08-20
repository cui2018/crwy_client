(function(){
	$(function(){
	    userinfo();
	    /*var UL = document.getElementById("iconlist");
	    var aLi = UL.getElementsByTagName("li");*/
	});
	/*获取个人中心列表*/
	var aLi = $("#iconlist li");
	/*我的好友*/
	aLi[0].addEventListener("click", function() {
	    window.location.href = u("/goodsfriend.html")
	});
	/*豪杰榜*/
	aLi[1].addEventListener("click", function() {
	    window.location.href = u("/herolist.html")
	});
	/*我的礼包*/
	aLi[2].addEventListener("click", function() {
	    window.location.href = u("/persongift.html")
	
	});
	/*实名认证*/
	aLi[4].addEventListener("click", function() {
	    window.location.href = u("/certification.html")
	
	});
	/*联系客服*/
	aLi[5].addEventListener("click", function() {
	    $(".customalert").css("display","block")
	
	})
    aLi[6].addEventListener("click", function() {
        window.location.href = u("/feedback.html")

    })
	
	
	
	/*关闭客服弹窗*/
	$(".known")[0].addEventListener("click", function() {
	    $(".customalert").css("display","none")
	
	})
	$(".known")[1].addEventListener("click", function() {
	    $(".customalert").css("display","none")
	
	})
	
	
	
	/*底部导航*/
	$("#nav div:nth-of-type(1)").on('click' , function(){
	    window.location.href = u("/index.html");
	});
	$("#nav div:nth-of-type(2)").on('click' , function(){
	    window.location.href = u("/gameGift.html");
	})
	
	/*获取个人中心用户信息*/
	function userinfo(){
		    $.https("/userinfo", {
	        openId: USER.openid
	    }, function(callback) {
	            if(callback.status == 2000){
	                $(".header_url img").attr("src",callback.data.headImgUrl);
	                $(".header_box p").html(ioNull.emoji.parse(callback.data.nickName));
	                /*在这里判断用户是否绑定手机*/
	                var userrechargenum = parseInt(callback.data.userHonor.userrechargenum);
	                var userrecharge = parseInt(callback.data.userHonor.userrecharge);
	                var userdriver = parseInt(callback.data.userHonor.userdriver);
	                var img = $(".titleimg img");
	                var url = "";
	                if ( userrechargenum >= 7 ) {
						url = '/img/qizhang.png';
					}else{
						if ( userrecharge > 0 && userrecharge < 6 ) {
							if ( userrecharge > 3 && userrecharge < 6 ) {
	                            url = '/img/zhuguangbaoqi.png';
							}else if(userrecharge == 3){
	                            url = '/img/minghsnegzaiwai.png';
							}else if(userrecharge== 2){
	                            url = '/img/shengmingqueqi.png';
							}else if(userrecharge == 1){
	                            url = '/img/fukediguo.png';
							}
						}else{
							if(userdriver == 1){
	                            url = '/img/laosiji.png';
							}else if(userdriver == 0){
	                            url = '/img/xinsiji.png';
							}
						}
					}
	                if ( url ) img.attr("src",ufv(url)).show();
	                if(callback.data.phone == ""){
	                    var string ="<span class='icon-right iconmoon'></span>"  ;
	                    $(".safelist").append(string);
	                    aLi[3].addEventListener("click", function() {
	                        window.location.href = "accountsafe.html"
	
	                    });
						
	                }else{
	                    $(".bangding").html(callback.data.phone);
	                }
	            }
	    })
	}
})();
