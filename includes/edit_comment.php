<?php
	include('database.php');
    $commentid=$_GET['commentid'];
	
			$comment_sql="SELECT * from comments where comment_id='$commentid'";
			$comment=mysqli_query($con,$comment_sql);
			while($row=mysqli_fetch_array($comment)){
			$comment_id=$row['comment_id'];
			$content_comment=$row['content_comment'];
			$time=$row['created'];	
			$post_id=$row['post_id'];
			//$user=$_SESSION['id'];
           /* if($row['name'] !=$_SESSION['Fullname']){
                $update = "UPDATE comments SET name='$_SESSION[Fullname]' WHERE user_id = $_SESSION[UserID]";
                $result = mysqli_query($con,$update);
            }*/
        }
			
?>