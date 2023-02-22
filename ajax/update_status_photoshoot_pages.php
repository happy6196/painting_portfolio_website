<?php

require_once('../lib/config.php');

$id=$_REQUEST['id'];
$status=$_REQUEST['status'];
$page = $_REQUEST['page'];

if($page == 'female_ecomm_category' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE female_ecomm_categories SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();

}





if($page == 'female_ecomm_subcategory' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE female_ecomm_subcategories SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();

}



if($page == 'female_ecomm_images' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE female_ecomm_shoot_images SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
   
}



if($page == 'male_ecomm_category' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE male_ecomm_categories SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();

}




if($page == 'male_ecomm_sub_category' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE male_ecomm_subcategories SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();

}





if($page == 'male_ecomm_images' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE male_ecomm_shoot_images SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
   
}


if($page == 'product_ecomm_category' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE product_ecomm_categories SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
   
}


if($page == 'kids_ecomm_category' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE kids_ecomm_categories SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
   
}



if($page == 'kids_ecomm_images' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE kids_ecomm_shoot_images SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
   
}


if($page == 'product_creative_ecomm_categories' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE product_creative_ecomm_categories SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
   
}


if($page == 'kids_style_comm_images' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE kids_style_shoot_images SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
   
}






if($page == 'female_style_ecomm_category' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE female_style_ecomm_categories SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
   
}




if($page == 'male_style_ecomm_category' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE male_style_ecomm_categories SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
   
}





if($page == 'male_style_ecomm_images' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE malestyle_ecomm_shoot_images SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
   
}







if($page == 'female_style_ecomm_images' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE femalestyle_ecomm_shoot_images SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
   
}


if($page == 'products_creative_ecomm_category' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE product_creative_ecomm_categories SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
   
}


if($page == 'fashion_accessories_ecomm_images' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE fashion_accessories_ecomm_shoot_images SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();
   
}



if($page == 'product_creative_ecomm_images' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE creative_products_ecomm_shoot_images SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();

}


if($page == 'products_ecomm_images' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE product_ecomm_shoot_images SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();

}



if($page == 'international_model_images' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE international_model SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();

}




if($page == 'ghost_ecomm_images' ){
    
if($status=='u')
{ $stats='p'; }
if($status=='p')
{ $stats='u'; }

$update_status="UPDATE ghost_ecomm_shoot_images SET status='".$stats."',updated_on=now() where id='".$id."' ";
$stmt = $conn->prepare($update_status);
$stmt->execute();

}






