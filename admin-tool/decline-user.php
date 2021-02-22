<?php

include('../includes/database.php');
include('../includes/isApproved.php');

$id = $_GET['userid'];

//$approve = "UPDATE `user` set user_status='NOT_APPROVE' where user_id=$id";
$decline = "DELETE FROM `user` WHERE user_id=$id";
$query = mysqli_query($con,$decline);
header("location:../admin-tool");
?>