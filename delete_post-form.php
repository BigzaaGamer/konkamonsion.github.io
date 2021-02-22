<?php
include('includes/database.php');
include('includes/timeline-post-fetch.php');
$sid=$_GET['user_id'];
$postid = $_GET['postid'];
?>
<?php
	//$postsql1="SELECT * FROM post LEFT JOIN user on user.user_id = post.user_id WHERE post.user_id = '".$_SESSION['UserID']."' order by post_id DESC";
	$postsql1="SELECT * FROM post LEFT JOIN user on user.user_id = post.user_id WHERE post.user_id = $sid AND post.post_id = $postid ";
	$query=mysqli_query($con,$postsql1);
    while($row=mysqli_fetch_array($query)){
        $posted_by = $row['firstname']." ".$row['lastname'];
		$location = $row['post_image'];
		$profile_picture = $row['profile_picture'];
		$content=$row['content']; 
		$time=$row['created'];	
		$post_id = $row['post_id'];
        $editTime = $row['edit_time'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
        </style>
    </head>

    <body>
    <div>
    <div class="text-center" style="margin-bottom:10px;"><span style="font-size: 30px;">ลบโพสต์นี้หรือไม่???</span></div>
    <hr>
    <div style="padding: 15px; border:1px solid #a0a0a0;background-color:#fafafa;border-radius:10px;box-shadow:3px 3px 10px #a0a0a0;">
        <div class="d-flex align-items-center">
            <div style="background: url('<?php echo $profile_picture; ?>') center / cover no-repeat;width: 30px;height: 30px;border-radius: 50%;margin-right:10px;"></div><span><?php echo $fullname; ?></span></div>
        <div>
            <p style="font-size:25px;font-weight:400;margin:10px;"><?php echo $content; ?></p>
            <?php if($location != "upload/"){ echo "<img src='$location' width='100%' style='border-radius:5px'>";}else {}?>
        </div>
        
    </div>
    <hr>
    <div class="d-flex flex-row justify-content-center" style="margin-top:20px;">
        <a class="btn btn-danger" type="button" style="margin-right:20px;" href="delete_post.php?postid=<?php echo $post_id; ?> ">ลบเลย</a>
        <a class="btn btn-primary" type="button" onclick="$('.back-overlay').css('display','none');">ไม่ลบ</a>
    </div>
</div>
    
    </body>
</html>
<?php  ?>