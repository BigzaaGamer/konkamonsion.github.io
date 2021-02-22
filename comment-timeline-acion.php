<?php
	include ('includes/database.php');
	
	if (isset($_POST['comment-input']) != '')
	{
		$user=$_SESSION['id'];
		$content_comment=$_POST['comment-input'];
		$post_id=$_POST['post_id'];
		$user_id=$_POST['user_id'];
		$time=time();
		

		{
			mysqli_query($con,"INSERT INTO comments (post_id,user_id,name,content_comment,image,created)
			VALUES ('$post_id','$id','$user_id','$content_comment','$profile_picture','$time')");
			/*echo "<script>window.location='timeline-new.php'</script>";*/

		}

			
	}
    

	
?>