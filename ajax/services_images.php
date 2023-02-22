<?php
require_once('../lib/config.php');
//require_once('inc.php');
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];
$rcx=1;
if($type=="service_images")
{
$fetch="SELECT *FROM services_images WHERE galid='".$id."' ORDER by serial ASC";
//$res=mysql_query($fetch);
 $stmt = $conn->prepare($fetch); 
     $stmt->execute();
    

if($stmt)
{
?>
<br/>
<div class="table-responsive">
<table cellpadding="20" class="table">
    <tr>
        <th>#</th>
    	<th>Thumb</th>
       
        <th >Caption</th>
        <th >Alt Text</th>
        <th>Serial</th>
        <th>&nbsp;</th>
         <th>&nbsp;</th>
        
    </tr>
  
<?php
while($img_row = $stmt->fetch(PDO::FETCH_ASSOC))
{
?>

<tr id="<?php echo $img_row['id']; ?>">
    <td><?php echo $rcx; ?></td>
<td><img style="float:left;margin-left:10px;" src="../images/gallery/<?php echo $img_row['image']; ?>" width="150" height="150" ></td>
<td><textarea col="6" rows="4" id="<?php echo 'savedtitle'.$img_row['id']; ?>" name='savedtitle'><?php echo $img_row['title']; ?></textarea></td>
<td><textarea col="6" rows="4" id="<?php echo 'savedalttext'.$img_row['id']; ?>"  name='savedalttext'><?php echo $img_row['alttext']; ?></textarea></td>
<td><input type="text" style="width:35px" id="<?php echo 'savedimgserial'.$img_row['id']; ?>" value="<?php echo $img_row['serial']; ?>" name='savedimgserial'></td>
<td><?php if($img_row['feature']=='yes') { echo "<font color='red'>Featured</font>";} ?></td>
<td><div id="<?php echo 'div_name'.$img_row['id']; ?>" style="display:none;margin-left:3px;"><img src="check.png" ></div><button style="margin-left: 1px;margin-top:3px;" type="button" class="btn btn-success" onclick="set_featured(<?php echo $id;?>,<?php echo $img_row['id']?>,'set_featured');" class="button radius">Set As Featured</button><button style="margin-left: 1px;margin-top:3px;" class="btn btn-primary" type="button" onclick="document.getElementById('<?php echo 'div_name'.$img_row['id']; ?>').style.display='',save_img_detailsz(<?php echo $img_row['id']; ?>,document.getElementById('<?php echo 'savedimgserial'.$img_row['id']; ?>').value,document.getElementById('<?php echo 'savedtitle'.$img_row['id']; ?>').value,document.getElementById('<?php echo 'savedalttext'.$img_row['id']; ?>').value,'savedimgdetails');" class="button radius">Save</button><button style="margin-left: 1px;margin-top:3px;" type="button" onclick="delete_img_details(<?php echo $img_row['id']; ?>,'deleteimgdetails');" class="btn btn-danger">Delete</button></td>
<div id="savedimgdetails"></div>
<div id="set_featured"></div>
</tr>


<?php
$rcx++;}
 ?>
</table></div>
<?php 
}
}