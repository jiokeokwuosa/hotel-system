<?php
    session_start();
    require_once'functions.php';
    $year=date('Y', strtotime('now'));
    $month=date('m', strtotime('now'));
    $day=date('d', strtotime('now'));
    
    if(isset($_REQUEST['action'])){
       
       $action=$_REQUEST['action'];
       
        switch($action){
            
              
            case'Login':
            
                $validate=new Validator($_POST);
                $validate->validate_login();
                
                if($validate->getIsValid()){
                    $db=new Database('localhost','christ4life','','hotel');
                    $db->connect();
                    $result=$db->select('staff_table',array('login_id'=>$_POST['login_id'],'password'=>$_POST['password'],'access_level'=>$_POST['user']));
                        if($db->numRow()==1){
                          $_SESSION['login']=true;
                          $_SESSION['access_level']=$_POST['user'];
                          $row=mysqli_fetch_assoc($result);
                          $_SESSION['id']=$row['staff_id'];
                          $_SESSION['login_id']=$row['login_id'];
                         header('location:index1.php');    
                        }else{
                            $_SESSION['b']=true;
                            header("location:login.php");  
                                  
                          }
                }else{
                    $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                     header("location:login.php");
                  }
            
            
            break;           
            
            
            
            case 'logout':
                        
                session_destroy();
                header('location:index.php');
                
            break;
            
            case'Create Staff':
                
                $validate=new Validator($_POST);
                $validate->validate_signup();
                
                  if($validate->getIsValid()){
                  
                   $db=new Database('localhost','christ4life','','hotel');
                   $db->connect();
                   $db->select('staff_table',array('login_id'=>$_POST['login_id']));
                        if($db->numRow()>0){
                          $_SESSION['d']=true; 
                          header("location:newstaff.php");  
                        }else{                   
                            $save=$db->insert('staff_table',array('login_id'=>$_POST['login_id'],'password'=>$_POST['password'],'access_level'=>$_POST['user'],'creator'=>$_SESSION['id']));                   
                            if($save){
                                $_SESSION['a']=true;
                            } else{
                                $_SESSION['b']=true;
                                }                             
                            header("location:newstaff.php"); 
                         }         
                 }else{
                     $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                     header("location:newstaff.php");
                   } 
             
            break;
            
                             
            
            case 'Modify Staff':
                   $key=isset($_POST['key'])? $_POST['key']:'';    
                   if(!empty($key) and $_SESSION['access_level']<=2){                    
                   
                        $validate=new Validator($_POST);
                        $validate->validate_staff1();
                        
                          if($validate->getIsValid()){
                            $db=new Database('localhost','christ4life','','hotel');
                            $db->connect();
                            $db->select('staff_table',array('login_id'=>$_POST['login_id'],'access_level'=>$_POST['user']));
                            $result=$db->numRow();
                                if($result>0){
                                    $_SESSION['d']=true;
                                    
                                    header("location:newstaff.php?key=$key");                            
                                }else{
                                    $save=$db->update('staff_table',array('login_id'=>$_POST['login_id'],'access_level'=>$_POST['user']),array('staff_id'=>$key));
                                        if($save){
                                            $_SESSION['y']=true;
                                            header("location:newstaff.php?key=$key");                                            
                                        }else{
                                            $_SESSION['z']=true;
                                            header("location:newstaff.php?key=$key");
                                          }
                                   }
                            
                            
                          }else{
                                $error=$validate->getError();
                                 foreach($error as $a=>$b){
                                       $my_error.=$b;
                                       $my_error.="<br>";                   
                                   } 
                                   $_SESSION['c']=$my_error;   
                                 header("location:newstaff.php?key=$key");
                            }
                  } 
            break; 
            
            
                  
           case 'deleteUser':
                        
               $key=isset($_GET['key'])? $_GET['key']:'';
               $dest=isset($_GET['dest'])? $_GET['dest']:'';
               
               if(is_numeric($key) and $_SESSION['access_level']==1){
                    $db=new Database('localhost','christ4life','','hotel');
                    $db->connect();
                    $result=$db->delete('staff_table',array('staff_id'=>$key));
                                                               
                        if($result){                            
                            $_SESSION['e']=true;                                                     
                        }else{
                            $_SESSION['f']=true;                        
                          }
                        
                    header("location:".$dest.".php");
               }
               
            break;
            
           
            case 'Add Drink':
                        
                $validate=new Validator($_POST);
                $validate->validate_item();
                
                  if($validate->getIsValid()){
                    $db=new Database('localhost','christ4life','','hotel');
                    $db->connect();
                    $db->select('drinks',array('name'=>$_POST['name'],'price'=>$_POST['price']));
                    $result=$db->numRow();
                        if($result>0){
                            $_SESSION['b']=true;
                            header("location:drinks.php");                            
                        }else{
                            $save=$db->insert('drinks',array('name'=>$_POST['name'],'price'=>$_POST['price'],'uploader_id'=>$_SESSION['id']));
                                if($save){
                                    $_SESSION['a']=true;
                                    header("location:drinks.php");
                                }else{
                                    $_SESSION['d']=true;
                                    header("location:drinks.php");
                                  }
                           }
                    
                    
                  }else{
                    $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                     header("location:drinks.php");
                   }
            
                
            break;
            
            
            case 'editDrink':
                        
               $key=isset($_GET['key'])? $_GET['key']:'';
               
               if(is_numeric($key) and $_SESSION['access_level']<=2){
                    $db=new Database('localhost','christ4life','','hotel');
                    $db->connect();
                    $result=$db->select('drinks',array('drink_id'=>$key));
                    $numrow=$db->numRow();
                    
                    if($numrow>0){
                      $row=mysqli_fetch_assoc($result);
                      extract($row);
                      $_SESSION['drink_id']=$drink_id;  
                      $_SESSION['name']=$name;
                      $_SESSION['price']=$price;                     
                      header('location:drinks.php');
                    }
               }
               
            break; 
            
            
            case 'Modify Drink':
                        
                  $validate=new Validator($_POST);
                  $validate->validate_item();
                    
                      if($validate->getIsValid()){
                        $db=new Database('localhost','christ4life','','hotel');
                        $db->connect();
                        $db->select('drinks',array('name'=>$_POST['name'],'price'=>$_POST['price']));
                        $result=$db->numRow();
                            if($result>0){
                                $_SESSION['b']=true;
                                header("location:drinks.php");                            
                            }else{
                                $save=$db->update('drinks',array('name'=>$_POST['name'],'price'=>$_POST['price'],'uploader_id'=>$_SESSION['id']),array('drink_id'=>$_POST['drink_id']));
                                    if($save){
                                        $_SESSION['y']=true;
                                        header("location:drinks.php");
                                        unset($_SESSION['drink_id']);
                                        unset($_SESSION['name']);
                                        unset($_SESSION['price']);                                       
                                    }else{
                                        $_SESSION['z']=true;
                                        header("location:drinks.php");
                                      }
                               }
                        
                        
                      }else{
                            $error=$validate->getError();
                             foreach($error as $a=>$b){
                                   $my_error.=$b;
                                   $my_error.="<br>";                   
                               } 
                               $_SESSION['c']=$my_error;   
                             header("location:drinks.php");
                        }
                   
            break; 
            
            
            
            case 'deleteDrink':
                        
               $key=isset($_GET['key'])? $_GET['key']:'';
               
               if(is_numeric($key) and $_SESSION['access_level']==1){
                    $db=new Database('localhost','christ4life','','hotel');
                    $db->connect();
                    $result=$db->delete('drinks',array('drink_id'=>$key));
                                           
                        if($result){
                            $_SESSION['e']=true;                                                     
                        }else{
                            $_SESSION['f']=true;                        
                          }
                        
                    header("location:drinks.php");
               }
               
            break; 
            
           
            case 'Add Food':
                        
                $validate=new Validator($_POST);
                $validate->validate_item();
                
                  if($validate->getIsValid()){
                    $db=new Database('localhost','christ4life','','hotel');
                    $db->connect();
                    $db->select('foods',array('name'=>$_POST['name'],'price'=>$_POST['price']));
                    $result=$db->numRow();
                        if($result>0){
                            $_SESSION['b']=true;
                            header("location:foods.php");                            
                        }else{
                            $save=$db->insert('foods',array('name'=>$_POST['name'],'price'=>$_POST['price'],'uploader_id'=>$_SESSION['id']));
                                if($save){
                                    $_SESSION['a']=true;
                                    header("location:foods.php");
                                }else{
                                    $_SESSION['d']=true;
                                    header("location:foods.php");
                                  }
                           }
                    
                    
                  }else{
                    $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                     header("location:foods.php");
                   }
            
                
            break;
            
            
            case 'editFood':
                        
               $key=isset($_GET['key'])? $_GET['key']:'';
               
               if(is_numeric($key) and $_SESSION['access_level']<=2){
                    $db=new Database('localhost','christ4life','','hotel');
                    $db->connect();
                    $result=$db->select('foods',array('food_id'=>$key));
                    $numrow=$db->numRow();
                    
                    if($numrow>0){
                      $row=mysqli_fetch_assoc($result);
                      extract($row);
                      $_SESSION['food_id']=$food_id;  
                      $_SESSION['name']=$name;
                      $_SESSION['price']=$price;                     
                      header('location:foods.php');
                    }
               }
               
            break; 
            
            
            case 'Modify Food':
                        
                  $validate=new Validator($_POST);
                  $validate->validate_item();
                    
                      if($validate->getIsValid()){
                        $db=new Database('localhost','christ4life','','hotel');
                        $db->connect();
                        $db->select('foods',array('name'=>$_POST['name'],'price'=>$_POST['price']));
                        $result=$db->numRow();
                            if($result>0){
                                $_SESSION['b']=true;
                                header("location:foods.php");                            
                            }else{
                                $save=$db->update('foods',array('name'=>$_POST['name'],'price'=>$_POST['price'],'uploader_id'=>$_SESSION['id']),array('food_id'=>$_POST['food_id']));
                                    if($save){
                                        $_SESSION['y']=true;
                                        header("location:foods.php");
                                        unset($_SESSION['food_id']);
                                        unset($_SESSION['name']);
                                        unset($_SESSION['price']);                                       
                                    }else{
                                        $_SESSION['z']=true;
                                        header("location:foods.php");
                                      }
                               }
                        
                        
                      }else{
                            $error=$validate->getError();
                             foreach($error as $a=>$b){
                                   $my_error.=$b;
                                   $my_error.="<br>";                   
                               } 
                               $_SESSION['c']=$my_error;   
                             header("location:foods.php");
                        }
                   
            break;
            
            
            case 'deleteFood':
                        
               $key=isset($_GET['key'])? $_GET['key']:'';
               
               if(is_numeric($key) and $_SESSION['access_level']==1){
                    $db=new Database('localhost','christ4life','','hotel');
                    $db->connect();
                    $result=$db->delete('foods',array('food_id'=>$key));
                                           
                        if($result){
                            $_SESSION['e']=true;                                                     
                        }else{
                            $_SESSION['f']=true;                        
                          }
                        
                    header("location:foods.php");
               }
               
            break;
            
            
            case 'Add Room':
                        
                $validate=new Validator($_POST);
                $validate->validate_item();
                
                  if($validate->getIsValid()){
                    $db=new Database('localhost','christ4life','','hotel');
                    $db->connect();
                    $db->select('rooms',array('name'=>$_POST['name'],'price'=>$_POST['price']));
                    $result=$db->numRow();
                        if($result>0){
                            $_SESSION['b']=true;
                            header("location:rooms.php");                            
                        }else{
                            $save=$db->insert('rooms',array('name'=>$_POST['name'],'price'=>$_POST['price'],'uploader_id'=>$_SESSION['id']));
                                if($save){
                                    $_SESSION['a']=true;
                                    header("location:rooms.php");
                                }else{
                                    $_SESSION['d']=true;
                                    header("location:rooms.php");
                                  }
                           }
                    
                    
                  }else{
                    $error=$validate->getError();
                     foreach($error as $a=>$b){
                           $my_error.=$b;
                           $my_error.="<br>";                   
                       } 
                       $_SESSION['c']=$my_error;   
                     header("location:rooms.php");
                   }
            
                
            break;
            
            
            case 'editRoom':
                        
               $key=isset($_GET['key'])? $_GET['key']:'';
               
               if(is_numeric($key) and $_SESSION['access_level']<=2){
                    $db=new Database('localhost','christ4life','','hotel');
                    $db->connect();
                    $result=$db->select('rooms',array('room_id'=>$key));
                    $numrow=$db->numRow();
                    
                    if($numrow>0){
                      $row=mysqli_fetch_assoc($result);
                      extract($row);
                      $_SESSION['room_id']=$room_id;  
                      $_SESSION['name']=$name;
                      $_SESSION['price']=$price;                     
                      header('location:rooms.php');
                    }
               }
               
            break; 
            
            
            case 'Modify Room':
                        
                  $validate=new Validator($_POST);
                  $validate->validate_item();
                    
                      if($validate->getIsValid()){
                        $db=new Database('localhost','christ4life','','hotel');
                        $db->connect();
                        $db->select('rooms',array('name'=>$_POST['name'],'price'=>$_POST['price']));
                        $result=$db->numRow();
                            if($result>0){
                                $_SESSION['b']=true;
                                header("location:rooms.php");                            
                            }else{
                                $save=$db->update('rooms',array('name'=>$_POST['name'],'price'=>$_POST['price'],'uploader_id'=>$_SESSION['id']),array('room_id'=>$_POST['room_id']));
                                    if($save){
                                        $_SESSION['y']=true;
                                        header("location:rooms.php");
                                        unset($_SESSION['room_id']);
                                        unset($_SESSION['name']);
                                        unset($_SESSION['price']);                                       
                                    }else{
                                        $_SESSION['z']=true;
                                        header("location:rooms.php");
                                      }
                               }
                        
                        
                      }else{
                            $error=$validate->getError();
                             foreach($error as $a=>$b){
                                   $my_error.=$b;
                                   $my_error.="<br>";                   
                               } 
                               $_SESSION['c']=$my_error;   
                             header("location:rooms.php");
                        }
                   
            break;
            
            
            case 'deleteRoom':
                        
               $key=isset($_GET['key'])? $_GET['key']:'';
               
               if(is_numeric($key) and $_SESSION['access_level']==1){
                    $db=new Database('localhost','christ4life','','hotel');
                    $db->connect();
                    $result=$db->delete('rooms',array('room_id'=>$key));
                                           
                        if($result){
                            $_SESSION['e']=true;                                                     
                        }else{
                            $_SESSION['f']=true;                        
                          }
                        
                    header("location:rooms.php");
               }
               
            break;
            
             
            case'Change Password':
            
                $validate=new Validator($_POST);
                $validate->validate_password();
                    
                      if($validate->getIsValid()){
                        $db=new Database('localhost','christ4life','','hotel');
                        $db->connect();
                        $db->select('staff_table',array('password'=>$_POST['old_password'],'staff_id'=>$_SESSION['id']));
                        $numrow=$db->numRow();
                        if($numrow==1){
                          $status=$db->update('staff_table',array('password'=>$_POST['new_password']),array('staff_id'=>$_SESSION['id']));
                          if($status){
                            $_SESSION['b']=true;
                          }else{
                            $_SESSION['c']=true;
                           }
                          
                        }else{
                           $_SESSION['a']=true;
                            
                        }
                      
                        header("location:changepassword.php"); 
                      }else{
                            $error=$validate->getError();
                             foreach($error as $a=>$b){
                                   $my_error.=$b;
                                   $my_error.="<br>";                   
                             } 
                             $_SESSION['d']=$my_error;   
                             header("location:changepassword.php");
                        }
                    
                      
            
            break;
            
            
            case 'Check In':
            
                if(isset($_POST['amount']) and !empty($_POST['amount'])){
                     $db=new Database('localhost','christ4life','','hotel');
                     $db->connect();
                     $result=$db->insert('checkin',array('room_id'=>$_POST['room_id'],'amount'=>$_POST['amount'],'num'=>$_POST['num'],'first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'phone'=>$_POST['phone'],'email'=>$_POST['email'],'uploader_id'=>$_SESSION['id'],'session_id'=>session_id(),'day'=>$day,'month'=>$month,'year'=>$year));
                     if($result){
                        $db->update('rooms',array('status'=>'true'),array('room_id'=>$_POST['room_id']));
                        $_SESSION['first_name']=$_POST['first_name'];
                        $_SESSION['last_name']=$_POST['last_name'];
                        $_SESSION['phone']=$_POST['phone'];
                        $_SESSION['email']=$_POST['email'];
                        $_SESSION['b']='true';
                     }else{
                        $_SESSION['a']='true';
                       }
                     
                    
                   header('location:checkin.php'); 
                }
            
            
            
            break;
            
            
            case 'checkOutRoom':
            
                $room_id=isset($_GET['key'])? $_GET['key']:'';
                $db=new Database('localhost','christ4life','','hotel');
                $db->connect();
                $result=$db->update('rooms',array('status'=>'false'),array('room_id'=>$room_id));
                $result1=$db->update('checkin',array('checkout_status'=>'true','checkout_date'=>date('Y-m-d H:i:s', strtotime('now')),'checkout_id'=>$_SESSION['id']),array('room_id'=>$room_id));
                
                if($result and $result1){
                  $_SESSION['c']='true';  
                }else{
                  $_SESSION['b']='true';   
                 }
                             
              header('location:checkout.php');
            break;
            
            
            case 'Order Drink':
            
                if(isset($_POST['amount']) and !empty($_POST['amount'])){
                     $db=new Database('localhost','christ4life','','hotel');
                     $db->connect();
                     $result=$db->insert('drink_order',array('drink_id'=>$_POST['drink_id'],'amount'=>$_POST['amount'],'num'=>$_POST['num'],'uploader_id'=>$_SESSION['id'],'session_id'=>session_id(),'day'=>$day,'month'=>$month,'year'=>$year));
                     if($result){
                                             
                        $_SESSION['b']='true';
                     }else{
                        $_SESSION['a']='true';
                       }
                     
                    
                   header('location:orderdrinks.php'); 
                }
            
            
            
            break;
            
            case 'Order Food':
            
                if(isset($_POST['amount']) and !empty($_POST['amount'])){
                     $db=new Database('localhost','christ4life','','hotel');
                     $db->connect();
                     $result=$db->insert('food_order',array('food_id'=>$_POST['food_id'],'amount'=>$_POST['amount'],'num'=>$_POST['num'],'uploader_id'=>$_SESSION['id'],'session_id'=>session_id(),'day'=>$day,'month'=>$month,'year'=>$year));
                     if($result){                                             
                        $_SESSION['b']='true';
                     }else{
                        $_SESSION['a']='true';
                       }
                     
                    
                   header('location:orderfood.php'); 
                }
            
            
            
            break;
            
            
            case 'Order to Bar':
            
                if(isset($_POST['amount']) and !empty($_POST['amount'])){
                     $db=new Database('localhost','christ4life','','hotel');
                     $db->connect();
                     $result=$db->insert('tempbar',array('drink_id'=>$_POST['drink_id'],'num'=>$_POST['num'],'first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'room_no'=>$_POST['room_no']));
                     if($result){                                             
                        $_SESSION['b']='true';
                     }else{
                        $_SESSION['a']='true';
                       }
                     
                    
                   header('location:ordertobar.php'); 
                }
            
            
            
            break;
            
            
            
            case 'verifyBarOrder':
                
                 $order_id=isset($_GET['key'])? $_GET['key']:'';
                 $db=new Database('localhost','christ4life','','hotel');
                 $db->connect();
                 $result=$db->update('tempbar',array('verification_status'=>'true'),array('order_id'=>$order_id));
                     if($result){                                             
                        $_SESSION['c']='true';
                      }else{
                        $_SESSION['b']='true';
                       }
                 header('location:verifybar.php');
            
            break;
            
            
            case 'Order to Resturant':
            
                if(isset($_POST['amount']) and !empty($_POST['amount'])){
                     $db=new Database('localhost','christ4life','','hotel');
                     $db->connect();
                     $result=$db->insert('tempfood',array('food_id'=>$_POST['food_id'],'num'=>$_POST['num'],'first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'room_no'=>$_POST['room_no']));
                     if($result){                                             
                        $_SESSION['b']='true';
                     }else{
                        $_SESSION['a']='true';
                       }
                     
                    
                   header('location:ordertoresturant.php'); 
                }
            
            
            
            break;
            
            
            case 'verifyFoodOrder':
                
                 $order_id=isset($_GET['key'])? $_GET['key']:'';
                 $db=new Database('localhost','christ4life','','hotel');
                 $db->connect();
                 $result=$db->update('tempfood',array('verification_status'=>'true'),array('order_id'=>$order_id));
                     if($result){                                             
                        $_SESSION['c']='true';
                      }else{
                        $_SESSION['b']='true';
                       }
                 header('location:verifyresturant.php');
            
            break;
            
                    
                        
            
                        
            
      
      
      
      
      
            default:
            
                 header('location:login.php');            
            
            break;
      
      
      
      
      
            
        }
        
    }






















?>