<?php
require_once'header1.php';


if($_SESSION['access_level'] >2 and $_SESSION['access_level'] !=3){
   header('Location:login.php');
 }
?>

<h3 class="center color">Rooms Report</h3>
<div class="row">
     
     <div class="statistics-grids">
                
                <div class="col-md-4 statistics-grid">
                  <a href="dailyroomreport.php">
					<div class="statistic">
						<h4>85%</h4>
						<h5>Daily Room <br/>Report</h5>
						<p>You can view the daily room report from here, wanna do that?<br /> Click to continue.</p>
					</div>
                  </a>
		      	</div>
    
                <div class="col-md-4 statistics-grid">
                  <a href="monthlyroomreport.php">
					<div class="statistic">
						<h4>100%</h4>
						<h5>Monthly Room <br/>Report</h5>
						<p>You can view the monthly room report from here, wanna do that fast?<br /> Click to continue.</p>
					</div>
                  </a>
				</div>
                
                <div class="col-md-4 statistics-grid">
                  <a href="yearlyroomreport.php">
					<div class="statistic">
						<h4>100%</h4>
						<h5>Annual Room<br /> Report</h5>
						<p>You can view the annual room report from here, wanna do that?<br /> Click to continue.</p>
                    </div>
                  </a>
				</div>
				
				<div class="clearfix"></div>
                
    </div>
    
</div>


<?php
require_once'footer.php';
?>