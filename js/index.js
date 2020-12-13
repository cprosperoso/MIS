(function(d) {
    var h = [];
    d.loadImages = function(a, e) {
        "string" == typeof a && (a = [a]);
        for (var f = a.length, g = 0, b = 0; b < f; b++) {
            var c = document.createElement("img");
            c.onload = function() {
                g++;
                g == f && d.isFunction(e) && e()
            };
            c.src = a[b];
            h.push(c)
        }
    }
})(window.jQuery);
$.fn.hasAttr = function(name) {
    var attr = $(this).attr(name);
    return typeof attr !== typeof undefined && attr !== false;
};


$(document).ready(function() {
    r = function() {
        dpi = window.devicePixelRatio;
        $('.js2 .slider-nav .slide0').attr('src', (dpi > 1) ? 'images/thumb-pic-01-228-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-01.png-1-0-2-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-01-114-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-01.png-1-0-1-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide1').attr('src', (dpi > 1) ? 'images/thumb-pic-02-228-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-02.png-1-1-2-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-02-114-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-02.png-1-1-1-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide2').attr('src', (dpi > 1) ? 'images/thumb-pic-03-228-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-03.png-1-2-2-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-03-114-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-03.png-1-2-1-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide3').attr('src', (dpi > 1) ? 'images/thumb-pic-04-228-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-04.png-1-3-2-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-04-114-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-04.png-1-3-1-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide4').attr('src', (dpi > 1) ? 'images/thumb-pic-05-228-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-05.png-1-4-2-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-05-114-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-05.png-1-4-1-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide5').attr('src', (dpi > 1) ? 'images/thumb-pic-06-228-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-06.png-1-5-2-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-06-114-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-06.png-1-5-1-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide6').attr('src', (dpi > 1) ? 'images/thumb-pic-07-228-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-07.png-1-6-2-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-07-114-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-07.png-1-6-1-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide7').attr('src', (dpi > 1) ? 'images/thumb-pic-08-228-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-08.png-1-7-2-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-08-114-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-08.png-1-7-1-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide8').attr('src', (dpi > 1) ? 'images/thumb-pic-09-228-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-09.png-1-8-2-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-09-114-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-09.png-1-8-1-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide9').attr('src', (dpi > 1) ? 'images/thumb-pic-10-228-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-10.png-1-9-2-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-10-114-3.png?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-10.png-1-9-1-public.png-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide10').attr('src', (dpi > 1) ? 'images/thumb-pic-12-228-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-12.jpg-1-10-2-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-12-114-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-12.jpg-1-10-1-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');
        var a = 'data-src';
        if ($('.js2 .slider-for .slide11').hasAttr('src')) {
            a = 'src';
        }
        $('.js2 .slider-for .slide11').attr(a, (dpi > 1) ? 'images/pic-13-1440-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-pic-13.jpg-0-11-2-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/pic-13-720-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-pic-13.jpg-0-11-1-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');
        $('.js2 .slider-nav .slide11').attr('src', (dpi > 1) ? 'images/thumb-pic-13-228-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-13.jpg-1-11-2-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-13-114-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-13.jpg-1-11-1-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide12').attr('src', (dpi > 1) ? 'images/thumb-pic-14-228-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-14.jpg-1-12-2-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-14-114-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-14.jpg-1-12-1-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide13').attr('src', (dpi > 1) ? 'images/thumb-pic-15-228-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-15.jpg-1-13-2-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-15-114-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-15.jpg-1-13-1-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide14').attr('src', (dpi > 1) ? 'images/thumb-pic-16-228-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-16.jpg-1-14-2-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-16-114-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-16.jpg-1-14-1-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide15').attr('src', (dpi > 1) ? 'images/thumb-pic-17-228-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-17.jpg-1-15-2-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-17-114-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-17.jpg-1-15-1-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');

        $('.js2 .slider-nav .slide16').attr('src', (dpi > 1) ? 'images/thumb-pic-18-228-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-18.jpg-1-16-2-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099' : 'images/thumb-pic-18-114-3.jpg?2289-CF01770B-A9CF-4B15-B9FC-83C064759104-960-thumb-pic-18.jpg-1-16-1-public.jpeg-0-images-25a0c5b7d397d1245e561f709f09adafdc7f7099');
    };
    if (!window.HTMLPictureElement) {
        r();
    }
    (function() {
        $('a[href^="#"]:not(.allowConsent,.noConsent,.denyConsent,.removeConsent)').each(function() {
            $(this).click(function() {
                var t = this.hash.length > 1 ? $('[name="' + this.hash.slice(1) + '"]').offset().top : 0;
                return $("html, body").animate({
                    scrollTop: t
                }, 400), !1
            })
        })
    })();
    initMenu($('#m1')[0]);
    $('.js').unveil(50);
    $('.js3 source').unveil(50);
    $('.js2 .slider-for').slick({
        lazyLoad: 'ondemand',
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        infinite: true,
        asNavFor: '.js2 .slider-nav',
        speed: 300
    });
    $('.js2 .slider-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.js2 .slider-for',
        centerMode: true,
        focusOnSelect: true,
        speed: 300,
        dots: false,
        arrows: true,
        infinite: true,
        autoplay: true,
        pauseOnHover: true,
        autoplaySpeed: 2500
    });
});
