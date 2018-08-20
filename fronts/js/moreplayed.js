
(function(){
	$(function() {
		  $.https("/login/userhistorygame", {
	        openId: USER.openid
	   }, function(callback) {
	
	              if (callback.status === "2000") {
	                  if(callback.data.length >5){
	                      $('#gameL').show();
	                  }else{
	                      $('.searchnone').show();
	                  }
	                    var str = '';
	                    var newData = callback.data.slice(5)
	                    var len = newData.length;
	
	                    for(var r = 0; r < len; r++){
	                         str += '<li>'+
	                                    '<div><img src="'+ newData[r].ioc +'" alt=""></div>'+
	                                        '<div>'+
	                                        '<p>'+ newData[r].gameName +'</p>'+
	                                        '<p>'+ newData[r].logintime +'</p>'+
	                                    '</div>'+
	                                    '<div><a href = "' + ucv("/publickurl.html?gameid="+ newData[r].gameid) + '">开始</a></div>'+
	                                '</li>'
	                    }
	                    $('#gameL').append(str)
	            }
	    })
	})
})();
