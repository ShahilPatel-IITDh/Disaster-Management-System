<?php 
extract($_POST);
if(isset($save))
{

	if($fn=="" || $ln=="" || $group=="" || $gen=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
$sql=mysqli_query($conn,"select * from member where first_name='$fn' and group_id='$group'");
$r=mysqli_num_rows($sql);
		if($r!=true)
		{
		mysqli_query($conn,"insert into member values('','$fn','$ln','$gen','$group',now())");
		
		$err="<div class='alert alert-success'>New member has been added successfully</div>";
		}
		
		else
		{

	$err="<div class='alert alert-danger'>This member and Group already exists</div>";
		
		}
	}
}

?>
<h2 class="text-center">Add New Member</h2>
<form method="post">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Member's First Name</div>
		<div class="col-sm-5">
		<input type="text" name="fn" class="form-control" required/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Member's Last Name</div>
		<div class="col-sm-5">
		<input type="text" name="ln" class="form-control" required /></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Select Group</div>
		<div class="col-sm-5">
		<select name="group" class="form-control" required>
			<option value="">Select Group</option>
			<?php 
$q1=mysqli_query($conn,"select * from groups");
while($r1=mysqli_fetch_assoc($q1))
{
echo "<option value='".$r1['group_id']."'>".$r1['group_name']."</option>";
}
			?>
		</select>
		</div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Gender</div>
		<div class="col-sm-5">
		Male <input type="radio" name="gen" value="m" required/>
	Female <input type="radio" name="gen" value="f" />
		</div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
	<div class="col-sm-4"></div>
		<div class="col-sm-4">
		
		
<input type="submit" value="Add New Member" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-danger"/>
		</div>
		<div class="col-sm-4"></div>
	</div>
</form>	