
	$(function(){
	    goods()
	});
	
	/*jquery滚动方法*/
	var canLoad = true; var pageNum = 1;
	function onscroll() {
	    if ( !canLoad ) return;
	    /*滑动的高度等于文本的高度-窗口的高度*/
	    if ( $(this).scrollTop() > (parseInt($('.goodcontent').height() ) - parseInt( $(window).height() ))){
	        canLoad = false;
	        $(".bottomTitle").html("正在加载");
	        $.https('/userinfo/usergetfriends', {
	            "openId" : USER.openid,
	            page : ++pageNum
	        }, function (callback) {
	            if(callback.status == 2000) {
	                if (callback.data.friendslist.length > 0) {
	                    var str = "";
	
	                    /*好友数据循环*/
	                    for (var i = 0; i < callback.data.friendslist.length; i++) {
	                        /*好友玩的游戏数据循环*/
	                        /*length == 3截取长度*/
	                        var gamelist = "";
	                        for (var j = 0; j < 3 && j < callback.data.friendslist[i].gamelist.length; j++) {
	                            gamelist += "<p><img src='" + callback.data.friendslist[i].gamelist[j].ioc + "' alt=''></p>"
	                        }
	
	                        if (callback.data.friendslist[i].gamelist.length > 0) {
	                            str += "<li class='show' data-i='" + i + "'>"
	                                + "<div class='headerimg'>"
	                                + "<img src='" + callback.data.friendslist[i].headImgUrl + "' alt=''>"
	                                + "</div><p>"
	                                + callback.data.friendslist[i].nickName
	                                + "</p>"
	                                + "<div class='gameul'>"
	                                + gamelist
	                                + "<i class='icon-right'></i></div></li>"
	                        } else {
	                            str += "<li>"
	                                + "<div class='headerimg'>"
	                                + "<img src='" + callback.data.friendslist[i].headImgUrl + "' alt=''>"
	                                + "</div><p>"
	                                + callback.data.friendslist[i].nickName
	                                + "</p>"
	                                + "<div class='gameul'>"
	                                + gamelist
	                                + "</div></li>"
	                        }
	
	                    }
	
	                    $(".goodcontent").append(str).find(".show").click( function() {
		                	var i = $(this).data("i");
		                    details(
		                        callback.data.friendslist[i].openId
		                    );
		                } );
	                    if(pageNum == callback.data.totalpage){
	                        $(".bottomTitle").html("关注公众号—潮人微游");
	                        return;//当加载全部后，终止所有ajax加载
	                    }
	                    canLoad = !canLoad;
	                } else {
	
	                }
	            }
	
	        })
	    }
	}
	/*获取数据*/
	function goods(){
	    $.https('/userinfo/usergetfriends', {
	            "openId" : USER.openid,
	            "page":1
	        }, function (callback) {
	            if(callback.status == 2000){
	            	if(callback.data.friendslist.length > 0){
	            		$(".goodcontent").empty();
		                var str ="";
		               
		                /*好友数据循环*/
		                for(var i =0;i<callback.data.friendslist.length;i++){
		                    /*好友玩的游戏数据循环*/
		                    /*length == 3截取长度*/
		                    var gamelist = "";
		                    for(var j =0;j<3&&j<callback.data.friendslist[i].gamelist.length;j++){
		                        gamelist +="<p><img src='"+callback.data.friendslist[i].gamelist[j].ioc+"' alt=''></p>"
		                    }
	
		                    if(callback.data.friendslist[i].gamelist.length > 0){
	                            str += "<li class='show' data-i='" + i + "'>"
	                                +"<div class='headerimg'>"
	                                +"<img src='"+callback.data.friendslist[i].headImgUrl+"' alt=''>"
	                                +"</div><p>"
	                                +callback.data.friendslist[i].nickName
	                                +"</p>"
	                                +"<div class='gameul'>"
	                                +gamelist
	                                +"<i class='icon-right'></i></div></li>"
							}else{
	                            str += "<li>"
	                                +"<div class='headerimg'>"
	                                +"<img src='"+callback.data.friendslist[i].headImgUrl+"' alt=''>"
	                                +"</div><p>"
	                                +callback.data.friendslist[i].nickName
	                                +"</p>"
	                                +"<div class='gameul'>"
	                                +gamelist
	                                +"</div></li>"
							}
	
		                }
	
		       
		                $(".goodcontent").append(str).find(".show").click( function() {
		                	var i = $(this).data("i");
		                    details(
		                        callback.data.friendslist[i].openId
		                    );
		                } );
	                    if(callback.data.totalpage == 1){
	                        $(".bottomTitle").html("关注公众号—潮人微游");
	                        return;//当加载全部后，终止所有ajax加载
	                    }
	                    $(window).on('scroll', onscroll)
	            	}else{
	                    $(".goodcontent").empty();
	                    var string = "";
	                    string += "<span class='icon-meiyouhaoyou meiyouicon'></span><p class='icontishi'>您还没有好友，可通过分享给好友寻找小伙伴呦</p>";
	                    $(".goodcontent").append(string)
	            	}
	            	 
	            }else{
	                $(".goodcontent").empty();
	                var string = "";
	                string += "<span class='icon-meiyouhaoyou meiyouicon'></span><p class='icontishi'>您还没有好友，可通过分享给好友寻找小伙伴呦</p>";
	                $(".goodcontent").append(string)
	            }
	        })
	}
	/*点击查看详情*/
	function details(id){
	    window.location.href=u("/goodsfrienddetails.html?id="+id)
	}
