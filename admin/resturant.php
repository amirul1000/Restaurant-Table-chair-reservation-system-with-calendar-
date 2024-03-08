<?php
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
			                'name' => $_REQUEST['name'],
							'heading' => $_REQUEST['heading'],
			                'address' => $_REQUEST['address'],
							'booked_email' => $_REQUEST['booked_email'],
							'description'  => $_REQUEST['description'],
							'virtual_tour_url'  => $_REQUEST['virtual_tour_url'],
							'VIP'  => $_REQUEST['VIP'],
							'VIP_2'  => $_REQUEST['VIP_2'],
							'Standard'  => $_REQUEST['Standard'],
							'Standard_2'  => $_REQUEST['Standard_2'],
							'General_cost'  => $_REQUEST['General_cost'],
							'start_time'  => $_REQUEST['start_time'],
							'end_time'  => $_REQUEST['end_time'],
							'time_slot_gap_in_min'  => $_REQUEST['time_slot_gap_in_min'],
							'created_at' =>$created_at,
							'updated_at' =>$updated_at,
							
							);
			
			$uploads_dir = get_home_path().'/wp-content/uploads/resturant';
			if(!is_dir($uploads_dir)){
			  mkdir($uploads_dir); 
			}
			
				if ($_FILES["rpicture"]["error"]==UPLOAD_ERR_OK) {
					$tmp_name = $_FILES["rpicture"]["tmp_name"];
					// basename() may prevent filesystem traversal attacks;
					// further validation/sanitation of the filename may be appropriate
					$name = basename($_FILES["rpicture"]["name"]);
					move_uploaded_file($tmp_name, "$uploads_dir/$name");
					$params['rpicture'] = get_site_url()."/wp-content/uploads/resturant/$name";
					
				}		
				 
			if($id>0){
			unset($params['created_at']);
			}if($id<=0){
			unset($params['updated_at']);
			} 
			if($id<=0){
			$res = $wpdb->insert('wp_resturant',$params);
			}
			if($id>0){
			
			 $res = $wpdb->update('wp_resturant',$params,array('id'=>$_REQUEST['id']));
			 
			}
			 ob_start();
             ob_end_flush();
			 echo "<script>";
			  echo "window.location.href = 'admin.php?page=resturant';";
			 echo "</script>";
	      break;
	case "delete":  
	      $wpdb->delete('wp_resturant',array('id'=>$_REQUEST['id']));
		   ob_start();
           ob_end_flush();
		  //wp_redirect( 'admin.php?page=resturant' );
		   echo "<script>";
			  echo "window.location.href = 'admin.php?page=resturant';";
			 echo "</script>";
	      break;  
    case "edit":
	         if(!empty($_REQUEST['id'])){
		     	$resturant  = $wpdb->get_results("select * from wp_resturant where id='".$_REQUEST['id']."'"); 
			 }
			 include(dirname(__FILE__) . '/../template/admin/resturant/form.php');  
		  break;		  
	default:
	   $resturant  = $wpdb->get_results("select * from wp_resturant"); 
	   include(dirname(__FILE__) . '/../template/admin/resturant/index.php');  
  }
?>