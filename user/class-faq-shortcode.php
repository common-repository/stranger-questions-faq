<?php

/* 
 * @package sq\faq;
 * 
 */
namespace sq\faq;
           
    class user_faq  {
        
        public function __construct()  {
          add_shortcode( 'sq-faq', array($this, 'process_faq_shortcode') );
          // prepare styles
          add_action( 'wp_enqueue_scripts', array( $this, 'register_styles'));  
          add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts'));   
        }

         /*
         * short code
         */
       public function process_faq_shortcode ()
        {
           // enqueue the registerred styles
           wp_enqueue_style( 'user-faq1' );   
           wp_enqueue_media();    
           wp_enqueue_script('user-faq');       
                  
           ob_start();
           include( __DIR__ . '\views\faq-shortcode.php' ); 

           return ob_get_clean();
        }     

    /**
     * Registers the stylesheets 
     *
     */
    public function register_styles() {
      wp_register_style(
        'user-faq1', plugin_dir_url(__FILE__) .
        '/libs/jquery-ui.css',
        array()
      );            
    }  
    /**
     * Registers the JavaScript.
     *
     */
    public function register_scripts() {
          
        wp_register_script('user-faq', plugin_dir_url(__FILE__) . 'jscript/accordian.js', 
            array('jquery', 'jquery-ui-core', 'jquery-ui-accordion'), '1.0', 'all'
              );               
        }           
        
    }