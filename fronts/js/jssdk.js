var wechat = {
		configLoaded : false,
		config : {
			jsApiList : ['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','hideMenuItems','showMenuItems','hideAllNonBaseMenuItem','showAllNonBaseMenuItem','translateVoice','startRecord','stopRecord','onRecordEnd','playVoice','pauseVoice','stopVoice','uploadVoice','downloadVoice','chooseImage','previewImage','uploadImage','downloadImage','getNetworkType','openLocation','getLocation','hideOptionMenu','showOptionMenu','closeWindow','scanQRCode','chooseWXPay','openProductSpecificView','addCard','chooseCard','openCard']
		},
		functionList : new Array(),
		set : function(fn) {
			if ( this.configLoaded ) fn();
			else this.functionList.push(fn);
		},
		shareAppMessage : function(shareData,only) {
			if ( typeof wx == "undefined" ) return;
			var that = this;
			if ( this.configLoaded ) {
				wx.showOptionMenu();
				if ( typeof only == "undefined" ) this.hideList();
				else this.hideList("menuItem:share:timeline");
				wx.showMenuItems( {
					menuList : ["menuItem:share:appMessage"]
				} );
				wx.onMenuShareAppMessage(shareData);
			}
			else this.functionList.push( function() {
				wx.showOptionMenu();
				if ( typeof only == "undefined" ) that.hideList();
				else that.hideList("menuItem:share:timeline");
				wx.showMenuItems( {
					menuList : ["menuItem:share:appMessage"]
				} );
				wx.onMenuShareAppMessage(shareData);
			} );
		},
		shareTimeline : function(shareData,only) {
			if ( typeof wx == "undefined" ) return;
			var that = this;
			if ( this.configLoaded ) {
				wx.showOptionMenu();
				if ( typeof only == "undefined" ) this.hideList();
				else this.hideList("menuItem:share:appMessage");
				wx.showMenuItems( {
					menuList : ["menuItem:share:timeline"]
				} );
				wx.onMenuShareTimeline(shareData);
			}
			else this.functionList.push( function() {
				wx.showOptionMenu();
				if ( typeof only == "undefined" ) that.hideList();
				else that.hideList("menuItem:share:appMessage");
				wx.showMenuItems( {
					menuList : ["menuItem:share:timeline"]
				} );
				wx.onMenuShareTimeline(shareData);
			} );
		},
		callFunctions : function() {
			if ( typeof wx == "undefined" ) return;
			var that = this;
			wx.ready( function () {
				$.each(that.functionList, function(i,func) {
					if ( typeof(func) == "function" ) func();
				} );
				that.hideList();
				that.functionList = new Array();
			} );
		},
		hideList : function(hide) {
			var list = ["menuItem:share:qq","menuItem:copyUrl","menuItem:readMode","menuItem:openWithQQBrowser","menuItem:share:QZone","menuItem:openWithSafari","menuItem:share:email"];
			if ( hide ) list.push(hide);
			wx.hideMenuItems( {
				menuList : list
			} );
		}
};