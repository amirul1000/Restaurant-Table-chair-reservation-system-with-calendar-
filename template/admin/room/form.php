
 <link 
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
 error_reporting(!E_WARNING);
?>
<a  href="<?php echo 'admin.php?page=room'; ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Room'); ?></h5>
<!--Form to save data-->
<form method="post" action="admin.php?page=room&cmd=save&id=<?=$room[0]->id?>" enctype="multipart/form-data">
<div class="card">
   <div class="card-body"> 
          <div class="form-group"> 
              <label for="Room No" class="col-md-4 control-label">Resturant</label> 
              <div class="col-md-8"> 
                <?php
                    $resturant = $wpdb->get_results($wpdb->prepare("SELECT * from wp_resturant WHERE 1  ORDER BY id DESC"));
					if(!(array)$resturant){
						$fields = $wpdb->get_col("SELECT * from wp_resturant");
						foreach ($fields as $field)
						{
						   $resturant[$field] = ''; 	  
						}
					}
					if (!empty($wpdb->last_error)){
						echo $wpdb->last_error;
						exit;
					}
                ?>
               <select name="resturant_id"  class="form-control" id="resturant_id" >
                <?php
                for($i=0;$i<count($resturant);$i++){
                ?>
                <option value="<?=$resturant[$i]->id?>" <?php if(isset($room[0]->resturant_id)&&$room[0]->resturant_id ==$resturant[$i]->id){ echo "selected";}?>><?=$resturant[$i]->name?></option>
                 <?php
                 }
                ?>  
                </select> 
              </div> 
           </div>   
         
          <div class="form-group"> 
          <label for="room_no" class="col-md-4 control-label">Room no</label> 
          <div class="col-md-8"> 
           <input type="text" name="room_no" value="<?php echo ($_POST['room_no'] ? $_POST['room_no'] : $room[0]->room_no); ?>" class="form-control" id="room_no" /> 
          </div> 
           </div>
           
           <div class="form-group"> 
          <label for="description" class="col-md-4 control-label">Description</label> 
          <div class="col-md-8"> 
           <textarea name="description" class="form-control" id="description" /><?php echo ($_POST['description'] ? $_POST['description'] : $room[0]->description); ?></textarea> 
          </div> 
           </div>
           
           <div class="form-group"> 
          <label for="rows" class="col-md-4 control-label">Rows</label> 
          <div class="col-md-8"> 
           <input type="text" name="rows" value="<?php echo ($_POST['rows'] ? $_POST['rows'] : $room[0]->rows); ?>" class="form-control" id="rows" onBlur="countTable();" /> 
          </div> 
           </div>
           
           <div class="form-group"> 
          <label for="cols" class="col-md-4 control-label">Cols</label> 
          <div class="col-md-8"> 
           <input type="text" name="cols" value="<?php echo ($_POST['cols'] ? $_POST['cols'] : $room[0]->cols); ?>" class="form-control" id="cols" onBlur="countTable();" /> 
          </div> 
           </div>
           
           <div class="form-group"> 
          <label for="no_of_tables" class="col-md-4 control-label">No of tables</label> 
          <div class="col-md-8"> 
           <input type="text" name="no_of_tables" value="<?php echo ($_POST['no_of_tables'] ? $_POST['no_of_tables'] : $room[0]->no_of_tables); ?>" class="form-control" id="no_of_tables" /> 
          </div> 
           </div>
		   
		   
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <input type="hidden" name="id" value="<?=$room[0]->id?>" >
        <button type="submit" class="btn btn-success"><?php if(empty($room[0]->id)){?>Save<?php }else{?>Update<?php } ?></button>
    </div>
</div>
</form>
<!--End of Form to save data//-->	
<!--JQuery-->
<script>
	
	function countTable(){
		rows = $("#rows").val();
		cols = $("#cols").val();
		$("#no_of_tables").val(rows*cols);
	}
	
</script>  			