<?php include('config.php');
$pid= $_REQUEST['pid'];

if(isset($_REQUEST['action']) && $_REQUEST['action']!=""  ) // after form has been submitted
{
    
   if(isset($_REQUEST['ids']))
   {
    
        $ids=implode(',', $_REQUEST['ids']);
	
   
		if(isset($_REQUEST['action']) && $_REQUEST['action']=='p' )
		{
		    $query=" UPDATE image_details SET status='p' WHERE id IN ($ids) ";
			
			$stmt = $conn->prepare($query);
            $stmt->execute();
		}

		if(isset($_REQUEST['action']) && $_REQUEST['action']=='u' )
		{
			$query=" UPDATE image_details SET status='u' WHERE id IN ($ids) ";
			
			$stmt = $conn->prepare($query);
                        $stmt->execute();
		}

		if(isset($_REQUEST['action']) && $_REQUEST['action']=='d' )
		{
			$query=" DELETE FROM image_details WHERE id IN ($ids) ";
			$stmt = $conn->prepare($query);
            $stmt->execute();
		}
    
    

   }
    
    
   }


$status="p";

if(isset($_REQUEST['itemstatus']) && $_REQUEST['itemstatus']!="")
{
    $status=$_REQUEST['itemstatus'];
}




?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Painting's List</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
                <link rel="icon" type="image/png" href="assets/images/aderlin_favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
     <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
      .content-wrapper{margin-left:0px;}
  
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
     <?php include('assets/startup.php');?>
<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
        <h1 >
            <span style="font-size: 15px;"><a href=""> Home </a> > Painting's List</span>
      </h1>
      
         <ol class="breadcrumb">
            <li> 
                 <button style="margin-left:20px;margin-right: 30px;margin-top:-10px;" class="btn btn-info btn-icon" 
                     name="save" id="save" type="button" onclick="location.href='image_upload.php'" >Add New</button>
            </li>
        </ol> 
    </section>
    
<form action="" name="frm" id="frm" method="POST" >  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      

          <div class="box">
              <div class="box-header"><h3 class="box-title">Menu list</h3>
             <span style="float: right"> <div class="col-sm-6">    
                      <select  class="form-control" name="action" id="action" >
                         <option  value="" Selected="selected" >Bulk Action</option>
                                       <option value="p">Publish</option>
                                       <option value="u">Un-Publish</option>
                                       <option value="d">Delete</option></select>
                              </div><div class="col-sm-6">    <select  name="itemstatus" id="itemstatus" class="form-control">
                                       <option <?php if($status=='p')  echo "selected='selected'"; ?> value="p" >Published </option>
                                       <option <?php if($status=='u')  echo "selected='selected'"; ?> value="u" >Un-published </option>
                                       <option <?php if($status=='a')  echo "selected='selected'"; ?> value="a" >All </option>
                                  </select>
                              </div>
                              </span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" data-page-length='50'>
                <thead>
                                    <tr> <th><input type="checkbox" name="checkall" id="checkall" onclick="check_all(this.form);"></th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Painting's</th>
                                        <th>Painting's Description</th>
                                        <th>Painting's Size</th>
                                        <!--<th>Town Status</th>-->
                                        <th>Updated on</th>
                                        <th>Status</th>
                                        <th>Serial</th>
                                        <th>Action</th>
                                    
                                    </tr>
                            </thead>
                   <tbody> <?php 
                
                   $query="SELECT * FROM image_details where 1=1 "; 
                   if($status!='a')
                   { $query.= "and status='".$status."'" ;}
                   $query.= "order by id desc" ;  
                   $query;
                   $stmt = $conn->prepare($query);
                   $stmt->execute();

       
                    while($arr = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      
        
                ?>
                                    <tr id="<?php echo $arr['id']; ?>">
                                        <td><input  type="checkbox" name="ids[]" value="<?php echo $arr['id']; ?>" ></td>
                                        <td><?php echo $arr['title']; ?></td>
                                        <td><?php echo $arr['category_name']; ?></td>
                                        <td><img src="images/portfolio/<?php echo $arr['image_name']; ?>" width="75" height="100" ></td>  
                                        <td><?php echo $arr['image_medium']; ?></td>
                                    
                                       
                                    -->    
                                        <td><?php 
                                        
                                           if(strlen($arr['updated_on']) > 0 ){
                                        
                                                    echo date("d M  Y", strtotime($arr['updated_on'])); 
                                                    
                                            }else{
                                                
                                                    echo date("d M  Y", strtotime($arr['date_created'])); 
                                                
                                            }
                                            
                                         ?>    
                                        </td>
                                   
                                   
                                        <td> <label class="switch"><input type="checkbox" onchange="updatestatus('<?php echo $arr['id']; ?>','<?php echo $arr['status']; ?>');" id="<?php echo $arr['id']; ?>" <?php if($arr['status']=='p') { echo "checked"; }?>><span class="slider round"></span></label></td>
                                    
                                    <td><input type="text" onchange="update_serialorder('<?php echo $arr['id']; ?>','blog')"
                                               id="category_id_<?php echo $arr['id']; ?>" value = "<?php echo $arr['serial']; ?>" style="width: 40px;" data-color="#00b19d"/></td>
                               
                                    
                                    
                                    
                                    <td>   <button type="button" class="btn btn-success" data-toggle="dropdown" aria-expanded="false" onclick="location.href='image_upload.php?ref=<?php echo $arr['id']; ?>'">Descp/Edit<span class="m-l-5"></span></button>
                        
                        </td>
    </tr><?php } ?>
                                    
                                   
                    </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content --></form>
  </div>
  <!-- /.content-wrapper -->

 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

       <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/js/jquery.core.js"></script>
            <script type="text/javascript">

$('#action').change(function()
 {
$('#frm').submit();
 });
 

$('#itemstatus').change(function()
 {
     $('#frm').submit();
 });
 
$('#flag').change(function()
 {
     $('#frm').submit();
 }); 
 
 
</script>
        <script>
    
 function check_all(frm) // on clicking the uppermost checkbox, all checkboxes gets clicked.
{	
	var element=document.getElementById('checkall');
    console.log (frm);
	if(element.checked==true)
	{

		for(var i=0; i<frm.elements.length; i++)
		{
			if(frm.elements[i].type=='checkbox')
			{
				frm.elements[i].checked=true;
			}
		}

	}
	else if(element.checked==false)
	{
		for(var i=0; i<frm.elements.length; i++)
		{
			if(frm.elements[i].type=='checkbox')
			{
				frm.elements[i].checked=false;
			}
		}	
	}	
}


</script>
<script>
    function updatestatus(elm,status) // fetching states 
{
      

  $.ajax({
    url: "ajax/update_status_blog_pages.php?id="+elm+"&status="+status+"&page=blog",
  
 success:function(data){
  //alert(data);
 $('#update_status').html(data);
 $('#update_status').show();
setTimeout(function() {
$("#update_status").hide('blind', {}, 500)
}, 500);
$('tr#'+elm).hide(1000);
$('#update_status').hide(5000);
  },
  
  context: document.body
}).done(function() {

}); 
} 



function update_serialorder(elm,page) // fetching states 
{
      
var serial_value = $('#category_id_'+elm).val();

//alert(serial_value);

$.ajax({
      
  url: "ajax/update_serialorder.php?id="+elm+"&serial="+serial_value+"&page="+page,
  
 success:function(data){
   // alert('Serial order is updated successfully');
  },
  
  context: document.body

}).done(function() {

}); 
} 







    
</script>
<script>
    function updatefeature(elm1,feature1) // fetching states 
    
{
     // alert('11111');
    //alert(elm1);
    //alert(feature1);

  $.ajax({
  url: "ajax/update_status_page.php?feature_id="+elm1+"&feature="+feature1,
  
 success:function(data){
  //alert(data);
 $('#update_status').html(data);
 $('#update_status').show();
setTimeout(function() {
$("#update_status").hide('blind', {}, 500)
}, 500);
//$('tr#'+elm1).hide(1000);
$('#update_status').hide(5000);
  },
  
  context: document.body
}).done(function() {

}); 
} 


    
</script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
