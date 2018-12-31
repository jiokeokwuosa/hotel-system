<?php
require_once'header.php';
?>
<div class="container">
  
  <div class="col-md-12">
    <br /><br />
		<div class="main-agileits">
			<h2 class="center color">Login</h2>
            <?php
                if(isset($_SESSION['c'])){
                 $error=$_SESSION['c'];
                 echo("<div class='alert alert-danger center' role='alert'>
                        <strong>Oops!</strong>
                        <br/>$error
                     </div>");
                 unset($_SESSION['c']);
                }elseif(isset($_SESSION['b'])){
                     echo("<div class='alert alert-danger center' role='alert'>
                            <strong>Oops!</strong>
                            <br/>Invalid Login Id/Password
                         </div>");
                     unset($_SESSION['b']);
                    }               
            ?>
          
				<form action="transact.php" method="post">
                  <span class="clearlink"><a href="index.php">Back to Home</a></span>
					<div class="key">
						<i class="fa fa-pencil" aria-hidden="true"></i>
						<input  type="text" placeholder="Enter Login Id" name="login_id"  required=""/>
						<div class="clearfix"></div>
					</div>
                   
					<div class="key">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input  type="password"  name="password" required="" placeholder="Enter Password"/>
						<div class="clearfix"></div>
					</div>
                    
                    <div class="key">
                      <select name="user" required="">
                       <?php
                       $db=new Database('localhost','christ4life','','hotel');
                       $db->connect();
                       echo $db->listUsers();                       
                       ?>                    
                      </select>
                    </div>
                    
                    <div class="key1">
                        <input type="submit" name="action" value="Login"/>
                        
                    </div>
					
				</form>
			
			
		</div>

  </div>
  
 

</div>