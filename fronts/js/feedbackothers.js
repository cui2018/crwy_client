(function(){
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
      

    })
    $("#othersbtn")[0].addEventListener("click", function() {
        var imgarr = "";
        for(var y = 0;y<4;y++){
            if(imgbox[y] == ""){

            }else if(imgbox[y] == undefined){


            }else{
                imgarr +=imgbox[y]+"%%"
            }

        }
        var weixinname = $("#wxname").val();
        if($("#wxname").val() !== "" &&(/^[a-zA-Z]{1}[-_a-zA-Z0-9]{5,19}$/.test(weixinname)) && $("#describe").val()){
        	$.httpsOnce("/gamefeedback/otherfeedback", {
		           openid: USER.openid,
		           "wxname": $("#wxname").val(),
                    "username": $("#username").val(),
                    "describe": $("#describe").val(),
                    "tel":$("#tel").val(),
                    "img": imgarr
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