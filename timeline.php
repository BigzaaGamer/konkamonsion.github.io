
<?php
require('includes/database.php');
$sid=$_REQUEST['user_id'];
function time_stamp($session_time) 
{ 
 
$time_difference = time() - $session_time ; 
$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 

if($seconds <= 60)
{
echo"$seconds seconds ago"; 
}
else if($minutes <=60)
{
   if($minutes==1)
   {
     echo"one minute ago"; 
    }
   else
   {
   echo"$minutes minutes ago"; 
   }
}
else if($hours <=24)
{
   if($hours==1)
   {
   echo"one hour ago";
   }
  else
  {
  echo"$hours hours ago";
  }
}
else if($days <=7)
{
  if($days==1)
   {
   echo"one day ago";
   }
  else
  {
  echo"$days days ago";
  }


  
}
else if($weeks <=4)
{
  if($weeks==1)
   {
   echo"one week ago";
   }
  else
  {
  echo"$weeks weeks ago";
  }
 }
else if($months <=12)
{
   if($months==1)
   {
   echo"one month ago";
   }
  else
  {
  echo"$months months ago";
  }
 
   
}

else
{
if($years==1)
   {
   echo"one year ago";
   }
  else
  {
  echo"$years years ago";
  }

}
 
} 

?>
<!DOCTYPE html>
<html>

	<head>
		<title>Welcome  To Biobook - Sign up, Log in, Post </title>
		<link rel="stylesheet" type="text/css" href="css/timeline_old.css">
	</head>

<body>
<?php include('header.php')?>
<?php
$sql112 = "SELECT * FROM user WHERE user_id ='$sid'";
$query=mysqli_query($con,$sql112);
while ($row=mysqli_fetch_array($query)){
    $userid=$row['user_id'];
$cover_picture=$row['cover_picture'];
$profile_picture=$row['profile_picture'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$username=$row['username'];
}
?>
	<div id="container">
	
		<div id="clip2">
				<a href="updatecover.php" title="Change Cover Photo"><img src="<?php echo $cover_picture ?>"></a>


				
		</div>	
		
		<div id="left-nav">
				
				<div class="clip1">

				<a href="updatephoto.php" title="Change Profile Picture"><img src="<?php echo $profile_picture?>"></a>
				</div>
				
				<div class="user-details">
					<label><?php echo $firstname ?>&nbsp;<?php echo $lastname ?></label>
					<br />
					<b>(<?php echo $username ?>)</b>
				</div>
		</div>
	<?php
		if($sid == $_SESSION['UserID']){?>
		<div id="right-nav" >
			<h1>Update Status</h1>
	<div>
			<form method="post" enctype="multipart/form-data">
				<textarea placeholder="Whats on your mind?" name="content" class="post-text" required></textarea>
				<input type="file" name="image">
				<button class="btn-share" name="Submit" value="Log out">Share</button>
			</form><?php }
			else{
				echo '<div id="right-nav>"';
			} ?>
			
<?php
	include('includes/database.php');
	include('session.php');
	if (!empty($_FILES)) {		
		$user=$_SESSION['id'];
		$content=$_POST['content'];
		$time=time();
		$sql1="INSERT INTO post (user_id,content,created,post_image) VALUES ('$id,'$content','$time',NULL) ";
		$update=mysqli_query($con,$sql1);
		header('location:home.php');
		
	}
	else
	{
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
				header('location:home.php');
			}
	
?>
			
	</div>
	
		</div>
		

 	
		
<?php
	include("includes/database.php");
							$sql1 = "SELECT * from user where user_id='$sid' order by user_id DESC";
			$query=mysqli_query($con,$sql1);
			while($row=mysqli_fetch_array($query)){
				$id = $row['user_id'];
?>	
		<div id="left-nav1">
			<h2>Personal Info</h2>
			<table>
				<tr>
					<td><label>Username</label></td>
					<td width="20"></td>
					<td><b><?php echo $row['username']; ?></b></td>
				</tr>
				<tr>
					<td><label>Birthday</label></td>
					<td width="20"></td>
					<td><b><?php echo $row['birthday']; ?></b></td>
				</tr>
				<tr>
					<td><label>Gender</label></td>
					<td width="20"></td>
					<td><b><?php echo $row['gender']; ?></b></td>
				</tr>
				<tr>
					<td><label>Contact</label></td>
					<td width="20"></td>
					<td><b><?php echo $row['number']; ?></b></td>
				</tr>
				<tr>
					<td><label>Email</label></td>
					<td width="20"></td>
					<td><b><?php echo $row['email']; ?></b></td>
				</tr>
				<tr>
					<td><label>Image</label></td>
					<td width="20"></td>
					<td><img src="<?php echo $row['profile_picture']; ?>"></td>
				</tr>
			</table>
		</div>
<?php
}
?>


		

<?php
	include("includes/database.php");
		//$postsql1="SELECT * FROM post LEFT JOIN user on user.user_id = post.user_id WHERE post.user_id = '".$_SESSION['UserID']."' order by post_id DESC";
		$postsql1="SELECT * FROM post LEFT JOIN user on user.user_id = post.user_id WHERE post.user_id = $sid order by post_id DESC";
			$query=mysqli_query($con,$postsql1);
			if(mysqli_num_rows($query)== 0){?>
				<div id="right-nav1">
					<span>ผู้ใช้คนนี้ยังไม่มีโพสต์</span>
			</div>

				<?php return 0; }
				else{	
					while($row=mysqli_fetch_array($query)){
						$posted_by = $row['firstname']." ".$row['lastname'];
						$location = $row['post_image'];
						$profile_picture = $row['profile_picture'];
						$content=$row['content']; 
						$time=$row['created'];	
						$post_id = $row['post_id'];
?>
		<div id="right-nav1">
		
			
			<div class="profile-pics">
			<img src="<?php echo $profile_picture ?>">
			<span id="fullname"><?php echo $posted_by ?></span>
			<span id="posttime"><?php echo $time = time_stamp($time); ?></span>
			</div>
			
		<br />
		
			<div class="post-content">

			<div class="delete-post">
			<a href="delete_post.php<?php echo '?id='.$post_id; ?>" title="Delete your post"><button class="btn-delete">X</button></a>
			</div>
			
			<p><?php echo $row['content']; ?></p>
		<center>
			<img src="<?php echo $location ?>">
		</center>
		
			</div>

<?php
	include("includes/database.php");
			$comment_sql="SELECT * from comments where post_id='$post_id' order by post_id DESC";
			$comment=mysqli_query($con,$comment_sql);
			while($row=mysqli_fetch_array($comment)){
			$comment_id=$row['comment_id'];
			$content_comment=$row['content_comment'];
			$time=$row['created'];	
			$post_id=$row['post_id'];
			$user=$_SESSION['id'];
			
?>			
			<div class="comment-display"<?php echo $comment_id ?>>

					<div class="delete-post">
					<a href="delete_comment.php<?php echo '?id='.$comment_id; ?>" title="Delete your comment"><button class="btn-delete">X</button></a>
					</div>
					
				<div class="user-comment-name"><img src="<?php echo $row['image']; ?>">&nbsp;&nbsp;&nbsp;<?php echo $row['name']; ?><b class="time-comment"><?php echo $time = time_stamp($time); ?></b></div>
				<div class="comment"><?php echo $row['content_comment']; ?></div>
			
			</div>
			<br />

<?php
}
?>
			

		 <form  method="POST">			
			<div class="comment-area">
			
						<?php
							$image_sql="SELECT * FROM user WHERE user_id='$id'";
							$image=mysqli_query($con,$image_sql);
							while($row=mysqli_fetch_array($image)){
							

							?>
						<img src="<?php echo $row['profile_picture']; ?>" width="50" height="50">
						<?php } ?>
			
			<input type="text" name="content_comment" placeholder="Write a comment..." class="comment-text">
			<input type="hidden" name="post_id" value="<?php echo $post_id ?>">
			<input type="hidden" name="user_id" value="<?php echo $firstname . ' ' . $lastname  ?>">
			<input type="hidden" name="image" value="<?php echo $profile_picture  ?>">
			<input type="submit" name="post_comment" value="Enter" class="btn-comment">
			
			</div>
		</form>
		
<?php
	include ('includes/database.php');
	
	if (isset($_POST['comment-input']))
	{
		$user=$_SESSION['id'];
		$content_comment=$_POST['comment-input'];
		$post_id=$_POST['post_id'];
		$user_id=$_POST['user_id'];
		$time=time();
		

		{
			mysqli_query($con,"INSERT INTO comments (post_id,user_id,name,content_comment,image,created)
			VALUES ('$post_id','$id','$user_id','$content_comment','$profile_picture','$time')");

			echo "<script>window.location='timeline-new.php'</script>";
		}
			
	}
	
?>

			
		</div>
	<?php
	}
}
				
	?>
	
		
	</div>

</body>

</html>