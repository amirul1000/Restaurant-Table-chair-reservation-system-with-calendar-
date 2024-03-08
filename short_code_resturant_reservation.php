<?php

   global $wpdb;
   
   $resturant  = $wpdb->get_results("select * from wp_resturant WHERE id = '".$_REQUEST['id']."'"); 
   
   
   $room  = $wpdb->get_results("select * from wp_room WHERE resturant_id = '".$resturant[0]->id."'"); 
   
   ?>  
   
   <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   -->
  

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>



<div class="container">
    <div class="row">
      <div class="col-sm-5 col-md-6 class_width">
        <div>
             <iframe id="panoee-tour-embeded" name="Test Tour" src="<?=$resturant[0]->virtual_tour_url?>" frameBorder="0" width="100%" height="400px" scrolling="no" allowvr="yes" allow="vr; xr; accelerometer; gyroscope; autoplay;" allowFullScreen="false" webkitallowfullscreen="false" mozallowfullscreen="false" loading="eager"></iframe>
			  <script>
                var pano_iframe_name = "panoee-tour-embeded";
                window.addEventListener("devicemotion", function(e){ var iframe = document.getElementById(pano_iframe_name); if (iframe) iframe.contentWindow.postMessage({ type:"devicemotion", deviceMotionEvent:{ acceleration:{ x:e.acceleration.x, y:e.acceleration.y, z:e.acceleration.z }, accelerationIncludingGravity:{ x:e.accelerationIncludingGravity.x, y:e.accelerationIncludingGravity.y, z:e.accelerationIncludingGravity.z }, rotationRate:{ alpha:e.rotationRate.alpha, beta:e.rotationRate.beta, gamma:e.rotationRate.gamma }, interval:e.interval, timeStamp:e.timeStamp } }, "*"); });
              </script>
      
        </div>
        </div>
      <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 let_section">
        <div class="description">
            <h1><?=$resturant[0]->name?>
            </h1>
            <p class="description"><?=$resturant[0]->heading?></p>
            <h3 class="price">
			  <input type="radio" name="plan" value="General_cost-<?=$resturant[0]->General_cost?>" onClick="getPlan();" checked>
			  €<?=$resturant[0]->General_cost?>
            </h3>
            <p class="description"><?=$resturant[0]->description?></p>
            <p class="description"><?=$resturant[0]->address?></p>
        </div>
        
        </div>
    </div>


    <div class="rowe">
        <div class="section_bottom">
        
        <?php
		  if($resturant[0]->VIP){
		?>
         <div class="main_dev">
            <div class="sub_dev">
                <b>VIP</b>
                <input type="radio" name="plan" value="VIP-<?=$resturant[0]->VIP?>" onClick="getPlan();">
                <span class="scwatbwsr_types_item_bg" style="background: #cd751d">bg</span>
                <span class="scwatbwsr_types_item_price">(€<?=$resturant[0]->VIP?> per seat)</span>
            </div>
         </div>
         <?php
		  }
		 ?> 
         <?php
		  if($resturant[0]->VIP_2){
		?>
         <div class="main_dev">
            <div class="sub_dev">
                <b>VIP 2</b>
                <input type="radio" name="plan" value="VIP_2-<?=$resturant[0]->VIP_2?>" onClick="getPlan();">
                <span class="scwatbwsr_types_item_bg" style="background: #cd751d">bg</span>
                <span class="scwatbwsr_types_item_price">(€<?=$resturant[0]->VIP_2?> per table)</span>
            </div>
         </div>
         <?php
		  }
		 ?> 
          <?php
		  if($resturant[0]->Standard){
		?>
         <div class="main_dev">
            <div class="sub_dev">
                <b>Standard</b>
                <input type="radio" name="plan" value="Standard-<?=$resturant[0]->Standard?>" onClick="getPlan();">
                <span class="scwatbwsr_types_item_bg" style="background: #10646D">bg</span>
                <span class="scwatbwsr_types_item_price">(€<?=$resturant[0]->Standard?> one time for all)</span>
            </div>
         </div>
          <?php
		  }
		 ?> 
          <?php
		  if($resturant[0]->Standard_2){
		?>
         <div class="main_dev">
            <div class="sub_dev">
                <b>Standard 2</b>
                <input type="radio" name="plan" value="Standard_2-<?=$resturant[0]->Standard_2?>" onClick="getPlan();">
                <span class="scwatbwsr_types_item_bg" style="background:#10646D">bg</span>
                <span class="scwatbwsr_types_item_price">€<?=$resturant[0]->Standard_2?></span>
            </div>
         </div>
          <?php
		  }
		 ?> 
         <div class="main_dev">
            <div class="sub_dev">
                <b>Booked Tablebg</b>
                <span class="scwatbwsr_types_item_bg" style="background: #BFBFBF">bg</span>
                <span class="scwatbwsr_types_item_price"></span>
            </div>
         </div>
        </div>
        
        </div>
     
</div>
   <p class="description" style="padding-top: 10px;">Please choose schedule first!</p>
        <div class="two_button">
            <button style="padding: 8px 15px 8px 15px;" onClick="showModal();"><?=date("Y-m-d H:i:s")?></button>
        </div>
  <style>

    .two_button  {
        display: flex;
    }
    .two_button button{
        background: #008080;
    margin-right: 2%;
    border: none;
    color: white;
    }
    .sub_dev{
        padding-top: 5%;
    padding-left: 6%;
    text-align: center;
    float: left;
    }
.scwatbwsr_types_item_price{
    display: block;
    text-align: center;
}
.sub_dev b{
    color: #6d6d6d;
    font-size: 15px;
font-weight: 600;
display: block;
text-align: center;
}

.scwatbwsr_types_item_bg {
    text-align: center;
    display: inline-block;
    text-indent: -9999em;
    width: 50px;
    height: 30px;
}

.let_section{
    padding-top: 10px;
}
.description{
color: #6d6d6d;
font-size: 15px;
font-weight: 400;

}

.price{
    font-size: 1.41575em;
    color: #6d6d6d;
    font-weight: 400;
    padding: 30px 10px;
}
.class_width{
    width: 46%!important;

}
    .static_image{
        border-radius: 5px;
        width: 466px;
    height: 327px;
    }

    .description h1{
        font-size: 2.617924em;
    line-height: 1.214;
    letter-spacing: -1px;
    color: #6d6d6d;
    font-weight: 300;
    margin: 0 0 0.5407911001em;
    font-family: "Helvetica ";
    }
	  
	
	.modal-backdrop {
    
    z-index: -1 !important ;
		
	  }
	  
	  button.book_btn {
    padding: 10px 30px 10px 30px;
    border: navajowhite;
    border-radius: 5px;
    font-size: 18px;
    color: black;
    margin-bottom: 29px;
    background: #F5C332;
}
	  
	  
  </style>
  
<?php
include_once dirname(__FILE__) . '/calendar.php';
?>

Enter your name<input type="text" name="customer_name" id="customer_name">
Enter Your Phone<input type="text" name="phone" id="phone">

<?php
   for($i=0;$i<count($room);$i++){
	   $room_no = $room[$i]->room_no;
	   $rows = $room[$i]->rows;
	   $cols = $room[$i]->cols;
	   
	    
	   
	    $position =  0;
		
		echo "<h3>".$room_no."<h3>";
		
		?>
           <p id="book_content_id" style="display:none;"></p>
           <button class="book_btn" onClick="book()">Book</button>
        
		<?php
		
	   echo '<table border="1" width="100%">';
	   for($j=1;$j<=$rows;$j++){
		   echo "<tr border='1'>";
		  for($k=1;$k<=$cols;$k++){
			  
			   ++$position;
			 ?>
			  <td valign=top align=center>
			    <?php
				  
				  include RR_PLUGIN_PATH.'/table_structure.php';
				  
				?>
			  </td>
			  <?php
			     
		  }
		   echo "</tr>";
	   }
	   echo '</table>';
	   
   }
   
?>

<input type="text" name="resturant_id"  id="resturant_id" value="<?=$resturant[0]->id?>" style="display:none;">

<script language="javascript">
 var table = []; 
 function markTable(obj,chair_no,table_no){
	   //alert( chair_no+' '+table_no);
	   
	 if(obj.style.backgroundColor=='rgb(108, 108, 108)'){
		  obj.style.backgroundColor = 'white';
		  for(i=0;i<table.length;i++){
			  if( table[i].chair_no==chair_no &&  table[i].table_no==table_no ){
				  table.splice(i, 1);
			  }
		  }
	 }
	 else{
	 
	     obj.style.backgroundColor = '#6c6c6c';
		 table.push({'chair_no':chair_no,'table_no':table_no});
		 
	 }
	  console.log(table);
	  str = ' ';
	   for(i=0;i<table.length;i++){
		   str += '{'+table[i].table_no + ' : ' + table[i].chair_no+'},';
	   }
	   str = str.substr(0,str.length-1);
	   
	   str2 = "["+JSON.stringify({resturant:$("#resturant_id").val()})+","+JSON.stringify({table_chair:str})+","+JSON.stringify({date_time:getDateTime()})+","+JSON.stringify({plan:getPlan()})+","+JSON.stringify({customer_name:$("#customer_name").val()})+","+JSON.stringify({phone:$("#phone").val()})+"]";
	 
	   
	   $("#book_content_id").html(str2);
	   
 }
 
 function book(){
	 if($("#customer_name").val()==""){
		alert("Customer name is a required field");
		return; 
	 }
	 
	 if($("#phone").val()==""){
		alert("Phone is a required field");
		return; 
	 }
	 
	 if(table.length==0){
		 alert("Table/Chair is a required field.Please select this");
		return; 
	 }
	 
	  let a= confirm("Are you sure to Book ?")
	  if(a){
		  $.ajax({
					type: "POST", 
					url: "<?=plugin_dir_url( __FILE__ ) . 'book_save.php'?>",
					data: { 								
								resturant_id   : $('#resturant_id').val(),
								data : $("#book_content_id").html()
								
						  },
				success: function (data, text) {				
						
						var obj = JSON.parse(data);
					
					  if(obj.status=='success'){
						   alert(obj.msg);
						   window.location.href = "";
						  
					  }
				  },
				  error: function (xhr, ajaxOptions, thrownError) {
						alert(xhr.status);
						alert(thrownError);
					  }
				});
	 
	 
	
	   
	}else{
	let b= confirm("Thanks for your time.Do you want to choice food?");	
	if(b){

	   window.location.href = "";
	   }
	}
	 
 }
 
// jQuery.noConflict();

function showModal(){
	 $('#exampleModal').modal('show');
}

$(".close").on('click',function(){
	  $('#exampleModal').modal('hide');
});

var date_time;
function getDateTime(){
	$('#exampleModal').modal('hide');
	
	date = $("#datepicker").val();
	
	time_slot = $("input[type='radio'][name='time_slot']:checked").val();
	
	date_time = date + " "+time_slot;
	
	return date_time;
	
	
}
var plan;
function getPlan(){
	plan = $("input[type='radio'][name='plan']:checked").val();
	
	return plan;
}

</script>

