<div class="container-fluid mt-3">
  <div class="row text-center justify-content-md-center">
    <div class="col-sm-2 border btn mx-3" onClick="markTable(this,1,'B<?=$position?>');">1</div>
    <div class="col-sm-2 border btn mx-3" onClick="markTable(this,2,'B<?=$position?>');">2</div>
    <div class="col-sm-2 border btn mx-3" onClick="markTable(this,3,'B<?=$position?>');">3</div>
  </div>
  <div class="row justify-content-md-center">
    <div class="col-sm-1 border btn my-3 me-3" onClick="markTable(this,10,'B<?=$position?>');">10</div>
    <div class="col-sm-7 text-center border border-bottom-0 mt-3" style="background-color:#F2F4F4;" onClick="markTable(this,'all','B<?=$position?>');">B<?=$position?></div>
    <div class="col-sm-1 border btn my-3 ms-3" onClick="markTable(this,4,'B<?=$position?>');">4</div>
  </div>
  <div class="row justify-content-md-center">
    <div class="col-sm-1 border btn my-3 me-3"  onClick="markTable(this,9,'B<?=$position?>');">9</div>
    <div class="col-sm-7 border border-top-0 mb-3"  style="background-color:#F2F4F4;"></div>
    <div class="col-sm-1 border btn my-3 ms-3"  onClick="markTable(this,5,'B<?=$position?>');">5</div>
  </div>
  <div class="row text-center justify-content-md-center">
    <div class="col-sm-2 border btn mx-3" onClick="markTable(this,8,'B<?=$position?>');">8</div>
    <div class="col-sm-2 border btn mx-3" onClick="markTable(this,7,'B<?=$position?>');">7</div>
    <div class="col-sm-2 border btn mx-3" onClick="markTable(this,6,'B<?=$position?>');">6</div>
  </div>
</div>
