<?php 


	include('config.php');
	
	//print_r($_POST);
	
	if( isset($_POST['admin']))		
	{
           // echo "g";
		$userid = $_POST['admin']; 
		$password = $_POST['pass'];
                $type=$_POST['type'];
				
      
	 	if($userid=="" || $password=="")	
		{
			$errormsg = "Login Failed: Incorrect User-ID or password";
			header('Location: login_paint.php?msg=' .$errormsg );
		}
		
		else 
		{
		$stmt = $conn->prepare("SELECT * from users WHERE (lower(user_name)='".strtolower($userid)."') AND password='".$password." '"); 
    $stmt->execute();

   
  
       
   $arr = $stmt->fetch(PDO::FETCH_ASSOC);	
                 
                        
                       $count = $stmt->rowCount();
                        
                        
                        
                'remmember'.$_POST['remember'];
                        if($_POST['remember']=='1'){
			$year = time() + 31536000;
                        setcookie('crmremember_me', $userid, $year);
                        setcookie('crmpassremember_me', $password, $year);
                       
                        }



			
			if($count > 0 )
	   		{
                           
                                
                     $_SESSION['logged'] = 'trueuser' ;	
                                
           
           	
      echo "
    
        <script>
               
                window.location = 'image_upload_list.php';
        
        </script>
            ";
 
				
			}
	
			else // user error
			{
				$errormsg = "Either User-ID/Password is incorrect";
				header('Location: page-login.php?msg=' .$errormsg );				
				  
			 } 
	
		}
	
	}

?> 		<!--end of PHP code-->

