<?php

/**
 * Plugin Name: Theme Switcha Toolbar
 * Description: If you have the Theme Switcha plugin activated, activating this plugin will the theme switcha to every page (fixed to the bottom of a users browser). 
 * Version: 1.0.0
 * Author: MySite Digital
 * Author URI: https://mysite.digital
 * Requires at least: 5.3
 */


namespace MySiteDigital;


if ( ! defined( 'ABSPATH' ) ) {

    exit; // Exit if accessed directly.

}

if ( ! class_exists( 'ThemeSwitchaToolbar' ) ) {

    /**
     * Main ThemeSwitchaToolbar Class.
     *
     * @class ThemeSwitchaToolbar
     * @version    1.0.0
     */

    final class ThemeSwitchaToolbar {
        
        /**
         * ThemeSwitchaToolbar Constructor.
         */
        public function __construct()
        {
            add_action( 'init', [ $this, 'init' ] );
        }

   

        public function init() {
            add_action( 'wp_footer', [ $this, 'output' ] );
        }

        public function output(){
            echo 
                '<style type="text/css">
                    #theme-switcha-toolbar {
                        position: fixed;
                        bottom: 0;
                        height: 150px;
                        width: 100%;
                        margin-bottom: 15px;
                        padding-left: 15px;
                    }
                    #theme-switcha-toolbar #theme-switcha{
                        display: flex;
                        overflow-x: auto;
                        margin-top: 0;
                    }
                    #theme-switcha-toolbar #theme-switcha a{
                        min-width: 150px;
                        margin-bottom: 0;
                    }
                </style>
                <div id="theme-switcha-toolbar">' . 
                    do_shortcode( '[theme_switcha_thumbs style="true"]' ) .
                '</div>';
        }

    }

}

new ThemeSwitchaToolbar();
