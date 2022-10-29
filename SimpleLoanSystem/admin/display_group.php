<?php 
	$q=mysqli_query($conn,"select * from groups");
	$rr=mysqli_num_rows($q);
	if(!$rr)
	{
		echo "<h2 style='color:red'>No any Group exists !!!</h2>";
		echo "<a style='text-decoration:underline' href='index.php?page=add_group'>Add New Group ?</a>";
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
<h2>All Groups</h2>

<table class="table table-bordered table-hover table-striped">
	<tr>
		<form method="post" action="index.php?page=search_group">
		<td colspan="8">
		<input type="text"  placeholder="Search Group" name="searchGroup" class="form-control" required />
		</td>
		<td colspan="8">
		<input type="submit" value="Search Group" name="sub" class="btn btn-warning" /> 
		</td>
		</form>
	</tr>
	
	<tr>
		<td colspan="16"><a href="index.php?page=add_group"><button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span> Add New Group</button></a></td>
	</tr>
	<Tr class="active">
		<th>#</th>
		<th>Name</th>
		<th>Region</th>
		<th>District</th>
		<th>Division</th>
		<th>Ward</th>
		<th>Village</th>
		<th>Reg No</th><th>Activity</th>
		<th>Category</th><th>Total Member</th>
		<th>Leader</th><th>Loan Info.</th>
		<th>Capital</th>
		<th>Action</th>
		<!--<th>Update</th>-->
	</Tr>
		<?php
         error_reporting(1);
         $rec_limit =10;
         
         /* Get total number of records */
        
		 $sql = "SELECT count(group_id) FROM groups ";
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
         $sql = "SELECT * ". "FROM groups ".
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


	<?php 

	echo "</Tr>";
	$inc++;
}




//for shoing Pagination

echo "<tr><td colspan='15'>";
if( $pagi > 0 )
 {
         $last = $pagi - 2;
      echo "<a href = \"index.php?page=display_group&pagi=$last\">Last 10 Records</a> |";
        echo "<a href = \"index.php?page=display_group&pagi=$pagi\">Next 10 Records</a>";
         
		 }
		 else if( $pagi == 0 )
		  {
     echo "<a href = \"index.php?page=display_group&pagi=$pagi\">Next 10 Records</a>";
         }
		 else if( $left_rec < $rec_limit ) {
            $last = $pagi - 2;
            echo "<a href = \"index.php?page=display_group&pagi=$last\">Last 10 Records</a>";
         }
        echo "</td></tr>"; 
		?>
		
</table>
<?php }?>