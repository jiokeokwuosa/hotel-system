<?php 
require_once'header.php';
    if(! isset($_SESSION['login'])){
      header('location:index.php');  
    }
       $title='';
       
       $db=new Database('localhost','christ4life','','hotel');
       $db->connect();
       $result=$db->select('access_table',array('access_level'=>$_SESSION['access_level']));
       $row=mysqli_fetch_assoc($result);
       $title=$row['access_name'];
        
   
?>
<br />
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 user-agileits clearlink" style="color: #000033;">
                        <h2 class="center color"><?php echo $title;?>'s Dashboard</h2><br />
                         <a href="index1.php"><i class="fa fa-home" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home</a><br />
                  <?php if($title=='Director' or $title=='Manager'){?>       <a href="newstaff.php"><i class="fa fa-user-md" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;New Staff</a><br />  
                         <a href="staff.php"><i class="fa fa-list-ol" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Staff Account</a><br />
                         <a href="drinks.php"><i class="fa fa-coffee" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Drink(s)</a><br /> 
                         <a href="foods.php"><i class="fa fa-cutlery" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Food(s)</a><br />
                         <a href="rooms.php"><i class="fa fa-inbox" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Room(s)</a><br />                        
                         <a href="barreport.php"><i class="fa fa-credit-card" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Generate Bar Reports</a><br />
                         <a href="resturantreport.php"><i class="fa fa-credit-card" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Generate Restaurant Reports</a><br />
                         <a href="roomreports.php"><i class="fa fa-credit-card" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Generate Room Reports</a><br />
                        
                  <?php }?>                       
                         
                   <?php if($title=='Director' or $title=='Receptionist'){?>  
                         <a href="checkin.php"><i class="fa fa-sign-in" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Check In</a><br />
                         <a href="checkout.php"><i class="fa fa-sign-out" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Check Out</a><br /> 
                         <a href="roomreports.php"><i class="fa fa-eye" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;View Room Report</a><br />                  
                   <?php }?>   
                  
                   <?php if($title=='Director' or $title=='Bar'){?>   
                         <a href="orderdrinks.php"><i class="fa fa-coffee" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Order Drink(s)</a><br />
                         <a href="verifybar.php"><i class="fa fa-pencil" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Verify Customer's Order<span  id="badge"class="badge" style="background-color: red;display: none;">0</span></a><br />
                         <a href="barreport.php"><i class="fa fa-eye" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;View Customer's Order Report</a><br />
                            
                   <?php }?>     
                     
                   <?php if($title=='Director' or $title=='Restaurant'){?>  
                         <a href="orderfood.php"><i class="fa fa-cutlery" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Order Food(s)</a><br />
                         <a href="verifyresturant.php"><i class="fa fa-male" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Verify Customer's Order<span  id="badge1" class="badge" style="background-color: red;display: none;">0</span></a><br />
                         <a href="resturantreport.php"><i class="fa fa-eye" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;View Customer's Order Report</a><br />                   
                   <?php }?>    
                         
                         <a href="changepassword.php"><i class="fa fa-key" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Change Password</a><br />
                         <a  href="transact.php?action=logout"><i class="fa fa-power-off" style="margin-bottom: 13px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a><br />
                                        
                    </div>
                    
                    <div class="col-md-9">
                      <h2 class="center color"><?php echo $title;?>'s Dashboard</h4>
                    
                   