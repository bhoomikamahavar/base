<?php
/**
 *  -----------
 *  AJAX Object
 *  -----------
 */
if( ! class_exists( 'Bhoomika_Mahavar_AJAX' ) && class_exists( 'Bhoomika_Mahavar_Database' ) ){

    /**
     *  -----------
     *  AJAX Object
     *  -----------
     */
    class Bhoomika_Mahavar_AJAX extends Bhoomika_Mahavar_Database{

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
             *  1. Have AJAX action ?
             *  ---------------------
             */
            if(  wp_doing_ajax()  ){

                /**
                 *  Have AJAX action ?
                 *  ------------------
                 */
                if( isset( $_POST['action'] ) && $_POST['action'] !== '' ){

                    /**
                     *  Have AJAX action ?
                     *  ------------------
                     */
                    $action     =   esc_attr( trim( $_POST['action'] ) );

                    /**
                     *  1.  Bit of security
                     *  -------------------
                     */
                    $allowed_actions = array(

                        /**
                         *  1. Actions Here
                         *  ---------------
                         */
                        esc_attr( 'bhoomika_mahavar_add_emp_form_ajax_action' ),
                    );

                    /**
                     *  If have action then load this object members
                     *  --------------------------------------------
                     */
                    if( in_array( $action, $allowed_actions) ) {

                        /**
                         *  Check the AJAX action with login user
                         *  -------------------------------------
                         */
                        if( is_user_logged_in() ){

                            /**
                             *  1. If user already login then AJAX action
                             *  -----------------------------------------
                             */
                            add_action( 'wp_ajax_' . $action, [ $this, $action ] );

                        }else{

                            /**
                             *  2. If user not login that mean is front end AJAX action
                             *  -------------------------------------------------------
                             */
                            add_action( 'wp_ajax_nopriv_' . $action, [ $this, $action ] );
                        }
                    }
                }
            }
        }

        /**
         *  1. Add New Todo Task
         *  --------------------
         */
        public static function bhoomika_mahavar_add_emp_form_ajax_action(){

            /**
             *  Make sure title not exist
             *  -------------------------
             */
            if(     parent:: _title_exists( $_POST[ 'title' ] )    ){

                /**
                 *  Create Post Type
                 *  ----------------
                 */
                $post_id    =   wp_insert_post( [

                                    'post_type'         =>      esc_attr( 'employees' ),

                                    'post_title'        =>      esc_attr( $_POST[ 'title' ] ),

                                    'post_content'      =>      esc_attr( $_POST[ 'content' ] ),

                                    'post_status'       =>      esc_attr( 'publish' )

                                ] );

                /**
                 *  Have WP Error ?
                 *  ---------------
                 */
                if( is_wp_error( $post_id ) ){

                    die( json_encode( [

                        'message'       =>      $post_id->get_error_message()

                    ] ) );
                }

                /**
                 *  No WP Error Found 
                 *  -----------------
                 */
                else{

                    die( json_encode( [

                        'message'       =>      esc_attr__( 'Your post successfully added!', 'bhooomika-mahavar-plugin' ),

                    ] ) );
                }
            }

            else{

                die( json_encode( [

                    'message'       =>      esc_attr__( 'Post Title Already Exists!', 'bhooomika-mahavar-plugin' ),

                ] ) );
            }
        }

    } /* class end **/

   /**
    *  Kicking this off by calling 'get_instance()' method
    *  ---------------------------------------------------
    */
    Bhoomika_Mahavar_AJAX:: get_instance();
}