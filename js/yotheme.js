$(function() {
    //获取浏览器版本信息
    var sys = {}; 
    var ua = navigator.userAgent.toLowerCase(); 
    var s; 
    (s = ua.match(/msie ([\d.]+)/)) ? sys.ie = s[1] : 
    (s = ua.match(/firefox\/([\d.]+)/)) ? sys.firefox = s[1] : 
    (s = ua.match(/chrome\/([\d.]+)/)) ? sys.chrome = s[1] : 
    (s = ua.match(/opera.([\d.]+)/)) ? sys.opera = s[1] : 
    (s = ua.match(/version\/([\d.]+).*safari/)) ? sys.safari = s[1] : 0;
    if (!sys.ie) {
        var storage = window.localStorage;
        var sidebarStatus = storage.getItem("sidebar");
        if (!sidebarStatus) {
            sidebarStatus = "open";
        }
        var stoB = $(".b");
        var stoPage = $("#page");
        var stoSidebar = $("#sidebar")
        if (sidebarStatus == "open") {
            stoB.attr("status","open");
            stoB.addClass("open");
            stoB.removeClass("close");
            stoPage.css("width","780px");
            stoSidebar.css("right","0");
        } else {
            stoB.attr("status","close");
            stoB.addClass("close");
            stoB.removeClass("open");
            stoPage.css("width","1000px");
            stoSidebar.css("right","-200px");
        }
    }
    //单篇文章页面高度
    var sideh = $("#sidebar").height();
    var posth = $("#post").height();
    var sideh = parseInt(sideh)+254;
    /*if (posth) {
        if (sideh>posth) {
            $("#container").css("height",sideh+"px");
        }
    }*/
    //搜索框交互样式
    $(".sk,.sb").hover(function() {
        $(".sk").addClass("sk-hover");
        $(".sb").addClass("sb-hover");
    },function() {
        $(".sk").removeClass("sk-hover");
        $(".sb").removeClass("sb-hover");
    });
    $(".sk").focus(function() {
        var s = $(this);
        var search = s.parent().parent(".search");
        s.addClass("sk-focus");
        $(".sb").addClass("sb-focus");
        s.animate({
            width: "185px"
        },300);
        search.animate({
            width: "225px"
        },250);
    });
    $(".sk").blur(function() {
        var s = $(this);
        var search = s.parent().parent(".search");
        s.animate({
            width: "104px"
        },200);
        search.animate({
            width: "144px"
        },250);
        setTimeout("searchBoxBlur()", 250);
    });
    //菜单交互样式
    $(".nav>div>ul>li").hover(function() {
        var s = $(this);
        s.addClass("nav-li-hover");
    },function() {
        var s = $(this);
        s.removeClass("nav-li-hover");
    });
    //设置功能交互样式
    $("#settings").hover(function() {
        $(".setting-button").addClass("seb-hover");
        if (!$(".setting").is(":animated")) {
            $(".setting").animate({
                right: "21px"
            },500);
        }
    },function() {
        $(".setting").animate({
            right: "-115px"
        },200);
        setTimeout("settingButtonOut()",250);
    });
    //文章列表交互样式
    $(".alist").hover(function() {
        $(this).addClass("al-hover");
    },function() {
        $(this).removeClass("al-hover");
    });
    //侧边栏交互样式
    $("#sidebar>ul>li").hover(function() {
        var s = $(this);
        var h3 = s.children("h3");
        var span = h3.children("span");
        span.animate({
            opacity: 1
        },400);
        h3.click(function() {
            var as = $(this);
            var ul = as.next();
            var span = as.children("span");
            if(!ul.is(":animated")){
                ul.slideToggle(500,function() {
                    if (ul.is(":hidden")) {
                        span.addClass("side-span-close");
                        span.removeClass("side-span-open");
                    } else {
                        span.addClass("side-span-open");
                        span.removeClass("side-span-close");
                    }
                });
            }
        });
    },function() {
        $(this).children("h3").children("span").animate({
            opacity: 0.1
        },300);
    });
    //打开关闭侧边栏
    $(".b").click(function() {
        var side = $("#sidebar");
        var page = $("#page");
        var s = $(this);
        var status = s.attr("status");
        if (status == "open") {
            s.addClass("close");
            s.removeClass("open");
            if (!side.is(":animated")) {
                side.animate({
                    right: "-200px"
                });
                page.animate({
                    width: "1000px"
                });
            }
            s.attr("status","close");
            if (!sys.ie) {
                storage.setItem("sidebar","close");
            }
        } else {
            s.addClass("open");
            s.removeClass("close");
            if (!side.is(":animated")) {
                side.animate({
                    right: "0"
                });
                page.animate({
                    width: "780px"
                });
            }
            s.attr("status","open");
            if (!sys.ie) {
                storage.setItem("sidebar","open");
            }
        }
    });
});

var searchBoxBlur = function() {
    $(".sk").removeClass("sk-focus");
    $(".sb").removeClass("sb-focus");
}
var settingButtonOut = function() {
    $(".setting-button").removeClass("seb-hover");
}
var addFavorite = function(sURL,sTitle) {
    try {
        window.external.addFavorite(sURL,sTitle);
    } catch(e) {
        try {
            window.slidebar.addPanel(sTitle,sURL,"");
        } catch(e) {
            alert("抱歉，您的浏览器不支持此功能，请使用Ctrl+D手动添加。");
        }
    }
}