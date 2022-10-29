<?php 
$q=mysqli_query($conn,"select * from loan");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any Payment Records found !!!</h2>";
echo "<a style='text-decoration:underline' href='index.php?page=add_loan'>Add  New Payment Record ?</a>";
}
else
{
?>
<script>
	function Deleteloan(id)
	{
		if(confirm("You want to delete this Record ?"))
		{
		window.location.href="delete_payment_record.php?id="+id;
		}
	}
</script>
<h2 align="center">All Payment Records</h2>

<table class="table table-bordered table-hover table-striped">
	<tr>
		<form method="post" action="index.php?page=search_loan">
		<td colspan="3">
		<select name="seachLoan" class="form-control" required>
			<option value="">---Select Group---</option>
			<?php 
$q1=mysqli_query($conn,"select * from groups");
while($r1=mysqli_fetch_assoc($q1))
{
echo "<option value='".$r1['group_id']."'>".$r1['group_name']."</option>";
}
			?>
		</select>
		</td>
		<td colspan="3">
		<input type="submit" value="Search Loan" name="sub" class="btn btn-warning" />
		</td>
		</form>
	</tr>
	<tr>
		<td colspan="6">
		
		<a title="Add New Payment Records" href="index.php?page=add_payment_history"><button class="btn btn-success btn-sm">Add Payment Details <span class="glyphicon glyphicon-plus"></button></a>
		&nbsp; &nbsp; 
		
		<a title="Print all Loan Records" href="print_payment_record.php"><button class="btn btn-primary btn-sm">Print <span class="glyphicon glyphicon-print"></button></a>
		
		</td>
	</tr>
	<Tr class="active">
		<th>#</th>
		<th>Group</th>
		<th>EMI Paid</th>
		<th>Payment Date</th>
		<th>Actions</th>
	</Tr>
		<?php
         error_reporting(1);
         $rec_limit =10;
         
         /* Get total number of records */
        
		 $sql = "SELECT count(payment_id) FROM payment_history ";
         $retval = mysqli_query($conn,$sql);
         
         if(! $retval )
		  {
            die('Could not get data: ' . mysqli_error());
         }
         $row = mysqli_fetch_array($retval, MYSQL_NUM );
         $rec_count = $row[0];
         
         if( isset($_GET{'pagi'} ) ) {
            $pagi = $_GET{'pagi'} + 1;
            $offset = $rec_limit * $pagi ;
         }else {
            $pagi = 0;
            $offset = 0;
         }
         
		 
         $left_rec = $rec_count - ($pagi * $rec_limit);
         $sql = "SELECT * ". "FROM payment_history ".
            "LIMIT $offset, $rec_limit";
            
         $retval = mysqli_query($conn, $sql);
         
         if(! $retval )
		  {
            die('Could not get data: ' . mysqli_error());
         }
         
         $inc=1;
		 while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
		  {
		  
           echo "<Tr>";
echo "<td>".$inc."</td>";


$q1=mysqli_query($conn,"select * from groups where group_id='".$row['group_id']."'");
$r1=mysqli_fetch_assoc($q1);

echo "<td>".$r1['group_name']."</td>";

echo "<td>".'$'.$row['amount_paid']."</td>";
echo "<td>".$row['payment_date']."</td>";

        
         

?>

<Td><a href="javascript:Deleteloan('<?php echo $row['payment_id']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a>

<a href="index.php?page=update_loan_record&loan_id=<?php echo $row['loan_id']; ?>" style='color:green'><span class='glyphicon glyphicon-edit'></span></a></td>



<?php 

echo "</Tr>";
$inc++;
}




//for shoing Pagination

echo "<tr><td colspan='6'>";
if( $pagi > 0 )
 {
         $last = $pagi - 2;
      echo "<a href = \"index.php?page=display_payment_history&pagi=$last\">Last 10 Records</a> |";
        echo "<a href = \"index.php?page=display_payment_history&pagi=$pagi\">Next 10 Records</a>";
         
		 }
		 else if( $pagi == 0 )
		  {
     echo "<a href = \"index.php?page=display_payment_history&pagi=$pagi\">Next 10 Records</a>";
         }
		 else if( $left_rec < $rec_limit ) {
            $last = $pagi - 2;
            echo "<a href = \"index.php?page=display_payment_history&pagi=$last\">Last 10 Records</a>";
         }
        echo "</td></tr>"; 
		?>
		
</table>
<?php }?>