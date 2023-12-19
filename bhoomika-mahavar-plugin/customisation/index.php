<?php
/**
 *  Have Customisation ? Add Folder & Start
 *  ---------------------------------------
 */
if( ! class_exists( 'Bhoomika_Mahavar_Customisation' ) && class_exists( 'Bhoomika_Mahavar_Database' ) ){

    /**
     *  Have Customisation ? Add Folder & Start
     *  ---------------------------------------
     */
    class Bhoomika_Mahavar_Customisation extends Bhoomika_Mahavar_Database{

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
    *  Kicking this off by calling 'get_instance()' method
    *  --------------------------------------------
    */
    Bhoomika_Mahavar_Customisation:: get_instance();
}