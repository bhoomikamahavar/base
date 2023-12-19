<?php
/**
 *  Form - ShortCode
 *  ----------------
 */
if( ! class_exists( 'Bhoomika_Mahavar_Form_ShortCode' ) && class_exists( 'Bhoomika_Mahavar_Customisation' ) ){

    /**
     *  Form - ShortCode
     *  ----------------
     */
    class Bhoomika_Mahavar_Form_ShortCode extends Bhoomika_Mahavar_Customisation{

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
             *  Form - ShortCode
             *  ----------------
             */
            add_shortcode( 'add_new_employees_form', [ $this, 'add_new_employees_form_callback' ]  );

            /**
             *  Script
             *  ------
             */
            add_action( 'wp_enqueue_scripts', [ $this, 'plugin_script' ] );
        }

        /**
         *  ShortCode Script
         *  ----------------
         */
        public static function plugin_script(){

            /**
             *  Slug
             *  ----
             */
            $_slug    = sanitize_title( __CLASS__ );

            /**
            *  Load Library
            *  ------------
            */
            wp_enqueue_script(

                /**
                 *  File Name
                 *  ---------
                 */
                esc_attr(   $_slug   ),

                /**
                 *  File Link
                 *  ---------
                 */
                esc_url(    plugin_dir_url( __FILE__ )     .   'script.js'  ),

                /**
                 *  Have Dependancy ?
                 *  -----------------
                 */
                array( 'jquery' ),

                /**
                 *  File Version ?
                 *  --------------
                 */
                esc_attr( parent:: _file_version( plugin_dir_path( __FILE__ ) . 'script.js' ) ),

                /**
                 *  Load in Footer ?
                 *  ----------------
                 */
                true
            );

            /**
             *  Load localize
             *  -------------
             */
            wp_localize_script(

                /**
                 *  Localize Handler
                 *  ----------------
                 */
                esc_attr(   $_slug   ),

                /**
                 *  2. Object Name
                 *  --------------
                 */
                esc_attr( 'BHOOMIKA_MAHAVAR_AJAX_OBJ' ),

                /**
                 *  Localize Object Data 
                 *  --------------------
                 */
                array(

                    /**
                     *  WordPress AJAX File
                     *  -------------------
                     */
                    'ajax_url'       =>  admin_url( 'admin-ajax.php' ),

                )
            );
        }

        /**
         *  ========================================
         *  Shortcode - [add_new_employees] CallBack
         *  ========================================
         */
        public static function add_new_employees_form_callback(){

            /**
             *  Return Form
             *  -----------
             */
            return

            sprintf(

                '<form method="post" id="%1$s" enctype="multipart/form-data">

                    <input type="text" name="title" id="title">

                    <input type="text" name="content" id="content">

                    <button type="submit" class="btn btn-success" name="%1$s_button" id="%1$s_button">%2$s</button>

                </form>',

                /**
                 *  1. Form Handler
                 *  ---------------
                 */
                esc_attr( 'bhoomika_mahavar_add_emp_form' ),

                /**
                 *  2. Translation Ready String
                 *  ---------------------------
                 */
                esc_attr__( 'Submit', 'bhoomika-mahavar-plugin' )
            );
        }

    } /* class end **/

   /**
    *  Kicking this off by calling 'get_instance()' method
    *  --------------------------------------------
    */
    Bhoomika_Mahavar_Form_ShortCode:: get_instance();
}