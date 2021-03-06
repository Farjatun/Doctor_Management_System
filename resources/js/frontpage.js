
$(window).scroll(function () {
    var scrollpos = $(this).scrollTop();
    if (scrollpos>0){
        $('.patients').addClass('fadeInRight');
        $('.doctors').addClass('fadeInLeft');
        $('.headone').addClass('fadeInDown');

    }
    if(scrollpos>120){
        $('.header').addClass('stickybar');
    }
    else{
        $('.header').removeClass('stickybar');

    }

    if(scrollpos>450){
        $('.patients-manual-header').addClass('fadeInDown');
        $('.patients-manual-animation').addClass('fadeInUp');
    }

    if(scrollpos>1000){
        $('.doctors-java').addClass('fadeInLeft');
    }

    if(scrollpos>1400){
        $('.image-box').addClass('fadeInRight');
    }

    if(scrollpos>1800){
        $('.contents-box').addClass('fadeInLeft');
    }

    if(scrollpos>2200){
        $('.admin').addClass('fadeInRight')
    }

})(jQuery);

