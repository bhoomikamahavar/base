<?php
/**
 *  ---------------
 *  Database Object
 *  ---------------
 */
if( ! class_exists( 'Bhoomika_Mahavar_Database' ) && class_exists( 'Bhoomika_Mahavar_Config' ) ){

    /**
     *  ---------------
     *  Database Object
     *  ---------------
     */
    class Bhoomika_Mahavar_Database extends Bhoomika_Mahavar_Config{

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
         *  File Version
         *  ------------
         */
        public static function _file_version( $file = '' ){

            /**
             *  Is Empty ?
             *  ----------
             */
            if( empty( $file ) ){

                /**
                 *  Get Style Version
                 *  -----------------
                 */

                return      esc_attr( BHOOMIKA_MAHAVAR_PLUGIN_VERSION );

            }else{

                /*
                 *  For File Save timestrap version to clear the catch auto
                 *  -------------------------------------------------------
                 *  # https://developer.wordpress.org/reference/functions/wp_enqueue_style/#comment-6386
                 *  ------------------------------------------------------------------------------------
                 */

                return      esc_attr( BHOOMIKA_MAHAVAR_PLUGIN_VERSION ) . '.' . absint( filemtime(  $file ) );
            }
        }

        /**
         *  3. Get Page ID via Page Title
         *  -----------------------------
         */
        public static function _title_exists( $page_name = '' ){

            /**
             *  Make sure page name not empty!
             *  ------------------------------
             */
            if( empty( $page_name ) ){

                return  true;
            }

            /**
             *  WP Query
             *  --------
             */
            $query  =   new WP_Query( [

                            'post_type'              =>     'employees',

                            'title'                  =>     $page_name,

                            'post_status'            =>     'all',

                            'posts_per_page'         =>     1,

                            'no_found_rows'          =>     true,

                            'ignore_sticky_posts'    =>     true,

                            'update_post_term_cache' =>     false,

                            'update_post_meta_cache' =>     false,

                        ] );

            /**
             *  Is Empty ?
             *  ----------
             */
            if ( ! empty( $query->post ) ) {

                return      false;
            }

            else {

                return      true;
            }
        }

    } /* class end **/

    /**
     *  ---------------
     *  Database Object
     *  ---------------
     */
    Bhoomika_Mahavar_Database:: get_instance();
}