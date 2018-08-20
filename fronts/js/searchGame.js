(function(){
	  $('#cancel').on('click' , function(){
	        window.location.href = u("/index.html");
	    })
	$(function(){
	    $(window).scroll( function(){
	    });
	  
		 $.https("/search", {
	               openId: USER.openid
	           }, function(callback) {
	               if(callback.status == '2000'){
	                   //最近在玩效果
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
	            $("#gameL").hide();
	            $("#defaultHtml").show();
	        }else{
	            $("#gameL").show();
	            $("#defaultHtml").hide();
	
	            $.https("/search/searchgame", {
	               'gameName' :  val
	           }, function(callback) {
	                if( callback.status != '2000' ){
	                    return
	                }
	                var str = '';
	                for(var i = 0; i < callback.data.length; i++){
	                    var descrip = callback.data[i].descriptor;
	                    str += "<li>"+
	                            "<div><img src='"+ callback.data[i].ioc +"'></div>"+
	                            "<div>"+
	                            "<p>"+ callback.data[i].gameName +"</p>"+
	                            "<p>"+ descrip +"</p>"+
	                            "</div>"+
	                            "<div><a href ='" + ucv("/publickurl.html?gameid="+ callback.data[i].id) + "'>开始</a></div>"+
	                            "</li>"
	                }
	                $("#gameL").empty().append(str);
	            })
	        }
	
	    }).focus();
	})
})();