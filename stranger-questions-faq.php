<?php

/**
 * Plugin Name: Stranger Questions - FAQ
 * Plugin URI:  https://neweramarketing.me/page6153275.html
 * Description: This plugin will help you add a frequently asked questions block. 
 * Version:     1.0
 * Author:      Kuryk Ivan
 * Author URI:  https://www.facebook.com/profile.php?id=100007406945288
 * Text Domain: wporg
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt

Stranger Questions - FAQ is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Stranger Questions is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Stranger Questions. If not, see http://www.gnu.org/licenses/gpl-2.0.txt
 */

// plugin namespace to keep code seperated
namespace sq\faq;        
// stop unwatned visitors calling directly
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Go away!' );
}  
    define ( 'sq_faq_dir', plugin_dir_path( __FILE__));

    include_once ( sq_faq_dir . 'init/class-faq-post-type.php'); 
    $mystart = new MyInit();
/******************************************************************************/

/*
 * launch
 * 
 * @since 1.0.0
 * @param none
 * @return void
 * 
 */

function launch () {

    global $pagenow, $post_type;
 
    $my_post_type = new faq_post_type();     
    
    if (!is_admin()) {
        include (sq_faq_dir . '/user/class-faq-shortcode.php'); 
        $run_user = new user_faq();   
                   
    }    
    
}
launch();
  
/*
 * Initiate the plugin routines.
 * keep with root file.
 */
class MyInit
{
    public function __construct(){
         register_activation_hook( __FILE__, array($this, 'plugin_activated' ));
         register_deactivation_hook( __FILE__, array($this, 'plugin_deactivated' ));
         register_uninstall_hook( __FILE__, array($this, 'plugin_uninstall' ) );
    }
    public static function plugin_activated(){
        // where we have a custom post type. register now  for flush rules
        $register_post_type = new faq_post_type(); 
        $register_post_type->register_faq_post_type();
        flush_rewrite_rules();
    }
    public function plugin_deactivated(){
         // This will run when the plugin is deactivated, use to delete the database
    }  
    public function plugin_uninstall() {
        // this will clean up for plugin delete. How well depends on you!
    }
}
