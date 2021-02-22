<?php
include('includes/edit_comment.php');
?>
<h2 style="text-align:center;">แก้ไขคอมเม้นต์</h2>
<hr>
<form action="action/edit_comment_action.php?commentid=<?php echo $comment_id; ?>" method="POST">

    <textarea autofocus id="editComment" name="editComment" style="resize:none;width:100%;height:100px;"><?php echo $content_comment; ?></textarea>
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

