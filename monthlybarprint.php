<?php
$status='false';
session_start();
require_once'functions.php';
if(isset($_POST['month'])){
  $_SESSION['month']=$_POST['month'];
  $_SESSION['year']=$_POST['year'];
   
   $db=new Database('localhost','christ4life','','hotel');
   $db->connect();
   $result=$db->select('drink_order',array('month'=>$_SESSION['month'],'year'=>$_SESSION['year']));  
   
   if($db->numRow()==0){
    echo"<h2 class=center>No data Found</h2>";
   }else{
     $status='true'; 
   }
    
}

if($status=='true'){   
  
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Owner" />

	<title></title>    
    <link rel="icon" href="images/logo.png" />
    <link  href="css/style.css" rel="stylesheet" media="all" />
    <link  href="css/bootstrap.min.css" rel="stylesheet" media="all" /> 
    
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row center">
        <img src="images/logo.png" width="15%"/>
    
    </div>
    
    <div class="row">
      <div class="col-md-12 center">
      <h3 class="center color" style="font-family: font1;">Beautiful Gate Resort and Conference Center</h3></h4> 
      </div>
    </div>

    <div class="row" style="font-size: 17px;">
         <div class="col-md-12">
             <table style="width:100%">
                  <tr>
                      <td>Phone No: 08107908377, 08142726423</td>
                      <td class="right">Email: Info@beautifulgateresort.com</td>
                  </tr>
                  <tr>
                       <td> Web: www.beautifulgateresort.com</td>
                       <td>&nbsp;</td>              
                  </tr>
             
             </table>
                  <h3 class="center color">Monthly Bar Report for <?php echo $_SESSION['month'].'/'.$_SESSION['year'];?></h3>
         </div>      
    </div>
    
    <div class="row">
      <div class="col-md-12">
          <table style="width:100%; vertical-align: top; font-size: 18px;" rules="all" frame="box">
              <tr>
                    <th>S/N</th>
                    <th>Drink Name</th>
                    <th>Amount</th>
                    <th>Quantity</th>
                    <th>Seller ID</th>
                    <th>Time</th>
                                 
              </tr>
              
              <?php
               $counter=0;
               $total=0;
               while($row=mysqli_fetch_assoc($result)){
                $counter++;
                    extract($row);
                    ?>
                <tr>
                    <td><?php echo $counter;?></td>
                    <td><?php echo $db->getDrinkName($drink_id);?></td>
                    <td><?php echo number_format($amount,0);?></td>
                    <td><?php echo $num;?></td>
                    <td><?php echo $uploader_id;?></td>
                    <td><?php echo date('h:ia',strtotime($date_received));?></td>
                    <?php
                     $total_amount=$amount*$num; 
                     $total+=$total_amount;              
                    ?>
                
                </tr>                   
                  
              <?php  
               }
               
              ?> 
              
              <tr>
              <td></td>
              
              </tr> 
              <tr>
              <td><b>Total:&nbsp;  N<?php echo number_format($total,0);?></b></td>
              
              </tr>        
          </table>    
      </div>    
    </div>
    <br />
   
    
   

</div>




</body>
</html>
<?php } 
?>