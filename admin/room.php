<?php

  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  global $wpdb;
  $cmd='';
  $id = '';
  $cmd = isset($_REQUEST['cmd'])?$_REQUEST['cmd']:'';
  $id = isset($_REQUEST['id'])?$_REQUEST['id']:'';
  
  switch($cmd){
	case "save":
	         $created_at = "";
			 $updated_at = "";

			if($id<=0){
				 $created_at = date("Y-m-d H:i:s");
			 }
			else if($id>0){
				 $updated_at = date("Y-m-d H:i:s");
			 }

			$params = array(
			                'resturant_id' => $_REQUEST['resturant_id'],
							'room_no' => $_REQUEST['room_no'],
							'description' => $_REQUEST['description'],
							'no_of_tables' => $_REQUEST['no_of_tables'],
							'rows' => $_REQUEST['rows'],
							'cols' => $_REQUEST['cols'],
							'created_at' =>$created_at,
							'updated_at' =>$updated_at,
							
							);
			 
			if($id>0){
			unset($params['created_at']);
			}if($id<=0){
			unset($params['updated_at']);
			} 
			if($id<=0){
			$res = $wpdb->insert('wp_room',$params);
			}
			if($id>0){
			
			 $res = $wpdb->update('wp_room',$params,array('id'=>$_REQUEST['id']));
			 
			}
			 ob_start();
             ob_end_flush();
			 echo "<script>";
			  echo "window.location.href = 'admin.php?page=room';";
			 echo "</script>";
	      break;
	case "delete":  
	      $wpdb->delete('wp_room',array('id'=>$_REQUEST['id']));
		   ob_start();
           ob_end_flush();
		  //wp_redirect( 'admin.php?page=room' );
		   echo "<script>";
			  echo "window.location.href = 'admin.php?page=room';";
			 echo "</script>";
	      break;  
    case "edit":
	         if(!empty($_REQUEST['id'])){
		     	$room  = $wpdb->get_results("select * from wp_room where id='".$_REQUEST['id']."'"); 
			 }
			 include(dirname(__FILE__) . '/../template/admin/room/form.php');  
		  break;		  
	default:
	   $room  = $wpdb->get_results("select * from wp_room"); 
	   include(dirname(__FILE__) . '/../template/admin/room/index.php');  
  }
?>