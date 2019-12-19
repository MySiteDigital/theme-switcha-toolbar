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
        $this->includes();
    }

    public function register_fixed_menu(){
            register_nav_menus(
            [
                'fixed-menu' => __( 'Fixed Menu' ),
            ]
        );
    }

    private $template = 'nav-and-theme-toolbar.php';

    public function output(){
        $themed_template = get_stylesheet_directory() . '/mysite-digital/' . $this->template;

        if( file_exists( $themed_template ) ){
            $template = $themed_template;
        }
        else {
            $template = plugin_dir_path( __FILE__ ) . '/templates/'  . $this->template;
        }
		include $template;
    }

    public function includes()
    {
        if ( ! is_admin() ) {
            include_once( plugin_dir_path( __FILE__ ) . 'includes/assets/trait-md-assets-trait.php' );
            include_once( plugin_dir_path( __FILE__ ) . 'includes/assets/class-md-assets-theme-switch-toolbar.php' );
        }
    }

}


new ThemeSwitchaToolbar();
