$(document).ready(function(){
         
        setInterval(update,1000);
        
        function update(){
                var keyword5=4;
                var keyword6=4;
               
                $.ajax({type:"POST",
                        url:"custom.php",
                        data:"keyword5="+keyword5,
                        success:function(result){                    
                            if(result=='no'){
                               var badge = document.getElementById('badge');
                               badge.style.display="none"; 
                            }else{
                               var badge = document.getElementById('badge');
                               badge.style.display="";
                               badge.innerHTML=result;
                              }
                                           
                         }  
                });  
                
                
                $.ajax({type:"POST",
                    url:"custom.php",
                    data:"keyword6="+keyword6,
                    success:function(result){                    
                        if(result=='no'){
                           var badge1 = document.getElementById('badge1');
                           badge1.style.display="none"; 
                        }else{
                           var badge1 = document.getElementById('badge1');
                           badge1.style.display="";
                           badge1.innerHTML=result;
                          }
                                       
                     }  
            });        
       
       
       
       }
        
        
        
        
         $(document).on('change',".keyword", function(){
              var keyword= $(this).val();              
              if(keyword != ''){   
                    $.ajax({type:"POST",
                    url:"custom.php",
                    data:"keyword="+keyword,
                    success:function(result){                    
                      // document.getElementById('')
                      document.checkin.amount.value=result;                   
                     }  
                 });   
                
               }else{
                  $(".amount").html('Oops!!!');
                 }  
         
         
         });  
         
         $(document).on('change',".keyword1", function(){
              var keyword1= $(this).val(); 
                          
              if(keyword1 != ''){ 
                 $.ajax({type:"POST",
                    url:"custom.php",
                    data:"keyword1="+keyword1,
                    success:function(result){                    
                      // document.getElementById('')
                      document.orderdrinks.amount.value=result;                   
                     }  
                 });   
                
               }else{
                  $("#amount").html('Oops!!!');
                 }  
         
         
         }); 
         
         $(document).on('change',".keyword2", function(){
              var keyword2= $(this).val(); 
                          
              if(keyword2 != ''){ 
                 $.ajax({type:"POST",
                    url:"custom.php",
                    data:"keyword2="+keyword2,
                    success:function(result){                    
                      // document.getElementById('')
                      document.orderfoods.amount.value=result;                   
                     }  
                 });   
                
               }else{
                  $(".amount1").html('Oops!!!');
                 }  
         
         
         });   
        
            
});





function checkRegister() {
   
	if (document.register.login_id.value == "") {
		alertify.alert('Sign up Error', 'Please Enter Login Id');
		return false;
	}
	if (document.register.password.value == "") {
		alertify.alert('Sign up Error', 'Please Enter Password');
		return false;
	} else if (document.register.password.value.length < 4) {
		alertify.alert('Sign up Error', 'Password should be up to 4 characters');
		return false;
	}
	if (document.register.password1.value == "") {
		alertify.alert('Sign up Error', 'Please Enter Confirm Password');
		return false;
	}
	if (document.register.password.value != document.register.password1.value) {
		alertify.alert('Sign up Error', 'Confirm Password do not match');
		return false;
	}
	if (document.register.user.value == "") {
		alertify.alert('Sign up Error', 'Please Select User');
		return false;
	}
	      
	return true;
}

function checkEdit(){    
   
    var status=confirm('Confirm Edit?');
    if(status){
        return true;
    }else{
        return false;
      }
       
}

function checkDelete(){
    
    var status=confirm('Confirm Delete?');
    if(status){
        return true;
    }else{
        return false;
      }  
    
}

function checkOut(){
    
    var status=confirm('Confirm CheckOut?');
    if(status){
        return true;
    }else{
        return false;
      }  
    
}

function checkApprove(){
    
    var status=confirm('Verify Order?');
    if(status){
        return true;
    }else{
        return false;
      }  
    
}

function checkApprove1(){
    
    var status=confirm('Mark Test as Done?');
    if(status){
        return true;
    }else{
        return false;
      }  
    
}

function checkRetract(){
    
    var status=confirm('Confirm Retract?');
    if(status){
        return true;
    }else{
        return false;
      }  
    
}




