<?php
require_once'header1.php';


if($_SESSION['access_level']>2){
   header('Location:login.php');
 }
  
?>
<form action="transact.php" method="post">
<div class="row">
    <h3 class="center color">Drink(s)</h3>
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
                <br/>Data already Exist
               </div>");
          unset($_SESSION['b']);
        }elseif(isset($_SESSION['a'])){
              echo("<div class='alert alert-success center' role='alert'>
                    <strong>Congratulations</strong>
                    <br/>Data Inserted Successfully
                   </div>");
              unset($_SESSION['a']);
           }elseif(isset($_SESSION['d'])){
                echo("<div class='alert alert-danger center' role='alert'>
                        <strong>Cops!</strong>
                        <br/>Error Inserting Data
                       </div>");
                unset($_SESSION['d']);
              }elseif(isset($_SESSION['e'])){
                    echo("<div class='alert alert-success center' role='alert'>
                            <strong>Congratulations</strong>
                            <br/>Data Deleted Successfully
                           </div>");
                    unset($_SESSION['e']);
                  }elseif(isset($_SESSION['f'])){
                        echo("<div class='alert alert-danger center' role='alert'>
                                <strong>Oops!</strong>
                                <br/>Error Deleting Data
                               </div>");
                        unset($_SESSION['f']);
                      }elseif(isset($_SESSION['y'])){
                            echo("<div class='alert alert-success center' role='alert'>
                                    <strong>Congratulations</strong>
                                    <br/>Data Updated Successfully
                                   </div>");
                            unset($_SESSION['y']);
                          }elseif(isset($_SESSION['z'])){
                                echo("<div class='alert alert-danger center' role='alert'>
                                        <strong>Oops!</strong>
                                        <br/>Error Updating Data
                                       </div>");
                                unset($_SESSION['z']);
                              }
                              
            
                $id='';
                $name='';
                $price='';
                $button='Add Drink';
            
            
            if(isset($_SESSION['drink_id'])){
                $id=$_SESSION['drink_id'];
                $name=$_SESSION['name'];
                $price=$_SESSION['price'];                
                $button='Modify Drink';
               
            }
            
    
    ?>
   
        <div class="col-md-5 contact-left cont"><input type="text" name="name" placeholder="Enter Name" style="margin-bottom: 20px;" value="<?php echo $name;?>" required=""/>    </div>
        <div class="col-md-5 contact-left cont"><input type="text" name="price" placeholder="Enter Price(eg 4000, dnt put comma)" style="margin-bottom: 20px;" value="<?php echo $price;?>" required=""/>    </div>
        <?php if(isset($_SESSION['drink_id'])){?>
        <input type="hidden" name="drink_id" value="<?php echo $id;?>"/> 
        <?php }?> 
        <div class="col-md-2 contact-left1 cont"><input type="submit" name="action" value="<?php echo $button;?>" style="margin-bottom: 20px;"/></div>
    
</div>
</form>

<div class="row">
    <div class="col-md-12">
   <?php
   $db=new Database('localhost','christ4life','','hotel');
   $db->connect();
   $result=$db->select('drinks',array(),array('drink_id'=>'desc'));
   $numrow=$db->numRow();
   if($numrow==0){
    echo("<h6 class=title>No Existing Record</h6>");
    
   } else{
   
   ?> 
    <table class="table table-striped table-hover">
    <thead style="background-color: #000033; color: white;">
        <tr>
            
            <th>Name</th>
            <th>Price</th>
            <th>Delete</th>
            <th>Edit</th>
            
        </tr>    
    </thead>    
    <tbody>
    
        <?php
        
        while($row=mysqli_fetch_assoc($result)){ 
            extract($row);
        ?>
        <tr>
            <td><?php echo ucwords(strtolower($name));?></td>
            <td><?php echo number_format($price,0);?></td>
            <td><?php  echo"<a onclick='return checkDelete();' href=transact.php?key=$drink_id&action=deleteDrink>";?><i class="glyphicon glyphicon-remove" style="color: red;"></i></a> </td>
            <td><?php  echo"<a onclick='return checkEdit();' href=transact.php?key=$drink_id&action=editDrink>";?><i class="glyphicon glyphicon-pencil" style="color: black;"></i></a> </td>          
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
