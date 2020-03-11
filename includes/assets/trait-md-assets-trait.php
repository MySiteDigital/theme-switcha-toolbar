<?php
/**
 * @trait     Assets\AssetsTrait
 * @Version: 1.0.0
 * @package   DiningDashboard/Assets
 * @category  Trait
 * @author    MySite Digital
*/

namespace MySiteDigital\Assets;


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! trait_exists ( 'MySiteDigital\Assets\AssetsTrait' ) ) {
    trait AssetsTrait {

        public function init(){
            add_action( 'init', [ $this , 'register_styles_and_scripts' ] );
            add_action( 'enqueue_block_editor_assets', [ $this , 'enqueue_block_editor_assets' ] );
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_styles' ] );
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_scripts' ] );
            add_action( 'admin_enqueue_scripts', [ $this, 'admin_styles' ] );
            add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );
        }

        public function register_styles_and_scripts() {

            if( property_exists( self::class, 'editor_styles' ) ){
                wp_register_style(
                    $this->editor_styles[ 'handle' ],
                    $this->get_asset_location( $this->editor_styles['src'] ),
                    [ 'wp-edit-blocks' ],
                    $this->get_asset_version( $this->editor_styles['src'] )
                );
            }

            if( property_exists( self::class, 'editor_scripts' ) ){
                $test = wp_register_script(
                    $this->editor_scripts[ 'handle' ],
                    $this->get_asset_location( $this->editor_scripts['src'] ),
                    [ 'wp-blocks', 'wp-i18n', 'wp-element' ],
                    $this->get_asset_version( $this->editor_scripts['src'] ),
                    true
                );
            }

            if( property_exists( self::class, 'frontend_styles' ) ){
                wp_register_style(
                    $this->frontend_styles[ 'handle' ],
                    $this->get_asset_location( $this->frontend_styles['src'], $this->frontend_styles['type'] ),
                    [],
                    $this->get_asset_version( $this->frontend_styles['src'] )
                );
            }

            if( property_exists( self::class, 'frontend_scripts' ) ){
                wp_register_script(
                    $this->frontend_scripts[ 'handle' ],
                    $this->get_asset_location( $this->frontend_scripts['src'] ),
                    [ 'jquery' ],
                    $this->get_asset_version( $this->frontend_scripts['src'] ),
                    true
                );
            }

            if( property_exists( self::class, 'admin_styles' ) ){
                wp_register_style(
                    $this->admin_styles[ 'handle' ],
                    $this->get_asset_location( $this->admin_styles['src'] ),
                    [],
                    $this->get_asset_version( $this->admin_styles['src'] )
                );
            }

            if( property_exists( self::class, 'admin_scripts' ) ){
                wp_register_script(
                    $this->admin_scripts[ 'handle' ],
                    $this->get_asset_location( $this->admin_scripts['src'] ),
                    [ 'jquery' ],
                    $this->get_asset_version( $this->admin_scripts['src'] ),
                    true
                );
            }
        }

        public function enqueue_block_editor_assets(){
            global $post;

            if( property_exists( self::class, 'editor_styles' ) ){
                if( in_array( $post->post_type, $this->editor_styles[ 'post_types' ] ) ){
                    wp_enqueue_style( $this->editor_styles[ 'handle' ] );
                }
            }

            if( property_exists( self::class, 'editor_scripts' ) ){
                if( in_array( $post->post_type, $this->editor_scripts[ 'post_types' ] ) ){
                    wp_enqueue_script( $this->editor_scripts[ 'handle' ] );
                }
            }

        }

        public function enqueue_frontend_styles(){
            global $post;

            if( property_exists( self::class, 'frontend_styles' ) ){
                if( in_array( $post->post_type, $this->frontend_styles[ 'post_types' ] ) || in_array( 'all', $this->frontend_styles[ 'post_types' ] ) ){
                    wp_enqueue_style( $this->frontend_styles[ 'handle' ] );
                }
            }
        }

        public function enqueue_frontend_scripts(){
            global $post;

            if( property_exists( self::class, 'frontend_scripts' ) ){
                if( in_array( $post->post_type, $this->frontend_scripts[ 'post_types' ] ) || in_array( 'all', $this->frontend_scripts[ 'post_types' ] ) ){
                    wp_enqueue_script( $this->frontend_scripts[ 'handle' ] );
                }
            }
        }

        public function admin_styles() {
            if( property_exists( self::class, 'admin_styles' ) ){
                wp_enqueue_style( $this->admin_styles[ 'handle' ] );
            }
        }
    
        public function admin_scripts() {
            if( property_exists( self::class, 'admin_scripts' ) ){
                wp_enqueue_script( $this->admin_scripts[ 'handle' ] );
            }
        }
        
 

        public function get_asset_location( $filename, $type = '', $dir = false ){
            
            $base = self::base_url( $type );

            if( $dir ){
                $base = self::base_path( $type );
            }

            if( self::is_plugin( $type ) ){
                $base = str_replace( '/includes/assets', '', $base );
            }


            $type = substr( strrchr( $filename, '.' ), 1 );

            $asset_location = $base . '/assets/' . $type . '/' . $filename;

            return $asset_location;
            
        }

        public function get_asset_version( $filename, $type = ''){
            return @filemtime( self::get_asset_location( $filename, $type, true ) );
        
        }

        public static function base_path( $type ){
            return self::is_plugin( $type ) ? plugin_dir_path( __FILE__ ) : get_stylesheet_directory();
        }

        public static function base_url( $type ){
            return self::is_plugin( $type ) ? plugin_dir_url( __FILE__ ) : get_stylesheet_directory_uri();;
        }

        public static function is_plugin( $type ){
            return $type === 'theme' ? false : true;
        }
    }
}
