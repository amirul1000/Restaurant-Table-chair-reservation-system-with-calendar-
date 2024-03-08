
 <link 
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
 error_reporting(!E_WARNING);
?>
<a  href="<?php echo 'admin.php?page=booked'; ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Room'); ?></h5>
<!--Form to save data-->
<form method="post" action="admin.php?page=booked&cmd=save&id=<?=$booked[0]->id?>" enctype="multipart/form-data">
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
                <option value="<?=$resturant[$i]->id?>" <?php if(isset($booked[0]->resturant_id)&&$booked[0]->resturant_id ==$resturant[$i]->id){ echo "selected";}?>><?=$resturant[$i]->name?></option>
                 <?php
                 }
                ?>  
                </select> 
              </div> 
           </div>   
         
          <div class="form-group"> 
          <label for="data" class="col-md-4 control-label">data</label> 
          <div class="col-md-8"> 
           <input type="text" name="data" value="<?php echo ($_POST['data'] ? $_POST['data'] : $booked[0]->data); ?>" class="form-control" id="data" /> 
          </div> 
           </div>
           
		   
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <input type="hidden" name="id" value="<?=$booked[0]->id?>" >
        <button type="submit" class="btn btn-success"><?php if(empty($booked[0]->id)){?>Save<?php }else{?>Update<?php } ?></button>
    </div>
</div>
</form>
<!--End of Form to save data//-->	
<!--JQuery-->
