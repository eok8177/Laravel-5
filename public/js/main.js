$(window).on('load', function() {
    // "use strict";
    $("#loader").fadeOut();
});

jQuery(document).ready(function($) {
    $(".counter").counterUp({
        delay: 1,
        time: 500
    });
});

var containerEl = document.querySelector('#portfolio');
var mixer = mixitup(containerEl);

$(".carousel-slider").owlCarousel({
    nav: true,
    dots: false,
    slideSpeed: 1e3,
    stopOnHover: true,
    autoPlay: true,
    items: 1,
    itemsDesktopSmall: [ 1024, 1 ],
    itemsTablet: [ 600, 1 ],
    itemsMobile: [ 479, 1 ]
});

$(".touch-slider").owlCarousel({
    nav: true,
    dots: false,
    slideSpeed: 1e3,
    stopOnHover: true,
    autoPlay: true,
    items: 1,
    itemsDesktopSmall: [ 1024, 1 ],
    itemsTablet: [ 600, 1 ],
    itemsMobile: [ 479, 1 ]
});

$(".touch-slider").find(".owl-prev").html('<i class="fa fa-angle-left"></i>');

$(".touch-slider").find(".owl-next").html('<i class="fa fa-angle-right"></i>');

$(".carousel-slider").find(".owl-prev").html('<i class="fa fa-angle-left"></i>');

$(".carousel-slider").find(".owl-next").html('<i class="fa fa-angle-right"></i>');

$(window).on("scroll", function() {
    if ($(window).scrollTop() > 20) {
        $(".header-top-area").addClass("menu-bg");
    } else {
        $(".header-top-area").removeClass("menu-bg");
    }
});

var offset = 200;

var duration = 500;

$(window).scroll(function() {
    if ($(this).scrollTop() > offset) {
        $(".back-to-top").fadeIn(400);
    } else {
        $(".back-to-top").fadeOut(400);
    }
});

$(".back-to-top").click(function(event) {
    event.preventDefault();
    $("html, body").animate({
        scrollTop: 0
    }, 600);
    return false;
});

jQuery(function($) {
    new WOW().init();
    $(".main-navigation").onePageNav({
        currentClass: "active"
    });
});

jQuery(document).ready(function() {
    $("body").scrollspy({
        target: ".navbar-collapse",
        offset: 195
    });
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 200) {
            $(".fixed-top").addClass("menu-bg");
        } else {
            $(".fixed-top").removeClass("menu-bg");
        }
    });
});

$(function() {
    $("a[href*='#']:not([href='#'])").click(function() {
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                $("html,body").animate({
                    scrollTop: target.offset().top
                }, 1e3);
                return false;
            }
        }
    });
});



$("#contactForm").validator().on("submit", function(event) {
    if (event.isDefaultPrevented()) {
        formError();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        event.preventDefault();
        submitForm();
    }
});

function submitForm() {
    var name = $("#name").val();
    var email = $("#email").val();
    var msg_subject = $("#msg_subject").val();
    var message = $("#message").val();
    $.ajax({
        type: "POST",
        url: "/form-process.php",
        data: "name=" + name + "&email=" + email + "&msg_subject=" + msg_subject + "&message=" + message,
        success: function(text) {
            if (text == "success") {
                formSuccess();
            } else {
                formError();
                submitMSG(false, text);
            }
        }
    });
}

function formSuccess() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Message Submitted!");
}

function formError() {
    $("#contactForm").removeClass().addClass("shake animated").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function() {
        $(this).removeClass();
    });
}

function submitMSG(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}