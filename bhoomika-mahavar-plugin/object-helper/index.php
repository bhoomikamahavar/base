<?php
/**
 *  Object Helper
 *  -------------
 */
if( ! class_exists( 'Bhoomika_Mahavar_Config' ) ){

    /**
     *  Object Helper
     *  -------------
     */
    class Bhoomika_Mahavar_Config {

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

        /**
         *  Brand Prefix
         *  ------------
         */
        public static function _prefix( $args = '' ){

            return  sanitize_title( get_bloginfo( 'name' ) ) . '_' . sanitize_title( $args );
        }

        /**
         *  Random Value
         *  ------------
         */
        public static function _rand(){

            return      self:: _prefix(

                            substr( str_shuffle( "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ" ), absint( '0' ), absint( '10' ) )
                        );
        }

        /**
         *  Have Media ?
         *  ------------
         */
        public static function _have_media( $media_id = 0 ){

            $_condition_1   =   ! empty( $media_id );

            $_condition_2   =   ! empty( wp_get_attachment_url( $media_id ) );

            /**
             *  Check the media id
             *  ------------------
             */
            return      $_condition_1   &&  $_condition_2;
        }


        /**
         *  Is Array ?
         *  ----------
         */
        public static function _is_array( $a ){

            if ( is_array($a) && count($a) >= absint('1') && !empty($a) && $a !== null ) {

                return  true;

            }else{

                return false;
            }
        }
    }

    /**
     *  Helper Object
     *  -------------
     */
    Bhoomika_Mahavar_Config::get_instance();
}