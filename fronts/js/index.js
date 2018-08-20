

(function(){
	//跑马灯效果
	function autoScroll(){
	    $("#news").find('ul').animate({
	        marginTop: '-7.33vw'
	    },1000,"linear",function(){
	        $(this).css({marginTop : "0px"});
	        var li  =$("#newsId").children().first().clone();
	        $("#newsId li:last").after(li );
	        $("#newsId li:first").remove();
	
	    })
	}
	
	var pageNum = 1;
	var onLoad = true;  //为了防止切换导航触发二次ajax加载数据，通过外部变量控制
	function onscroll(){
	    //问题：当页面刚加载时，向上滚动，开始加载第二页，如果此时切换到新游选项，则q应该是2此时不应该触发这个q==0的if，
	    if( !onLoad ) return;
	
	    if( $(this).scrollTop() > (  parseInt($('#article').height())  - parseInt($(window).height()) ) + 50  ){
	        onLoad = false; //逻辑先后顺序，当我满足条件后，开始发送ajax，因为判断的不精细，所以随时都在满足条件，但是如果下个接口的数据
	        //返回了就不会再触发了，但是回来之前，当滚动时，是不能触发ajax的
	        //正在加载过程中显示正在加载提示效果
	        $('#gameL').append("<li class='bottomTitle going'>正在加载</li>");
	        $.https("/login/gamelist", {
	            page: ++pageNum
	        }, function(callback) {
	            if( callback.status == '2000'){
	                var  gameListUp = '';
	                for(var g = 0; g < callback.data.game.length; g++){
	                    var descriptor = callback.data.game[g].descriptor;
	                    gameListUp += "<li>"+
	                        "<a href='gameDetail.html?gameid="+ callback.data.game[g].id +"'>"+
	                        "<div><img src='"+ callback.data.game[g].ioc +"'></div>"+
	                        "<div>"+
	                        "<p>"+ callback.data.game[g].gameName +"</p>"+
	                        "<p>"+ descriptor +"</p>"+
	                        "</div>"+
	                        "</a>"+
	                        "<div><a href = '" + ucv("/publickurl.html?gameid="+ callback.data.game[g].id) + "'>开始</a></div>"+
	                        "</li>"
	                } //for循环结束位置
	                $('.going').remove();
	                $('#gameL').append(gameListUp);
	                if( pageNum === callback.data.totalPage ){
	                    $("#gameL").append("<li class='bottomTitle'>关注公众号—潮人微游</li>");
	                    $("#gameL").append("<li class='bottomTitle code'><img src='img/chaoren.jpg'></li>");
	                    return;
	                }
	                onLoad = true;
	            } //if结束位置
	        } );
	    } // if结束为止
	}
	$( function() {
		setInterval(function() {
			autoScroll();
		},2000);
	} );
	var dt = $("dl dt");
	var nav = $("nav");

	var isActiveClass = true; //为了防止切换导航触发二次ajax加载数据，通过外部变量控制
    var isActiveTwo   = true; //为了防止切换导航触发二次ajax加载数据，通过外部变量控制
    var isActiveThree = true; //为了防止切换导航触发二次ajax加载数据，通过外部变量控制

	nav.find("li").click( function() {
        var q  = $(this).addClass("current").siblings(".current").removeClass("current").end().index();
        dt.hide().eq(q).show();
        //上拉加载模块
        if(q == 0 ){
            $(window).on('scroll', onscroll)
        }
        //分类效果
        if(q == 1){
            if(!isActiveClass) return
            $.https("/login/gametype", function(callback) {
                if(callback.status == '2000'){
                    var strClass = '';
                strClass = "<li>"+
                                "<a href='typegame.html?type="+ callback.data[0].id +"'>"+
                                    "<img src='img/roleplay.png'>"+
                                "</a>"+
                            "</li>"+
                            "<li>"+
                                "<a href='typegame.html?type="+ callback.data[1].id +"'>"+
                                    "<img src='img/managestrate.png'>"+
                                "</a>"+
                            "</li>"+
                            "<li>"+
                                "<a href='typegame.html?type="+ callback.data[2].id +"'>"+
                                    "<img src='img/sword.png'>"+
                                "</a>"+
                            "</li>"+
                            "<li>"+
                                "<a href='typegame.html?type="+ callback.data[3].id +"'>"+
                                    "<img src='img/wisdom.png'>"+
                                "</a>"+
                            "</li>"
                    $('#gameC').append(strClass)
                    isActiveClass = !isActiveClass;
                }
            })
        }
        //新游模块
        if(q == 2){
            $(window).off('scroll', onscroll);
            if(!isActiveTwo) return
            $.https("/login/newgamelist", function(callback) {
                if (callback.status == '2000') {
                        var gameNew = '';
                        for(var k = 0; k < callback.data.length; k++){
                            var descriptor = callback.data[k].descriptor;
                            gameNew += "<li>"+
                                            "<a href='gameDetail.html?gameid="+ callback.data[k].id +"'>"+
                                                "<div><img src='"+ callback.data[k].ioc +"'></div>"+
                                                "<div>"+
                                                "<p>"+ callback.data[k].gameName +"</p>"+
                                                "<p>"+ descriptor +"</p>"+
                                            "</div>"+
                                            "</a>"+
                                            "<div><a href = '" + ucv("/publickurl.html?gameid="+ callback.data[k].id) + "'>开始</a></div>"+
                                        "</li>"
                            }// for结束位置
                        $('#gameN').append( gameNew );
                        $("ul#gameN").append("<li class='bottomTitle'>关注公众号—潮人微游</li>");
                    }
                isActiveTwo = !isActiveTwo;
            }) //ajax结束位置
        }
        //咨询模块
        if(q == 3){
            $(window).off('scroll', onscroll);
            if( !isActiveThree ) return;
            $.https("/news/newslist", function(callback) {
                if(callback.status == '2000'){
                        var strGameInfo = ''

                        for(var m = 0; m < callback.data.length; m++ ){

                            var isType = '';
                            if( callback.data[m].type == 1 ){
                                isType = '公告'
                            }else if( callback.data[m].type == 2 ){
                                isType = '活动'
                            }else if( callback.data[m].type == 3 ){
                                isType = '攻略'
                            }
                        var  newTitle = callback.data[m].newTitlie;
                        var implDate  = callback.data[m].implDate.slice(5, 10)
                            strGameInfo += "<li>"+
                                                "<a href='"+ callback.data[m].newsUrl +"'>"+
                                                    "<div>"+ isType +"</div>"+
                                                    "<div>"+ newTitle +"</div>"+
                                                    "<div>"+ implDate +"</div>"+
                                                "</a>"+
                                           "</li>"
                            } //for结束位置
                        $('#gameI').append( strGameInfo )
                        if( callback.data.length >= 6 ){
                            $("ul#gameI").append("<li class='bottomTitle'>关注公众号—潮人微游</li>");
                        }

                } //if 结束位置

                isActiveThree = !isActiveThree;
            }) // ajax结束位置
        } //if 结束位置

	}).first().click();


    $("#header").on('click',function(){
        window.location.href = 'search.html'
    });
    $("#nav div:nth-of-type(2)").on('click' , function(){
        window.location.href = u("/gameGift.html");
    });
    $("#nav div:nth-of-type(3)").on('click' , function(){
        window.location.href = u("/person.html");
    });


	/*$(window).scroll( function() {
		if ( $(this).scrollTop() > $(window).width() * 0.8 ) nav.addClass("fixed");
		else nav.removeClass("fixed");
	} );*/
    //统一接口数据
    var unify = {
        init : function() {
            this.banner();
            return this;
        },
        banner : function() {
            $.https("/login/banner", function(callback) {
                if ( callback.status == "2000" ) {
                    $("#indexloading").remove();
                    $("#index").show();
                    //banner接口数据
                    var strBanner = '';
                    for(var i = 0; i < callback.data.length; i++){
                        var link = callback.data[i].gameid ? ucv("/publickurl.html?gameid="+ callback.data[i].gameid) : "javascript:void(0);";
                        strBanner += "<div class='swiper-slide'>" +
                                        "<a href = '" + link + "'><img src='"+ callback.data[i].httpImg +"'></a>"+
                                    "</div>"
                    }
                    $('#swiperWrap').append(strBanner);
                    var swiper = new Swiper('.swiper-container', {
                        initialSlide:0,
                        speed:300,
                        loop : true,
                        autoplay: 2000,
                        pagination:'.swiper-pagination'
                    } );
                    unify.history();
                }
            } );
            return this;
        },
        zouma : function() {
            $.https("/login/zouma", function(callback) {
                if ( callback.status == "2000" ) {
                    //走马灯效果
                    var strgohourse = '';
                    for(var h = 0; h < callback.data.length; h++){
                        var nickname = callback.data[h].nickName.slice(0, 8);
                          /*  nickname = ioNull.emoji.parse(nickname);*/
                        strgohourse  +=  '<li>'+
                                            '<a>恭喜玩家<span>'+ nickname +'</span>获得了'+ callback.data[h].gameName +'的'+ callback.data[h].giftTitle +'</a>'+
                                        '</li>'
                    }
                    $('#newsId').append(strgohourse);
                }
            } );
            return this;
        },
        history : function() {
            $.https("/login/history", {
                openId : USER.openid
            }, function(callback) {
                if ( callback.status == "2000" ) {
                    //最近在玩效果
                    if( callback.data.length ) {
                        $('#recently').css('display', 'block');
                        var recentlyPlay = '';
                        var recentData   = callback.data.slice(0, 5);
                        for(var p = 0; p < recentData.length; p++){
                            recentlyPlay += '<div>' +
                                                '<a href="' + ucv("/publickurl.html?gameid="+ recentData[p].gameid) + '">'+
                                                    '<img src = "'+ recentData[p].ioc +'">'+
                                                    '<span>'+ recentData[p].gameName.slice(0, 5) +'</span>'+
                                                '</a>'+
                                            '</div>'
                        }
                        $('#recentlyplay').append( recentlyPlay );
                    }
                    unify.gamelist();
                }
            } );
            return this;
        },
        gamelist : function() {
            $.https("/login/gamelist", {
                page : 1
            }, function(callback) {
                if ( callback.status == "2000" ) {
                    //游戏列表数据
                    var strGameList = '';
                    for(var j = 0; j < callback.data.game.length; j++){
                        var descriptor = callback.data.game[j].descriptor;
                        strGameList +=  "<li>"+
                                            "<a href='gameDetail.html?gameid="+ callback.data.game[j].id +"'>"+
                                                "<div><img src='"+ callback.data.game[j].ioc +"'></div>"+
                                                    "<div>"+
                                                    "<p>"+ callback.data.game[j].gameName +"</p>"+
                                                    "<p>"+ descriptor +"</p>"+
                                                "</div>"+
                                            "</a>"+
                                            "<div><a href = '" + ucv("/publickurl.html?gameid="+ callback.data.game[j].id) + "'>开始</a></div>"+
                                       "</li>"
                    } // for循环结束为止
                    $('#gameL').append(strGameList);
                    unify.identity();
                }
            } );
            return this;
        },
        identity : function() {
            $.https("/login/identity", {
                openId : USER.openid
            }, function(callback) {
                if ( callback.status == "2000" ) {
                    if ( callback.data == 0 ) {
                        var realnamenotice = local.get("realnamenotice");
                        if ( !realnamenotice || now() - realnamenotice > 1800 ) {
                            $('body').addClass('stop');
                            $('#shadeperson').css('display', 'block');
                            $('#alert').css('display', 'block');
                            $('#alert > span').tap( function() {
                                $('#alert').remove();
                                $('#shadeperson').remove();
                                $("body").removeClass('stop');
                            } );
                            $('#no').tap(function(){
                                $('#alert').remove();
                                $('#shadeperson').remove();
                                $("body").removeClass('stop');
                            })
                            $('#now').on('click', function(){
                                window.location.href=u("/realname.html");
                            })
                            local.set("realnamenotice",now());
                        }
                    }
                    unify.zouma();
                }
            } );
            return this;
        }
    };
    unify.init();

})();