<?php 
include('../connection.php');


mysqli_query($conn,"delete from loan where loan_id='".$_GET['id']."'");

header('location:index.php?page=display_loan');

?>