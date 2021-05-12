// jQuery Scrollbur
$(function() {
    //The passed argument has to be at least a empty object or a object with your desired options
    $('body').overlayScrollbars({ });
});

//date
$(document).ready(function () {
    var d = new Date();
    var n = d.toDateString();
    document.getElementById("date").innerHTML = n;
});

//News Ticker
jQuery(document).ready(function ($) {
    $('.my-news-ticker').AcmeTicker({
        type:'typewriter',/*horizontal/horizontal/Marquee/type*/
        direction: 'right',/*up/down/left/right*/
        speed:50,/*true/false/number*/ /*For vertical/horizontal 600*//*For marquee 0.05*//*For typewriter 50*/
        autoplay: 2000,
    });
})
