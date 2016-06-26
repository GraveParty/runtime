/**
 * Created by Jill on 2016/6/25.
 */



$(document).ready(function() {
    $(".confirmcollect").click(function () {


        var id = $(this).attr("id").substring(1);

        alert(id);

        $.ajax({
            type: "get",
            url: "/weibo/confirmcollect/"+id,
            cache: false,
            data: {'weiboid':id},
            success: function() {

                alert(id);

                //if (data == "success"){
                    var bt = '#collect-' + id;
                    $(bt).html("已收藏<span class='caret'></span>");

                    var item = '#c' + id;
                    $(item).html("取消收藏");
                    $(item).addClass("cancelcollect");
                    $(item).removeClass("confirmcollect");

                //}


            },
            error: function(data) {


                //$('.modal-body').html("发送失败");
                //$('#hint-modal').modal('show');
            },
            beforeSend: function() {
                //$('#submitbtn').attr("disabled", "disabled");
                //$('#submitbtn').addClass("btndisable");
                //$('#submitbtn').removeClass("btn1");
                //$('#submitbtn').html("发送中...");
            },
        })

        return false;
    });
});