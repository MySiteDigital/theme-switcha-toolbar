<?php
/**
 * @trait     Assets\Admin
 * @Version: 0.0.1
 * @package   DiningDashboard/Assets
 * @category  Class
 * @author    MySite Digital
 */
namespace MySiteDigital\Assets;


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * AssetsTrait Class.
 */
class ThemeSwitchaToolbar {

    use AssetsTrait;

    protected $frontend_styles = [
        'type' => 'plugin',
        'post_types' => [ 'all' ],
        'handle' => 'theme-switcha-toolbar',
        'src' => 'theme-switcha-toolbar.css',
    ];

    protected $frontend_scripts = [
        'type' => 'plugin',
        'post_types' => [ 'all' ],
        'handle' => 'theme-switcha-toolbar',
        'src' => 'theme-switcha-toolbar.js',
    ];

    public function __construct() {
       $this->init();
    }
}

new ThemeSwitchaToolbar();

