<?php 
include('../connection.php');

mysqli_query($conn,"delete from loan where group_id='".$_GET['id']."'");

mysqli_query($conn,"delete from member where group_id='".$_GET['id']."'");

mysqli_query($conn,"delete from groups where group_id='".$_GET['id']."'");

header('location:index.php?page=display_group');

?>