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
			                'room_id' => $_REQUEST['room_id'],
			                'table_no' => $_REQUEST['table_no'],
							'position'  => $_REQUEST['position'],
							'description'  => $_REQUEST['description'],
							'no_of_chairs'  => $_REQUEST['no_of_chairs'],
							'cost'  => $_REQUEST['cost'],
							'created_at' =>$created_at,
							'updated_at' =>$updated_at,
							
							);
			
			$uploads_dir = get_home_path().'/wp-content/uploads/table';
			if(!is_dir($uploads_dir)){
			  mkdir($uploads_dir); 
			}
			
				if ($_FILES["picture"]["error"]==UPLOAD_ERR_OK) {
					$tmp_name = $_FILES["picture"]["tmp_name"];
					// basename() may prevent filesystem traversal attacks;
					// further validation/sanitation of the filename may be appropriate
					$name = basename($_FILES["picture"]["name"]);
					move_uploaded_file($tmp_name, "$uploads_dir/$name");
					$params['picture'] = get_site_url()."/wp-content/uploads/table/$name";
					
				}		
				 
			if($id>0){
			unset($params['created_at']);
			}if($id<=0){
			unset($params['updated_at']);
			} 
			if($id<=0){
			$res = $wpdb->insert('wp_table',$params);
			}
			if($id>0){
			
			 $res = $wpdb->update('wp_table',$params,array('id'=>$_REQUEST['id']));
			 
			}
			 ob_start();
             ob_end_flush();
			 echo "<script>";
			  echo "window.location.href = 'admin.php?page=table';";
			 echo "</script>";
	      break;
	case "delete":  
	      $wpdb->delete('wp_table',array('id'=>$_REQUEST['id']));
		   ob_start();
           ob_end_flush();
		  //wp_redirect( 'admin.php?page=table' );
		   echo "<script>";
			  echo "window.location.href = 'admin.php?page=table';";
			 echo "</script>";
	      break;  
    case "edit":
	         if(!empty($_REQUEST['id'])){
		     	$table  = $wpdb->get_results("select * from wp_table where id='".$_REQUEST['id']."'"); 
			 }
			 include(dirname(__FILE__) . '/../template/admin/table/form.php');  
		  break;		  
	default:
	   $table  = $wpdb->get_results("select * from wp_table"); 
	   include(dirname(__FILE__) . '/../template/admin/table/index.php');  
  }
?>