


<?php  if( $_SESSION['logged'] != 'trueuser')
{
    echo $_SESSION['logged'];
    
   //header('Location: page-login.php');	

  echo "
    
        <script>
               
                window.location = 'admin/index.php';
        
        </script>
            ";


}else{
    
}
 $file = basename($_SERVER['PHP_SELF']);  
 //echo $_SESSION['logged'];
?>  
<header class="main-header">
    <!-- Logo -->
    
    <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    
      <!-- mini logo for sidebar mini 50x50 pixels -->
   
  </header>
<style>
/*  .content-header {  position: fixed;
right: 0;
left: 0;
z-index: 5030;margin-bottom:50px;background:white;
margin-left: 240px;padding: 30px 15px 0 15px; }
  .content-wrapper {
      margin-top:50px;
  }*/
      
</style>
    