/* AzeraX site script.
   Replaces the old template's theme.js, which tried to start sliders, a lightbox, a counter,
   a map and a dropdown plugin that this site doesn't use or load - and stopped with an error
   before it got to them. The only part the site relies on is the sticky header. */
(function ($) {
    "use strict";
    var nav_offset_top = 100;
    var $header = $('.header_area');
    if (!$header.length) return;

    /* When the menu turns "fixed" it leaves the page flow, which used to make the whole page
       about 90px shorter at that moment. On a page only slightly taller than the screen that
       pushed the scroll position back above the trigger point, the menu dropped out of "fixed"
       again, the page grew, and the two kept flipping: the page shook. A spacer of the same
       height holds the room while the menu is fixed, so the page height never changes. */
    var $spacer = $('<div class="az-header-spacer" aria-hidden="true" style="height:0;margin:0;padding:0;border:0;"></div>').insertAfter($header);
    var fixed = false;

    function update() {
        var shouldFix = $(window).scrollTop() >= nav_offset_top;
        if (shouldFix === fixed) return;
        if (shouldFix) {
            var h = $header.find('.main_menu').outerHeight() || 0;
            $spacer.css('height', h + 'px');
            $header.addClass('navbar_fixed');
        } else {
            $header.removeClass('navbar_fixed');
            $spacer.css('height', '0');
        }
        fixed = shouldFix;
    }
    $(window).on('scroll', update);
    update();
})(jQuery);
