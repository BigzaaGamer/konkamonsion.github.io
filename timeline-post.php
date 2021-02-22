<?php
	include('includes/database.php');
    include('session.php');
	if (!empty($_FILES)) {		
		
		$user=$_SESSION['id'];
		$content=$_POST['content'];
		if($content == ' '){
			return 0;
			
		}
		$time=time();
		$sql1="INSERT INTO post (user_id,content,created,post_image) VALUES ('$id,'$content','$time',NULL) ";
		$update=mysqli_query($con,$sql1);
		//echo "<script>window.history.back();</script>";
		header("location:timeline-new.php?userid=$_SESSION[UserID]");
	}else{
		$file=$_FILES['image']['tmp_name'];
		$image = $_FILES["image"] ["name"];
		$image_name= addslashes($_FILES['image']['name']);
		$size = $_FILES["image"] ["size"];
		$error = $_FILES["image"] ["error"];				
	}
	if ($error > 0){
		die("Error uploading file! Code $error.");
	}else{
		if($size > 10000000){
			die("Format is not allowed or file size is too big!");
		}
		else{
			move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
			$location="upload/" . $_FILES["image"]["name"];
			$user=$_SESSION['id'];
			$content=$_POST['content'];
			$time=time();
			$sql2= "INSERT INTO post (user_id,post_image,content,created) VALUES ('$id','$location','$content','$time') ";
			$update=mysqli_query($con,$sql2);
		}
		//header("location:timeline-new.php?user_id=$id");
		echo "<script>window.history.back();</script>";
	}
	
?>