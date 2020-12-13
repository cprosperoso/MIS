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
        $('.js2').attr('src', (dpi > 1) ? '/images/boarding.jpg' : '/images/boarding.jpg');
        $('.js3').attr('src', (dpi > 1) ? '/images/grooming.jpg' : '/images/grooming.jpg');
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
    $('.js4 source').unveil(50);

});
