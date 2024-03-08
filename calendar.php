 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  style="color:#000000">Enter your Time slot</h5>
        <button type="button" class="btn btn-secondary close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <p>Date: <input type="text" id="datepicker" value="<?=date("Y-m-d")?>"></p>
          <script>
			  $( function() {
				$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
			  } );
			  </script>
      
         <ul class="list-group">
         <?php
            $start = $resturant[0]->start_time;
			$end_time = $resturant[0]->end_time;
		   do{
			   $start = date("h:i A",strtotime($start)); 
			   $end = date("h:i A",strtotime($start)+$resturant[0]->time_slot_gap_in_min*60); 
		 ?>
             <li class="list-group-item">
                 <input type="radio" name="time_slot" value="<?=$start.'-'.$end?>" checked><?=$start.'-'.$end?>
             </li>    
         <?php
         
		    $start = $end;
		   }while(strtotime($start)<strtotime($end_time));
		   
		 ?>
         </ul>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary submit" onClick="getDateTime()">Ok</button>
      </div>
    </div>
  </div>
</div>
  