<?php 
extract($_POST);
if(isset($save))
{

mysqli_query($conn,"update member set first_name='$fn',last_name='$ln',gender='$gen',group_id='$group' where member_id='".$_GET['member_id']."' ");
		
$err="<font color='blue'>Members Updated</font>";
		
}

$sql=mysqli_query($conn,"select * from member where member_id='".$_GET['member_id']."'");
$r=mysqli_fetch_array($sql);

?>
<h2 align="center">Update Group Member</h2>
<form method="post">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Member's First Name</div>
		<div class="col-sm-5">
		<input type="text" value="<?php echo $r[1]; ?>" name="fn" class="form-control" required/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Member's Last Name</div>
		<div class="col-sm-5">
		<input type="text" value="<?php echo $r[2]; ?>" name="ln" class="form-control" /></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Select Group</div>
		<div class="col-sm-5">
		<select name="group" class="form-control" required>
			<option value="">---Select Group---</option>
			<?php 
$q1=mysqli_query($conn,"select * from groups");
while($r1=mysqli_fetch_assoc($q1))
{
?>
<option <?php if($r[4]==$r1['group_id']){echo "selected";} ?> 
value="<?php echo  $r1['group_id'];?> "><?php echo $r1['group_name']; ?></option>
<?php 
}
			?>
		</select>
		</div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Member's Gender</div>
		<div class="col-sm-5">
		Male <input type="radio" <?php if($r[3]=="m"){echo "checked";} ?> name="gen" value="m" required/>
	Female <input type="radio" <?php if($r[3]=="f"){echo "checked";} ?> name="gen" value="f" />
		</div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		
		
<input type="submit" value="Update Member" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-danger"/>
		</div>
	</div>
</form>	