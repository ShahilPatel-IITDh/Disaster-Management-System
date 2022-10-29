<?php 
$q=mysqli_query($conn,"select * from member ");
$r=mysqli_num_rows($q);



$q2=mysqli_query($conn,"select * from member where gender='m'");
$r2=mysqli_num_rows($q2);


$q3=mysqli_query($conn,"select * from member where gender='f'");
$r3=mysqli_num_rows($q3);




$q1=mysqli_query($conn,"select * from groups ");
$r1=mysqli_num_rows($q1);

$q7=mysqli_query($conn,"select * from loan");
$r4=mysqli_num_rows($q7);

$q8=mysqli_query($conn,"select * from payment_history");
$r8=mysqli_num_rows($q8);



?>
<h1 class="page-header">Dashboard</h1>
<div class="row placeholders">
  <div class="col-xs-6 col-sm-3 placeholder">
    <img src="../images/groupficn.png" width="150" height="150" class="img-responsive"
      alt="Generic placeholder thumbnail">
    <h4>Total Groups</h4>
    <span class="text-muted"><?php echo $r1; ?></span>
  </div>
  <div class="col-xs-6 col-sm-3 placeholder">
    <img src="../images/memberficn.png" width="150" height="150" class="img-responsive"
      alt="Generic placeholder thumbnail">
    <h4>Total Members</h4>
    <span class="text-muted"><?php echo $r; ?></span>
  </div>
  <div class="col-xs-6 col-sm-3">
    <img src="../images/loanficn.png" width="150" height="150" class="img-round" alt="Generic placeholder thumbnail">
    <h4>Loan Alloted</h4>
    <span class="text-muted"><?php echo $r4; ?></span>
  </div>
  <div class="col-xs-6 col-sm-3 placeholder">
    <img src="../images/paidficn.png" width="150" height="150" class="img-round" alt="Generic placeholder thumbnail">
    <h4>Paid List</h4>
    <span class="text-muted"><?php echo $r8; ?></span>
  </div>

</div>

<div class="row placeholders">
  <div class="col-xs-6 col-sm-3 placeholder">
    <img src="../images/menficn.png" width="150" height="150" class="img-responsive"
      alt="Generic placeholder thumbnail">
    <h4>Total Men Members</h4>
    <span class="text-muted"><?php echo $r2; ?></span>
  </div>
  <div class="col-xs-6 col-sm-3 placeholder">
    <img src="../images/womenficn.png" width="150" height="150" class="img-responsive"
      alt="Generic placeholder thumbnail">
    <h4>Total Women Members</h4>
    <span class="text-muted"><?php echo $r3; ?></span>
  </div>
</div>