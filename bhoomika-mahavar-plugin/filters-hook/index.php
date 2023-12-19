<?php
/**
 *  --------------
 *  Filters Object
 *  --------------
 */
if( ! class_exists( 'Bhoomika_Mahavar_Filters' ) && class_exists( 'Bhoomika_Mahavar_Database' ) ){

    /**
     *  --------------
     *  Filters Object
     *  --------------
     */
    class Bhoomika_Mahavar_Filters extends Bhoomika_Mahavar_Database{

        /**
         *  Member Variable
         *  ---------------
         */
        private static $instance;

        /**
         *  Initiator
         *  ---------
         */
        public static function get_instance() {
          
            if ( ! isset( self::$instance ) ) {

                self::$instance = new self;
            }

            return self::$instance;
        }

        /**
         *  Construct
         *  ---------
         */
        public function __construct() {

            /**
             *  Load one by one shortcode file
             *  ------------------------------
             */
            foreach ( glob( plugin_dir_path( __FILE__ ) . '/*/index.php' ) as $file ) {
           
                require_once $file;
            }
        }

    } /* class end **/

    /**
     *  --------------
     *  Filters Object
     *  --------------
     */
    Bhoomika_Mahavar_Filters:: get_instance();
}