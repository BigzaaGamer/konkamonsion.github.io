
<?php 

include('../includes/database.php');
include('../includes/edit-post.php');


if(isset($_POST['submit'])){
    $editTime = $editTime+1;
$editContent = $_POST["editContent"];
$postupdate= "UPDATE post SET content='$editContent', edit_time='$editTime' WHERE post_id='$postid'";
$update = mysqli_query($con,$postupdate);

 header("location:../timeline-new.php?user_id=$user&#post$postid");
 echo "<script>window.history.back();</script>";
 return 0;
}
header("location:../timeline-new.php?user_id=$user&#post$postid");
 echo "<script>window.history.back();</script>";
?>