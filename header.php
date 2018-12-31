<?php
session_start();
ob_start();
require_once'functions.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Owner" />

	<title>Beautiful Gate</title>
    <link rel="icon" href="images/logo.png" />
    <link  href="css/style.css" rel="stylesheet" media="all" />
    <link  href="css/bootstrap.min.css" rel="stylesheet" media="all" />  
    <link rel="stylesheet" href="css/ken-burns.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/animate.min.css" type="text/css" media="all" />
    <link href="css/font-awesome.css" rel="stylesheet"/>    
    <link rel="stylesheet" href="css/alertify.min.css" media="all"/>
    <link rel="stylesheet" href="css/default.min.css" media="all"/>
    <link rel="stylesheet" href="css/semantic.css" media="all"/>
    
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/alertify.min.js"></script>
    <script src="js/script.js"></script>
    
</head>

<body>
    <header id="header4">
     <div class="container">
        <div class="row">
            <div class="col-md-6"><i class="glyphicon glyphicon-phone"></i>  08107908377, 08142726423</div>
            <div class="col-md-6 right">
            <i class="glyphicon glyphicon-time"></i>
             <?php 
        		//$time=time();
        		$actualtime=date('F j, Y', strtotime('now'));
        		echo $actualtime;
        	 ?>&nbsp;&nbsp;&nbsp;
             <i class="glyphicon glyphicon-map-marker"></i> Plot 218, Agu Awka Industrial Layout, Anambra State, Nigeria.
            
            
            </div>
        
        </div>
     
     </div>
    </header>
    <header id="header1">
        <div class="container">
          <div class="row">
            <div class="col-md-6"><br />
                <a href="index.php"><img src="images/banner.png" width="80%" class="img-responsive"/></a>
            </div>
            <div class="col-md-6 right clearlink">
            <br />
      <?php 
      if(!isset($_SESSION['login'])){
         
      ?>     <a href="ordertobar.php"> Make Order to the Bar</a> |<a href="ordertoresturant.php"> Make Order to the Restaurant</a> | <a href="login.php">Login</a> <?php  }else{?>    
          
                 <a href="transact.php?action=logout">LogOut <?php echo $_SESSION['login_id'];?></a>
             <?php }?>
            </div>
          
          </div>
        </div>
    </header><br />
    <header id="header2">
    
    
    
    </header>



