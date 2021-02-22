<?php
include('database.php');
$postid=$_GET['postid'];


$post= "SELECT * FROM post WHERE post_id='$postid'";
$result = mysqli_query($con,$post);
while($row=mysqli_fetch_array($result)){
    $content = $row['content'];
    $postidd = $row['post_id'];
    $user = $row['user_id'];
    $editTime = $row['edit_time'];
}
?>