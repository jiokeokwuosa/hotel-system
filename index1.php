<?php
require_once'header1.php';
?>


<div class="row">
    <div class="statistics-grids clearlink">
      
       <?php if($title=='Director' or $title=='Manager'){?>  
        <div class="col-md-4 statistics-grid">
          <a href="newstaff.php">
			<div class="statistic">
				<h4>80%</h4>
				<h5>Create New Staff?</h5>
				<p>From here you can create a new account for a staff so he/she can access the<br /> system.</p>
			</div>
          </a>
        </div>
       
        <div class="col-md-4 statistics-grid">
          <a href="barreport.php">
			<div class="statistic">
				<h4>80%</h4>
				<h5>Generate Bar Report?</h5>
				<p>You can genearate several reports from here<br /> Try it Out.</p>
			</div>
          </a>
        </div>
                   

        <div class="col-md-4 statistics-grid">
          <a href="staff.php">
			<div class="statistic">
				<h4>85%</h4>
				<h5>Manage Staff.</h5>
				<p>You can manage the records of the staff account from here<br />Try it out?</p>
			</div>
          </a>
      	</div>
        <?php }?>
        
        <?php if($title=='Receptionist'){?> 
        
        <div class="col-md-4 statistics-grid">
          <a href="checkin.php">
			<div class="statistic">
				<h4>80%</h4>
				<h5>Check in?</h5>
				<p>From here you can the check in <br /> the customer <br /> Try it Out</p>
			</div>
          </a>
        </div>
       
        <div class="col-md-4 statistics-grid">
          <a href="changepassword.php">
			<div class="statistic">
				<h4>80%</h4>
				<h5>Change password?</h5>
				<p>You are one click away from changing your password<br /> Try it Out.</p>
			</div>
          </a>
        </div>
                   

        <div class="col-md-4 statistics-grid">
          <a href="transact.php?action=logout">
			<div class="statistic">
				<h4>85%</h4>
				<h5>Logout</h5>
				<p>Want to log out of the system???<br />Are you sure?<br />Click here</p>
			</div>
          </a>
      	</div>
        <?php }?>
        
        <?php if($title=='Bar'){?> 
        
        <div class="col-md-4 statistics-grid">
          <a href="orderdrinks.php">
			<div class="statistic">
				<h4>80%</h4>
				<h5>Order Drinks?</h5>
				<p>From here you can order for various drinks as directed by the customers<br /> check it out?</p>
			</div>
          </a>
        </div>
       
        <div class="col-md-4 statistics-grid">
          <a href="changepassword.php">
			<div class="statistic">
				<h4>80%</h4>
				<h5>Change Password</h5>
				<p>From here you can change your password for accessing the system<br /> Try it Out.</p>
			</div>
          </a>
        </div>
                   

        <div class="col-md-4 statistics-grid">
          <a href="transact.php?action=logout">
			<div class="statistic">
				<h4>85%</h4>
				<h5>Logout</h5>
				<p>Want to log out of the system???<br />Are you sure?<br />Click here</p>
			</div>
          </a>
      	</div>
        <?php }?>
        
        
        <?php if($title=='Restaurant'){?> 
        
        <div class="col-md-4 statistics-grid">
          <a href="orderfood.php">
			<div class="statistic">
				<h4>80%</h4>
				<h5>Order Food?</h5>
				<p>From here you can order for various food as directed by the customer<br /> check it out?</p>
			</div>
          </a>
        </div>
       
        <div class="col-md-4 statistics-grid">
          <a href="changepassword">
			<div class="statistic">
				<h4>80%</h4>
				<h5>Change Password</h5>
				<p>You can change your password from here<br /> Try it Out.</p>
			</div>
          </a>
        </div>
                   

        <div class="col-md-4 statistics-grid">
          <a href="transact.php?action=logout">
			<div class="statistic">
				<h4>85%</h4>
				<h5>Logout</h5>
				<p>Want to log out of the system???<br />Are you sure?<br />Click here</p>
			</div>
          </a>
      	</div>
        <?php }?>
        		
        		
		<div class="clearfix"></div>
    </div>

</div>

<?php
require_once'footer.php';
?>

