<?php require_once "inc/header.php"; ?> 
<?php if($_SESSION['admin']['role'] == "admins"):?>
		<div class="main-panel">
          <div class="content-wrapper">
          	<div class="row">
          		  <div class="col-md-12 grid-margin stretch-card" align="center">
                <div class="card">
                	<form id="manualTradeForm" class="text-success">
                		
                	
                  <div class="card-body">
                    <h4 class="card-title">Live 5 Min Binary Trade</h4>
                   
                   <div style="float:left;width:50%">
    					<h6 id="longTradeAmount">Long Trade : $700</h6>
  					</div>
  					<div style="float:left;width:50%">
				    <h6 id="shortTradeAmount">Short Trade : $500.5</h6>
				    
				  </div>

                  </div>
                  <select class="form-control text-danger" style="width:200px">
                    <option value="">Select Winner Type</option>
                    <option value="1">Long Trade </option>
                    <option value="2">Short Trade</option>
                   </select>
                   <br>
                  	<button class="btn btn-danger" id="manualWinner"> Confirm Winner</button>
                  </form>

                </div>
              </div>
          	</div>



         <!--  ********************User panel Section End*************************** -->
          </div>

           <?php endif ?>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
 <?php require_once "inc/footer.php"; ?>