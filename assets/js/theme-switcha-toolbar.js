; (
    function ($) {

        jQuery(document).ready(
            function () {
                themeSwitchaToolbar.init();
            }
        );

    }
)(jQuery);



var themeSwitchaToolbar = {

    button: jQuery('#theme-switcha-toggle'),

    navigtionHolder: jQuery('#theme-switcha'),

    init: function () {
        themeSwitchaToolbar.addListeners();
    },

    addListeners: function () {
        themeSwitchaToolbar.button.click(
            function () {
                themeSwitchaToolbar.button.toggleClass('open');
                let rightPos = 0;
                if (themeSwitchaToolbar.button.hasClass('open')) {
                    rightPos = '-280px';
                }
                themeSwitchaToolbar.animateNav(rightPos);
            }
        );
    },

    animateNav: function (rightPos) {
        console.log(themeSwitchaToolbar.navigtionHolder);
        
        themeSwitchaToolbar.button.animate(
            {
                right: rightPos
            },
            500,
            'swing',
            function () {
            }
        );
    }
}