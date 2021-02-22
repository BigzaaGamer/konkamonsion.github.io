<?php
include('includes/edit-post.php');
?>
<h2 style="text-align:center;">แก้ไขโพสต์</h2>
<hr>
<form action="action/edit_post_action.php?postid=<?php echo $postid; ?>" method="POST">

    <textarea autofocus id="editContent" name="editContent" style="resize:none;width:100%;height:100px;"><?php echo $content; ?></textarea>
    <input type="submit" name="submit" id="submit"value="บันทึกการแก้ไข"></input>
</form>
<?php
/*if(isset($_POST['submit'])){
$edit_content = $_POST['editContent'];
$postupdate= "UPDATE post SET content='$edit_content' WHERE post_id='$postid'";
$update = mysqli_query($con,$postupdate);
 return 0;
}*/

?>

