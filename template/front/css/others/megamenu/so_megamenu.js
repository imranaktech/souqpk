var active=!1,hover=!1;function renderWidthSubmenu(){$(".vertical .sub-menu").each(function(){if(value=$(this).data("subwidth"),value){var e=($(".container").width()-$(".vertical").width())*value/100;$(this).css("width",e+"px")}})}function removeWidthSubmenu(){$(".vertical .sub-menu").each(function(){$(this).css("width","100%")})}function clickMegaMenu(){$("ul.megamenu > li.hover").click(function(){if($(this).find(".content").is(":visible"))return!0;active=$(this),hover=!0;var e=$(this).closest(".megamenu").data("transition"),i=$(this).closest(".megamenu").data("animationtime");if($("ul.megamenu > li").removeClass("active"),$(this).addClass("active"),$("ul.megamenu > li").children(".sub-menu").hide(),$("ul.megamenu > li").find(".content").hide(),$(this).children(".sub-menu").show(),"slide"==e){$(this).find(".content").show(),$(this).find(".content").css("height","auto");var t=$(this).find(".content").height();$(this).find(".content").css("height",0),$(this).find(".content").stop(!0,!0).animate({height:t},i)}else"fade"==e?$(this).find(".content").fadeIn(i):$(this).find(".content").show();if($(this).children(".sub-menu").css("right","auto"),"rtl"==$("html").css("direction").toLowerCase()){var n=$(this).children(".sub-menu"),s=$(n).closest("ul.megamenu");n.offset().left<s.offset().left&&$(this).children(".sub-menu").css("right","0")}else{n=$(this).children(".sub-menu");var h=$(window).width()-(n.offset().left+n.outerWidth());s=$(n).closest("ul.megamenu");$(window).width()-(s.offset().left+s.outerWidth())>h&&$(this).children(".sub-menu").css("right","0")}})}function hoverMegaMenu(){$("ul.megamenu > li.hover").hover(function(){active=$(this),hover=!0;var e=$(this).closest(".megamenu").data("transition"),i=$(this).closest(".megamenu").data("animationtime");if($("ul.megamenu > li").removeClass("active"),$(this).addClass("active"),$("ul.megamenu > li").children(".sub-menu").hide(),$("ul.megamenu > li").find(".content").hide(),$(this).children(".sub-menu").show(),"slide"==e){$(this).find(".content").show(),$(this).find(".content").css("height","auto");var t=$(this).find(".content").height();$(this).find(".content").css("height",0),$(this).find(".content").stop(!0,!0).animate({height:t},i)}else"fade"==e?$(this).find(".content").fadeIn(i):$(this).find(".content").show();if($(this).children(".sub-menu").css("right","auto"),"rtl"==$("html").css("direction").toLowerCase()){var n=$(this).children(".sub-menu"),s=$(n).closest("ul.megamenu");n.offset().left<s.offset().left&&$(this).children(".sub-menu").css("right","0")}else{n=$(this).children(".sub-menu");var h=$(window).width()-(n.offset().left+n.outerWidth());s=$(n).closest("ul.megamenu");$(window).width()-(s.offset().left+s.outerWidth())>h&&$(this).children(".sub-menu").css("right","0")}},function(){var e=$(this).attr("title");hover=!1;var i=$(this).closest(".megamenu").data("transition"),t=$(this).closest(".megamenu").data("animationtime");if("hover-intent"==e){var n=$(this);setTimeout(function(){0==hover&&("slide"==i?$(n).find(".content").stop(!0,!0).animate({height:"hide"},t,function(){0==hover&&($(n).removeClass("active"),$(n).children(".sub-menu").hide())}):"fade"==i?($(n).removeClass("active"),$(n).find(".content").fadeOut(t,function(){0==hover&&$(n).children(".sub-menu").hide()})):($(n).removeClass("active"),$(n).children(".sub-menu").hide(),$(n).find(".content").hide()))},500)}else"slide"==i?$(this).find(".content").stop(!0,!0).animate({height:"hide"},t,function(){0==hover&&($(active).removeClass("active"),$(active).children(".sub-menu").hide())}):"fade"==i?($(active).removeClass("active"),$(this).find(".content").fadeOut(t,function(){0==hover&&$(active).children(".sub-menu").hide()})):($(this).removeClass("active"),$(this).children(".sub-menu").hide(),$(this).find(".content").hide())})}$(document).ready(function(){$("ul.megamenu li .sub-menu .content .hover-menu ul li").hover(function(){$(this).children("ul").show()},function(){$(this).children("ul").hide()}),$(window).width()<=991?($("ul.megamenu > li.hover").unbind("mouseenter mouseleave"),removeWidthSubmenu(),clickMegaMenu()):($("ul.megamenu > li.hover").unbind("click"),hoverMegaMenu(),renderWidthSubmenu()),$(window).resize(function(){$(window).width()<=991?($("ul.megamenu > li.hover").unbind("mouseenter mouseleave"),removeWidthSubmenu(),clickMegaMenu()):($("ul.megamenu > li.hover").unbind("click"),hoverMegaMenu(),renderWidthSubmenu())}),$("ul.megamenu > li.click").click(function(){if($(this).find(".content").is(":visible"))return!1;active=$(this),hover=!0;var e=$(this).closest(".megamenu").data("transition"),i=$(this).closest(".megamenu").data("animationtime");if($("ul.megamenu > li").removeClass("active"),$(this).addClass("active"),$("ul.megamenu > li").children(".sub-menu").hide(),$("ul.megamenu > li").find(".content").hide(),$(this).children(".sub-menu").show(),"slide"==e){$(this).find(".content").show(),$(this).find(".content").css("height","auto");var t=$(this).find(".content").height();$(this).find(".content").css("height",0),$(this).find(".content").stop(!0,!0).animate({height:t},i)}else"fade"==e?$(this).find(".content").fadeIn(i):$(this).find(".content").show();if($(this).children(".sub-menu").css("right","auto"),"rtl"==$("html").css("direction").toLowerCase()){var n=$(this).children(".sub-menu"),s=$(n).closest("ul.megamenu");n.offset().left<s.offset().left&&($(this).children(".sub-menu").css("right","0"),$(this).children(".sub-menu").css("top","0"))}else{n=$(this).children(".sub-menu");var h=$(window).width()-(n.offset().left+n.outerWidth());s=$(n).closest("ul.megamenu");$(window).width()-(s.offset().left+s.outerWidth())>h&&$(this).children(".sub-menu").css("right","0")}return!1}),$("#show-megamenu").click(function(){$(".megamenu-wrapper").hasClass("so-megamenu-active")?$(".megamenu-wrapper").removeClass("so-megamenu-active"):$(".megamenu-wrapper").addClass("so-megamenu-active")}),$("#remove-megamenu").click(function(){return $(".megamenu-wrapper").removeClass("so-megamenu-active"),!1}),$("#show-verticalmenu").click(function(){$(".vertical-wrapper").hasClass("so-vertical-active")?$(".vertical-wrapper").removeClass("so-vertical-active"):$(".vertical-wrapper").addClass("so-vertical-active")}),$("#remove-verticalmenu").click(function(){return $(".vertical-wrapper").removeClass("so-vertical-active"),!1}),$("html").on("click",function(){$("ul.megamenu > li.click").removeClass("active"),$("ul.megamenu > li.click").children(".sub-menu").hide(),$("ul.megamenu > li.click").find(".content").hide()}),$(".close-menu").on("click",function(){return $(this).parent().removeClass("active"),$(this).parent().children(".sub-menu").hide(),$(this).parent().find(".content").hide(),!1})});