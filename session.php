<?php
include("includes/database.php");
session_start();
/*if (isset($_SESSION['id'])){
header('location:index.php');
return 0;
}*/

$id = $_SESSION['id'];
$sql1 = "SELECT * FROM user WHERE user_id ='$id'";
$query=mysqli_query($con,$sql1);
while ($row=mysqli_fetch_array($query)){
    $userStatus=$row['user_status'];
$userid=$row['user_id'];
    $_SESSION['UserID'] = $userid;
    $_SESSION['UserLevel'] = $row['user_level'];
    $_SESSION['Nickname'] = $row['nickname'];
$cover_picture=$row['cover_picture'];
$profile_picture=$row['profile_picture'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$username=$row['username'];
$fullname = $row['firstname'] . ' ' . $row['lastname'];
$_SESSION['Password'] =$row['password'];
$_SESSION['ProfilePic'] = $profile_picture;
$_SESSION['Firstname'] = $firstname;
$_SESSION['Lastname'] = $lastname;
$_SESSION['Fullname'] = $firstname . ' ' . $lastname;
}

?>