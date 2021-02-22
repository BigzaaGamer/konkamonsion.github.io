<script src="js/jquery.min.js"></script>
<?php

include('includes/database.php');
include('session.php');
$get_id =$_GET['id'];
	
	// sending query
	/*if($_SESSION['UserLevel'] == "ADMIN"){*/ if($_SESSION['UserID'] == $id){
	mysqli_query($con,"DELETE FROM comments WHERE comment_id = '$get_id'");
	
	//header("Location: home.php");
	echo "<script>window.history.back();</script>";
}else{
	?><script>$("#delete_comment").css("display","none");</script><?php
echo "<script> alert('You are not Admin'); </script>";

}
?>
