<?php

/*$user_id=$_REQUEST['user_id'];
$postid=$_REQUEST['post_id'];*/
include('includes/time_stamp.php');
include('session.php');
include('includes/isApproved.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Social Platform - หน้าหลัก</title>
		<link rel="stylesheet" type="text/css" href="css/home.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    	<link rel="stylesheet" href="fonts/font-awesome.min.css">
    	<link rel="stylesheet" href="css/Navigation-with-Search.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

<body>
<section>
        <header>
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" id="platform_name" href="home.php" style="font-size: 30px;">Social Platform</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a class="nav-link active" id="home" href="home.php">หน้าหลัก</a></li>
                            <li class="nav-item"><a class="nav-link " id="timeline" href="timeline-new.php?user_id?">Timeline</a></li>
                            <?php if($_SESSION['UserLevel'] == "USER"){}else{ ?>
                            <li class="nav-item"><a class="nav-link" href="admin-tool">Admin Page</a></li><?php  } ?>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" placeholder="ค้นหาผู้ใช้" name="search"></div>
                        </form><a class="btn btn-light action-button" role="button" id="logout" href="logout.php">ออกจากระบบ</a></div>
                </div>
            </nav>
        </header>
    </section>
	
	<div id="container">

				<?
				/*include("includes/database.php");
				$sql_cover = "SELECT * from user where user_id='$id' order by user_id DESC";
				$result=mysqli_query($con,$sql_cover);
				while($row=mysqli_fetch_array($result)){
					$id = $row['user_id'];}*/
?>
				

				



		
		
		<div id="right-nav">

            <div id="update-status" class="update-status">
                <form method="post" enctype="multipart/form-data" action="timeline-post.php">

                <span class="d-flex flex-row justify-content-around profile-n-textarea-container" id="profile-n-textarea-container">
                    <img class="mini-profile" src="<?php echo $profile_picture?>" style="border-radius: 50%;height: 50px;">
                    <textarea id="postBox" required class="post-box" name="content" style="width: 90%;resize: none;height: auto;"></textarea></span>
                    <p style="margin-top: 12px;">อัพโหลดรูปภาพ</p>
                    <div id="fileInputAndButton" class="fileInputAndButton">
                    <input type="file" id="image-post" name="image">
                    <button name="submit" class="btn btn-primary post-button" id="postButton" type="submit">Post</button></div>
       </form>
       </div>
          
		</div>
				
<?php /*

	include("includes/database.php");
		$sql1 = "SELECT * from user where user_id='$id' order by user_id DESC";
			$result=mysqli_query($con,$sql1);
			while($row=mysqli_fetch_array($result)){
			$id = $row['user_id'];*/
?>	
	
		

<?php
	include("includes/database.php");
			$sql2 = "SELECT * FROM post LEFT JOIN user on user.user_id = post.user_id order by post_id DESC";
			$result2=mysqli_query($con,$sql2);
			while($row=mysqli_fetch_array($result2)){
				$posted_by = $row['firstname']." ".$row['lastname'];
				$location = $row['post_image'];
				$profile_picture = $row['profile_picture'];
				$content=$row['content'];
				$post_id = $row['post_id'];
				$poster_id =  $row['user_id'];
				$time=$row['created'];
?>
		<div id="right-nav1">
			<div class="profile-pics">
			<img src="<?php echo $profile_picture ?>">
			<a id="fullname" href="timeline-new.php?user_id=<?php echo $poster_id; ?>"><?php echo $posted_by ?></a>
			<span id="posttime"><?php echo $time = time_stamp($time); ?></span>
			</div>
		<br />
			<div class="post-content">
				<div class="delete-post">
				<a href="delete_post.php<?php echo '?id='.$post_id; ?>" title="Delete your post"><button class="btn-delete">X</button></a>
				</div>
			<span id="post_content"><?php echo $row['content']; ?></span>
			<?php 
			if($location == "upload/"){
				
			}else{
			echo "<img src='$location'/>";

			}
?>
		</div>

	<?php

				$comment_sql = "SELECT * from comments where post_id='$post_id' order by post_id DESC";
				$comment_query= mysqli_query($con,$comment_sql);
				while($row=mysqli_fetch_array($comment_query)){
				$comment_id=$row['comment_id'];
				$content_comment=$row['content_comment'];
					$time=$row['created'];	
				$post_id=$row['post_id'];
				$commenter_id=$row['user_id'];
				$user=$_SESSION['id'];
				
	?>			
				<div class="comment-display"<?php echo $comment_id ?>>
						<div class="delete-post">
						<a href="delete_comment.php<?php echo '?id='.$comment_id; ?>" title="Delete your comment"><button class="btn-delete">X</button></a>
						</div>
					<div class="user-comment-name"><img src="<?php echo $row['image']; ?>">&nbsp;&nbsp;&nbsp;<?php echo "<a id='commenter-profile' href='timeline-new.php?user_id=$commenter_id'>"; echo "$row[name] </a>";?><b class="time-comment"><?php echo $time = time_stamp($time); ?></b></div>
					<div class="comment"><?php echo $row['content_comment']; ?></div>
				
				</div>
				<br />

	<?php
	}
	?>
			

		 <form  method="POST" action="comment.php">			
			<div class="comment-area">
			
						<?php 
						include("includes/database.php");
						$image_comment_sql= "SELECT * FROM user WHERE user_id='$id'";
						$image_comment_query=mysqli_query($con,$image_comment_sql);
							while($row=mysqli_fetch_array($image_comment_query)){
							

							?>
						<img src="<?php echo $row['profile_picture']; ?>" width="50" height="50">
						<?php } ?>
						<input type="hidden" name="post_id" value="<?php echo $post_id ?>">
			<input type="hidden" name="user_id" value="<?php echo $_SESSION['Firstname']. ' ' . $_SESSION['Lastname'] ?>">
			<input type="hidden" name="image" value="<?php echo $profile_picture ?>">

                            <input type="text" autocomplete="none" name="comment-input" id="commentInput" class="commentInput" style="background-color:var(--gray1);border-radius:20px;">
			
			</div>
		</form>

			
		</div>
	<?php
			}
	?>
	
		
	</div>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/bs-init.js"></script>
</body>

</html>