<?php 
$q=mysqli_query($conn,"select * from member");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any Group Member exists !!!</h2>";
echo "<a style='text-decoration:underline' href='index.php?pagi=add_group_member'>Add New Member ?</a>";}
else
{
?>
<script>
	function DeleteMember(id)
	{
		if(confirm("You want to delete this Member ?"))
		{
		window.location.href="delete_group_member.php?id="+id;
		}
	}
</script>
<h2>All Group Members</h2>

<table class="table table-bordered table-hover table-striped">
	<tr>
		<form method="post" action="index.php?page=search_member">
		<td colspan="4">
		<input type="text" placeholder="Search Member" name="searchMember" class="form-control"required />
		</td>
		<td colspan="4">
		<input type="submit" value="Search Member" name="sub" class="btn btn-warning" />
		</td>
		</form>
	</tr>
	<tr>
		<td colspan="8"><a href="index.php?page=add_group_member"><button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span> Add New Member</button></a></td>
	</tr>
	<Tr class="active">
		<th>#</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Gender</th>
		<th>Group</th>
		<th>Date</th>
		<th>Actions</th>
		
	</Tr>
		<?php
         error_reporting(1);
         $rec_limit =10;
         
         /* Get total number of records */
        
		 $sql = "SELECT count(member_id) FROM member ";
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
         $sql = "SELECT * ". "FROM member ".
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
echo "<td>".$row['first_name']."</td>";
echo "<td>".$row['last_name']."</td>";
echo "<td>".$row['gender']."</td>";

$q1=mysqli_query($conn,"select * from groups where group_id='".$row['group_id']."'");
$r1=mysqli_fetch_assoc($q1);

echo "<td>".$r1['group_name']."</td>";
echo "<td>".$row['join_date']."</td>";
        
         

?>

<Td><a href="javascript:DeleteMember('<?php echo $row['member_id']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a>

<a href="index.php?page=update_group_member&member_id=<?php echo $row['member_id']; ?>" style='color:green'><span class='glyphicon glyphicon-edit'></span></a></td>
<?php 

echo "</Tr>";
$inc++;
}




//for shoing Pagination

echo "<tr><td colspan='8'>";
if( $pagi > 0 )
 {
         $last = $pagi - 2;
      echo "<a href = \"index.php?page=display_member&pagi=$last\">Last 10 Records</a> |";
        echo "<a href = \"index.php?page=display_member&pagi=$pagi\">Next 10 Records</a>";
         
		 }
		 else if( $pagi == 0 )
		  {
     echo "<a href = \"index.php?page=display_member&pagi=$pagi\">Next 10 Records</a>";
         }
		 else if( $left_rec < $rec_limit ) {
            $last = $pagi - 2;
            echo "<a href = \"index.php?page=display_member&pagi=$last\">Last 10 Records</a>";
         }
        echo "</td></tr>"; 
		?>
		
</table>
<?php }?>