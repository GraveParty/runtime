/**
 * Created by Jill on 2016/6/25.
 */



$(document).ready(function() {
    $(".collect").click(function () {
        var html =  jQuery.trim($(this).html());
        var id = $(this).attr("id").substring(1);

        if(html=="收藏文章"){
            $.ajax({
                type: "get",
                url: "/weibo/confirmcollect/"+id,
                cache: false,
                data: {'weiboid':id},
                success: function($newcount) {
                    var bt = '#collect-' + id;
                    $(bt).html("已收藏<span class='caret'></span>");
                    //$(bt).hide();
                    var count = '#count-' + id;
                    $(count).html($newcount);

                    var item = '#c' + id;
                    $(item).html("取消收藏");
                },
                error: function(data) {

                },
                beforeSend: function() {

                },
            })
        }
        if(html=="取消收藏"){
            $.ajax({
                type: "get",
                url: "/weibo/cancelcollect/"+id,
                cache: false,
                data: {'weiboid':id},
                success: function($newcount) {
                    var bt = '#collect-' + id;
                    $(bt).html("收藏<span class='caret'></span>");
                    //$(bt).hide();
                    var count = '#count-' + id;
                    $(count).html($newcount);

                    var item = '#c' + id;
                    $(item).html("收藏文章");
                    //$(item).addClass("cancelcollect");
                    //$(item).removeClass("confirmcollect");

                },
                error: function(data) {

                },
                beforeSend: function() {  },
            })
        }

        return false;
    });

});




$(document).ready(function() {
    $(".follow").click(function () {

        var html =  jQuery.trim($(this).html());
        var id = $(this).attr("id").substring(1);

        if(html=="关注作者"){
            $.ajax({
                type: "get",
                url: "/weibo/confirmfollow/"+id,
                cache: false,
                data: {'weiboid':id},
                success: function() {

                    var bt = '.follow-' + id;
                    $(bt).html("已关注<span class='caret'></span>");

                    var item = '.fmenu-' + id;
                    $(item).html("取消关注");

                },
                error: function() {

                },
                beforeSend: function() {

                },
            })
        }

        if(html=="取消关注"){
            $.ajax({
                type: "get",
                url: "/weibo/cancelfollow/"+id,
                cache: false,
                data: {'weiboid':id},
                success: function() {

                    var bt = '.follow-' + id;
                    $(bt).html("关注<span class='caret'></span>");

                    var item = '.fmenu-' + id;
                    $(item).html("关注作者");

                },
                error: function() {

                },
                beforeSend: function() {

                },
            })


        }

        return false;
    });
});