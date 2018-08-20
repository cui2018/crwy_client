
	var canLoad = true; var pageNum = 1;
	function onscroll() {
	    if ( !canLoad ) return;
	    if ( $(this).scrollTop() > $(document.body).get(0).scrollHeight - $(window).height() - $("#header").outerHeight() - $("#nav").outerHeight() ) {
	        canLoad = false;
	        $('#gameList').append('<div class="bottomTitle going">正在加载</div>');
	
	        $.https('/gamegift/giftlist', {
	                page : ++pageNum
	            }, function (callback) {
	                if (callback.status == '2000') {
	                    var strnext = '';
	                    for (var j = 0; j < callback.data.game.length; j++) {
	
	                        var descriptor = callback.data.game[j].descriptor;
	                        var gfitdescriptor = callback.data.game[j].gift.giftDescriptor;
	                        var moregift = callback.data.game[j].moreNum;
	                        var limoreup = '';
	
	                        if(moregift == 0){
	                            limoreup = "<li  class= 'moreGift none buweiling' data-j='" + j + "'>查看更多礼包<span>("+ moregift +")</span></li>"
	                        }else{
	                            limoreup = "<li  class= 'moreGift yiweiling' data-j='" + j + "'>查看更多礼包<span>("+ moregift +")</span></li>"
	                        }
	
	                        strnext += "<ul>" +
	                            "<li>" +
	                            "<div><img src='" + callback.data.game[j].ioc + "'></div>" +
	                            "<div>" +
	                            "<p>" + callback.data.game[j].gameName + "</p>" +
	                            "<p>" + descriptor + "</p>" +
	                            "</div>" +
	                            "<div><a href = '" + ucv("/publickurl.html?gameid="+ callback.data.game[j].id) + "'>开始</a></div>" +
	                            "</li>" +
	                            "<li class = 'gamegift'>" +
	                            "<div>" +
	                            "<p>" + callback.data.game[j].gift.giftTitle + "</p>" +
	                            "<p>" + gfitdescriptor + "</p>" +
	                            "<div>" +
	                            "<div>" +
	                            "<div style = 'width:" + (callback.data.game[j].gift.giftReceive) / callback.data.game[j].gift.giftNum * 50 + "vw'></div>" +
	                            "</div>" +
	                            "<div><span>" + callback.data.game[j].gift.giftReceive + "/</span><span>" + callback.data.game[j].gift.giftNum + "</span> </div>" +
	                            "<div class='clearfix'></div>" +
	                            "</div>" +
	                            "</div>" +
	                            "<div><a class='showwatch' data-j='" + j + "'>领取</a></div>"+
	                            "</li>"+ limoreup +
	                            "</ul>"
	                    }
	                    $('.going').remove();
	                    /*$('#gameList').append(strnext);*/
		             var tianjia = $('#gameList').append(strnext);;
		                  tianjia.find(".showwatch").click( function() {
			                	var j = $(this).data("j");
			                	var _this = $(this);
			                    getGiftdefault(
			                       callback.data.game[j].gift.giftid,
			                        callback.data.game[j].gift.giftTypeId,
			                        callback.data.game[j].id,
			                        _this
			                        
			                    );
			                } );
			             tianjia.find(".buweiling").click( function() {
			                	var j = $(this).data("j");
			                	var _this = $(this);
			                    getMoreGift(
			                        callback.data.game[j].id,
			                        _this
			                        
			                    );
			                } );
			             tianjia.find(".yiweiling").click( function() {
			                	var j = $(this).data("j");
			                	var _this = $(this);
			                    getMoreGift(
			                      callback.data.game[j].id,
			                       _this
			                    );
			                } );
	                    if(pageNum == callback.data.totalpage){
	                        $('#gameList').append('<div class="bottomTitle">关注公众号—潮人微游</div>');
	                        return;//当加载全部后，终止所有ajax加载
	                    }
	
	                    canLoad = !canLoad;
	                }
	
	        })
	    }
	}
	
	
	$(function(){
	
	    $('#header').on('click',function() {
	        window.location.href = u("/searchGift.html")
	    })
	    $.https('/gamegift/giftlist', {
	            page : 1
	        }, function (callback) {
	            if (callback.status == '2000') {
	                var str = '';
	                for (var i = 0; i < callback.data.game.length; i++) {
	
	                    var descriptor = callback.data.game[i].descriptor;
	                    var gfitdescriptor = callback.data.game[i].gift.giftDescriptor;
	                    var moregift = callback.data.game[i].moreNum;
	                    var limore = '';
	
	                    if(moregift == 0){
	                         limore = "<li  class= 'moreGift none buweiling' data-j='" + i + "'>查看更多礼包<span>("+ moregift +")</span></li>"
	                    }else{
	                        limore = "<li  class= 'moreGift yiweiling' data-j='" + i + "'>查看更多礼包<span>("+ moregift +")</span></li>"
	                    }
	                    str += "<ul>" +
	                                "<li>" +
	                                "<div><img src='" + callback.data.game[i].ioc + "'></div>" +
	                                "<div>" +
	                                "<p>" + callback.data.game[i].gameName + "</p>" +
	                                "<p>" + descriptor + "</p>" +
	                                "</div>" +
	                                "<div><a href = '" + ucv("/publickurl.html?gameid="+ callback.data.game[i].id) + "'>开始</a></div>" +
	                                "</li>" +
	                                "<li class = 'gamegift'>" +
	                                    "<div>" +
	                                        "<p>" + callback.data.game[i].gift.giftTitle + "</p>" +
	                                        "<p>" + gfitdescriptor + "</p>" +
	                                            "<div>" +
	                                                "<div>" +
	                                                    "<div style = 'width:"+ (callback.data.game[i].gift.giftReceive)/callback.data.game[i].gift.giftNum*50+"vw'></div>" +
	                                                "</div>" +
	                                                "<div><span>"+ callback.data.game[i].gift.giftReceive +"/</span><span>"+ callback.data.game[i].gift.giftNum +"</span> </div>" +
	                                                "<div class='clearfix'></div>" +
	                                            "</div>" +
	                                    "</div>" +
	                                    "<div><a class='showwatch' data-j='" + i + "'>领取</a></div>"+
	                                "</li>"+ limore +
	                            "</ul>"
	
	                }
	                /*$('#gameList').append(str);*/
	                var tianjia = $('#gameList').append(str);;
		                  tianjia.find(".showwatch").click( function() {
			                	var j = $(this).data("j");
			                	var _this = $(this);
			                    getGiftdefault(
			                       callback.data.game[j].gift.giftid,
			                        callback.data.game[j].gift.giftTypeId,
			                        callback.data.game[j].id,
			                        _this
			                        
			                    );
			                } );
			             tianjia.find(".buweiling").click( function() {
			                	var j = $(this).data("j");
			                	var _this = $(this);
			                    getMoreGift(
			                        callback.data.game[j].id,
			                        _this
			                        
			                    );
			                } );
			             tianjia.find(".yiweiling").click( function() {
			                	var j = $(this).data("j");
			                	var _this = $(this);
			                    getMoreGift(
			                      callback.data.game[j].id,
			                       _this
			                    );
			                } );
	
	                $(window).on('scroll', onscroll)
	            } //if结束位置
	        })
	
	
	    $("#nav div:nth-of-type(1)").on('click' , function(){
	        window.location.href = u("/index.html")
	    });
	    $("#nav div:nth-of-type(3)").on('click' , function(){
	        window.location.href = u("/person.html")
	    })
	});
	
	//点击领取
	function getGiftdefault(giftid, typeid, gameid, _this){
	
	    $.httpsOnce('/usergift/getgiftcode', {
	            openId : USER.openid,
	            giftid : giftid,
	            typeid : typeid,
	            gameid : gameid
	        }, function (callback) {
	            var shade = '';
	            var descript = ''
	            if (callback.status == '2000') {
	                descript = callback.data.giftDescriptor.slice(0, 40);
	                shade = "<header><img src='"+ ufv('/img/giftget.png') +"'></header>"+
	                    "<p>"+ callback.data.giftTitle +"</p>"+
	                    "<p>"+ descript +"</p>"+
	                    "<p>兑换码每个服可用一次，明日可再次领取</p>"+
	                    "<p style='text-align: center;'>"+ callback.data.code +"</p>"+
	                    "<p>长按上方复制激活码</p>"+
	                    "<a href='" + ucv("/publickurl.html?gameid="+ gameid) + "'>开始游戏</a>"+
	                    "<span>x</span>";
	            }else if(callback.status == '2001'){
	                descript = callback.data.giftDescriptor.slice(0, 40);
	                shade = "<header><img src='"+ ufv('/img/giftget.png') +"'></header>"+
	                    "<p>"+ callback.data.giftTitle +"</p>"+
	                    "<p>"+ descript +"</p>"+
	                    "<p>兑换码每个服可用一次，明日可再次领取</p>"+
	                    "<p style='text-align: center;'>"+ callback.data.code +"</p>"+
	                    "<p>长按上方复制激活码</p>"+
	                    "<a href='" + ucv("/publickurl.html?gameid="+ gameid) + "'>开始游戏</a>"+
	                    "<span>x</span>";
	            }
	            $('#shade div').html( shade );
	            $('#shade').show();
	
	            $('#shade>div>span').on('click', function(){
	                $('#shade').hide();
	                $(_this).html('查看')
	
	            })
	        })
	    }
	
	//点击更多
	function getMoreGift(id, obj){
	    var currentLi = $(obj);
	        currentLi.hide();
	
	     $.https('/gamegift/gamemoregift', {
	            gameid: id
	        }, function (callback) {
	            var str = '';
	            for(var m = 0; m < callback.data.length; m++){
	                var giftDescriptor = callback.data[m].giftDescriptor;
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




