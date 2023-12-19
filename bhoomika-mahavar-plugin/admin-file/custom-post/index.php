<?php
/**
 *  Custom Post Type
 *  ----------------
 */
if( ! class_exists( 'Bhoomika_Mahavar_Custom_Post_Type' ) && class_exists( 'Bhoomika_Mahavar_Admin_Files' ) ){

    /**
     *  Custom Post Type
     *  ----------------
     */
    class Bhoomika_Mahavar_Custom_Post_Type extends Bhoomika_Mahavar_Admin_Files {

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
             *  ==========================
             *  Register CPT - [employees]
             *  ==========================
             */
            add_action( 'init', [ $this, 'register_post_type' ] );
        }

        /**
         *  ==========================
         *  Register CPT - [employees]
         *  ==========================
         */
        public static function register_post_type(){

            $labels = array(
                'name'                  => _x( 'Employees', 'Post Type General Name', 'cpt-employees' ),
                'singular_name'         => _x( 'Employee', 'Post Type Singular Name', 'cpt-employees' ),
                'menu_name'             => __( 'Employees', 'cpt-employees' ),
                'name_admin_bar'        => __( 'Employee', 'cpt-employees' ),
                'archives'              => __( 'Item Archives', 'cpt-employees' ),
                'attributes'            => __( 'Item Attributes', 'cpt-employees' ),
                'parent_item_colon'     => __( 'Parent Employee:', 'cpt-employees' ),
                'all_items'             => __( 'All Employees', 'cpt-employees' ),
                'add_new_item'          => __( 'Add New Employee', 'cpt-employees' ),
                'add_new'               => __( 'Add New Employee', 'cpt-employees' ),
                'new_item'              => __( 'New Item', 'cpt-employees' ),
                'edit_item'             => __( 'Edit Item', 'cpt-employees' ),
                'update_item'           => __( 'Update Item', 'cpt-employees' ),
                'view_item'             => __( 'View Item', 'cpt-employees' ),
                'view_items'            => __( 'View Items', 'cpt-employees' ),
                'search_items'          => __( 'Search Item', 'cpt-employees' ),
                'not_found'             => __( 'Not found', 'cpt-employees' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'cpt-employees' ),
                'featured_image'        => __( 'Featured Image', 'cpt-employees' ),
                'set_featured_image'    => __( 'Set featured image', 'cpt-employees' ),
                'remove_featured_image' => __( 'Remove featured image', 'cpt-employees' ),
                'use_featured_image'    => __( 'Use as featured image', 'cpt-employees' ),
                'insert_into_item'      => __( 'Insert into item', 'cpt-employees' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'cpt-employees' ),
                'items_list'            => __( 'Items list', 'cpt-employees' ),
                'items_list_navigation' => __( 'Items list navigation', 'cpt-employees' ),
                'filter_items_list'     => __( 'Filter items list', 'cpt-employees' ),
            );
            $args = array(
                'label'                 => __( 'Employee', 'cpt-employees' ),
                'description'           => __( 'Employees Post Type Description', 'cpt-employees' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'thumbnail' ),
                'taxonomies'            => array( 'category', 'post_tag' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 5,
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'page',
            );

            register_post_type( 'employees', $args );
        }
    }

    /**
     *  Custom Post Type
     *  ----------------
     */
    Bhoomika_Mahavar_Custom_Post_Type::get_instance();
}