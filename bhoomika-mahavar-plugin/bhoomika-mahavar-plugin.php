<?php
/**
 *  @wordpress-plugin
 *  -----------------
 *  Plugin Name:     Bhoomika Mahavar
 *  Plugin URI:      https://bhoomika-mahavar.com
 *  Description:     Bhoomika Mahavar Plugin
 *  Version:         1.0.0
 *  Author:          Bhoomika Mahavar
 *  Author URI:      https://bhoomika-mahavar.com
 *  Text Domain:     bhoomika-mahavar
 *  Domain Path:     /languages
 *  License:         GPL-2.0+
 *  License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 */

/** 
 * Exit if accessed directly
 * -------------------------
 */
defined( 'ABSPATH' ) || exit;

/**
 *  --------------------------------------------
 *  Bhoomika Mahavar Plugin Object
 *  --------------------------------------------
 */
if( ! class_exists( 'Bhoomika_Mahavar_Plugin' ) ){

    /**
     *  --------------------------------------------
     *  Bhoomika Mahavar Plugin Object
     *  --------------------------------------------
     */
    class Bhoomika_Mahavar_Plugin {

        /**
         *  A reference to an instance of this class
         *  ----------------------------------------
         */
        private static $instance;

        /**
         *  Member variable
         *  ---------------
         *  @var array
         *  ----------
         */
        private $files = [];

        /**
         *  Returns an instance of this class.
         *  ----------------------------------
         */
        public static function get_instance() {

            if ( null == self::$instance ) {

                self::$instance = new self();
            }

            return self::$instance;
        }

        /**
         *  Constructor
         *  -----------
         */
        public function __construct() {

            /**
             *  When Plugin - Activated
             *  -----------------------
             */
            register_activation_hook( __FILE__, [ $this, 'plugin_activation' ] );

            /**
             *  When Plugin - Deactivated
             *  -------------------------
             */
            register_deactivation_hook( __FILE__, [ $this, 'plugin_deactivation' ] );

            /**
             *  Plugin Loaded
             *  -------------
             */
            add_action( 'plugins_loaded', function(){

                /**
                 *  Make sure plugin file is already read
                 *  -----------------------------------
                 */
                if( ! function_exists('get_plugin_data') ){

                    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                }

                /**
                 *  Load language file
                 *  ------------------
                 */
                $this->textdomain();

                /**
                 *  Define Constant
                 *  ---------------
                 */
                $this->constant();

                /**
                 *  Required Files
                 *  --------------
                 */
                $this->files();

            } );
        }

        /**
         *  When Plugin - Activated
         *  -----------------------
         */
        public static function plugin_activation(){


        }

        /**
         *  When Plugin - Deactivated
         *  -------------------------
         */
        public static function plugin_deactivation(){

            
        }

        /**
         *  Get Textdomain
         *  --------------
         */
        public static function get_textdomain(){

            return  sanitize_title(   get_plugin_data( __FILE__ )[ 'TextDomain' ]   );
        }

        /**
         *  Get Plugin Version
         *  ------------------
         */
        public static function get_version(){

            return  esc_attr( get_plugin_data( __FILE__ )[ 'Version' ] );
        }

        /**
         *  1. Load language file
         *  ---------------------
         */
        public function textdomain(){

            /**
             *  Load text-domain
             *  ----------------
             */
            load_plugin_textdomain( 

                /**
                 *  1. File name
                 *  ------------
                 */
                sanitize_title( self:: get_textdomain() ),

                false,

                basename( dirname( __FILE__ ) ) . '/languages'
            );
        }

        /**
         *  3. Define Constant
         *  ------------------
         */
        private function constant(){

            /**
             *  Plugin version
             *  --------------
             */
            define( 'BHOOMIKA_MAHAVAR_PLUGIN_VERSION', esc_attr( self:: get_version() ) );

            define( 'BHOOMIKA_MAHAVAR_PLUGIN_URL', plugin_dir_url( __FILE__ )  );

            define( 'BHOOMIKA_MAHAVAR_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
        }

        /**
         *  4. Required Files
         *  -----------------
         */
        private function files(){

            /**
             *  Object Helper
             *  -------------
             */
            require_once    'object-helper/index.php';

            /**
             *  Admin Files
             *  -----------
             */
            if( is_admin() ){

                $this->files[] = 'admin-file/index.php';
            }   

            /**
             *  Database
             *  --------
             */
            $this->files[] = 'database/index.php';

            /**
             *  Filters
             *  -------
             */
            $this->files[] = 'filters-hook/index.php';

            /**
             *  Customisaiton
             *  -------------
             */
            $this->files[] = 'customisation/index.php';

            /**
             *  This Plugin AJAX Scripts Functions here
             *  ---------------------------------------
             */
            if ( wp_doing_ajax() ) {

                $this->files[] = 'ajax/index.php';
            }

            /**
             *  Load Files
             *  ----------
             */
            if( Bhoomika_Mahavar_Config:: _is_array( $this->files ) ){

                foreach ( $this->files as $key => $value) {
                    
                    require_once $value;
                }
            }
        }
    }

    /**
     *  --------------------------------------------
     *  Bhoomika Mahavar Plugin Object
     *  --------------------------------------------
     */
    Bhoomika_Mahavar_Plugin:: get_instance();
}