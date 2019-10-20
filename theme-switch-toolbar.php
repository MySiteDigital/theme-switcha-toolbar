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
            add_action( 'init', [ $this, 'register_fixed_menu' ] );
            add_action( 'wp_footer', [ $this, 'output' ] );
        }

        public function register_fixed_menu(){
             register_nav_menus(
                [
                    'fixed-menu' => __( 'Fixed Menu' ),
                ]
            );
        }

        public function output(){
            echo wp_nav_menu( 
                    [
                        'menu' => 'fixed-menu',
                        'menu_id' => 'fixed-menu',
                        'container' => false
                    ] 
                );
            echo 
                '<style type="text/css">
                    #theme-switcha-toolbar, 
                    #fixed-menu {
                        position: fixed;
                        z-index: 99999;
                        width: 100%;
                        padding: 10px;
                        background: black;
                    }
                    #theme-switcha-toolbar {
                        bottom: 0;
                        height: 140px;
                    }
                    #theme-switcha-toolbar #theme-switcha{
                        display: flex;
                        overflow-x: auto;
                        margin-top: 0;
                    }
                    #theme-switcha-toolbar #theme-switcha a{
                        width: 120px;
                        min-width: 120px;
                        margin-bottom: 0;
                    }
                    #fixed-menu { 
                        top: 0;
                        display: flex;
                        align-items: center;                        
                    }
                    #fixed-menu li {
                        padding: 0 10px;
                        list-style: none;
                    }
                </style>
                <div id="theme-switcha-toolbar">' . 
                    do_shortcode( '[theme_switcha_thumbs style="true"]' ) .
                '</div>';
        }

    }

}

new ThemeSwitchaToolbar();
