(function(){
	$(function(){
	    var typeName = getUrlParam("type")
	    if( typeName === '1' ){
	        $('.roleplay').show()
	         $.https("/login/gametypelist", {
	               typeid:  typeName
	           }, function(callback) {
	                    if (callback.status == '2000') {
	                            var strTypeOwn = '';
	                            for(var i = 0; i < callback.data.gamelist.length; i++){
	                                var descriptor = callback.data.gamelist[i].descriptor;
	                                  strTypeOwn += "<li>"+
	                                                "<a href='gameDetail.html?gameid="+ callback.data.gamelist[i].id +"'>"+
	                                                "<div><img src='"+ callback.data.gamelist[i].ioc +"'></div>"+
	                                                "<div>"+
	                                                "<p>"+ callback.data.gamelist[i].gameName +"</p>"+
	                                                "<p>"+ descriptor +"</p>"+
	                                                "</div>"+
	                                                "</a>"+
	                                                "<div><a href = '" + ucv("/publickurl.html?gameid="+ callback.data.gamelist[i].id) + "'>开始</a></div>"+
	                                                "</li>"
	                                }
	
	                                $('.gameL').append(strTypeOwn)
	
	                        } //if结束位置
	                })//success结束位置
	    }else if( typeName === '2' ){
	        $('.managestrate').show()
	        $.https("/login/gametypelist", {
	               typeid:  typeName
	          }, function(callback) {
	                if (callback.status == '2000') {
	                    var strTypeTwo = '';
	                    for(var i = 0; i < callback.data.gamelist.length; i++){
	                        var descriptor = callback.data.gamelist[i].descriptor;
	                        strTypeTwo += "<li>"+
	                            "<a href='gameDetail.html?gameid="+ callback.data.gamelist[i].id +"'>"+
	                            "<div><img src='"+ callback.data.gamelist[i].ioc +"'></div>"+
	                            "<div>"+
	                            "<p>"+ callback.data.gamelist[i].gameName +"</p>"+
	                            "<p>"+ descriptor +"</p>"+
	                            "</div>"+
	                            "</a>"+
	                            "<div><a href = '" + ucv("/publickurl.html?gameid="+ callback.data.gamelist[i].id) + "'>开始</a></div>"+
	                            "</li>"
	                      }
	                    $('.gameL').append(strTypeTwo)
	
	                } //if结束位置
	        }) //ajax结束位置, 经营策略接口
	    }else if( typeName === '3' ){
	        $('.sword').show()
	        $.https("/login/gametypelist", {
	               typeid:  typeName
	         }, function(callback) {
	                if (callback.status == '2000') {
	                    var strTypeThr = '';
	                    for(var i = 0; i < callback.data.gamelist.length; i++){
	                        var descriptor = callback.data.gamelist[i].descriptor;
	                        strTypeThr += "<li>"+
	                            "<a href='gameDetail.html?gameid="+ callback.data.gamelist[i].id +"'>"+
	                            "<div><img src='"+ callback.data.gamelist[i].ioc +"'></div>"+
	                            "<div>"+
	                            "<p>"+ callback.data.gamelist[i].gameName +"</p>"+
	                            "<p>"+ descriptor +"</p>"+
	                            "</div>"+
	                            "</a>"+
	                            "<div><a href = '" + ucv("/publickurl.html?gameid="+ callback.data.gamelist[i].id) + "'>开始</a></div>"+
	                            "</li>"
	                    }
	                    $('.gameL').append(strTypeThr)
	
	                } //if结束位置
	        }) //ajax结束位置, 仙侠传奇
	    }else{
	        $('.wisdom').show();
	        $.https("/login/gametypelist", {
	               typeid:  typeName
	        }, function(callback) {
	                if (callback.status == '2000') {
	                    var strTypeFour = '';
	                    for(var i = 0; i < callback.data.gamelist.length; i++){
	                        var descriptor = callback.data.gamelist[i].descriptor;
	                        strTypeFour += "<li>"+
	                            "<a href='gameDetail.html?gameid="+ callback.data.gamelist[i].id +"'>"+
	                            "<div><img src='"+ callback.data.gamelist[i].ioc +"'></div>"+
	                            "<div>"+
	                            "<p>"+ callback.data.gamelist[i].gameName +"</p>"+
	                            "<p>"+ descriptor +"</p>"+
	                            "</div>"+
	                            "</a>"+
	                            "<div><a href = '" + ucv("/publickurl.html?gameid="+ callback.data.gamelist[i].id) + "'>开始</a></div>"+
	                            "</li>"
	                    }
	
	                    $('.gameL').append(strTypeFour)
	
	                } //if结束位置
	        }) //ajax结束位置, 休闲益智
	    }
	})
	
	function getUrlParam(name){
	    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
	    var r = window.location.search.substr(1).match(reg);
	    if(r!=null)return  decodeURI(r[2]); return null;
	}
})();