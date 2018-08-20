
	$(function(){
	    /*接口调用*/
	    frienddetails()
	});
	/*从上一页获取数据*/
	function getUrlParam(name) {
	    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
	    var r = window.location.search.substr(1).match(reg); //匹配目标参数
	    if (r != null)
	        return unescape(r[2]);
	    return null; //返回参数值
	}
	/*获取好友正玩的游戏数据*/
	function frienddetails(){
	    $.https('/userinfo/userfindfriendsplaygame', {
	            "friendOpenId" : getUrlParam("id"),
	            "openId" : USER.openid,
	            "page": 1
	        }, function(response) {
	          if(response.status == 2000){
	
	              /* 获取好友头像和昵称*/
	              $(".header").empty();
	              var nickname ="";
	              nickname = "<div><img src='"+response.data.headImgUrl+"'>"
	                            +"</div><span>"
	                            +ioNull.emoji.parse(response.data.nickName)
	                            + "</span>";
	              $(".header").append(nickname);
	
	
	              /*获取游戏列表*/
	             var  footer = "";
	              var footerbox = "";
	              for(var ints = 0;ints<response.data.gamelist.length;ints++){
	                footer += "<li><div><img src='"+response.data.gamelist[ints].ioc+"'>"
	                          + "</div><div>"
	                          +"<p>"
	                         +response.data.gamelist[ints].gameName
	                         +"</p>"
	                         +"<p>最近登陆：<span>"
	                         +response.data.gamelist[ints].logintime
	                         +"</span></p> </div><p class='show' data-ints='" + ints + "'>开始</p></li>"
	              }
	              footerbox = "<p>最近在玩</p>"
	                            +"<ul class='footercont'>"+footer+"</ul>";
	              $(".footer").append(footerbox).find(".show").click( function() {
                	var ints = $(this).data("ints");
                    nowplay(
                        response.data.gamelist[ints].gameid
                    );
                } );
	          }
	
	        if(response.data.totalpage == 1){
	            $(".bottomTitle").html("关注公众号—潮人微游");
	            return;//当加载全部后，终止所有ajax加载
	        }
	          /*调取jquery滚动方法*/
	          $(window).on('scroll', onscroll)
	        })
	}
	
	
	/*jquery滚动方法*/
	var canLoad = true; var pageNum = 1;
	function onscroll() {
	    if ( !canLoad ) return;
	    /*滑动的高度等于文本的高度-窗口的高度*/
	    if ( $(this).scrollTop() == (parseInt($('.content').height() ) - parseInt( $(window).height() ))){
	        canLoad = false;
	        $(".bottomTitle").html("正在加载");
	        $.https('/userinfo/userfindfriendsplaygame', {
	                "friendOpenId" : getUrlParam("id"),
	                "openId" : USER.openid,
	                page : ++pageNum
	            }, function (response) {
	                if(response.status == 2000){
	                    /* 获取好友头像和昵称*/
	                    $(".header").empty();
	                    var nickname = "<div><img src='"+response.data.headImgUrl+"' alt=''>"
	                        +"</div><span>"
	                        +response.data.nickName
	                        + "</span>";
	                    $(".header").append(nickname);
	
	
	                    /*获取游戏列表*/
	                    var footer = "";
	                    for(var ints = 0;ints<response.data.gamelist.length;ints++){
	                        footer += "<li><div><img src='"+response.data.gamelist[ints].ioc+"' alt=''>"
	                            + "</div><div>"
	                            +"<p>"
	                            +response.data.gamelist[ints].gameName
	                            +"</p>"
	                            +"<p>最近登陆：<span>"
	                            +response.data.gamelist[ints].logintime
	                            +"</span></p> </div><p class='show' data-ints='" + ints + "'>开始</p></li>"
	
	
	                    }
	                     $(".footercont").append(footer).find(".show").click( function() {
	                	var ints = $(this).data("ints");
	                    nowplay(
	                        response.data.gamelist[ints].gameid
	                    );
	                } );
	
	                    /*到达总页数的时候尾部追加*/
	                    if(pageNum == response.data.totalpage){
	                        $(".bottomTitle").html("关注公众号—潮人微游")
	                        return;//当加载全部后，终止所有ajax加载
	                    }
	                    canLoad = !canLoad;
	                }
	
	            })
	    }
	}
	/*正在玩*/
	function nowplay(id){
	    $.https('/playgame/userplaygame', {
	            "openId" : USER.openid,
	            "gameid": id
	        }, function(response) {
	            if(response.status == 2000){
	                window.location.href = ucv("/publickurl.html?gameid="+id);
	            }
	
	        })
	}
