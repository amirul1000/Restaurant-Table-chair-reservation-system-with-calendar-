 <link 
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<h5 class="font-20 mt-15 mb-1">Resturant</h5>

<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="admin.php?page=resturant&cmd=edit"
			class="btn btn-success">Add</a>
	</div>
	
	
</div>
<!--End of Action//--> 
   
<!--Data display of resturant-->     
<div style="overflow-x:auto;width:100%;">      
<table cellspacing="3" cellpadding="3" class="table table-striped table-bordered">
    <tr>
		<th>Name</th>
        <th>Address</th>
        <th>Description</th>
        <th>Virtual tour url</th>
        <th>General cost</th>
        <th>Time slot gap in min</th>
         <th>Picture</th>
		<th>Actions</th>
    </tr>
	<?php foreach($resturant as $c){ ?>
    <tr>
        <td><?php echo $c->name; ?></td>
         <td><?php echo $c->address; ?></td>
        <td><?php echo $c->description; ?></td>
        <td><?php echo $c->virtual_tour_url; ?></td>
        <td><?php echo $c->General_cost; ?></td>
        <td><?php echo $c->time_slot_gap_in_min; ?></td>
         <td>   
              <img src="<?php echo $c->rpicture; ?>" width="100">
           
        </td>

		<td>
            <a href="admin.php?page=resturant&cmd=edit&id=<?=$c->id?>" class="action-icon"> Edit</a>
            <a href="admin.php?page=resturant&cmd=delete&id=<?=$c->id?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> Delete</a>
         </td>
    </tr>
	<?php } ?>
</table>
</div>
<!--End of Data display of resturant//--> 

<!--No data-->
<?php
	if(count($resturant)==0){
?>
 <div align="center"><h3>Data does not exists</h3></div>
<?php
	}
?>
<!--End of No data//-->

<!--Pagination-->
<!--End of Pagination//-->
