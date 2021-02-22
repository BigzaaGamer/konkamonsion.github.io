<?php
include('../includes/database.php');
include('session.php');
if($_SESSION['UserLevel'] != 'ADMIN'){
    header("location:../home.php");
}
$id = $_GET['userid'];
$ban = "INSERT INTO 'banned'('user_id') VALUES user_id=$id ";
$ban2 = "UPDATE user SET user_status='APPROVED' WHERE user_id=$id";

//$query = mysqli_query($con,$ban);
$query = mysqli_query($con,$ban2);
header("location:../timeline-new.php?user_id=$id");
?>