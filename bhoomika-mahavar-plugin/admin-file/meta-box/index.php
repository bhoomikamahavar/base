<?php
/**
 *  Meta Object
 *  -----------
 */
if( ! class_exists( 'Bhoomika_Mahavar_MetaBox' ) && class_exists( 'Bhoomika_Mahavar_Admin_Files' ) ){

    /**
     *  Meta Object
     *  -----------
     */
    class Bhoomika_Mahavar_MetaBox extends Bhoomika_Mahavar_Admin_Files {

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


        }
    }

    /**
     *  Meta Object
     *  -----------
     */
    Bhoomika_Mahavar_MetaBox::get_instance();
}