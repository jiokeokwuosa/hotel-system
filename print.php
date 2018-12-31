<?php
session_start();
ob_start();
$status=false;
    if(! isset($_SESSION['login'])){
        header('Location:login.php');
    }
        
require_once'functions.php';

     if(isset($_SESSION['first_name'])){
        $db=new Database('localhost','christ4life','','hotel');
        $db->connect();
        $status=true;
            
     }else{
           header('Location:login.php');
       } 
?>


<?php 
if($status){
       $result1=$db->select('checkin',array('first_name'=>$_SESSION['first_name'],'last_name'=>$_SESSION['last_name'],'phone'=>$_SESSION['phone'],'session_id'=>session_id(),'print_status'=>'false'));
       //$result1=$db->select('checkin',array('first_name'=>$_SESSION['first_name']));
       $numrow=$db->numRow();
       if($numrow==0){
        echo("<h4>No Existing Record</h4>");
        
       } else{
          
 ?>
 <!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Owner" />

	<title>Beautiful Gate</title>    
    <link rel="icon" href="images/logo1.png" />
    <link  href="css/style.css" rel="stylesheet" media="all" />
    <link  href="css/bootstrap.min.css" rel="stylesheet" media="all" /> 
    
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body style="margin-left: -5px;">
<div class="container-fluid">
   
    <div class="row" style="font-size: 12px;">
      <div class="col-md-2 center">
      <table style="width:25%;">
          <tr><td colspan="2"><img src="images/logo.png" width="30%"/></td></tr>
          
          <tr>
            <td colspan="2">  <span style="font-weight: bolder; font-size: 12px;">Beautiful Gate Resort and Conference Center.</span></td>
          </tr>  
          
          <tr>
            <td colspan="2"><i class="glyphicon glyphicon-map-marker"></i>Plot 218, Agu Awka Industrial Layout, Anambra State, Nigeria.<br /> <i class="glyphicon glyphicon-phone"></i>  08142726423, 08107908377 </td>
          </tr>
                        
          <tr><td colspan="2">&nbsp;</td></tr>
          
          <tr>
            <td class="left"><b>First Name:</b></td>
            <td class="left"><?php echo $_SESSION['first_name'];?></td>
          </tr>
          
          <tr>
            <td class="left"><b>Last Name:</b></td>
            <td class="left"><?php echo $_SESSION['last_name'];?></td>
          </tr>
         
         <tr><td colspan="2">&nbsp;</td></tr>
       
         <tr class="left">
             <th class="left">Room</th>
             <th class="left">Amount</th>
             <th class="left">No</th>
         </tr> 
         <?php
         $total=0;
         while($row=mysqli_fetch_assoc($result1)){
            extract($row); 
         ?>
         <tr>
             <td class="left"><?php echo ucwords(strtolower($db->getRoomName($room_id)));?></td>
             <td class="left"><?php echo number_format($amount,0);?></td>
             <td class="left"><?php echo $num;?></td>
             <?php
             $total_amount=$amount*$num;             
             ?>
         </tr>
         
         <?php
         $total+=$total_amount;
        // $db->update('checkin',array('print_status'=>'true'),array('id'=>$id));
          }
         
         ?>
         <tr>
            <td class="left"><b>Total:</b></td>
            <td class="left"><b><?php echo number_format($total,0);?></b></td>
         
         </tr>
         <tr><td colspan="2">&nbsp;</td></tr> 
         <tr><td colspan="2" class="left"><b>Date:</b> <?php echo date('d-m-y',strtotime($date_created));?></tr>
         <tr><td colspan="2">&nbsp;</td></tr> 
         <tr><td colspan="2"class="left"><b>Account Officer's Id: <?php echo $_SESSION['id'];?></b></td></tr> 
         <tr><td colspan="2">&nbsp;</td></tr> 
         <tr><td colspan="2" class="left"><b>............................................................</td></tr>
         <tr><td colspan="2" class="center"><b>Thank you for your patronage!!!</b></td></tr>    
     </table>
     
      </div>
      <div class="col-md-10">
      &nbsp;
      </div>    
 </div>

    

   

</div>




</body>
</html>
 
    
    
    
<?php  
 
   }
   //unset($_SESSION['first_name']);
  // unset($_SESSION['last_name']);
  // unset($_SESSION['phone']);
  // unset($_SESSION['email']);
}
 ?>
 