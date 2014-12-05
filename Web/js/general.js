$(document).ready(function() {
    "use strict";

    $.reject();

    $('.carousel').carousel();

    //modal box shown after submit contact form
    $('#modalBox').modal({
        show: false
    });

    //bootstrap menu slide down effect
    $('.navbar .dropdown').hover(function() {
        $(this).find('.dropdown-menu').first().hide().stop(true, true).slideDown();
    }, function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });

    //boostrap menu active item
    var url = String(window.location).split('/');
	url = '/' + url[3];
    $('ul.nav a[href="' + url + '"]').parent().addClass('active');
    $('ul.nav a').filter(function () {
        return this.href == url;
    }).parent().addClass('active').parent().parent().addClass('active');

    //logo slide down effect on frontpage
    $('.frontpage .logo').hide().slideDown('slow');

    //scroll to div id, used in contact page
    $('#content a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

    //scroll to top button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 200) {
            $('.btn-top').fadeIn();
        }
        else {
            $('.btn-top').fadeOut();
        }
    });
    $('.btn-top').click(function(){
        $("html, body").animate({ scrollTop: 0}, 1000);
        return false;
    });

    //progressive loading of elements
    $("#content").hide().fadeIn('slow');
    $("#content-home").hide().fadeIn('slow');
    $(".hideOnLoad").hide();
    $(".showOnLoad").fadeIn('slow');
    $(".showOnLoad1").delay(300).fadeIn();
    $(".showOnLoad2").delay(600).fadeIn();
    $(".showOnLoad3").delay(900).fadeIn();
    $(".showOnLoad4").delay(1200).fadeIn();
    $(".showOnLoad5").delay(1500).fadeIn();
    $(".showOnLoad6").delay(1800).fadeIn();
    $(".showOnLoad7").delay(2100).fadeIn();
    $(".showOnLoad8").delay(2400).fadeIn();
    $(".showOnLoad9").delay(2700).fadeIn();
    $(".showOnLoad10").delay(3000).fadeIn();

    //show items on hover div
    $('.showItemOnHover:not(.active) .showItem').hide();
    $('.showItemOnHover:not(.active)').hover(function () {
        $('.showItem', this).fadeToggle(200);
    });

    /* Contact Form Script */
    $("#contact-form").submit(function(){
        event.preventDefault();
        $(".modal.btn").click();
        $.ajax({
            type: "POST",
            url: "/contact",
			dateType: "json",
            data: $('#contact-form').serialize()
        }).success(function(data) {
                $(".modal-body").html('<p class="text-' + data.type + '">' + data.message + '</p>');
				$('#contact-form')[0].reset();
            });
    });
});
