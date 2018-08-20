function limitTextarea(self,nowleng){

    $(self).on('input propertychange', function(event) {
        console.log(event);
        console.log($(self).val());
        var _val = $(self).val();
        var _valleng = $(self).val().length;
        _val = _valleng < 100 ? _val : _val.substr(0,100);
        $(self).val(_val);
        $(this).parent(".textareadiv").find(".afterdom").html(_val.length+"/100")
       /* $(nowleng).text(_val.length)*/
    });
    $(self).blur(function(){
        $(self).off('input propertychange');
    });
}