(function(){
	var pageNum = 1;
	$(function(){
		$('#shade>div>span').on('click', function(){
	         $('#shade').css("display","none");
	    })
	    $.https("/userinfo/usergiftlist", {
	        page : 1,
	        openId: USER.openid
	    }, function(callback) {
	        if(callback.status == 2000){
	            if(callback.data.usergiftlist.length > 0){
	                var gamelist = "";
	                var giftcontent = $(".giftcontent");
	                for(var i =0;i<callback.data.usergiftlist.length;i++){
	                    var str ="<li><div>"
	                        +"<img src='"+callback.data.usergiftlist[i].ioc+"' alt=''>"
	                        +"</div><div>"
	                        +"<p><span>"+callback.data.usergiftlist[i].giftTitle+"</span><span>"
	                        +callback.data.usergiftlist[i].giftDescriptor
	                        +"</span></p>"
	                        +"</div><p class='show' data-i='" + i + "'>查看</p></li>"
	                    $(str).find(".show").click( function() {
	                        var i = $(this).data("i");
	                        watch(
	                            callback.data.usergiftlist[i].giftTitle,
	                            callback.data.usergiftlist[i].code,
	                            callback.data.usergiftlist[i].giftDescriptor,
	                            callback.data.usergiftlist[i].gameid
	
	                        )
	                    } ).end().appendTo(giftcontent);
	                }
	                if(callback.data.totalpage == 1){
	                    $(".bottomTitle").html("关注公众号—潮人微游");
	                    return;//当加载全部后，终止所有ajax加载
	                }
	                if(pageNum < callback.data.totalPage){
	                    $(window).on('scroll', onscroll)
	                }else{
	                    $('.persongift').append('<div class="bottomTitle">关注公众号—潮人微游</div>');
	                    return;//当加载全部后，终止所有ajax加载
	                }
	            }else{
	                $(".persongift").empty();
	                var uli ="<div><span class='icon-nogift'><span class='path1'></span><span class='path2'></span><span class='path3'></span><span class='path4'></span><span class='path5'></span><span class='path6'></span><span class='path7'></span><span class='path8'></span><span class='path9'></span><span class='path10'></span><span class='path11'></span><span class='path12'></span><span class='path13'></span><span class='path14'></span><span class='path15'></span><span class='path16'></span><span class='path17'></span><span class='path18'></span><span class='path19'></span><span class='path20'></span><span class='path21'></span><span class='path22'></span><span class='path23'></span><span class='path24'></span><span class='path25'></span><span class='path26'></span><span class='path27'></span><span class='path28'></span></span><p class='lingquts'>还木有礼包呀~快点击领取！</p><div class='lingqubtn'><p>领取</p></div></div>";
	                $(".persongift").append(uli);
	                $(".lingqubtn")[0].addEventListener("click", function() {
	                    window.location.href = u("/gameGift.html")
	                });
	            }
	        }
	
	
	    })
	});
	
	var canLoad = true;
	function onscroll() {
	    if ( !canLoad ) return;
	    if ( $(this).scrollTop() > (parseInt( $('.giftcontent').height() ) - parseInt( $(window).height() ) )){
	        $('.bottomTitle').html("正在加载");
	        canLoad = false;
	        $.https("/userinfo/usergiftlist", {
	            page : ++pageNum,
	            openId: USER.openid
	   		}, function(callback) {
	                if (callback.status == '2000') {
	                    
	                    var gamelist = "";
	                    var giftcontent = $(".giftcontent");
	                    for(var i =0;i<callback.data.usergiftlist.length;i++){
	                       var str ="<li><div>"
	                            +"<img src='"+callback.data.usergiftlist[i].ioc+"' alt=''>"
	                            +"</div><div>"
	                            +"<p><span>"+callback.data.usergiftlist[i].giftTitle+"</span><span>"
	                            +callback.data.usergiftlist[i].giftDescriptor
	                            +"</span></p>"
	                            +"</div><p class='show' data-i='" + i + "'>查看</p></li>"
	                        $(str).find(".show").click( function() {
	                            var i = $(this).data("i");
	                            watch(
	                                callback.data.usergiftlist[i].giftTitle,
	                                callback.data.usergiftlist[i].code,
	                                callback.data.usergiftlist[i].giftDescriptor,
	                                callback.data.usergiftlist[i].gameid
	
	                            )
	                        } ).end().appendTo(giftcontent);
	                    }
	                    if(pageNum == callback.data.totalPage){
	                        $('.bottomTitle').html("关注公众号—潮人微游");
	                        return;//当加载全部后，终止所有ajax加载
	                    }
	
	                    canLoad = !canLoad;
	                }
	
	        })
	    }
	}
	
	function watch(title,code,descripde,gameid){
	    $("#shade").css("display","block")
	    $(".shadetitle").html(title);
	    $(".shadedesc").html($.trim(descripde));
	    $(".codenum").html(code);
	    $(".shadehref")[0].addEventListener("click", function() {
	          window.location.href = ucv("/publickurl.html?gameid="+gameid);
	     })
	}
})();
