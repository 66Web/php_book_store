(function (window, jQuery) {
    jQuery(document).ready(function ($) {
        console.log(navigator.userAgent)
        var p1 = new Image();
        p1.src = "img/phone1.png";
        var p2 = new Image();
        p2.src = "img/phone2.png";

        function w1800(){
            if ($("html").width() > 1800) {
                $(".container").addClass("w1800");
                $(".fifth .center").addClass("w1800");
            }else{
                $(".container").removeClass("w1800");
                $(".fifth .center").removeClass("w1800");
            }
        };

        w1800();


        $('#fullpage').fullpage({
            navigation: true,   //前进后退按钮
            verticalCentered: false,
            scrollOverflow: true,
            anchors: ['firstPage', 'secondPage', 'thirdPage', 'fourthPage', 'fifthPage'],
            afterLoad: function (anchorLink, index) {

                if (index == 1) {
                    initMobiles();
                } else {
                    $(".phone1").css("top", $(".phones").height() - $(".phone1").height() / 2.0 + "px");
                    $(".phone2").css("top", $(".phones").height() - $(".phone2").height() / 2.0 + "px");
                }
                initPillows();

            },
            afterRender: function () {
                var pluginContainer = $(this);
                //alert("The resulting DOM structure is ready");

                //防止第一页加载未渲染好时 出现第二页内容
                $(".second .starmoon").css("display", "block");

                smileChange.start();

                $(".third .smile img").mouseenter(function () {
                    smileChange.stop();
                    //console.log(smileChange.intervalId);
                }).mouseleave(function () {
                    smileChange.start();
                });


                initHouse();


                $(window).resize(function () {
                    $.fn.fullpage.reBuild();
                    $(".phone1").stop();
                    $(".phone2").stop();
                });


                /*imageFitDiv($(".hearttalk"),900.0,748);*/

            },
            afterReBuild: function () {
                w1800();
                initMobiles();
                initPillows();
                initPops();
                initHearts();
                //使connection部分的f2 f3大小重新计算
                $(".connection .f2,.connection .f2b,.connection .f3,.connection .f3b").removeAttr("style");
                initConn();
                initHouse();
            },
            onLeave: function (index, nextIndex, direction) {
                $(".phone1").stop();
                $(".phone2").stop();
                if (index != 1) {

                }

                if (nextIndex == 2) {
                    initPops();
                }
                if (nextIndex == 3) {
                    initHearts();
                }
                if (nextIndex == 4) {
                    initConn();
                }
                if (nextIndex == 5 || nextIndex == 3) {
                    $("#fp-nav").hide();
                } else {
                    $("#fp-nav").show();
                }
            }

        });

        (function androiddown() {
            $(".androiddown").click(function () {
                window.location.href = "http://www.shuiqian.cc/public/Bedtime.apk";
            });

        })();

        //初始化两个手机
        function initMobiles() {
            $(".phone1").css("top", $(".phones").height() - $(".phone1").height() / 2.0 + "px");
            $(".phone2").css("top", $(".phones").height() - $(".phone2").height() / 2.0 + "px");

            $(".phone1").animate({
                opacity: 0.9,
                top: "-=" + (923.0 / 2 - 135.0) * $(".phone1").height() / p1.height + "px"
            }, 2000, function () {
                $(".star").animate({
                    opacity: 1
                }, 1500, function () {//显示下载链接 二维码

                    imageFitDiv($(".downwrap"), "img.down", 882.0, 561.0);
                    $(".first .down").fadeIn(1000, function () {
                        var o = $("img.down").offset();
                        console.log(o);
                        console.log($("img.down").width())
                        console.log($("img.down").height())
                        $(".androiddown").css({
                            width: 42.0 / 882 * $("img.down").width() + "px",
                            height: 156.0 / 561 * $("img.down").height() + "px",
                            left: o.left + 590.0 / 882 * $("img.down").width() - $(".container").offset().left + "px",
                            top: o.top + 331.0 / 561 * $("img.down").height() + "px"
                        });
                    });

                });
            });


            $(".phone2").animate({
                opacity: 1,
                top: "-=" + (801.0 / 2 - 120.0) * $(".phone2").height() / p2.height + "px"
            }, 2000, function () {
            });


            //星星定位
            $(".star img").css("bottom", $(".star").height() * 0.2 + "px");
        }


        //使枕头的图片适应div
        function initPillows() {
            imageFitDiv($(".pillows"), "img", 1022.0, 137);

            //对starmoon设置宽度，以便使用margin 0 auto来居中
            $(".hablock .starmoon").width($(".hablock .help img").width());
        }

        //初始化pop提示框的位置
        function initPops() {
            imageFitDiv($(".pop1"), "img", 282.0, 188);
            imageFitDiv($(".pop2"), "img", 282.0, 188);
            imageFitDiv($(".pop3"), "img", 282.0, 188);

            //Help部分 377*313
            //失恋了怎么办部分 282*188
            $(".pop4").css({
                width:$("#help").width()/377*282.0+"px",
                height:$("#help").height()/313*188.0+"px"

            });
            //原图pop4相对于help left 275
            $(".pop4").offset({
                left:$("#help").offset().left+275.0/377*$("#help").width(),
                top:$("#help").offset().top
            });


            //pop1在原图的位置：left 70
            //原图 pillows 773 103
            popPosition($(".pop1"), 70.0 / 773 * $(".pillows img").width(), 0);
            popPosition($(".pop2"), 298.0 / 773 * $(".pillows img").width(), 13.0 / 91 * $(".pop1 img").height());//top距离相对于pop1 img算出
            popPosition($(".pop3"), 574.0 / 773 * $(".pillows img").width(), -10.0 / 91 * $(".pop1 img").height());


            popSpanPosition($(".pop1"));
            popSpanPosition($(".pop2"));
            popSpanPosition($(".pop3"));


        }

        function initHearts() {
            var w = $(".third .talk").width();
            var h = $(".third .talk").height();
            var originW = 900.0;
            var originH = 748.0;

            //475 102

            $(".third .gn").css({
                width: 180.0 / 611 * w + "px",
                height: 149.0 / 508 * h + "px",
                left: (475 / originW * w) + "px",
                top: (102 / originH * h) + "px"
            });

        }

        //使联系的图片适应div
        function initConn() {
            //imageFitDiv($(".connection"),"img",312.0,463);
            imageFitDiv(".connection", ".connwrap", 500.0, 742.0, "");


            originf2bW = $(".fourth .connection .f2b").width();
            originf3bW = $(".fourth .connection .f3b").width();
            //使f2 f3图片的大小不随父级百分比变化而再次变化
            //为监听鼠标事件 transform
            $(".connection .f2").css({
                width: $(".connection .f2").width() + 'px',
                height: $(".connection .f2").height() + 'px'
            });
            $(".connection .f3").css({
                width: $(".connection .f3").width() + 'px',
                height: $(".connection .f3").height() + 'px'
            });
            //console.log(getNowStyle($(".f3b")[0],"width"));

            //然后增大f2b f3b的宽度
        }

        //第五页房子月亮部分
        function initHouse() {
            houseFitDiv();

            //定位乌云

            $(".fifth .cloud").css({
                width: $(".fifth .house").width() + "px",
                height: $(".fifth .house").height() + "px"
            });

            //定位月亮 大图版本
            /*$(".fifth .lunar").css({
             width:$(".fifth .house").width()+"px",
             height:$(".fifth .house").height()+"px"
             });*/

            //定位月亮 小图版本
            $(".fifth .lunar").css({
                width: 141.0 / 720 * $(".fifth .house").width() + "px",
                height: 118.0 / 720 * $(".fifth .house").height() + "px",
                left: 361.0 / 720 * $(".fifth .house").height() + "px",
                top: 103.0 / 720 * $(".fifth .house").width() + "px"
            });


        }


        //使图片适应div，宽高等比例，不超过div
        function imageFitDiv(div, find, imgOriginWidth, imgOriginHeight) {
            var w = $(div).width();
            var h = $(div).height();
            if (w / h >= imgOriginWidth / imgOriginHeight) {
                $(div).find(find).height(h + "px");
                $(div).find(find).width(h / imgOriginHeight * imgOriginWidth + "px");
            } else {
                $(div).find(find).width(w + "px");
                $(div).find(find).height(w / imgOriginWidth * imgOriginHeight + "px");

            }
        }

        //第五页房子适应div
        function houseFitDiv() {
            var div = $(".fifth .center");
            var w = div.width();
            var h = div.height();
            if (w / h >= 721.0 / 720) {
                $(div).find("img.house").height(h / 486.0 * 720 + "px");
                $(div).find("img.house,.housewrap").width($(div).find("img.house").height() / 720.0 * 721 + "px");
            } else {
                $(div).find("img.house").width(w + "px");
                $(div).find("img.house").height(w / 721.0 * 720 + "px");

            }

            //$(div).find("img.house").wrap("<div class=\"housewrap\"></div>");

        }

        //定位三个pop框
        function popPosition(pop1, left, top) {
            var pillowOffset = $(".pillows img").offset().left - $(".pillows").offset().left;
            $(pop1).css({
                left: pillowOffset + left + "px",
                top: top + "px"
            });
        }

        //定位pop内的span文字
        function popSpanPosition(pop1) {
            var span = $(pop1).find("span");
            span.css({
                left: (span.parent().find("img").width() - span.width()) / 2.0 + "px",
                top: (span.parent().find("img").height() - span.height()) / 2.0 + "px"
            });
        }

        var smileChange = {
            start: function () {
                var that = this;//内层的内层函数的this会出问题
                this.intervalId = setInterval(function () {
                    clearTimeout(that.timeoutId);
                    $(".third .smile img").attr("src", "../img/smile-on-2.png");
                    that.timeoutId = setTimeout(function () {
                        $(".third .smile img").attr("src", "../img/smile-off-2.png");
                    }, 500);
                    //console.log("start  timeout ID "+that.timeoutId);
                }, 1000);


            },
            stop: function () {
                console.log("stop timeout id" + this.timeoutId);
                clearInterval(this.intervalId);
                clearTimeout(this.timeoutId);
                console.log("stop interval id" + this.intervalId);
            },
            changing: 0,
            intervalId: 0,
            timeoutId: 0
        }

        //记录鼠标进入时的坐标
        var enterX = 0, enterY = 0;

        /* 第四页 视差部分*/
        var originf2bW = 0, originf3bW = 0;
        $(".fourth .container")
            .mouseenter(function (e) {
                enterX = e.clientX;
                enterY = e.clientY;
            })
            .mousemove({find: ".fourth .container", section: "connection"}, parallax)
            .mouseleave(function (e) {
                $(".f2b").width(originf2bW).css({
                    'transform': 'none',
                    '-webkit-transform': 'none'
                });
                $(".f3b").width(originf3bW).css({
                    'transform': 'none',
                    '-webkit-transform': 'none'
                });
                $(".fourth .bg1,.fourth .bg2").css({
                    'transform': 'none',
                    '-webkit-transform': 'none'
                });
            });

        /*第五页 视差部分*/
        //,上次月亮的角度 此次月亮的角度 上次角度是否加上
        var lastDeg = 0, deg = 0, degPlused = 0;
        $(".fifth .housewrap").mouseenter(function (e) {
            enterX = e.clientX;
            enterY = e.clientY;
        });
        $(".fifth .housewrap").mousemove({find: ".house", section: "house"}, parallax);
        $(".fifth .housewrap").mouseleave(function (e) {
            $(".fifth .cloud").css({
                'left': '0',
                'top': '0'
            });
            lastDeg = deg;
            $(".fifth .lunar").css({
                'transform': "none",
                '-webkit-transform': "none",
                'transform': "rotate(" + (-lastDeg) + "deg)",
                '-webkit-transform': "rotate(" + (-lastDeg) + "deg)",
            });
            $(".fifth .house").css({
                'transform': "none",
                '-webkit-transform': "none"
            });
            degPlused = 0;
        });


        function parallax(e) {
            var that = this;
            var offset = $(that).offset();
            var x1 = offset.left;
            var y1 = offset.top;

            //find可能和当前元素相同
            var find = $(this).find(e.data.find)[0];
            find || (find = $(this));

            var w = $(find).width();
            var h = $(find).height();
            var centerX = x1 + w / 2.0;
            var centerY = y1 + h / 2.0;

            var x2 = e.clientX;
            var y2 = e.clientY;

            var deltaX = x2 - x1;
            var deltaY = y2 - y1;

            //delta center
            var dcX = x2 - centerX;
            var dcY = y2 - centerY;

            //move delta
            var moveX = x2 - enterX;
            var moveY = y2 - enterY;

            //第四页 connection部分
            if (e.data.section == "connection") {

                //床上笑脸 视差
                if (dcX < 0) {
                    if(((-dcX)*0.1) > $(that).find(".f2").width()*0.5){
                        dcX = 0 - $(that).find(".f2").width()*0.5;
                    }
                    var nowf2W = originf2bW - dcX * 0.1;
                    $(that).find(".f2b").width(nowf2W).css({
                        'transform': 'translate(' + (dcX * 0.1) + 'px,' + (0) + 'px)',
                        '-webkit-transform': 'translate(' + (dcX * 0.1) + 'px,' + (0) +'px)'
                    });
                } else {
                    if((dcX*0.1) > $(that).find(".f3").width()*0.5){
                        dcX = $(that).find(".f3").width()*0.5;
                    }
                    var nowf3W = originf3bW + dcX * 0.1;
                    $(that).find(".f3b").width(nowf3W).css({
                        'transform': 'translate(' + (dcX * 0.1) + 'px,' + (0) +'px)',
                        '-webkit-transform': 'translate(' + (dcX * 0.1) + 'px,' + (0) +'px)'
                    });


                }

/*                //笑脸分割线视差
                $(that).find(".f1").css({
                    'transform': 'translate(' + '0px,' + (dcY * 0.04)+'px)',
                    '-webkit-transform': 'translate(' + '0px,' + (dcY * 0.04)+'px)'
                });*/

                //两个背景图 视差
                $(that).find(".bg1").css({
                    'transform': 'translate(' + (dcX * 0.05) + 'px,' + (dcY * 0.05)+'px)',
                    '-webkit-transform': 'translate(' + (dcX * 0.05) + 'px,' + (dcY * 0.05)+'px)'
                });
                $(that).find(".bg2").css({
                    'transform': 'translate(' + (dcX * 0.08) + 'px,' + (dcY * 0.08)+'px)',
                    '-webkit-transform': 'translate(' + (dcX * 0.08) + 'px,' + (dcY * 0.08)+'px)'
                });

            }
            //第五页 house部分
            if (e.data.section == "house") {
                //cloud CSS 设置
                $(".fifth .cloud").css({
                    'left': dcX * 0.05 + "px",
                    'top': dcY * 0.05 + "px"
                });

                deg = parseInt(moveY / h * 0.2 * 360);
                if (!degPlused) {
                    deg += lastDeg;
                }
                //lunar CSS 设置
                $(".fifth .lunar").css({
                    'transform': "translate(" + (-dcX * 0.05) + "px," + (-dcY * 0.1) + "px)",
                    '-webkit-transform': "translate(" + (-dcX * 0.05) + "px," + (-dcY * 0.1) + "px)",
                    'transform': "rotate(" + (-deg) + "deg)",
                    '-webkit-transform': "rotate(" + (-deg) + "deg)"
                });

                $(".fifth .house").css({
                    'transform': "translate(" + (-dcX * 0.02) + "px," + (-dcY * 0.02) + "px)",
                    '-webkit-transform': "translate(" + (-dcX * 0.02) + "px," + (-dcY * 0.02) + "px)"
                });

            }

        }

        var getNowStyle = function (element, attr) {
            return element.currentStyle ? element.currentStyle[attr] : getComputedStyle(element, null)[attr];
        }


    });

})(window, jQuery);