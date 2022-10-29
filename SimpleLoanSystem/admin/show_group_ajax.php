<?php
include('../connection.php'); 
 extract($_GET);
 

//for showiong district 
if(isset($district))
 {
$r=mysqli_query($conn,"select * from district where region_id='".$district."'");
while($r1=mysqli_fetch_assoc($r))
{?>
<option value="<?php echo $r1['district_id'];?>">
<?php echo $r1['district_name'];?></option>
<?php 
}
}
//District end


//for Division Start 
if(isset($division))
 {
$r=mysqli_query($conn,"select * from division where district_id='".$division."'");
while($r1=mysqli_fetch_assoc($r))
{?>
<option value="<?php echo $r1['division_id'];?>">
<?php echo $r1['division_name'];?></option>
<?php 
}
}
//Division end



//for Ward Start 
if(isset($ward))
 {
$r=mysqli_query($conn,"select * from ward where division_id='".$ward."'");
while($r1=mysqli_fetch_assoc($r))
{?>
<option value="<?php echo $r1['ward_id'];?>">
<?php echo $r1['ward_name'];?></option>
<?php 
}
}
//ward end


//for Village Start 
if(isset($village))
 {
$r=mysqli_query($conn,"select * from village where ward_id='".$village."'");
while($r1=mysqli_fetch_assoc($r))
{?>
<option value="<?php echo $r1['village_id'];?>">
<?php echo $r1['village_name'];?></option>
<?php 
}
}
//ward end



//for Display Loan Details 
if(isset($loan_details))
 {
$l=mysqli_query($conn,"select * from loan where group_id='".$loan_details."'");
$l1=mysqli_fetch_assoc($l);
?>
<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Original Amount</div>
		<div class="col-sm-5">
		<input type="number" value="<?php echo $l1['loan_amount']; ?>" readonly="true" id="original" name="amount" class="form-control" required/></div>
	</div>
	
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Loan Intereset(%)</div>
		<div class="col-sm-5">
		<input type="text" value="<?php echo $l1['loan_interest']; ?>" name="intereset" id="interest" readonly="true" class="form-control" required/></div>
	</div>
	

	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Term of Payment(In Year)</div>
		<div class="col-sm-5">
		<input type="text" readonly="true" value="<?php echo $l1['payment_term']; ?>"  name="payment_term" id="payment_term" class="form-control" >
			
			
		</div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Total Payment(With Intereset)</div>
		<div class="col-sm-5">
		<input type="text" value="<?php echo $l1['total_payment_with_intereset']; ?>" readonly="true" id="total_paid" name="total_paid" class="form-control" readonly/></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Pay Every Month(Emi Per Month)</div>
		<div class="col-sm-5">
		<input type="text" value="<?php echo $l1['emi_per_month']; ?>" readonly="true" id="emi_per_month" name="emi_per_month" class="form-control" readonly/></div>
	</div>

<?php 
}
//Loan Details end

	
?>