(function(){
	var html  = document.documentElement;
	var wHtml = html.clientWidth;
		html.style.fontSize = wHtml / 15 + "px";
		/*1rem在375下代表25px，在750下代表50px*/
})()