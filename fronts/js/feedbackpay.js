(function(){

    Date.prototype.Format = function(fmt)
    { //author: meizz
        var o = {
            "M+" : this.getMonth()+1,                 //月份
            "d+" : this.getDate(),                    //日
            "h+" : this.getHours(),                   //小时
            "m+" : this.getMinutes(),                 //分
            "s+" : this.getSeconds(),                 //秒
            "q+" : Math.floor((this.getMonth()+3)/3), //季度
            "S"  : this.getMilliseconds()             //毫秒
        };
        if(/(y+)/.test(fmt))
            fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));
        for(var k in o)
            if(new RegExp("("+ k +")").test(fmt))
                fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));
        return fmt;
    };
    var close = $(".close")[0];
    var cancel = $("#cancel")[0];
    var modalalert =$("#modal");
    var aboalert = $(".aboalert");
    var content =$("#content");
    var gameid = "";
    var imgbox = ["","","",""];
    var ling = 0;
    var lilen = 0;
     var  stringul = "";
    function initdata(){
    	if(ling < 4){
    		var fileslen = $(".files");
		        var formlen = $(".formdata");
		                fileslen[0].addEventListener("change",function(e){
		                    var file = e.target.files[0];
		                    var formData = new FormData($(".formdata"+0)[0]);
		                        $.ajax({
		                            url: "http://gamev3.admin.edisonluorui.com/CRWYGameV3/up/file.do",
		                            type: 'POST',
		                            data: formData,
		                            async: false,
		                            cache: false,
		                            contentType: false,
		                            processData: false,
		                            success: function (result) {

		                                       stringul = "<li><img src='"+result+"' alt='' ><span class='chaclose' data-i='"+ling +"'><img src='http://fronts.edisonluorui.com/img/close.png?v=f3.3.2'></span></li>";
		                                        $(".pitureul").append(stringul).find(".chaclose").unbind("click").click(function(){
										            var _this = $(this)
										            var i = $(this).data("i");
										            deleteimg(
										            	_this,
										                i
										            );
										         })
		                                         imgbox[ling]= result;
                                                ling = ling +1;
                                                lilen = lilen +1;
                                                $(".p_right span").html(ling);
		                                        console.log(imgbox)
		                               
		                                if(ling == 4){
		                                	$(".pitureulli").css("display","none")
		                                }
		                            }
		                        })
		                })
		    }
    }
    	
    $(function(){
    	initdata();
    	
        close.addEventListener('click', function() {
            modalalert.css("display","none");
            content.html("");
        });
        cancel.addEventListener('click', function() {
            modalalert.css("display","none");
            content.html("");
        });
        
        $("#paytime").val(new Date().Format("yyyy-MM-ddThh:mm:ss"));
        
        $("#gamesearch").bind('input', function() {
            var val = $("#gamesearch").val();
            if( val == ""){

            }else{
            	$.https("/gamefeedback/searchgame", {
		         "gameName" : $("#gamesearch").val()
		     	}, function(response) {
		          if(response.status == 2000) {
                            aboalert.empty();
                            var str = "";
                            for(var i=0;i<response.data.length;i++){
                                str += "<li data-i='"+response.data[i].gameid+"' class=''>"+response.data[i].gameName+"</li>";
                            }
                            aboalert.css("display","block");
                            aboalert.append(str).find("li").click( function() {
                                var htmldata = $(this).html();
                                gameid = $(this).data("i");
                                $("#gamesearch").val(htmldata);
                                aboalert.css("display","none");
                            } );

                        }
		        });
               
            }

        }).focus();
    })
    $("#paybtn")[0].addEventListener("click", function() {
        var imgarr = "";
        for(var y = 0;y<4;y++){
            if(imgbox[y] == ""){
                
            }else if(imgbox[y] == undefined){


            }else{
                imgarr +=imgbox[y]+"%%"
            }

        }
        if($(".bt").val() !== "" && imgarr !==  "" ){
           /* var oTimer = $("#paytime");*/
            var timeStamp = new Date($("#paytime").val()).getTime();
            var pass = $("#tel").val();
            if($("#tel").val() == "" || (/^1[34578]\d{9}$/.test(pass))) {
            	$.httpsOnce("/gamefeedback/gamepayques", {
		           openid: USER.openid,
		           "gameid": gameid,
                    "gamearea": $("#gamearea").val(),
                    "usergamename": $("#usergamename").val(),
                    "tel": $("#tel").val(),
                    "question": $(".question").val(),
                    "img": imgarr,
                    "paytime":timeStamp
		     	}, function(response) {
		          if (response.status == 2000) {
                        content.html("投诉反馈成功，请耐心等待处理结果");
                        modalalert.css("display","block");
                      cancel.addEventListener('click', function() {
                          window.location.href = u("/feedback.html");
                      });

                    } else {
                        content.html("投诉反馈成功，请耐心等待处理结果");
                        modalalert.css("display","block");
                    }
		        });
               
            }else{
                content.html("手机号格式错误");
                modalalert.css("display","block");
            }
        }else{
            content.html("请正确填写所有必填信息");
            modalalert.css("display","block");
        }
    });
    function deleteimg(_this,num){
        if(ling > 0){
            ling --;
            $(".righthtml").html(ling);
            console.log( _this.parent());
            _this.parent().remove();
            imgbox.splice(ling,1);
            console.log(imgbox);
            if(ling<4){
                $(".pitureulli").css("display","block")
            }
        }

    }
})()