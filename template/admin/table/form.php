 <link 
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
 error_reporting(!E_WARNING);
?>
<a  href="<?php echo 'admin.php?page=table'; ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Table'); ?></h5>
<!--Form to save data-->
<form method="post" action="admin.php?page=table&cmd=save&id=<?=$table[0]->id?>" enctype="multipart/form-data">
<div class="card">
   <div class="card-body">  
   
          <div class="form-group"> 
              <label for="Room No" class="col-md-4 control-label">Room No</label> 
              <div class="col-md-8"> 
                <?php
                    $room = $wpdb->get_results($wpdb->prepare("SELECT * from wp_room WHERE 1  ORDER BY id DESC"));
					if(!(array)$room){
						$fields = $wpdb->get_col("SELECT * from wp_room");
						foreach ($fields as $field)
						{
						   $room[$field] = ''; 	  
						}
					}
					if (!empty($wpdb->last_error)){
						echo $wpdb->last_error;
						exit;
					}
                ?>
               <select name="room_id"  class="form-control" id="room_id" >
                <?php
                for($i=0;$i<count($room);$i++){
                ?>
                <option value="<?=$room[$i]->id?>" <?php if(isset($table[0]->room_id)&&$table[0]->room_id ==$room[$i]->id){ echo "selected";}?>><?=$room[$i]->room_no?></option>
                 <?php
                 }
                ?>  
                </select> 
              </div> 
           </div> 
     
        
          <div class="form-group"> 
          <label for="_no" class="col-md-4 control-label">table_no</label> 
          <div class="col-md-8"> 
           <input type="text" name="table_no" value="<?php echo ($_POST['table_no'] ? $_POST['table_no'] : $table[0]->table_no); ?>" class="form-control" id="table_no" /> 
          </div> 
           </div>
         <div class="form-group"> 
         <label for="position" class="col-md-4 control-label">position</label> 
          <div class="col-md-8"> 
            <select name="position"  id="position"  class="form-control"/> 
             <option value="">--Select--</option> 
              <option value="1" <?php if($table[0]->position=='1'){ echo "selected";} ?>>1</option> 
             <option value="2" <?php if($table[0]->position=='2'){ echo "selected";} ?>>2</option>
             <option value="3" <?php if($table[0]->position=='3'){ echo "selected";} ?>>3</option>
              <option value="4" <?php if($table[0]->position=='4'){ echo "selected";} ?>>4</option>
              <option value="5" <?php if($table[0]->position=='5'){ echo "selected";} ?>>5</option>
              <option value="6" <?php if($table[0]->position=='6'){ echo "selected";} ?>>6</option>
              <option value="7" <?php if($table[0]->position=='7'){ echo "selected";} ?>>7</option>
              <option value="8" <?php if($table[0]->position=='8'){ echo "selected";} ?>>8</option>
              <option value="9" <?php if($table[0]->position=='9'){ echo "selected";} ?>>9</option>
             </select> 
          </div> 
           </div>
           <div class="form-group"> 
          <label for="no_of_chairs" class="col-md-4 control-label">no_of_chairs</label> 
          <div class="col-md-8"> 
           <input type="text" name="no_of_chairs" value="<?php echo ($_POST['no_of_chairs'] ? $_POST['no_of_chairs'] : $table[0]->no_of_chairs); ?>" class="form-control" id="no_of_chairs" /> 
          </div> 
           </div> 
          <div class="form-group"> 
          <label for="cost" class="col-md-4 control-label">cost</label> 
          <div class="col-md-8"> 
           <input type="text" name="cost" value="<?php echo ($_POST['cost'] ? $_POST['cost'] : $table[0]->cost); ?>" class="form-control" id="cost" /> 
          </div> 
           </div> 
           
            <div class="form-group"> 
          <label for="description" class="col-md-4 control-label">description</label> 
          <div class="col-md-8"> 
           <textarea name="description"  class="form-control" id="description" /><?php echo ($_POST['description'] ? $_POST['description'] : $table[0]->description); ?></textarea> 
          </div> 
           </div>
           
          <div class="form-group"> 
          <label for="picture" class="col-md-4 control-label">picture</label> 
          <div class="col-md-8"> 
           <input type="file" name="picture" value="" class="form-control" id="picture" /> 
          </div> 
           </div>


   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <input type="hidden" name="id" value="<?=$table[0]->id?>" >
        <button type="submit" class="btn btn-success"><?php if(empty($table[0]->id)){?>Save<?php }else{?>Update<?php } ?></button>
    </div>
</div>
</form>
<!--End of Form to save data//-->	
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
</script>  			