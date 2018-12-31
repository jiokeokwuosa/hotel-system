<?php
require_once'header1.php';

if(! isset($_SESSION['login'])){
   header('location:login.php'); 
}
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
            <br/>Order added
           </div>");
      unset($_SESSION['b']);
    }
    
    
?>
<h3 class="center color">Order Drink(s)</h3>
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
        for($i=1; $i<=1000; $i++){
           echo"<option value=$i>$i</option>"; 
        }
      ?>
     
     </select><br />
     <input type="submit" name="action" value="Order Drink" style="display: none;" id="Order Drink"/>
     <label for="Order Drink" class="button">Order Drink</label><br />
     <a href="print1.php">Generate Receipt</a>
     
     
     
 
 </div>
 
 <div class="col-md-4"></div>



</div>

</form>



<?php
require_once'footer.php';
?>
