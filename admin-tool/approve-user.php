<?php

include('../includes/database.php');
include('../includes/isApproved.php');

$id = $_GET['userid'];

$approve = "UPDATE `user` set user_status='APPROVED' where user_id=$id";
$query = mysqli_query($con,$approve);
header("location:../admin-tool");
?>