<?php
require_once'header1.php';


if($_SESSION['access_level']>2 and $_SESSION['access_level'] !=4){
   header('Location:login.php');
 }
?>

<h3 class="center color">Bar Report</h3>
<div class="row">
     
     <div class="statistics-grids">
                
                <div class="col-md-4 statistics-grid">
                  <a href="dailybarreport.php">
					<div class="statistic">
						<h4>85%</h4>
						<h5>Daily Bar Report</h5>
						<p>You can view the daily bar report from here, wanna do that?<br /> Click to continue.</p>
					</div>
                  </a>
		      	</div>
    
                <div class="col-md-4 statistics-grid">
                  <a href="monthlybarreport.php">
					<div class="statistic">
						<h4>100%</h4>
						<h5>Monthly Bar Report</h5>
						<p>You can view the monthly bar report from here, wanna do that?<br /> Click to continue.</p>
					</div>
                  </a>
				</div>
                
                <div class="col-md-4 statistics-grid">
                  <a href="yearlybarreport.php">
					<div class="statistic">
						<h4>100%</h4>
						<h5>Annual Bar Report</h5>
						<p>You can view the annual bar report from here, wanna do that?<br /> Click to continue.</p>
                    </div>
                  </a>
				</div>
				
				<div class="clearfix"></div>
                
    </div>
    
</div>


<?php
require_once'footer.php';
?>