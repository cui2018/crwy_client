
	$(function(){
	    $(window).scroll( function(){
	    });
	    $('#cancel').on('click' , function(){
	        window.location.href = u("/gameGift.html");
	    })
	
		$.https("/search", {
	                 openId: USER.openid
	           }, function(callback) {
	               if(callback.status == '2000'){
	                   var strhistorygame = '';
	                   var lenhistorygame = callback.data.historygame.length > 7 ? 7 : callback.data.historygame.length;
	                   for(var i = 0; i < lenhistorygame; i++){
	                       strhistorygame += '<li><a href="' + ucv("/publickurl.html?gameid="+ callback.data.historygame[i].gameid) + '">'+ callback.data.historygame[i].gameName +'</a></li>'
	                   }
	                    $('#clearrencen').before(strhistorygame);
	
	                   var  strdarrecommend = '';
	                   var lendarrecommend = callback.data.dayrecommend.length > 7 ? 7 : callback.data.dayrecommend.length;
	                   for(var j = 0; j < lendarrecommend; j++){
	                        strdarrecommend += '<li><a href="' + ucv("/publickurl.html?gameid="+ callback.data.dayrecommend[j].id) + '">'+ callback.data.dayrecommend[j].gameName +'</a></li>'
	                   }
	                   $('#clearhot').before(strdarrecommend)
	               }
	    })
	
	    $("#search").bind('input', function() {
	        var val = $("#search").val();
	        if( val == ""){
	            $("#gameList").hide();
	            $("#defaultHtml").show();
	        }else{
	            $("#gameList").show();
	            $("#defaultHtml").hide();
	
				$.https("/search/searchgift", {
	                 'gameName' :  val
	          }, function(callback) {
	                    if( callback.status != '2000' ){
	                        return
	                    }
	                    var str = '';
	                    for(var i = 0; i < callback.data.length; i++){
	
	                        var descriptor = callback.data[i].descriptor;
	                        var gfitdescriptor = callback.data[i].gift.giftDescriptor;
	                        var moregift = callback.data[i].num;
	                        var isnum = '';
	                            if(moregift ==0){
	                                isnum = "<li  class= 'moreGift none buweiling' data-i='" + i + "'>查看更多礼包<span>("+ moregift +")</span></li>"
	                            }else{
	                                isnum = "<li  class= 'moreGift yiweiling' data-i='" + i + "' >查看更多礼包<span>("+ moregift +")</span></li>"
	                            }
	
	
	                        str += "<ul>" +
	                                    "<li>" +
	                                    "<div><img src='" + callback.data[i].ioc + "'></div>" +
	                                    "<div>" +
	                                    "<p>" + callback.data[i].gameName + "</p>" +
	                                    "<p>" + descriptor + "</p>" +
	                                    "</div>" +
	                                    "<div><a href='" + ucv("/publickurl.html?gameid="+ callback.data[i].id) + "'>开始</a></div>" +
	                                    "</li>" +
	                                    "<li class = 'gamegift'>" +
	                                    "<div>" +
	                                    "<p>" + callback.data[i].gift.giftTitle + "</p>" +
	                                    "<p>" + gfitdescriptor + "</p>" +
	                                    "<div>" +
	                                    "<div>" +
	                                    "<div style = 'width:"+ (callback.data[i].gift.giftReceive)/callback.data[i].gift.giftNum*50+"vw'></div>" +
	                                    "</div>" +
	                                    "<div><span>"+ callback.data[i].gift.giftReceive +"/</span><span>"+ callback.data[i].gift.giftNum +"</span> </div>" +
	                                    "<div class='clearfix'></div>" +
	                                    "</div>" +
	                                    "</div>" +
	                                    "<div><a class='showwatch' data-i='" + i + "'>领取</a></div>"+
	                                    "</li>"+ isnum +
	                                "</ul>"
	                    }
	
	                   /* $("#gameList").empty().append(str);*/
	                  var tianjia = $("#gameList").empty().append(str);
	                  tianjia.find(".showwatch").click( function() {
		                	var i = $(this).data("i");
		                	var _this = $(this);
		                    getGiftdefault(
		                        callback.data[i].gift.id,
		                        callback.data[i].gift.giftTypeId,
		                        callback.data[i].id,
		                        _this
		                        
		                    );
		                } );
		             tianjia.find(".buweiling").click( function() {
		                	var i = $(this).data("i");
		                    getMoreGift(
		                        callback.data[i].id
		                        
		                    );
		                } );
		             tianjia.find(".yiweiling").click( function() {
		                	var i = $(this).data("i");
		                    getMoreGift(
		                       callback.data[i].id
		                    );
		                } );
	                    
	            })
	        }
	
	    }).focus();
	})
	
	//点击领取礼包
	function getGiftdefault(giftid, typeid, gameid, _this){
		$.https("/usergift/getgiftcode", {
	           openId : USER.openid,
	            giftid : giftid,
	            typeid : typeid,
	            gameid : gameid
	         }, function(callback) {
	            var shade = '';
	            if (callback.status == '2000') {
	                shade = "<header><img src='img/giftget.png'></header>"+
	                    "<p>"+ callback.data.giftTitle +"</p>"+
	                    "<p>"+ callback.data.giftDescriptor +"</p>"+
	                    "<p>兑换码每个服可用一次，明日可再次领取</p>"+
	                    "<p style='text-align: center;'>"+ callback.data.code +"</p>"+
	                    "<p>长按上方复制激活码</p>"+
	                    "<a href = '" + ucv("/publickurl.html?gameid="+ gameid) + "'>开始</a>"+
	                    "<span>x</span>"
	            }else if(callback.status == '2001'){
	                shade = "<header><img src='img/giftget.png'></header>"+
	                    "<p>"+ callback.data.giftTitle +"</p>"+
	                    "<p>"+ callback.data.giftDescriptor +"</p>"+
	                    "<p>兑换码每个服可用一次，明日可再次领取</p>"+
	                    "<p style='text-align: center;'>"+ callback.data.code +"</p>"+
	                    "<p>长按上方复制激活码</p>"+
	                    "<a href = '" + ucv("/publickurl.html?gameid="+ gameid) + "'>开始</a>"+
	                    "<span>x</span>";
	            }
	            $('#shade div').html( shade )
	            $('#shade').show()
	
	            $('#shade>div>span').on('click', function(){
	                $('#shade').hide()
	                $(_this).html('查看')
	
	            })
	    }) //ajax结束位置
	}
	
	//点击更多
	function getMoreGift(id, obj){
	    var currentLi = $(obj);
	    currentLi.hide();
	    $.https("/gamegift/gamemoregift", {
	            gameid: id
	        }, function(callback) {
	            var str = '';
	            for(var m = 0; m < callback.data.length; m++){
	                var giftDescriptor = callback.data[m].giftDescriptor.slice(0, 20) + '...'
	                str += "<li class = 'gamegift'>"+
	                    "<div>"+
	                    "<p>"+ callback.data[m].giftTitle +"</p>"+
	                    "<p>"+ giftDescriptor +"</p>"+
	                    "<div>"+
	                    "<div>"+
	                    "<div style = 'width:" + (callback.data[m].giftReceive) / callback.data[m].giftNum * 50 + "vw'></div>"+
	                    "</div>"+
	                    "<div><span>"+ callback.data[m].giftReceive +"/</span><span>"+ callback.data[m].giftNum +"</span> </div>"+
	                    "<div class='clearfix'></div>"+
	                    "</div>"+
	                    "</div>"+
	                    "<div><a onclick='getGiftdefault(&quot;"+ callback.data[m].giftid +"&quot; , &quot;"+ callback.data[m].giftTypeId +"&quot; , &quot;"+ callback.data[m].gameId +"&quot; , this)'>领取</a></div>"+
	                    "</li>"
	            }
	            currentLi.parent('ul').append(str)
	    })
	}
