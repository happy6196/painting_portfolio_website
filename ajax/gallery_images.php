<?php
require_once('../lib/configin.php');
$id=$_REQUEST['id'];
$type=$_REQUEST['type'];

if($type=="gallery_images")
{
$fetch="SELECT *FROM ti_gallery ORDER by serial ASC";
$res=mysql_query($fetch);

if($res)
{
?>
<br/>
<table border= "1" cellpadding="20" class="images2">
    <tr>
    	<th>Thumb</th>
       
        <th >Caption</th>
        <th >Alt Text</th>
        <th> &nbsp;</th>
        <th> &nbsp;</th>
        
    </tr>
  
<?php
while($img_row=mysql_fetch_array($res))
{
?>

<tr id="<?php echo $img_row['id']; ?>">
<td><img  src="../images/gallery/<?php echo $img_row['image']; ?>" width="150" height="150" ></td>
<td><textarea col="6" rows="4" id="<?php echo 'savedtitle'.$img_row['id']; ?>" name='savedtitle'><?php echo $img_row['title']; ?></textarea></td>
<td><textarea col="6" rows="4" id="<?php echo 'savedalttext'.$img_row['id']; ?>"  name='savedalttext'><?php echo $img_row['alttext']; ?></textarea></td>
<td><input type="text" style="width:35px" id="<?php echo 'savedimgserial'.$img_row['id']; ?>" value="<?php echo $img_row['serial']; ?>" name='savedimgserial'></td>
<td><div id="<?php echo 'div_name'.$img_row['id']; ?>" style="display:none;margin-left:3px;"><img src="check.png" ></div><button style="margin-left: 1px;margin-top:3px;" type="button" onclick="document.getElementById('<?php echo 'div_name'.$img_row['id']; ?>').style.display='',save_img_detailsz(<?php echo $img_row['id']; ?>,document.getElementById('<?php echo 'savedimgserial'.$img_row['id']; ?>').value,document.getElementById('<?php echo 'savedtitle'.$img_row['id']; ?>').value,document.getElementById('<?php echo 'savedalttext'.$img_row['id']; ?>').value,'savedimgdetails');" class="button radius">Save</button> <button style="margin-left: 1px;margin-top:3px;" type="button" onclick="delete_img_details(<?php echo $img_row['id']; ?>,'deleteimgdetails');" class="button alert radius">Delete</button></td>
<div id="savedimgdetails"></div>
</tr>


<?php
}
 ?>
</table>
<?php 
}
}