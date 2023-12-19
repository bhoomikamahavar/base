<?php
/**
 *  Admin Menu
 *  ----------
 */
if( ! class_exists( 'Bhoomika_Mahavar_Admin_Menu' ) && class_exists( 'Bhoomika_Mahavar_Admin_Files' ) ){

    /**
     *  Admin Menu
     *  ----------
     */
    class Bhoomika_Mahavar_Admin_Menu extends Bhoomika_Mahavar_Admin_Files {

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
             *  =====================================
             *  Register Admin Menu Page - [Bhoomika]
             *  =====================================
             */
            $menu_slug = 'bhoomika';
            add_menu_page( 'Bhoomika Admin Menu', 'Bhoomika Admin Menu', 'read', $menu_slug, false );
            add_submenu_page( $menu_slug, 'Existing Bhoomika Admin Menu', 'Existing Bhoomika Admin Menu', 'read', $menu_slug, [ $this, 'wpdocs_orders_function' ] );
        }

        /**
         *  =====================================
         *  Register Admin Menu Page - [Bhoomika]
         *  =====================================
         */
        public static function wpdocs_orders_function(){

            echo 'Hello';

        }
    }

    /**
     *  Admin Menu
     *  ----------
     */
    Bhoomika_Mahavar_Admin_Menu::get_instance();
}