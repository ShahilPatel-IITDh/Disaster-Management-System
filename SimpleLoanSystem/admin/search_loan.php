<?php 
$search=$_POST['seachLoan'];
//echo $search;	
$q=mysqli_query($conn,"select * from loan  where group_id='$search'");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<div class='alert alert-danger'><h2>No Result Found!</h2></div>";

}
else
{
?>
<script>
	function Deleteloan(id)
	{
		if(confirm("You want to delete this Record ?"))
		{
		window.location.href="delete_loan_record.php?id="+id;
		}
	}
</script>
<h2 align="center" >Search Results</h2>

<table class="table table-bordered">
	
	<tr>
		<td colspan="9"><a href="index.php?page=display_loan">Go Back </a></td>
	</tr>
	<Tr class="active">
		<th>#</th>
		<th>Name</th>
		<th>Loan Source</th>
		<th>Amount</th>
		<th>Interest</th>
		<th>Payment Schedule</th>
		<th>Due Date</th>
		<th>Actions</th>
	</Tr>
		<?php 


$i=1;
while($row=mysqli_fetch_assoc($q))
{

echo "<Tr>";
echo "<td>".$i."</td>";


$q1=mysqli_query($conn,"select * from groups where group_id='".$row['group_id']."'");
$r1=mysqli_fetch_assoc($q1);

echo "<td>".$r1['group_name']."</td>";
echo "<td>".$row['loan_come_from']."</td>";
echo "<td>".'$'.$row['loan_amount']."</td>";
echo "<td>".$row['loan_interest'].'%'."</td>";
echo "<td>".$row['payment_schedule']."</td>";
echo "<td>".$row['due_date']."</td>";

?>

<Td><a href="javascript:Deleteloan('<?php echo $row['loan_id']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a>
<a href="index.php?page=update_loan_record&loan_id=<?php echo $row['loan_id']; ?>" style='color:green'><span class='glyphicon glyphicon-edit'></span></a></td>
<?php 

echo "</Tr>";
$i++;
}
		?>
		
</table>
<?php }?>