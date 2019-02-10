$(document).ready(function() {
    startCarouselheader();
    startCarouselactu();
    if ( $(window).width() < 640 ) {
        startCarouselservices();
    } else {
        $('.owl-carousel').addClass('off');
    }

    if ( $(window).width() <= 768 && $(window).width() >= 640) {
        $('#customers-testimonials .item').css('margin-left', '30%'); 
    } 
    else{ 
        $('#customers-testimonials .item').css('margin-left', ''); 
    } 
});

var clickDelay      = 500,
clickDelayTimer = null;

$('.burger-click-region').on('click', function () {

let $menu = $("div.menu_sec")
$menu.toggleClass("menu_sec_active");


if(clickDelayTimer === null) {

var $burger = $(this);
$burger.toggleClass('active');
$burger.parent().toggleClass('is-open');

if(!$burger.hasClass('active')) {
  $burger.addClass('closing');
}

if($menu.hasClass('sec_menu_active')){
    $menu.removeClass('menu_sec_active');
}

clickDelayTimer = setTimeout(function () {
  $burger.removeClass('closing');
  clearTimeout(clickDelayTimer);
  clickDelayTimer = null;
}, clickDelay);
}
});

$(window).resize(function() {
    if ( $(window).width() < 640 ) {
        startCarouselservices();
    }
    if ( $(window).width() <= 768 && $(window).width() >= 640) {
        $('#customers-testimonials .item').css('margin-left', '30%'); 
    } 
    else{ 
        $('#customers-testimonials .item').css('margin-left', ''); 
    } 
});

function startCarouselservices(){
    $('#services').owlCarousel({
        items:2,
        loop:true,
        margin:300,
        autoplay:false,
        autoplayTimeout:1000,
        autoplayHoverPause:false,
        animateOut: 'lightSpeedOut',
    });
}
    
function startCarouselheader(){
    $('#header').owlCarousel({
        items:1,
        lazyLoad:true,
        loop:false,
        rewind:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:false,
        animateOut: 'lightSpeedOut',
        margin:10
    })
    $('#header').css('z-index', '0');

}

function startCarouselactu(){
    $('#customers-testimonials').owlCarousel({
        rewind: true,
        loop: true,
        center: true,
        items: 1,
        margin: 0,
        autoplay: true,
        dots:true,
        autoplayTimeout: 4000,
        smartSpeed: 450,
        responsive: {
        0: {
          items: 1
            },
        768: {
          items: 3
            },
        1170: {
          items: 3
            }
        }
    });
}