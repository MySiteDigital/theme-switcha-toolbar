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

    navigtionHolder: jQuery('#theme-switcha-toolbar #theme-switcha'),

    init: function () {
        themeSwitchaToolbar.addListeners();
    },

    addListeners: function () {
        themeSwitchaToolbar.button.click(
            function () {
                themeSwitchaToolbar.button.toggleClass('open');
                let rightPos = '-280px';
                if (themeSwitchaToolbar.button.hasClass('open')) {
                    rightPos = '-0px';
                }
                themeSwitchaToolbar.animateNav(rightPos);
            }
        );
    },

    animateNav: function (rightPos) {
        console.log(themeSwitchaToolbar.navigtionHolder);
        console.log(rightPos);
        
        themeSwitchaToolbar.navigtionHolder.animate(
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