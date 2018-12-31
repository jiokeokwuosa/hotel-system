<?php
require_once'header.php';

?>

<form action="transact.php" method="post" name="orderdrinks">
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
            <br/>Order Delivered
           </div>");
      unset($_SESSION['b']);
    }
    
    
?>
<h3 class="center color">Order to Bar</h3>
 <div class="col-md-4"></div>
 
 <div class="col-md-4 user-agileits contact-left cont" style="text-align: center;">
     <select name="drink_id" style="margin-bottom: 20px;" required="" class="keyword1">
      <?php
         $db=new Database('localhost','christ4life','','hotel');
         $db->connect();
         echo $db->listDrinks();
      ?>
     
     </select><br />
     <input type="text" placeholder="Amount" name="amount" id="amount" style="margin-bottom: 20px;" required="" /><br />
    
     <select name="num" style="margin-bottom: 20px;" required="">
     <option value="">Select Quantity</option>
      <?php
        for($i=1; $i<=30; $i++){
           echo"<option value=$i>$i</option>"; 
        }
      ?>
     
     </select><br />
      <input type="text" placeholder="First Name" name="first_name" style="margin-bottom: 20px;" required="" value=""/><br />
     <input type="text" placeholder="Last Name" name="last_name" style="margin-bottom: 20px;" required="" value=""/><br />
     <input type="text" placeholder="Room No" name="room_no" style="margin-bottom: 20px;" required="" value=""/><br />
     <input type="submit" name="action" value="Order to Bar" style="display: none;" id="Order to Bar"/>
     <label for="Order to Bar" class="button">Order to Bar</label><br />
         
 
 </div>
 
 <div class="col-md-4"></div>



</div>

</form>



<?php
require_once'footer.php';
?>
