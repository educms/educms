$(document).ready(function() {
    if ($(window).width() <= 500) {
        $('nav').removeClass('navbar-dark transparent mtop');
        $('nav').addClass('navbar-light bg-light shadow');
    }else{
        $('nav').addClass('navbar-dark transparent mtop');
        $(window).scroll(function(){
            var scroll = $(window).scrollTop();
            if(scroll < 150){
                // $('.fixed-top').css('background', 'transparent');
                // $('.navbar').css('color','rgb(255,255,255)');
        
                $('nav').removeClass('navbar-light bg-light shadow');
                $('nav').addClass('navbar-dark transparent mtop');
            } else{
                // $('.fixed-top').css('background', 'rgb(255,255,255)');
                // $('.navbar').css('color','rgb(39,46,63)');
                $('nav').removeClass('navbar-dark transparent mtop');
                $('nav').addClass('navbar-light bg-light shadow');
            }
        });
    }
    
})