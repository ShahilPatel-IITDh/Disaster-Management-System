<?php 
extract($_POST);
if(isset($save))
{

$sql=mysqli_query($conn,"select * from groups where group_name='$g_name' or registration_number='$reg_no'");
$r=mysqli_num_rows($sql);
		if($r!=true)
		{
		mysqli_query($conn,"insert into groups values('','$g_name','$region','$district','$division','$ward','$village','$reg_no','$activity','$category','$members','$leader','$loan','$capital',now())");
		
$err="<div class='alert alert-success'>New Group has been added successfully!</div>";
		}
		
		else
		{

	$err="<div class='alert alert-danger'>This Group name or Registration number already exists choose diff group name</div>";
		
	
	}
}

?>
<script src="add_group.js"></script>
<h2 align="center">Add New Group</h2>
<form method="post">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Group Name</div>
		<div class="col-sm-5">
		<input type="text" name="g_name" pattern="[a-z A-Z]*" class="form-control" required/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Registration Number</div>
		<div class="col-sm-5">
		<input type="text" name="reg_no" class="form-control" required/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Group Activity</div>
		<div class="col-sm-5">
		<select name="activity" class="form-control" required>
			<option value="">---Select Activity---</option>
			<option>Activity 1</option>
			<option>Activity 2</option>
			<option>Activity 3</option>
			<option>Activity 4</option>
		</select>
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Group Category</div>
		<div class="col-sm-5">
		<select name="category" class="form-control" required>
			<option value="">---Select Group Category---</option>
			<option>Group of Men only </option>
			<option>Group of Women only</option>
			<option>Group of both Men and Women</option>
			<option>Group of Youth only</option>
		</select>
		</div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Group Total Members</div>
		<div class="col-sm-5">
		<input type="number" pattern="[0-9]*" class="form-control" name="members"  />
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Group Leader Name</div>
		<div class="col-sm-5">
		<input type="text" pattern="[a-z A-Z]*" class="form-control" name="leader" required />
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Loan Information</div>
		<div class="col-sm-5">
		<input type="text" class="form-control" name="loan"  />
		</div>
	</div>	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Group Capital</div>
		<div class="col-sm-5">
		<input type="number" pattern="[0-9]*" class="form-control" name="capital"  required/>
		</div>
	</div>	
	
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Select Region</div>
		<div class="col-sm-5">
		<select onchange="showDistrict(this.value)"  name="region" class="form-control" required>
			<option value="">---Select Region---</option>
			<?php 
				$region=mysqli_query($conn,"select * from region");
				while($reg1=mysqli_fetch_assoc($region))
				{?>
				<option value="<?php echo $reg1['region_id'];?>"><?php echo $reg1['region_name'];?></option>
				<?php 
				}
			?>
		</select>
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Select District</div>
		<div class="col-sm-5">
		<select name="district" onchange="showDivision(this.value)" id="district" class="form-control" >
			<option value="">---Select District---</option>	
		</select>
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Select Division</div>
		<div class="col-sm-5">
		<select name="division" onchange="showWard(this.value)"  id="division" class="form-control" >
			<option value="">---Select Division---</option>	
		</select>
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Select Ward</div>
		<div class="col-sm-5">
		<select name="ward" onchange="showVillage(this.value)" id="ward" class="form-control" >
			<option value="">---Select Ward---</option>	
		</select>
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Select Village</div>
		<div class="col-sm-5">
		<select name="village" id="village"  class="form-control" >
			<option value="">---Select Village---</option>	
		</select>
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
		
		
		<input type="submit" value="Add New Group" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-danger"/>
		</div>
		<div class="col-sm-4"></div>
	</div>
</form>	