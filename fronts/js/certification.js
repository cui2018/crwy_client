(function(){
	$(function(){
	    /*var UL = document.getElementById("iconlist");
	    var aLi = UL.getElementsByTagName("li");*/
	    var aLi = $(".ulcontent li");
	    aLi[0].addEventListener("click", function() {
	        window.location.href = u("/realname.html")
	    })
	    aLi[1].addEventListener("click", function() {
	        window.location.href = u("/userguide.html")
	    })
	    aLi[2].addEventListener("click", function() {
	        window.location.href = u("/dispute.html")
	    })
	})
})();