<?php
    require_once'functions.php';
    
      if(isset($_POST['keyword'])){
        $keyword=$_POST['keyword'];
        
        $db=new Database('localhost','christ4life','','hotel');
        $db->connect();
        $result=$db->select('rooms',array('room_id'=>$keyword));
            if($db->numRow()>0){
              $row=mysqli_fetch_assoc($result);  
              echo $row['price'];              
            }else{
                echo 'Not Found!!!';
              }
      }
      
      if(isset($_POST['keyword1'])){
        $keyword1=$_POST['keyword1'];
        
        $db=new Database('localhost','christ4life','','hotel');
        $db->connect();
        $result=$db->select('drinks',array('drink_id'=>$keyword1));
            if($db->numRow()>0){
              $row=mysqli_fetch_assoc($result);  
              echo $row['price'];              
            }else{
                echo 'Not Found!!!';
              }
      }
      
      if(isset($_POST['keyword2'])){
        $keyword2=$_POST['keyword2'];
        
        $db=new Database('localhost','christ4life','','hotel');
        $db->connect();
        $result=$db->select('foods',array('food_id'=>$keyword2));
            if($db->numRow()>0){
              $row=mysqli_fetch_assoc($result);  
              echo $row['price'];              
            }else{
                echo 'Not Found!!!';
              }
      }
      
      
      if(isset($_POST['keyword5'])){
               
        $db=new Database('localhost','christ4life','','hotel');
        $db->connect();
        $result=$db->select('tempbar',array('verification_status'=>'false'));
            if($db->numRow()>0){
                $num=$db->numRow();
                echo $num ;             
            }else{
                echo 'no';
              }
      }
      
      
      if(isset($_POST['keyword6'])){
               
        $db=new Database('localhost','christ4life','','hotel');
        $db->connect();
        $result=$db->select('tempfood',array('verification_status'=>'false'));
            if($db->numRow()>0){
                $num=$db->numRow();
                echo $num ;             
            }else{
                echo 'no';
              }
      }
      
      

?>