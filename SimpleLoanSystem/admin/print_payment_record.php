<?php
include('../connection.php'); 
$q=mysqli_query($conn,"select * from loan");

?>
<link rel="stylesheet" href="../css/bootstrap.min.css"/>
<table class="table table-bordered">
	<tr height="30" class="info">
	<th colspan="7" align="center"><center>All Payment Records</center></th>
	</tr>	
	<Tr class="active">
        <th>#</th>
		<th>Group</th>
		<th>EMI Paid</th>
		<th>Payment Date</th>
		
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
