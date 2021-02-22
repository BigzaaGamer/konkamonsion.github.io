<?php

include('includes/database.php');
include('session.php');
if(!$_SESSION['UserID']){
	header("location:home.php");
}
else{
$get_id =$_GET['postid'];
	
	// sending query
	mysqli_query($con, "DELETE FROM post WHERE post_id = '$get_id'"); 	
	echo "<script>window.history.back(); </script>";
}
?>
