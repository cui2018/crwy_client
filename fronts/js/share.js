var share = {
	//分享好友
	appMessage : function(title,desc,link,imgUrl,success,only) {
		var that = this;
		if ( $.type(title) == "function" ) {
			success = title;
			title = null;
		}
		else if ( $.type(desc) == "function" ) {
			success = desc;
			desc = null;
		}
		else if ( $.type(link) == "function" ) {
			success = link;
			link = null;
		}
		else if ( $.type(imgUrl) == "function" ) {
			success = imgUrl;
			imgUrl = null;
		}
		else if ( $.type(success) != "function" ) success = $.noop;
		title = title ? title : "";
		desc = desc ? desc : "";
		link = link ? link : "";
		imgUrl = imgUrl ? imgUrl : "";
		var shares = {
			title : title,
			desc : desc,
			link : link,
			imgUrl : imgUrl,
			success : success
		}
		if ( typeof wechat == "undefined" ) return this;
		wechat.shareAppMessage(shares,only);
		return this;
	},
	//分享朋友圈
	timeline : function(title,link,imgUrl,success,only) {
		var that = this;
		if ( $.type(title) == "function" ) {
			success = title;
			title = null;
		}
		else if ( $.type(link) == "function" ) {
			success = link;
			link = null;
		}
		else if ( $.type(imgUrl) == "function" ) {
			success = imgUrl;
			imgUrl = null;
		}
		else if ( $.type(success) != "function" ) success = $.noop;
		title = title ? title : "";
		link = link ? link : "";
		imgUrl = imgUrl ? imgUrl : "";
		var shares = {
			title : title,
			link : link,
			imgUrl : imgUrl,
			success : success
		}
		if ( typeof wechat == "undefined" ) return this;
		wechat.shareTimeline(shares,only);
		return this;
	}
};