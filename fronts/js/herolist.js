
	$(function(){
	    list();
	    hero()
	  /*  $(".ranking")[0].addEventListener("click", function() {
	        hishero()
	    });*/
	    $(".close")[0].addEventListener("click", function() {
	        $(".herolistalert").css("display","none")
	
	    })
	    $(".known")[0].addEventListener("click", function() {
	        $(".herolistalert").css("display","none")
	
	    })
	    $(".fenxiangalert")[0].addEventListener("click", function() {
	        $(".fenxiangalert").css("display","none")
	
	    })
	
	})
	function havelist(){
	    $.https('/userinfo/loginplute', {
	            "openId" : USER.openid
	        }, function (callback) {
	            if(callback.status == 2000){
		            $(".herolistalert").css("display","block");
		            $(".codenumber").html(callback.data.loginmoney);
		            $(".herolistul").empty();
		            var string = "";
		            for(var i = 0; i<3&&i<callback.data.gamelist.length;i++){
		                string += "<li class='show' data-i='" + i + "'><div><img src='"+callback.data.gamelist[i].ioc+"'></div><p>"
		                        +callback.data.gamelist[i].gameName+"</p></li>"
		            }
		            $(".herolistul").append(string).find(".show").click( function() {
		                	var i = $(this).data("i");
		                    playnow(
		                        callback.data.gamelist[i].gameid
		                    );
		            } );
		       }
	
	     })
	}
	function playnow(id){
		 $.https('/playgame/userplaygame', {
	            "openId" : USER.openid,
	            "gameid": id
	        }, function(response) {
	            if(response.status == 2000){
	                window.location.href = ucv("/publickurl.html?gameid="+id);
	            }
	
	        })
	}
	function hero(){
	
	    $.https('/userinfo/plutefive', {
	            "openId" : USER.openid
	        }, function(callback){
	            if(callback.status == 2000){
	                $(".heroower").empty();
	                $(".datetime").html(callback.data.startDate +'-' +callback.data.endDate);
	                var hisower = "<p class='datetime timedeta'>"
	                            +(callback.data.startDate).substr(5,5) +'至' +(callback.data.endDate).substr(5,5)
	                            +"</p><p class='ranking'>"
	                            +"<span  class='sqpm'>上期排名</span>"
	                            +"</p>";
	                $(".heroower").prepend(hisower).find(".sqpm").click( function() {
		                    hishero()
		                } );
	                $(".herolistbody").empty();
	                $(".oneself").empty();
	                var string = "";
	
	                if(callback.data.existplute == 0){
	                    string +="<li class='myself'>"
	                        +"<p><img src='"
	                        +callback.data.usermysel.headImgUrl+"'>&nbsp;&nbsp;</p>"
	                        +"<p>"
	                        +callback.data.usermysel.nickName
	                        +"</p>"
	                        +"<p>暂未上榜</p>"
	                        +"<p class='yelist' id='yelistid'>我要上榜</p>"
	                        +"</li>";
	                  /*  $(".oneself").append(string);
	                    $(".yelist")[0].addEventListener("click", function() {
	                        havelist()
	
	
	                    })*/
	                     $(".oneself").append(string).find(".yelist").click( function() {
		                    havelist();
		                } );
	                }else{
	                    string +="<li class='myself'>"
	                        +"<p><img src='"
	                        +callback.data.usermysel.headImgUrl+"'>&nbsp;&nbsp;</p>"
	                        +"<p>"
	                        +callback.data.usermysel.nickName
	                        +"</p>"
	                        +"<p>已上榜</p>"
	                        +"</li>";
	                    $(".oneself").append(string)
	                }
	
	                var str = "";
	                if(callback.data.everyplute.length){
	
	                if(callback.data.everyplute.length == 1){
	
	                }
	                if(callback.data.everyplute.length >0){
	                    if(callback.data.everyplute.length == 1){
	                        str += "<li class='liitem'></li><li class='liitem'><div><img src='"+ ufv('/img/top01.jpg') +"'>"
	                            +"<div><img src='"
	                            +callback.data.everyplute[0].headImgUrl+"'>"
	                            +"</div></div>"
	                            +"<p>"
	                            +callback.data.everyplute[0].nickName
	                            +"</p></li><li class='liitem'></li>"
	                    }else{
	                        str += "<li class='liitem'><div><img src='"+ ufv('/img/top02.jpg') +"'>"
	                            +"<div><img src='"+callback.data.everyplute[1].headImgUrl+"'>"
	                            +"</div></div>"
	                            +"<p>"
	                            +callback.data.everyplute[1].nickName
	                            +"</p></li>"
	                    }
	
	                }
	                if(callback.data.everyplute.length>1){
	                    str += "<li class='liitem'><div><img src='"+ ufv('/img/top01.jpg') +"'>"
	                        +"<div><img src='"
	                        +callback.data.everyplute[0].headImgUrl+"'>"
	                        +"</div></div>"
	                        +"<p>"
	                        +callback.data.everyplute[0].nickName
	                        +"</p></li>"
	                }
	                if(callback.data.everyplute.length>2){
	                    str += "<li class='liitem'><div><img src='"+ ufv('/img/top03.jpg') +"'>"
	                        +"<div><img src='"
	                        +callback.data.everyplute[2].headImgUrl+"'>"
	                        +"</div></div>"
	                        +"<p>"
	                        +callback.data.everyplute[2].nickName
	                        +"</p>"
	                        +"</li>"
	                }
		                str += "<li class='clearboth'>"
		                    +"</li>"
	                if(callback.data.everyplute.length>3){
	                    str += "<li class='libox'><p>4 &nbsp;&nbsp;</p>"
	                        +"<p>"
	                        +callback.data.everyplute[3].nickName
	                        +"</p>"
	                        +"<p class='btnmoney'>88元红包</p>"
	                        +"</li>"
	
	                }
	                if(callback.data.everyplute.length>4){
	                    str +="<li class='libox'><p>5 &nbsp;&nbsp;</p>"
	                        +"<p>"
	                        +callback.data.everyplute[4].nickName
	                        +"</p>"
	                        +"<p class='btnmoney'>58元红包</p>"
	                        +"</li>"
	                }
	                }
	                $(".herolistbody").append(str);
	
	
	            }
	        })
	}
	
	
	function list() {
	    var string ="<p>活动详情</p>"
	               +"<span>每期前十名可解锁终身荣誉称号（根据排名称号不同）。</span>"
	               +"<p>活动时间</p>"
	               +"<p>一周7天 <span class='datetime'></span></p>"
	               +"<p>活动规则</p>"
	               +"<p>1、您的增长值为本周游戏内充值数额。</p>"
	               +"<p>对应金额：</p>"
	               +"<p>2、活动期间，增长值排名前5的用户，即可获得相应的红包及额外积分奖励！</p>"
	               +"<p>3、中奖用户请关注公众号【<span>潮人微游</span>】找客服领取奖励！</p>"
	               +"<p>4、活动最终解释权归潮人微游所有</p>"
	               +"<div class='tablediv'><table  border='1' cellspacing='0' cellpadding='0'>"
	               +"<tr><th>潮人微游排名</th><th>奖励</th></tr>"
	               +"<tbody><tr><td>第一名</td><td>188元红包</td></tr>"
	               +"<tr><td>第二名</td><td>158元红包</td></tr>"
	               +"<tr><td>第三名</td><td>108元红包</td></tr>"
	               +"<tr><td>第四名</td><td>88元红包</td></tr>"
	               +"<tr><td>第五名</td><td>58元红包</td></tr></tbody></table></div>";
	    $(".herolistbox").append(string);
	    $(".tellmycont").html("<div class='tellmy'><p>告诉朋友</p></div>");
	   	$(".tellmy")[0].addEventListener("click", function() {
	    	$(".fenxiangalert").css("display","block")
		});
	}
	function hishero(){
	
	    $.https('/userinfo/plutefivebefore', {
	            "openId" : USER.openid
	        }, function(callback){
	            if(callback.status == 2000){
	                $(".herolistbody").empty();
	                $(".heroower").empty();
	                    $(".datetime").html(callback.data.startDate +'-' +callback.data.endDate);
	                var hisower = "<p class='datetime timedeta'>"
	                    +(callback.data.startDate).substr(5,5) +'至' +(callback.data.endDate).substr(5,5)
	                    +"</p><p class='ranking'>"
	                    +"<span class='bqpm'>本期排名</span>"
	                    +"</p>";
	                $(".heroower").prepend(hisower).find(".bqpm").click( function() {
		                   hero()
		                } );
	                    var str = "";
	                    if(callback.data.everyplute.length>0){
	                        str += "<li class='liitem'><div><img src='"+ ufv('/img/top02.jpg') +"' alt=''>"
	                            +"<div><img src='"+callback.data.everyplute[1].headImgUrl+"' alt=‘’>"
	                            +"</div></div>"
	                            +"<p>"
	                            +callback.data.everyplute[1].nickName
	                            +"</p></li>"
	                    }
	                    if(callback.data.everyplute.length>1){
	                        str += "<li class='liitem'><div><img src='"+ ufv('/img/top01.jpg') +"' alt=''>"
	                            +"<div><img src='"
	                            +callback.data.everyplute[0].headImgUrl+"' alt=''>"
	                            +"</div></div>"
	                            +"<p>"
	                            +callback.data.everyplute[0].nickName
	                            +"</p></li>"
	                    }
	                    if(callback.data.everyplute.length>2){
	                        str += "<li class='liitem'><div><img src='"+ ufv('/img/top03.jpg') +"' alt=''>"
	                            +"<div><img src='"
	                            +callback.data.everyplute[2].headImgUrl+"' alt=''>"
	                            +"</div></div>"
	                            +"<p>"
	                            +callback.data.everyplute[2].nickName
	                            +"</p>"
	                            +"</li>"
	                    }
	                    str += "<li class='clearboth'>"
	                        +"</li>"
	                    if(callback.data.everyplute.length>3){
	                        str += "<li class='libox'><p>4 &nbsp;&nbsp;</p>"
	                            +"<p>"
	                            +callback.data.everyplute[3].nickName
	                            +"</p>"
	                            +"<p class='btnmoney'>88元红包</p>"
	                            +"</li>"
	
	                    }
	                    if(callback.data.everyplute.length>4){
	                        str +="<li class='libox'><p>5 &nbsp;&nbsp;</p>"
	                            +"<p>"
	                            +callback.data.everyplute[4].nickName
	                            +"</p>"
	                            +"<p class='btnmoney'>58元红包</p>"
	                            +"</li>"
	                    }
	                    var stringlist = "<ul class=''>"+str+"</ul>";
	                    $(".herolistbody").append(stringlist);
	
	
	                }
	        })
	}
