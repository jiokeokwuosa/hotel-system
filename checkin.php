<?php
require_once'header1.php';

if(! isset($_SESSION['login'])){
   header('location:login.php'); 
}
?>

<form action="transact.php" method="post" name="checkin">
<div class="row">
<?php 
if(isset($_SESSION['a'])){
  echo("<div class='alert alert-danger center' role='alert'>
        <strong>Oops!</strong>
        <br/>Error adding order
       </div>");
  unset($_SESSION['a']);
}elseif(isset($_SESSION['b'])){
      echo("<div class='alert alert-success center' role='alert'>
            <strong>Congratulations!</strong>
            <br/>Order added
           </div>");
      unset($_SESSION['b']);
    }
    
    $first_name='';
    $last_name='';
    $phone='';
    $email='';
    
    if(isset($_SESSION['first_name'])){
       $first_name=$_SESSION['first_name']; 
    }
    
    if(isset($_SESSION['last_name'])){
       $last_name=$_SESSION['last_name']; 
    }
    
    if(isset($_SESSION['phone'])){
       $phone=$_SESSION['phone']; 
    }
    
    if(isset($_SESSION['email'])){
       $email=$_SESSION['email']; 
    }
?>
<h3 class="center color">Check In</h3>
 <div class="col-md-4"></div>
 
 <div class="col-md-4 user-agileits contact-left cont" style="text-align: center;">
     <select name="room_id" style="margin-bottom: 20px;" required="" class="keyword">
      <?php
         $db=new Database('localhost','christ4life','','hotel');
         $db->connect();
         echo $db->listRooms('false');
      ?>
     
     </select><br />
     <input type="text" placeholder="Amount" name="amount" class="amount" style="margin-bottom: 20px;" required="" /><br />
    
     <select name="num" style="margin-bottom: 20px;" required="">
     <option value="">Select Number</option>
      <?php
        for($i=1; $i<=1000; $i++){
           echo"<option value=$i>$i</option>"; 
        }
      ?>
     
     </select><br />
     <input type="text" placeholder="First Name" name="first_name" style="margin-bottom: 20px;" required="" value="<?php echo $first_name;?>"/><br />
     <input type="text" placeholder="Last Name" name="last_name" style="margin-bottom: 20px;" required="" value="<?php echo $last_name;?>"/><br />
     <input type="text" placeholder="Phone Number" name="phone" style="margin-bottom: 20px;" required="" value="<?php echo $phone;?>"/><br />
     <input type="email" placeholder="Enter Email(Optional)" name="email" style="margin-bottom: 20px;" value="<?php echo $email;?>"/><br />
     <input type="submit" name="action" value="Check In" style="display: none;" id="checkin"/>
     <label for="checkin" class="button">Check In</label><br />
     <a href="print.php">Generate Receipt</a>
     
     
     
 
 </div>
 
 <div class="col-md-4"></div>



</div>

</form>



<?php
require_once'footer.php';
?>
