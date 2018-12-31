<?php
require_once'header1.php';


if($_SESSION['access_level'] >2 and $_SESSION['access_level'] !=5){
   header('Location:login.php');
 }
?>

<h3 class="center color">Resturant Report</h3>
<div class="row">
     
     <div class="statistics-grids">
                
                <div class="col-md-4 statistics-grid">
                  <a href="dailyresturantreport.php">
					<div class="statistic">
						<h4>85%</h4>
						<h5>Daily Resturant Report</h5><br />
						<p>You can view the daily resturant report from here, wanna do that?<br /> Click to continue.</p>
					</div>
                  </a>
		      	</div>
    
                <div class="col-md-4 statistics-grid">
                  <a href="monthlyresturantreport.php">
					<div class="statistic">
						<h4>100%</h4>
						<h5>Monthly Resturant Report</h5>
						<p>You can view the monthly resturant report from here, wanna do that?<br /> Click to continue.</p>
					</div>
                  </a>
				</div>
                
                <div class="col-md-4 statistics-grid">
                  <a href="yearlyresturantreport.php">
					<div class="statistic">
						<h4>100%</h4>
						<h5>Annual Resturant Report</h5>
						<p>You can view the annual resturant report from here, wanna do that?<br /> Click to continue.</p>
                    </div>
                  </a>
				</div>
				
				<div class="clearfix"></div>
                
    </div>
    
</div>


<?php
require_once'footer.php';
?>