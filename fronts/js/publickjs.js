
	$(function(){
	    var gameid = getUrlParam('gameid');
	    var iscircle = true;
	    var controlqtwo = true;
	
	
	      $.https("/playgame/userplaygame", {
	        gameid: gameid,
	        openId: USER.openid
	      }, function(callback) {
	            if (callback.status == "2000") {
	
	                 var httpgame = callback.data.httpgame + '?uid=' + callback.data.openId + '&pid=xiaoluo' + '&gameid=' + callback.data.gamekey + '&appkey=' + callback.data.appkey + '&time=' + callback.data.time + '&sign=' + callback.data.sign;
	                 var oframe = document.createElement('iframe');
	                     oframe.setAttribute('src', httpgame);
	                     oframe.setAttribute("scrolling", "no");
	                     oframe.setAttribute("frameborder", 0);
	                     oframe.style.cssText = 'position:fixed; top:0; left:0; width:100%; height:100%;';
	                     $('body').append(oframe);
	                     oframe.onload = function(){
	                         document.getElementById('loadimg').style.display="none";
	                     };
	                     /*document.body.setAttribute('src', httpgame);
	                     document.body.setAttribute('gameid', gameid);*/
	                     $('#circle').css({'display': 'block'});
	                    //游戏分享
	                    share.appMessage(
	                        callback.data.gameshare.title,
	                        callback.data.gameshare.titleDescribe,
	                        window.location.href + "&openid=" + USER.openid,
	                        callback.data.gameshare.imgUrl,
	                        function() {
	                        	if ( gameid == 182 ) oframe.contentWindow.postMessage( {
	                        		cmd : "onShare"
	                        	}, "*" );
	                        }
	                    );
	                     //当游戏页面加载后才能出发小圆点移动或者点击事件，防止误操作
	                     var circle = document.getElementById('circle');
	                     var slide  = document.getElementById('slide');
	                     var wHtml = document.documentElement.clientWidth;
	                     var hHtml = document.documentElement.clientHeight;
	                     var hCircle = circle.offsetHeight;
	                     var wCircle = circle.offsetWidth;
	                     var wSlide  = slide.offsetWidth;
	                     circle.style.cssText = 'right: -25px; top:'+ hHtml/2 +'px';
	                     var disX = 0;
	                     var disY = 0;
	                     var eleX = 0;
	                     var eleY = 0;
	                     var isActive = false;
	                     circle.addEventListener('touchstart', function(ev){
	
	                         eleX = parseInt( circle.style.right );
	                         eleY = parseInt( circle.style.top );
	
	                         disX = (wHtml - ev.changedTouches[0].pageX) - ( eleX );
	                         disY = ev.changedTouches[0].pageY - ( eleY );
	
	                         isActive = false;
	
	                         document.addEventListener('touchmove', function(ev){
	                             circle.style.right = ( (wHtml - ev.changedTouches[0].pageX) - disX ) +  'px';
	                             circle.style.top   = ev.changedTouches[0].pageY - disY +  'px';
	
	                             //如果向右滑动小于0，定在0的位置
	                             if( parseInt( circle.style.right ) <= 0 ){
	                                 circle.style.right = 0;
	                             }
	                             //如果向左滑动大于屏幕宽度，定在宽度减去自身宽度
	                             if( parseInt( circle.style.right ) >= (wHtml - wCircle) ){
	                                 circle.style.right = (wHtml - wCircle) + 'px';
	                             }
	                             //如果向上滑动小于0，定在0的位置
	                             if( parseInt( circle.style.top ) <= 0 ){
	                                 circle.style.top = 0;
	                             }
	                             //如果向下滑动大于屏幕高度，定在屏幕高度减去自身高度的位置
	                             if( parseInt( circle.style.top ) >= (hHtml - hCircle) ){
	                                 circle.style.top = (hHtml - hCircle) + 'px';
	                             }
	
	                             isActive = true;
	                     });
	                         document.addEventListener('touchend',function(ev){
	                             //不论移动过程中的位置在哪，当抬起事件触发后，都回到屏幕的右边去
	                             if( parseInt( circle.style.right ) >= 0  ){
	                                 circle.style.right = -wCircle/2 +'px';
	                                 /*setTimeout(function(){
	                                     circle.style.right = -wCircle/2 +'px';
	                                 },500)*/
	                             } //if 结束位置
	                             if(isActive ) return;
	                             $('#cover').css('display','block');
	                             slide.style.cssText = '-webkit-transform: translateX(0px)';
	
	                             if(!iscircle) return
	
	                             iscircle = false;
	
	                             $.https('/gameside', {
	                                 gameid: gameid,
	                                 openId: USER.openid
	                             },function (callback) {
	                                 if(callback.status == '2000'){
	
	                                     //头部信息
	                                     var str =   '<div><img src="'+ callback.data.headImgUrl +'"></div>'+
	                                                 '<div>'+
	                                                 '<p>'+ ioNull.emoji.parse(callback.data.nickName) +'</p>'+
	                                                 /*'<p>ID:123456789</p>'+*/
	                                                 '</div>'
	                                     $('header').html(str)
	                                     //游戏加载
	                                     var gamestr = '';
	                                     for(var k = 0; k < callback.data.dayrecommend.length; k++){
	                                         gamestr +=  '<li>'+
	                                             '<a>'+
	                                             '<div><img src="'+ callback.data.dayrecommend[k].ioc +'"></div>'+
	                                             '<div>'+
	                                             '<p>'+ callback.data.dayrecommend[k].gameName +'</p>'+
	                                             '<p>'+ callback.data.dayrecommend[k].smallDescriptor +'</p>'+
	                                             '</div>'+
	                                             '</a>'+
	                                             '<div><a href = "' + ucv("/publickurl.html?gameid="+ callback.data.dayrecommend[k].id) + '">开始</a></div>'+
	                                             '</li>'
	                                     }
	                                     $('#gameL').html(gamestr)
	                                 }
	                             })
	
	                        }) //touchend结束位置
	                  }); //touchstart 结束位置
	
	                    var back  = document.getElementById('back');
	                    var cover = document.getElementById('cover');
	                    var reflesh = document.getElementById('refresh');
	                    back.addEventListener('touchend',function(ev){
	                        slide.style.cssText = '-webkit-transform: translateX(-89vw)';
	                        $('#cover').css('display','none');
	                        ev.stopPropagation();
	                    });
	                    cover.addEventListener('touchend',function(ev){
	                        slide.style.cssText = '-webkit-transform: translateX(-89vw)';
	                        $('#cover').css('display','none');
	                        ev.stopPropagation();
	                    })
	                    reflesh.addEventListener('touchend',function(ev){
	                        location.reload();
	                        ev.stopPropagation();
	                    })
	
	
	            }
	    });
	    new Image().src = "/img/game_choose.png";
	    new Image().src = "/img/gift_choose.png";
	    new Image().src = "/img/kefu_choose.png";
	    $('nav').find('li').click(function(){
	        var q  = $(this).addClass("current").siblings(".current").removeClass("current").end().index();
	        $("dl dt").hide().eq(q).show();
	        if(q === 1){
	            if(!controlqtwo) return;
	            controlqtwo = false;
	            $.https('/gameside/gamegiftlist', {
	                gameid: gameid,
	                openId: USER.openid
	            }, function (callback) {
	                if(callback.status === '2000'){
	                    var gift = '';
	                    for(var k = 0; k < callback.data.length; k++){
	                        gift += '<li class = "gamegift">'+
	                            '<div>'+
	                            '<p>'+ callback.data[k].giftTitle +'</p>'+
	                            '<p>'+ callback.data[k].giftDescriptor +'</p>'+
	                            '<div>'+
	                            '<div>'+
	                            '<div style = "width:'+ (callback.data[k].giftReceive)/callback.data[k].giftNum*45+'vw"></div>'+
	                            '</div>'+
	                            '<div><span>'+ callback.data[k].giftReceive +'/</span><span>'+ callback.data[k].giftNum +'</span></div>'+
	                            '<div class="clearfix"></div>'+
	                            '</div>'+
	                            '</div>'+
	                            '<div><a class="show" data-k="' + k + '">领取</a></div>'+
	                            '</li>'
	                    }
	
	                    $('#gameList').html(gift).find(".show").click( function() {
		                	var k = $(this).data("k");
		                	var _this = $(this)
		                    getGiftdefault(
		                        callback.data[k].id,
		                        callback.data[k].giftTypeId,
		                        callback.data[k].gameId,
		                        _this
		                    );
		                } );
	
	                }
	            })
	        }
	    }).first().click()
	});
	
	/*点击领取*/
	function getGiftdefault(giftid, typeid, gameid, _this){
	
	    $.httpsOnce('/usergift/getgiftcode', {
	        openId : USER.openid,
	        giftid : giftid,
	        typeid : typeid,
	        gameid : gameid
	    }, function (callback) {
	        var shade = '';
	        var descript = callback.data.giftDescriptor.slice(0, 40);
	        if (callback.status == '2000') {
	            shade = "<header><img src='"+ ufv('/img/giftget.png') +"'></header>"+
	                "<p>"+ callback.data.giftTitle +"</p>"+
	                "<p>"+ descript +"</p>"+
	                "<p>兑换码每个服可用一次，明日可再次领取</p>"+
	                "<p style='text-align: center;'>"+ callback.data.code +"</p>"+
	                "<p>长按上方复制激活码</p>"+
	                "<a href='publickurl.html?gameid="+ gameid +"'>开始游戏</a>"+
	                "<span>x</span>";
	        }else if(callback.status == '2001'){
	            shade = "<header><img src='"+ ufv('/img/giftget.png') +"'></header>"+
	                "<p>"+ callback.data.giftTitle +"</p>"+
	                "<p>"+ descript +"</p>"+
	                "<p>兑换码每个服可用一次，明日可再次领取</p>"+
	                "<p style='text-align: center;'>"+ callback.data.code +"</p>"+
	                "<p>进入游戏开始使用</p>"+
	                "<a href='publickurl.html?gameid="+ gameid +"'>开始游戏</a>"+
	                "<span>x</span>";
	        }
	        $('#shade div').html( shade )
	        $('#shade').show()
	
	        $('#shade>div>span').on('click', function(){
	            $('#shade').hide()
	            $(_this).html('查看')
	
	        })
	    })
	
	}
	
	
	function getUrlParam(name){
	    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
	    var r = window.location.search.substr(1).match(reg);
	    if(r!=null)return  decodeURI(r[2]); return null;
	}
	
var isPay = true;
//微信支付
/*window.addEventListener("message", function(e) {
    try {
        var gameinfo = $.parseJSON(e.data);
        if ( !gameinfo.uid ) {
        	isPay = true;
        	return;
        }
        //gameinfo.data = e.data;
        gameinfo.realgameid = getUrlParam('gameid');
        gameinfo.openid = USER.openid;
         if( !isPay ) return;
         isPay = false;
         loading.show();
         $.httpsPay(gameinfo, function(callback) {
            loading.hide();
            if ( callback.status != "2000" ) {
            	isPay = true;
            	return alert(callback.msg);
            }
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest', {
                    "appId":callback.data.appId,     //公众号名称，由商户传入     
                    "timeStamp":callback.data.timeStamp.toString(),         //时间戳，自1970年以来的秒数     
                    "nonceStr":callback.data.nonceStr, //随机串     
                    "package":callback.data.package,     
                    "signType":"MD5",         //微信签名方式：     
                    "paySign":callback.data.sign //微信签名    
                }, function(res) {
                    if ( res.err_msg == "get_brand_wcpay_request:ok" ) {
                        alert("支付成功");
                    } else {
                        alert("支付失败");
                    }

                    isPay = true;
                }
            );
        } );
    }
    catch (e) {
        alert("操作失败！");
    }
} );*/
//JAVA光大银行
/*window.addEventListener("message", function(e) {
    try {
        var gameinfo = $.parseJSON(e.data);
        if ( !gameinfo.uid ) {
        	isPay = true;
        	return;
        }
         if( !isPay ) return;
         isPay = false;
         loading.show();
         $.httpsPay(gameinfo, function(callback) {
            loading.hide();
            callback.pay_info = JSON.parse(callback.pay_info);
            if ( callback.status != "2000" ) {
            	isPay = true;
            	return alert("支付失败");
            }
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest', {
                    "appId":callback.pay_info.appId,     //公众号名称，由商户传入     
                    "timeStamp":callback.pay_info.timeStamp.toString(),         //时间戳，自1970年以来的秒数     
                    "nonceStr":callback.pay_info.nonceStr, //随机串     
                    "package":callback.pay_info.package,     
                    "signType":"MD5",         //微信签名方式：     
                    "paySign":callback.pay_info.paySign//微信签名    
                }, function(res) {
                    if ( res.err_msg == "get_brand_wcpay_request:ok" ) {
                        alert("支付成功");
                    } else {
                        alert("支付失败");
                    }
                    isPay = true;
                }
            );
        } );
    }
    catch (e) {
        alert("操作失败！");
    }
} );*/
//nodejs光大支付和兴业支付
window.addEventListener("message", function(e) {
    try {
        var gameinfo = $.parseJSON(e.data);
        if ( !gameinfo.uid ) {
        	isPay = true;
        	return;
        }
         if( !isPay ) return;
         isPay = false;
         loading.show();
         $.httpsPay(gameinfo, function(callback) {
            loading.hide();
            if ( callback.status != "2000" ) {
            	isPay = true;
            	return alert("支付失败");
            }
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest', {
                    "appId" : callback.data.appId,     //公众号名称，由商户传入     
                    "timeStamp" : callback.data.timeStamp.toString(),         //时间戳，自1970年以来的秒数     
                    "nonceStr" : callback.data.nonceStr, //随机串     
                    "package" : callback.data.package,     
                    "signType" : callback.data.signType,         //微信签名方式：     
                    "paySign" : callback.data.paySign//微信签名    
                }, function(res) {
                    if ( res.err_msg == "get_brand_wcpay_request:ok" ) {
                        alert("支付成功");
                    } else {
                        alert("支付失败");
                    }
                    isPay = true;
                }
            );
        } );
    }
    catch (e) {
        alert("操作失败！");
    }
} );
