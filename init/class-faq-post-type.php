<?php

namespace sq\faq;

if (!class_exists('faq_post_type')) {
 
    class faq_post_type {
        
        public function __construct()  {
            // for normal operation this will make the post type available
        add_action( 'init', array($this, 'register_faq_post_type') );   
        }

        /**
         * Register the custom post type.
         *
         * @since 1.0.0
         *
         * @return void
         */
        function register_faq_post_type() {
        $labels = array(
                        'name'               => _x( 'FAQs', 'post type general name', 'faq-sq' ),
                        'singular_name'      => _x( 'FAQ', 'post type singular name', 'faq-sq' ),
                        'menu_name'          => _x( 'FAQs', 'admin menu', 'faq-sq' ),
                        'name_admin_bar'     => _x( 'FAQ', 'add new on admin bar', 'faq-sq' ),
                        'add_new'            => _x( 'Add new', 'faq', 'faq-sq' ),
                        'add_new_item'       => __( 'Add new FAQ', 'faq-sq' ),
                        'new_item'           => __( 'New FAQ', 'faq-sq' ),
                        'edit_item'          => __( 'Edit FAQ', 'faq-sq' ),
                        'view_item'          => __( 'View FAQ', 'faq-sq' ),
                        'all_items'          => __( 'All FAQs', 'faq-sq' ),
                        'search_items'       => __( 'Search FAQs', 'faq-sq' ),
                        'parent_item_colon'  => __( 'Parent FAQs:', 'faq-sq' ),
                        'not_found'          => __( 'No questions', 'faq-sq' ),
                        'not_found_in_trash' => __( 'No questions have been found in the basket', 'faq-sq' ),
                        'featured_image' => __( 'FAQ Image', 'faq-sq' )
                );

        $args = array(

                        'labels'             => $labels,
                        'description'        => __( 'Description.', 'faq-sq' ),
                        'public'             => true,
                        'publicly_queryable' => true,
                        'show_ui'            => true,
                        'show_in_menu'       => true,
                        'show_in_nav_menus'  => false,
                        'query_var'          => true,
                        'rewrite'            => array( 'slug' => 'faq' ),
                        'capability_type'    => 'post',
                        'has_archive'        => true,
                        'hierarchical'       => false,
                        'menu_position'      => null,
                        'supports'           => array( 'title', 'editor', 'thumbnail' )
                );

                register_post_type( 'sq-faq', $args );

        }
                
    }      
                
}