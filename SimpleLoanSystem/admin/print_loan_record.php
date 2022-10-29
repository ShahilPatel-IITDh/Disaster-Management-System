<?php
include('../connection.php'); 
$q=mysqli_query($conn,"select * from loan");

?>
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
<table class="table table-bordered">
	<tr height="30" class="info">
	<th colspan="7" align="center"><center>All Loan Records</center></th>
	</tr>	
	<Tr class="active">
		<th>Sr.No</th>
		<th>Group Name</th>
		<th>Loan Source</th>
		<th>Amount</th>
		<th>Interest</th>
		<th>Payment Schedule</th>
		<th>Due Date</th>
		
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

<?php 

echo "</Tr>";
$i++;
}
		?>
		
<tr>
<script>
	 function printpage()
	 {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
		window.print();
    }
</script>

	<td colspan="7" align="center">
	<button id="printpagebutton"  class="btn btn-primary" onClick="printpage()"><span class="glyphicon glyphicon-print"></span> &nbsp;Print</button>
	</td>
</tr>		
		
</table>
