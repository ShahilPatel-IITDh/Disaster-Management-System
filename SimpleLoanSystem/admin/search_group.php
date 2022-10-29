<?php 
$search=$_POST['searchGroup'];
$q=mysqli_query($conn,"select * from groups where group_name='$search' or 	registration_number='$search'");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<div class='alert alert-danger'><h2>Record does not exist!</h2></div>";
}
else
{
?>
<script>
	function DeleteGrop(id)
	{
		if(confirm("You want to delete this Group ?"))
		{
		window.location.href="delete_group.php?id="+id;
		}
	}
</script>
<h2 align="center">Search Results</h2>

<table class="table table-bordered table-hover">
	
	
	<tr>
		<td colspan="16"><a href="index.php?page=display_group">Go Back to Group Page</a></td>
	</tr>
	<Tr class="active">
		<th>#</th>
		<th>Group</th>
		<th>Region</th>
		<th>District</th>
		<th>Division</th>
		<th>Ward</th>
		<th>Village</th>
		<th>Reg No</th><th>Activity</th>
		<th>Category</th><th>Total Member</th>
		<th>Leader</th><th>Loan Info.</th>
		<th>Capital</th>
		<th>Delete</th>
		<!--<th>Update</th>-->
	</Tr>
		<?php 


	$i=1;
	while($row=mysqli_fetch_assoc($q))
	{

	echo "<Tr>";
	echo "<td>".$i."</td>";
	echo "<td>".$row['group_name']."</td>";
	$query=mysqli_query($conn,"select * from region where region_id='".$row['region']."'");
				$row1 = mysqli_fetch_array($query, MYSQL_ASSOC);
				echo "<td>".$row1['region_name']."</td>";

	$query1=mysqli_query($conn,"select * from district where district_id='".$row['district']."'");
				$row2 = mysqli_fetch_array($query1, MYSQL_ASSOC);
				echo "<td>".$row2['district_name']."</td>";

	$query2=mysqli_query($conn,"select * from division where division_id='".$row['division']."'");
				$row3 = mysqli_fetch_array($query2, MYSQL_ASSOC);
				echo "<td>".$row3['division_name']."</td>";

				$query3=mysqli_query($conn,"select * from ward where ward_id='".$row['ward']."'");
				$row4 = mysqli_fetch_array($query3, MYSQL_ASSOC);
				echo "<td>".$row4['ward_name']."</td>";

	$query4=mysqli_query($conn,"select * from village where village_id='".$row['village']."'");
				$row5 = mysqli_fetch_array($query4, MYSQL_ASSOC);
				echo "<td>".$row5['village_name']."</td>";

	echo "<td>".$row['registration_number']."</td>";
	echo "<td>".$row['group_activity']."</td>";
	echo "<td>".$row['group_category']."</td>";
	echo "<td>".$row['group_total_members']."</td>";
	echo "<td>".$row['group_leader']."</td>";
	echo "<td>".$row['loan_information']."</td>";
	echo "<td>".'$'.$row['group_capital']."</td>";
?>

<Td><a href="javascript:DeleteGrop('<?php echo $row['group_id']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td>

<!--<Td><a href="index.php?page=update_group" style='color:green'><span class='glyphicon glyphicon-edit'></span></a></td>-->

<?php 
echo "</Tr>";
$i++;
}
		?>
		
</table>
<?php }?>