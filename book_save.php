<?php

session_start();
require_once(  dirname(__FILE__)  .'/../../../wp-load.php' );
  global $wpdb;
    $params = array(
		'resturant_id' => $_REQUEST['resturant_id'],
		'data' => $_REQUEST['data'],
		'created_at' =>date("Y-m-d H:i:s")
		);
	$res = $wpdb->insert('wp_booked',$params);
	
	
	$lastid = $wpdb->insert_id;
	
	$booked  = $wpdb->get_results("select * from wp_booked where id='".$lastid."'");
	
	 $data =  str_replace("\\","",$booked[0]->data); 
			
			 $obj = json_decode($data);
			
          $body =  " Table/Chair: ".$obj[1]->table_chair."
					Date time:  ".$obj[2]->date_time."
					Plan:  ".$obj[3]->plan."
					Customer Name:  ".$obj[4]->customer_name."
					Phone:  ".$obj[5]->phone;
	
	$resturant  = $wpdb->get_results("select * from wp_resturant where id='".$_REQUEST['resturant_id']."'"); 
	$email = $resturant[0]->booked_email;
	
	mail($email,"A book has been placed",$body);
	
	ob_clean();
 echo json_encode(array('status'=>'success','msg'=>"Your booking has been completed successfully"));		
?>