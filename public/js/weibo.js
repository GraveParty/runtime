///**
// * Created by Jill on 2016/6/25.
// */
//
//
//
//$(document).ready(function() {
//    $(".collect").click(function () {
//        var html =  jQuery.trim($(this).html());
//        var id = $(this).attr("id").substring(1);
//
//        if(html=="收藏文章"){
//            $.ajax({
//                type: "get",
//                url: "/weibo/confirmcollect/"+id,
//                cache: false,
//                data: {'weiboid':id},
//                success: function($newcount) {
//                    var bt = '#collect-' + id;
//                    $(bt).html("已收藏<span class='caret'></span>");
//                    //$(bt).hide();
//                    var count = '#count-' + id;
//                    $(count).html($newcount);
//
//                    var item = '#c' + id;
//                    $(item).html("取消收藏");
//                },
//                error: function(data) {
//
//                },
//                beforeSend: function() {
//
//                },
//            })
//        }
//        if(html=="取消收藏"){
//            $.ajax({
//                type: "get",
//                url: "/weibo/cancelcollect/"+id,
//                cache: false,
//                data: {'weiboid':id},
//                success: function($newcount) {
//                    var bt = '#collect-' + id;
//                    $(bt).html("收藏<span class='caret'></span>");
//                    //$(bt).hide();
//                    var count = '#count-' + id;
//                    $(count).html($newcount);
//
//                    var item = '#c' + id;
//                    $(item).html("收藏文章");
//                    //$(item).addClass("cancelcollect");
//                    //$(item).removeClass("confirmcollect");
//
//                },
//                error: function(data) {
//
//                },
//                beforeSend: function() {  },
//            })
//        }
//
//        return false;
//    });
//
//});


/**
 * Created by Jill on 2016/6/25.
 */



$(document).ready(function() {
    $(".collect").click(function () {
        var html =  jQuery.trim($(this).html());
        var id = $(this).attr("id").substring(1);

        if($(this).hasClass("collect-no")){
            $.ajax({
                type: "get",
                url: "/weibo/confirmcollect/"+id,
                cache: false,
                data: {'weiboid':id},
                success: function($newcount) {

                    //var count = '#count-' + id;
                    //$(count).html($newcount);

                    var item = '#c' + id;
                    $(item).html('<i class="icon-star"></i> &nbsp;'+$newcount);
                    $(item).addClass("collect-yes");
                    $(item).removeClass("collect-no");
                },
                error: function(data) {

                },
                beforeSend: function() {

                },
            })
        }
        if($(this).hasClass("collect-yes")){
            $.ajax({
                type: "get",
                url: "/weibo/cancelcollect/"+id,
                cache: false,
                data: {'weiboid':id},
                success: function($newcount) {
                    //var count = '#count-' + id;
                    //$(count).html($newcount);

                    var item = '#c' + id;
                    $(item).html("收藏");
                    //$(item).removeClass("active");

                    var item = '#c' + id;
                    $(item).html('<i class="icon-star"></i> &nbsp;'+$newcount);
                    $(item).addClass("collect-no");
                    $(item).removeClass("collect-yes");

                },
                error: function(data) {

                },
                beforeSend: function() {  },
            })
        }

        return false;
    });

});

//$(document).ready(function() {
//
//    var num = $('.collect');
//    for(i=0;i<num.length;i++)
//    {
//        var html =  num.eq(i).text();
//
//        alert("!");
//
//        if(html=="收藏"){
//            num.eq(i).addClass("collect-no");
//        }
//        if(html=="已收藏"){
//            num.eq(i).addClass("collect-yes");
//        }
//    }
//
//});





//$(document).ready(function() {
//    $(".follow").click(function () {
//
//        var html =  jQuery.trim($(this).html());
//        var id = $(this).attr("id").substring(1);
//
//        if(html=="关注作者"){
//            $.ajax({
//                type: "get",
//                url: "/weibo/confirmfollow/"+id,
//                cache: false,
//                data: {'weiboid':id},
//                success: function() {
//
//                    var bt = '.follow-' + id;
//                    $(bt).html("已关注<span class='caret'></span>");
//
//                    var item = '.fmenu-' + id;
//                    $(item).html("取消关注");
//
//                },
//                error: function() {
//
//                },
//                beforeSend: function() {
//
//                },
//            })
//        }
//
//        if(html=="取消关注"){
//            $.ajax({
//                type: "get",
//                url: "/weibo/cancelfollow/"+id,
//                cache: false,
//                data: {'weiboid':id},
//                success: function() {
//
//                    var bt = '.follow-' + id;
//                    $(bt).html("关注<span class='caret'></span>");
//
//                    var item = '.fmenu-' + id;
//                    $(item).html("关注作者");
//
//                },
//                error: function() {
//
//                },
//                beforeSend: function() {
//
//                },
//            })
//
//
//        }
//
//        return false;
//    });
//});


$(document).ready(function() {
    $(".follow").click(function () {

        var html =  jQuery.trim($(this).html());
        var id = $(this).attr("id").substring(1);

        if($(this).hasClass("follow-no")){
            $.ajax({
                type: "get",
                url: "/weibo/confirmfollow/"+id,
                cache: false,
                data: {'weiboid':id},
                success: function() {

                    var bt = '.follow-' + id;
                    $(bt).html('已关注 &nbsp;<i class="icon-user-following"></i>');
                    $(bt).removeClass("follow-no");
                    $(bt).addClass("follow-yes");

                },
                error: function() {

                },
                beforeSend: function() {

                },
            })
        }

        if($(this).hasClass("follow-yes")){
            $.ajax({
                type: "get",
                url: "/weibo/cancelfollow/"+id,
                cache: false,
                data: {'weiboid':id},
                success: function() {

                    var bt = '.follow-' + id;
                    $(bt).html('关注 &nbsp;<i class="icon-user-follow"></i>');
                    $(bt).removeClass("follow-yes");
                    $(bt).addClass("follow-no");

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