<?php
require_once'header1.php';


if($_SESSION['access_level'] !=1 and $_SESSION['access_level'] !=3){
   header('Location:login.php');
 }
  
?>
<form action="transact.php" method="post">
<div class="row">
    <h3 class="center color">Check Out</h3>
    <?php  
    if(isset($_SESSION['c'])){
      $error=$_SESSION['c'];
      echo("<div class='alert alert-success center' role='alert'>
            <strong>Congratulations!</strong>
            <br/>Checkout Successful
         </div>");
     unset($_SESSION['c']);
    }elseif(isset($_SESSION['b'])){
          echo("<div class='alert alert-danger center' role='alert'>
                <strong>Oops!</strong>
                <br/>Error Checking Out
               </div>");
          unset($_SESSION['b']);
        }
    
    ?>
   
</div>
</form>

<div class="row">
    <div class="col-md-12">
   <?php
   $db=new Database('localhost','christ4life','','hotel');
   $db->connect();
   $result=$db->select('checkin',array('checkout_status'=>'false'),array('id'=>'desc'));
   $numrow=$db->numRow();
   if($numrow==0){
    echo("<h6 class=title>No Existing Record</h6>");
    
   } else{
   
   ?> 
    <table class="table table-striped table-hover">
    <thead style="background-color: #000033; color: white;">
        <tr>
            
            <th>Customer Name</th>
            <th>Room Name</th>
            <th>Checkin Date</th>
            <th>Checkout</th>
                        
        </tr>    
    </thead>    
    <tbody>
    
        <?php
        
        while($row=mysqli_fetch_assoc($result)){ 
            extract($row);
        ?>
        <tr>
            <td><?php echo ucwords(strtolower($last_name.' '.$first_name));?></td>
            <td><?php echo ucwords(strtolower($db->getRoomName($room_id)));?></td>
            <td> <?php echo date('d-m-y',strtotime($date_created));?></td>
            <td><?php echo"<a onclick='return checkOut();' href=transact.php?key=$room_id&action=checkOutRoom>";?><i class="fa fa-sign-out" style="color: red;"></i></a> </td>
        </tr> 
        <?php
        
        }
        ?>              
    </tbody> 
    <tfoot style="background-color: #000033; color: white; text-align: center;">
    <tr>
    <td colspan="4">We have <?php echo $numrow;?> Record(s)</td>
    </tr>
    </tfoot>
    
    </table>
    
     <?php 
   }
   
   ?> 
    
    </div>
</div>







<?php
require_once'footer.php';
?>
