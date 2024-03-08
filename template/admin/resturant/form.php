 <link 
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
 error_reporting(!E_WARNING);
?>
<style>
  .card{
	 max-width:100% !important;  
  }
</style>
<a  href="<?php echo 'admin.php?page=resturant'; ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Resturant'); ?></h5>
<!--Form to save data-->
<form method="post" action="admin.php?page=resturant&cmd=save&id=<?=$resturant[0]->id?>" enctype="multipart/form-data">
<div class="card">
   <div class="card-body"> 
   
           <div class="form-group"> 
          <label for="name" class="col-md-4 control-label">Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="name" value="<?php echo ($_POST['name'] ? $_POST['name'] : $resturant[0]->name); ?>" class="form-control" id="name" /> 
          </div> 
           </div> 
           
           <div class="form-group"> 
          <label for="heading" class="col-md-4 control-label">Heading</label> 
          <div class="col-md-8"> 
           <textarea name="heading"  class="form-control" id="heading" /><?php echo ($_POST['heading'] ? $_POST['heading'] : $resturant[0]->heading); ?></textarea> 
          </div> 
           </div>
           
            <div class="form-group"> 
          <label for="booked_email" class="col-md-4 control-label">Booked email</label> 
          <div class="col-md-8"> 
           <input type="text" name="booked_email" value="<?php echo ($_POST['booked_email'] ? $_POST['booked_email'] : $resturant[0]->booked_email); ?>" class="form-control" id="booked_email" /> 
          </div> 
           </div> 
           
          <div class="form-group"> 
          <label for="address" class="col-md-4 control-label">Address</label> 
          <div class="col-md-8"> 
           <input type="text" name="address" value="<?php echo ($_POST['address'] ? $_POST['address'] : $resturant[0]->address); ?>" class="form-control" id="address" /> 
          </div> 
           </div> 
           
            <div class="form-group"> 
          <label for="description" class="col-md-4 control-label">Description</label> 
          <div class="col-md-8"> 
           <textarea name="description"  class="form-control" id="description" /><?php echo ($_POST['description'] ? $_POST['description'] : $resturant[0]->description); ?></textarea> 
          </div> 
           </div>
           <div class="form-group"> 
          <label for="vartual_tour_url" class="col-md-4 control-label">Virtual tour url</label> 
          <div class="col-md-8"> 
             <input type="text" name="virtual_tour_url" value="<?php echo ($_POST['virtual_tour_url'] ? $_POST['virtual_tour_url'] : $resturant[0]->virtual_tour_url); ?>" class="form-control" id="virtual_tour_url" /> 
          </div> 
           </div>
           
           
           
           <div class="form-group"> 
          <label for="VIP" class="col-md-4 control-label">VIP</label> 
          <div class="col-md-8"> 
             <input type="text" name="VIP" value="<?php echo ($_POST['VIP'] ? $_POST['VIP'] : $resturant[0]->VIP); ?>" class="form-control" id="VIP" /> 
          </div> 
           </div>
           <div class="form-group"> 
          <label for="VIP_2" class="col-md-4 control-label">VIP 2</label> 
          <div class="col-md-8"> 
             <input type="text" name="VIP_2" value="<?php echo ($_POST['VIP_2'] ? $_POST['VIP_2'] : $resturant[0]->VIP_2); ?>" class="form-control" id="VIP_2" /> 
          </div> 
           </div>
           <div class="form-group"> 
          <label for="Standard" class="col-md-4 control-label">Standard</label> 
          <div class="col-md-8"> 
             <input type="text" name="Standard" value="<?php echo ($_POST['Standard'] ? $_POST['Standard'] : $resturant[0]->Standard); ?>" class="form-control" id="Standard" /> 
          </div> 
           </div>
           <div class="form-group"> 
          <label for="Standard_2" class="col-md-4 control-label">Standard 2</label> 
          <div class="col-md-8"> 
             <input type="text" name="Standard_2" value="<?php echo ($_POST['Standard_2'] ? $_POST['Standard_2'] : $resturant[0]->Standard_2); ?>" class="form-control" id="Standard_2" /> 
          </div> 
           </div>
           
           <div class="form-group"> 
          <label for="General_cost" class="col-md-4 control-label">General cost</label> 
          <div class="col-md-8"> 
             <input type="text" name="General_cost" value="<?php echo ($_POST['General_cost'] ? $_POST['General_cost'] : $resturant[0]->General_cost); ?>" class="form-control" id="General_cost" /> 
          </div> 
           </div> 
           
           <div class="form-group"> 
          <label for="start_time" class="col-md-4 control-label">Start time</label> 
          <div class="col-md-8"> 
             <input type="time" name="start_time" value="<?php echo ($_POST['start_time'] ? $_POST['start_time'] : $resturant[0]->start_time); ?>" class="form-control" id="start_time" /> 
          </div> 
           </div>
           
           <div class="form-group"> 
          <label for="end_time" class="col-md-4 control-label">End Time</label> 
          <div class="col-md-8"> 
             <input type="time" name="end_time" value="<?php echo ($_POST['end_time'] ? $_POST['end_time'] : $resturant[0]->end_time); ?>" class="form-control" id="end_time" /> 
          </div> 
           </div>
           
           
           
            <div class="form-group"> 
          <label for="time_slot_gap_in_min" class="col-md-4 control-label">Time slot gap in min</label> 
          <div class="col-md-8"> 
             <input type="text" name="time_slot_gap_in_min" value="<?php echo ($_POST['time_slot_gap_in_min'] ? $_POST['time_slot_gap_in_min'] : $resturant[0]->time_slot_gap_in_min); ?>" class="form-control" id="time_slot_gap_in_min" /> 
          </div> 
           </div> 
           
           
          <div class="form-group"> 
          <label for="picture" class="col-md-4 control-label">Picture</label> 
          <div class="col-md-8"> 
           <input type="file" name="rpicture" value="" class="form-control" id="rpicture" /> 
          </div> 
           </div>


   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <input type="hidden" name="id" value="<?=$resturant[0]->id?>" >
        <button type="submit" class="btn btn-success"><?php if(empty($resturant[0]->id)){?>Save<?php }else{?>Update<?php } ?></button>
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