<?php
$sid = $_GET['user_id'];
$sql112 = "SELECT * FROM user WHERE user_id ='$sid'";
$query=mysqli_query($con,$sql112);
if(mysqli_num_rows($query) >0){
while ($row=mysqli_fetch_array($query)){
    $sid = $row['user_id'];
$userid=$row['user_id'];
$cover_picture=$row['cover_picture'];
$profile_picture=$row['profile_picture'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$username=$row['username'];
$fullname = $row['firstname']." ".$row['lastname'];

}
}
else {
    header("location:user-not-found.html");
    return 1;

}

?>