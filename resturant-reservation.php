<?php
   /*
	Plugin Name: Resturant Reservation
	Plugin URI: 
	Description: Resturant Reservation
	Version: 1.1
	Author: 
	Author URI: 
	License: GPL
	*/
	ob_start(); // line 1
	session_start(); // line 2
	$PLUGIN_URL = plugin_dir_url(__FILE__);
	define('RR_PLUGIN_URL',substr($PLUGIN_URL,0,strlen($PLUGIN_URL)-1));
	define('RR_PLUGIN_PATH', str_replace('\\', '/', dirname(__FILE__)) );
	function ajax_load_scripts() {
			// load our jquery file that sends the $.post request
			wp_enqueue_script( "ajax-load", plugin_dir_url( __FILE__ ) . '/assets/ajax/ajax-script.js', array( 'jquery' ) );
			
			// make the ajaxurl var available to the above script
			wp_localize_script( 'ajax-load', 'the_ajax_script', array('ajax_account_url'=>plugin_dir_url( __FILE__ ) . 'controllers/admin/accounting/ajax.php',
			                                                          'api_schedule_url'=>plugin_dir_url( __FILE__ ) . 'controllers/admin/schedule/api.php')   );
		}
		add_action('wp_print_scripts', 'ajax_load_scripts');
	
	register_activation_hook(__FILE__,'rr_install'); 
	register_deactivation_hook( __FILE__, 'rr_remove' );
	function rr_install()
	 {
	    global $wpdb;
		global $your_db_name;
		$charset_collate = $wpdb->get_charset_collate();
		
		$sql1 = "CREATE TABLE ".$wpdb->prefix ."room (
			`id` int(10) NOT NULL AUTO_INCREMENT,	
			`resturant_id` int(10) DEFAULT NULL,	
			`room_no` varchar(127) DEFAULT NULL,
			`description` varchar(127) DEFAULT NULL,
			`no_of_tables` varchar(127) DEFAULT NULL,
			`rows` varchar(127) DEFAULT NULL,
			`cols` varchar(127) DEFAULT NULL,
			`created_at` datetime DEFAULT NULL,
			`updated_at` datetime DEFAULT NULL,
			UNIQUE KEY id (id)
			) $charset_collate;";
			
		
			
		/*$sql2 = "CREATE TABLE ".$wpdb->prefix ."table (
			`id` int(10) NOT NULL AUTO_INCREMENT,	
			`room_id` int(127) DEFAULT NULL,
			`table_no` varchar(127) DEFAULT NULL,
			`position` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL,
			`description` varchar(127) DEFAULT NULL,
			`picture` varchar(127) DEFAULT NULL,
			`no_of_chairs` varchar(127) DEFAULT NULL,
			`cost` varchar(127) DEFAULT NULL,
			`created_at` datetime DEFAULT NULL,
			`updated_at` datetime DEFAULT NULL,
			UNIQUE KEY id (id)
			) $charset_collate;";*/
			
			
			
			$sql3 = "CREATE TABLE ".$wpdb->prefix ."resturant (
			`id` int(10) NOT NULL AUTO_INCREMENT,		
			`name` varchar(127) DEFAULT NULL,
			`heading` varchar(256) DEFAULT NULL,
			`booked_email` VARCHAR(64) NULL,
			`address` varchar(127) DEFAULT NULL,
			`description` varchar(127) DEFAULT NULL,
			`virtual_tour_url` varchar(256) DEFAULT NULL,
			`rpicture` varchar(127) DEFAULT NULL,
			
			`VIP` varchar(127) DEFAULT NULL,
			`VIP_2` varchar(127) DEFAULT NULL,
			`Standard` varchar(127) DEFAULT NULL,
			`Standard_2` varchar(127) DEFAULT NULL,
			`General_cost` varchar(127) DEFAULT NULL,
			`start_time` varchar(64) DEFAULT NULL,
			`end_time` varchar(64) DEFAULT NULL,
			`time_slot_gap_in_min` varchar(127) DEFAULT NULL,
			`created_at` datetime DEFAULT NULL,
			`updated_at` datetime DEFAULT NULL,
			UNIQUE KEY id (id)
			) $charset_collate;";
			
			
			$sql4 = "CREATE TABLE ".$wpdb->prefix ."booked (
			`id` int(10) NOT NULL AUTO_INCREMENT,	
			`resturant_id` int(10) DEFAULT NULL,		
			`data` varchar(256) DEFAULT NULL,
			`created_at` datetime DEFAULT NULL,
			`updated_at` datetime DEFAULT NULL,
			 UNIQUE KEY id (id)
			) $charset_collate;";	
			
			
			
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql1);	
		dbDelta($sql2);	
		dbDelta($sql3);	
		dbDelta($sql4);	
	    
	 }
	 
	 function rr_remove()
	 {  
	   global $wpdb;
		
		//remove page
		global $wpdb;
	
		$the_page_title = get_option( "my_plugin_page_title" );
		$the_page_name = get_option( "my_plugin_page_name" );
		$the_page_id = get_option( 'my_plugin_page_id' );
		if( $the_page_id ) {
			wp_delete_post( $the_page_id ); 
		}
		delete_option("my_plugin_page_title");
		delete_option("my_plugin_page_name");
		delete_option("my_plugin_page_id");
		
		
        $tableArray = [   
          $wpdb->prefix . "room",
          $wpdb->prefix . "resturant",
		  $wpdb->prefix . "booked"
       ];

      foreach ($tableArray as $tablename) {
         $wpdb->query("DROP TABLE IF EXISTS $tablename");
      }
		
	 }
	 
	 //Admin		
	add_action('admin_menu', 'rr_system');
	function rr_system(){
		add_menu_page('Resturant Reservation Dashboard', 'Resturant Reservation', 'manage_options', 'theme-rr', 'settings_dashboard');
		add_submenu_page( 'theme-rr', 'Resturant', 'Resturant', 'manage_options', 'resturant', 'resturant_url_func');
		add_submenu_page( 'theme-rr', 'Room', 'Room', 'manage_options', 'room', 'room_url_func');
		add_submenu_page( 'theme-rr', 'Booked', 'Booked', 'manage_options', 'booked', 'booked_url_func');
		//add_submenu_page( 'theme-rr', 'Table', 'Table', 'manage_options', 'table', 'table_url_func');
		}
	//Admin account
	function settings_dashboard(){
	   include_once dirname(__FILE__) . '/views/admin/dashboard/dashboard.php';	
		
	}
	
	function resturant_url_func(){
	   include_once dirname(__FILE__) . '/admin/resturant.php';		
	}
	
	function room_url_func(){
	   include_once dirname(__FILE__) . '/admin/room.php';		
	}
	
	function booked_url_func(){
	   include_once dirname(__FILE__) . '/admin/booked.php';		
	}
	
	/*function table_url_func(){
	   include_once dirname(__FILE__) . '/admin/table.php';		
	}*/
	
	
	add_shortcode('resturant-reservation', 'resturant_reservation_func'); 
	
	function resturant_reservation_func(){
		include_once dirname(__FILE__) . '/short_code_resturant_reservation.php';  
	}
	