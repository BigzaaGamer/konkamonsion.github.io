<?php
include('../includes/database.php');
include('../includes/edit_comment.php');


if(isset($_POST['submit'])){
    $editcomment = $_POST['editComment'];
$updatecomment = "UPDATE comments SET content_comment='$editcomment' WHERE comment_id='$comment_id'";
mysqli_query($con,$updatecomment);
header("location:../timeline-new.php?user_id=$user&#post$post_id");
echo "<script>window.history.back();</script>";
return 0;
mysqli_close($con);
}