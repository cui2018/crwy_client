
	$(function(){
	
	    var gameId = getUrlParam('gameid');
        var onoff = false;
	    $.https('/gameinformation', {
	            gameid: gameId,
	            openId: USER.openid
	        }, function (callback) {
	                if(callback.status == '2000'){
	                        //顶部当前游戏列表
	                        var smallDescriptor = callback.data.gameinfo.smallDescriptor.slice(0, 16) + '...';
	                        var gameHeader = "<li>"+
	                                                "<div><img src='"+ callback.data.gameinfo.ioc +"'></div>"+
	                                                    "<div>"+
	                                                    "<p>"+ callback.data.gameinfo.gameName +"</p>"+
	                                                    "<p>"+ smallDescriptor +"</p>"+
	                                                "</div>"+
	                                                "<div><a href = '"+ ucv("/publickurl.html?gameid="+ callback.data.gameinfo.id) +"'>开始</a></div>"+
	                                            "</li>";
	                            $('#gameL').append(gameHeader);


	                         //上部分banner效果
	                         var gameBanner = '';
	                         for(var j = 0; j < callback.data.gameimg.length; j++){
	                             gameBanner += "<div class='swiper-slide'>"+
	                                                 "<a>"+
	                                                    "<img src='"+ callback.data.gameimg[j].gameImgUrl +"'>"+
	                                                 "</a>"+
	                                            "</div>"
	                             }
	                             $('#swiperone .swiper-wrapper').append(gameBanner);
	                            var swiperone = new Swiper('#swiperone', {
	                                initialSlide:0,
	                                slidesPerView : 3,
	                                spaceBetween : '2%',
                                    loop: true,
	                                speed:300
	                            });

								$('#slideBanner .swiper-slide').tap(function(){
									var index = $(this).data("swiper-slide-index");
									$('#bigBanner').show();
									var bigBanner = '<div class="swiper-container" id="swiperBig">';
									bigBanner += '  <div class="swiper-wrapper">';
									for(var q = 0; q < callback.data.gameimg.length; q++){
										bigBanner +=    "<div class='swiper-slide' style='width:100%;height:100%;'>"+
														"<a style='width:100%;height:100%;'>"+
														"<img style='width:100%;height:100%;' src='"+ callback.data.gameimg[q].gameImgUrl +"'>"+
														"</a>"+
														"</div>"
									}
									bigBanner += '  </div>';
									bigBanner += '  <div style="top:92vh;" class="swiper-pagination"></div>';
									bigBanner += '</div>';
									$('#bigBanner').html(bigBanner).show();
									var swiperBig = new Swiper('#swiperBig', {
										initialSlide:index,
										spaceBetween : '2%',
										loop : true,
										speed:300,
                                        pagination:'.swiper-pagination'
									});

									$('#bigBanner').tap(function(){
                                        $('#bigBanner').hide().empty();
									})

                                })


	                        //好友在玩效果
	                        if(callback.data.friendslist.length){
	                            $('#friendplay').css('display', 'block');
	                            var strmany = callback.data.friendslist.length > 3 ? '等好友在玩' : '好友在玩';
	                            var strimg  = '';
	                            var newimgdata = callback.data.friendslist.slice(0, 3);
	                            var lenimg = newimgdata.length;
	
	                            for(var f = 0; f < lenimg; f++){
	                                strimg += '<img src="'+ newimgdata[f].headImgUrl +'">'
	                            }
	                            $('#imgposition').append(strimg);
	
	                            var strp = '';
	                            var nickname = '';
	                            for(var p = 0; p < lenimg; p++ ){
	                                nickname = newimgdata[p].nickName.slice(0, 5);
	                                strp += '<span>'+ ioNull.emoji.parse(nickname) +'、</span>'
	                            }
	                            $('#p').append(strp)
	
	                        }
	                         //游戏礼包效果
	                            var gameGift = '';
	                                for(var m = 0; m < callback.data.gamegift.length; m++){
	                                var giftDescriptor = callback.data.gamegift[m].giftDescriptor.slice(0, 30) + '...'
	                                var giftLeft = ( callback.data.gamegift[m].giftNum - callback.data.gamegift[m].giftReceive ) / callback.data.gamegift[m].giftNum
	                                    gameGift += "<li>"+
	                                                    "<div>"+
	                                                        "<p>"+ callback.data.gamegift[m].giftTitle +"</p>"+
	                                                        "<p>"+ giftDescriptor +"</p>"+
	                                                        "<div>"+
	                                                            "<div>"+
	                                                                "<div style='width: "+ ( 60 - 60*giftLeft ).toFixed(2) +"vw;'></div>"+
	                                                            "</div>"+
	                                                            "<div>剩余"+ (giftLeft*100).toFixed(2) +"%</div>"+
	                                                        "</div>"+
	                                                    "</div>"+
	                                                    "<div><a class='show'>领取</a></div>"+
	                                                 "</li>"
	                                    }
	                                    $('#gameDetailgift>ul').append(gameGift).find(".show").click( function() {
	                                    	var _this = $(this);
						                    getGiftdefault(
						                        callback.data.gamegift[0].gameId,
						                        callback.data.gamegift[0].giftTypeId,
						                        callback.data.gamegift[0].id,
						                        _this
						                    );
						                } );
	
	
	                         //游戏简介 这个数据字段和顶部的相同
								var allDetail = callback.data.gameinfo.descriptor;
                        		var shortDetail = '';
                        		var gameDetail ='';

								if( allDetail.length >= 80 ){
									   shortDetail = allDetail.slice(0, 80) + '...';
									   gameDetail = "<p id='detail'>"+ shortDetail +"</p><a id='moreDe' style='color: #0000FF;position: absolute;bottom:0.8vw;right:2.67vw;font-size: 3.4vw'>更多></a>";
								}else{
									    shortDetail = allDetail;
                                    	gameDetail = "<p>"+ shortDetail +"</p>";
								}

	                                $('#gamedescription').append(gameDetail);

									$('#moreDe').tap(function(){
                                        if( onoff ){
                                            $('#detail').html(shortDetail);
                                            $('#moreDe').html('更多>');
                                            onoff = false;
                                        }
                                        else {
                                            $('#detail').html(allDetail);
                                            $('#moreDe').html('<收起');
                                            onoff = true;
										}
									})

	
	                         //推荐Banner
	                            var recommandGameBanner = '';
	                                for(var k = 0; k < callback.data.dayrecommend.length; k++){
	                                    var gameName = callback.data.dayrecommend[k].gameName.slice(0, 5)
	                                    recommandGameBanner +=  "<div class='swiper-slide'>"+
	                                                                "<a href='" + ucv("/publickurl.html?gameid="+ callback.data.dayrecommend[k].id) + "'>"+
	                                                                    "<img src='"+ callback.data.dayrecommend[k].ioc +"'>"+
	                                                                    "<p>"+ gameName +"</p>"+
	                                                               "</a>"+
	                                                            "</div>";
	                                }
	                                $('#swipertwo .swiper-wrapper').append(recommandGameBanner);
	                                var swipertwo = new Swiper('#swipertwo', {
	                                    initialSlide:0,
	                                    slidesPerView : 5,
	                                    spaceBetween : '2%',
	                                    speed:300,
	                                    loop : true
	                                });
	
	                         //开始游戏
	                            var startGame =  "<a href='" + ucv("/publickurl.html?gameid="+ callback.data.gameinfo.id) + "'>开始游戏</a>";
	                            $('#startGame>div').append(startGame);
	
	
	            }//if结束位置
	        })
	   
	});
	function getGiftdefault(gameid, typeid, giftid, _this){
	    $.httpsOnce('/usergift/getgiftcode', {
	            openId : USER.openid,
	            giftid : giftid,
	            typeid : typeid,
	            gameid : gameid
	        }, function (callback) {
	            var shade = '';
	            if (callback.status == '2000') {
	                shade = "<header><img src='img/giftget.png'></header>"+
	                    "<p>"+ callback.data.giftTitle +"</p>"+
	                    "<p>"+ callback.data.giftDescriptor +"</p>"+
	                    "<p>兑换码每个服可用一次，明日可再次领取</p>"+
	                    "<p style='text-align: center;'>"+ callback.data.code +"</p>"+
	                    "<p>长按上方复制激活码</p>"+
	                    "<a href='" + ucv("/publickurl.html?gameid="+ gameid) + "'>开始游戏</a>"+
	                    "<span>x</span>";
	            }else if(callback.status == '2001'){
	                shade = "<header><img src='img/giftget.png'></header>"+
	                    "<p>"+ callback.data.giftTitle +"</p>"+
	                    "<p>"+ callback.data.giftDescriptor +"</p>"+
	                    "<p>兑换码每个服可用一次，明日可再次领取</p>"+
	                    "<p style='text-align: center;'>"+ callback.data.code +"</p>"+
	                    "<p>进入游戏开始使用</p>"+
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
	
	
	function getUrlParam(name){
	    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
	    var r = window.location.search.substr(1).match(reg);
	    if(r!=null)return  decodeURI(r[2]); return null;
	}
