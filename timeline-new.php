<?php
require('includes/database.php');
require('session.php');
include('includes/isApproved.php');
//session_abort();

$sid = $_GET['user_id'];
if(!isset($_SESSION['UserID'])){
    header("location:index.php");
    return 0;
}else{
    if($sid == '' ){
        header("location:timeline-new.php?user_id=$userid");
        return 0;
    }
    if($id == ''){
        header("location:index.php");
        return 0;
    }
}
/*if($sid != '')
{
    header("location:timeline-new.php?user_id=$sid");
	return 0;
}*/
function thai_gender($gender){
    if($gender=="male"){
        echo "ชาย";
    }
    else {echo "หญิง";}
}

include('includes/time_stamp.php');
include('includes/timeline-post-fetch.php');
?>

<!DOCTYPE html>
<html lang="th">
<div class="back-overlay" id="back-overlay-editProfile"> 
    <div class="overlay-block" id="overlay-block-editProfile">
    </div>
</div>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $fullname;?> - Social Platform</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="css/Navigation-with-Search.css">
    <link rel="stylesheet" href="css/timeline.css">
    <link rel="stylesheet" href="css/root.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="height: 100%;">

    <section>
        <header>
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" id="platform_name" href="home.php" style="font-size: 30px;">Social Platform</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a class="nav-link" id="home" href="home.php">หน้าหลัก</a></li>
                            <li class="nav-item"><?php if($_SESSION['UserID'] != $sid){?><script>$("#timeline").classList.add("active");</script><?php } ?><a class="nav-link" id="timeline" href="timeline-new.php">Timeline</a></li>
                            <?php if($_SESSION['UserLevel'] == "USER"){}else{ ?>
                            <li class="nav-item"><a class="nav-link" href="admin-tool">Admin</a></li><?php  } ?>
                        </ul>
                        <form class="form-inline mr-auto" target="" action="search-result.php">
                            <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="text" id="search-field" placeholder="ค้นหาผู้ใช้" name="search"></div>
                            <?php if(isset($_POST['search'])){ header("location:search-result.php"); }?>
                        </form><a class="btn btn-light action-button" role="button" id="logout" href="logout.php">ออกจากระบบ</a></div>
                </div>
            </nav>
        </header>
    </section>
    
    <div class="d-flex justify-content-between align-items-end" data-bs-parallax-bg="true" style="height: 500px;background: url('<?php echo $cover_picture;?>') center / cover;width: 100%;padding: 100px;padding-top: 0px;padding-right: 80px;padding-bottom: 50px;padding-left: 80px;">
        <div class="d-flex justify-content-start" id="timeline-cover-container" style="width: auto;height: auto;">
            <div style="width: 150px;height: 150px;background: url(&quot;<?php echo $profile_picture; ?>&quot;) center / cover no-repeat;border-radius: 50%;border: 5px solid #ebebeb; "title="เปลี่ยนรูปโปรไฟล์"><a class="d-block" id="update_profile_pic" style="width: 100%;height: 100%;" href="updatephoto.php"></a></div>
            <div class="d-flex flex-row align-items-center flex-nowrap" id="name-container" style="font-size: 40px;color: rgb(255,255,255);width: auto;margin-left: 1em;"><span id="firstname" style="margin-right: 20px;text-shadow: 5px 5px 5px #404040;"><?php echo $firstname?></span><span id="lastname" style="text-shadow: 5px 5px 5px #404040;" ><?php echo $lastname ?></span></div>
        </div>
        <?php if($sid != $_SESSION['UserID']){}else {?><a class="btn btn-primary float-right change-cover" id="changeCover" type="button" href="updatecover.php">เปลี่ยนรูปปก</a><?php } ?></div>
        <?php if($sid == $_SESSION['UserID']){} else{?>
        <section>
            <div class="d-flex align-items-center" style="height: auto;width: 100%;padding: 10px;background: #fafafa;box-shadow: 2px 2px 16px rgb(222,222,222);z-index: 4;"><span style="margin-right: 1.0em;">เครื่องมือ Admin :</span>
                <div role="group" class="btn-group btn-group-sm">
                    <?php
                    $sql88 = "SELECT user_status FROM user where user_id = $sid";
                    $check_q =mysqli_query($con,$sql88);
                    while($check=mysqli_fetch_array($check_q)){
                        $check_user_status = $check['user_status'];
                    }
                    if($check_user_status != "BANNED"){?>
                        <a class="btn btn-danger" type="button" href="admin-tool/ban-user.php?userid=<?php echo $userid; ?>">แบนผู้ใช้นี้</a>
                        <?php }
                        else {?>
                        <a class="btn btn-success" href="admin-tool/unban-user.php?userid=<?php echo $userid; ?>" role="button">ปลดแบน</a>
                        <?php } ?>
                </div>
            </div>
        </section> 
<?php } ?>
<?php
	                include("includes/database.php");
					$sql1 = "SELECT * from user where user_id='$sid' order by user_id DESC";
			        $query=mysqli_query($con,$sql1);
			        while($row=mysqli_fetch_array($query)){
				        if($row['user_status'] == "BANNED"){?>
                            <div style="position:relative;height:200px;display:flex;justify-content:center;">
                            <div role="alert" class="alert alert-danger" style="position:absolute;top:50%"><span><strong>บัญชีนี้ถูกระงับการใช้งาน</strong><br /></span></div>
                        </div>
                            <?php return 0;
                        }
                    }
                ?>	
<section class="d-flex flex-row justify-content-between align-items-start" style="width: 100%;padding-right: 10%;padding-left: 10%;margin-top: 50px;height: auto;">
    <div class="container d-block" id="infoBox-Container" style="width: 700px;height: auto;margin: 0px;">
        <div class="col" style="width: 100%;">
            <div id="infoBox" class="info_box" style="box-shadow: 5px 5px 11px #ebebeb;padding: 20px;margin-bottom:20px;">
                <h2 id="infoBox_Header">ข้อมูลเบื้องต้น</h2>
                <?php
	                include("includes/database.php");
					$sql1 = "SELECT * from user where user_id='$sid' order by user_id DESC";
			        $query=mysqli_query($con,$sql1);
			        while($row=mysqli_fetch_array($query)){
				        $id = $row['user_id'];
                ?>	
                <div class="table-responsive" id="infoTable">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>ชื่อเต็ม</td>
                                <td><?php echo $fullname;?></td>
                            </tr>
                            <tr>
                                <td>วันเกิด</td>
                                <td><?php echo $row['birthday']; ?></td>
                            </tr>
                            <tr>
                                <td>เพศ</td>
                                <td><?php thai_gender($row['gender']);?></td>
                            </tr>
                            <tr>
                                <td>เบอร์โทร</td>
                                <td><?php echo $row['number'];?> </td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td><?php echo $row['email'];?> </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                    <div class="d-flex justify-content-end editProfileButtonContainer" id="editProfileButtonContainer">
                        <?php if($sid != $_SESSION['UserID']){}else { ?><a class="btn btn-primary" role="button" onclick="$('#back-overlay-editProfile').css('display','block');$('#overlay-block-editProfile').load('settings.php');">แก้ไขโปรไฟล์</a> <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div style="background: #fafafa;padding: 10px;margin:15px;"><span>ผู้ใช้งาน - ทดสอบ</span>
            <div class="d-flex flex-row flex-grow-0 flex-shrink-0 flex-nowrap" id="user_container">
                <?php
                include('includes/database.php');
                $alluser = "SELECT * FROM user WHERE user_status!= 'WAITING' AND user_id!=$sid";
                $fetch = mysqli_query($con,$alluser);
                while($alluser_data=mysqli_fetch_array($fetch)){
                ?>
                
                <div class="d-flex flex-column flex-grow-0 flex-shrink-0 justify-content-center align-items-center" id="user_box" style="width: 120px;box-shadow:#e0e0e0 2px 2px 5px;margin:5px;padding:5px;border-radius:5px;">
                    <div style="background: url('<?php echo $alluser_data['profile_picture']; ?>') center / cover no-repeat;width: 100px;height: 100px;border-radius:50%;box-shadow:#e0e0e0 2px 2px 5px;"></div>
                    <a href="timeline-new.php?user_id=<?php echo $alluser_data['user_id'];?>"><?php echo $alluser_data['firstname']." ".$alluser_data['lastname'];?></a>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>
    
    <div class="container d-flex flex-column" id="post-container" style="width: 100%;">
        <?php
        if($sid == $_SESSION['UserID']){?>
            <div id="update-status" class="update-status">
                <form method="post" enctype="multipart/form-data" action="timeline-post.php">
                    <span class="d-flex flex-row justify-content-around align-items-top profile-n-textarea-container" id="profile-n-textarea-container">
                        <span style="background: url('<?php echo $profile_picture?>') center / cover no-repeat;width: 60px;height: 60px;border-radius: 50%;margin-right:10px"></span>
                        <textarea onkeyup="textAreaAdjust(this)" onsubmit="" required id="postBox" class="post-box" name="content" style="width: 90%;resize: none;height: auto;"></textarea>
                    </span>
                    <p style="margin-top: 12px;">อัพโหลดรูปภาพ</p>
                    <div id="fileInputAndButton" class="fileInputAndButton">
                        <input type="file" id="image-post" name="image" style="font-size:12px;">
                        <button name="submit" class="btn btn-primary post-button" id="postButton" type="submit">Post</button>
                    </div>
                </form>
            </div>
            <?php } else { ?><script> document.getElementById("update-status").style("display","none");</script> <?php } ?>            
        <?php
	    include("includes/database.php"); 
        if(empty($_GET['postid'])){
		//$postsql1="SELECT * FROM post LEFT JOIN user on user.user_id = post.user_id WHERE post.user_id = '".$_SESSION['UserID']."' order by post_id DESC";
		$postsql1="SELECT * FROM post LEFT JOIN user on user.user_id = post.user_id WHERE post.user_id = '$sid' order by post_id DESC"; }
        else {$postid_url = $_GET['postid']; $postsql1="SELECT * FROM post LEFT JOIN user on user.user_id = post.user_id WHERE post.user_id = $sid AND post.post_id = $postid_url"; }
		$query=mysqli_query($con,$postsql1);
		if(mysqli_num_rows($query)== 0){?>
                <div role="alert" class="alert alert-info" style="width: 100%;border-radius: 5px;border-width: 3px;border-color: rgb(12,84,96);"><span>ผู้ใช้คนนี้ยังไม่มีโพสต์</span></div>
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
                $editTime = $row['edit_time'];
        ?>
        <div id="post<?php echo $post_id;?>" class="post">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center post-name-container" id="post-name-container"><span class="d-inline-block profile-post" id="profile-post" style="background: url('<?php echo $profile_picture?>') center / cover no-repeat;width: 40px;height: 40px;border-radius: 50%;"></span><div class="d-flex flex-column"><span id="fullname"><?php echo $fullname; ?></span><span data-toggle="tooltip" id="posttime" class="posttime"><?php echo time_stamp($time);?></span></div>
                    <?php if($editTime ==''){}else{?> <span style="font-size:10px;margin-left:20px;">[แก้ไขโพสต์แล้ว <?php echo $editTime; ?> ครั้ง]</span> <?php } ?></div>
                <div class="dropdown"><button class="btn btn-primary btn-sm dropdown-toggle postMenu" data-toggle="dropdown" aria-expanded="false" id="postMenu" type="button" style="height: 20px;" ></button>
                    <div class="dropdown-menu" style="padding-top: 2px;padding-bottom: 2px;">
                        <?php if($sid != $_SESSION['UserID']){}if($_SESSION['UserLevel'] != "ADMIN"){}if($userid == $_SESSION['UserID']) {?><a class="dropdown-item" onclick="$('#back-overlay<?php echo $post_id; ?>').css('display','block');$('.overlay-block').load('edit_post.php?postid=<?php echo $post_id; ?>');" >แก้ไขโพสต์</a><?php } ?>
                    <div class="dropdown-divider"></div>
                        <?php if($sid != $_SESSION['UserID']){}if($_SESSION['UserLevel'] != "ADMIN"){}if($userid == $_SESSION['UserID'] || $_SESSION['UserLevel'] == "ADMIN"){?><a class="dropdown-item text-white" onclick="$('#back-overlay<?php echo $post_id; ?>').css('display','block');$('.overlay-block').load('delete_post-form.php?user_id=<?php echo $sid; ?>&postid=<?php echo $post_id; ?>');" style="background: #e5053a;">ลบโพสต์นี้</a> <?php } ?>
                    </div>
                </div>
            </div>
            <div class="back-overlay" id="back-overlay<?php echo $post_id; ?>"> 
                <div class="overlay-block" id="overlay-block">
                </div>
            </div>

            <!--<a class="btn btn-outline-danger btn-sm d-inline-block float-right" role="button" data-toggle="tooltip" data-placement="bottom" title="ลบโพสต์นี้" href="delete_post.php<?php echo '?id='.$post_id; ?>">X</a>-->
            <div id="postContent" class="post-content">
                <p id="postContent-text" onload="checkLength();"style="font-size: 22px;font-weight: 400;"><?php echo $row['content']; ?></p>
                <?php 
                if($location == "upload/"){}
                else{?>   
                    <img src="<?php echo $location;?>"/>
                <?php } ?>
            </div>
            <hr>
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
                    if($row['name'] !=$_SESSION['Fullname']){
                        $update = "UPDATE comments SET name='$_SESSION[Fullname]' WHERE user_id = $_SESSION[UserID]";
                        $result = mysqli_query($con,$update);
                    }	
            ?>	
            <div class="back-overlay" id="back-overlay<?php echo $comment_id; ?>"> 
                <div class="overlay-block" id="overlay-block">      
                </div>
            </div>
            <div id="comment" class="comment">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center nameContainer" id="nameContainer">
                        <div style="background: url('<?php echo $row['image']?>') center / cover no-repeat;width: 30px;height: 30px;"></div><span id="fullcommnent-name" style="font-size:16px;margin-left:5px;"><?php echo $fullname; ?></span><span id="commenttime" style="font-size:12px;"><?php echo time_stamp($time);?></span></div>
                        <div class="dropdown"><button class="btn btn-primary btn-sm dropdown-toggle postMenu" data-toggle="dropdown" aria-expanded="false" id="postMenu-1" type="button"></button>
                            <div class="dropdown-menu" style="padding-top: 2px;padding-bottom: 2px;">
                                <a class="dropdown-item" onclick="$('#back-overlay<?php echo $comment_id; ?>').css('display','block');$('.overlay-block').load('edit_comment-form.php?commentid=<?php echo $comment_id; ?>');">แก้ไข</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-white" href="delete_comment.php?id=<?php echo $comment_id; ?>" style="background: #e5053a;">ลบ</a>
                            </div>
                        </div>
                    </div>
                    <div id="commentContent" class="comment-content">
                        <p style="font-weight:400;"><?php echo $content_comment; ?></p>
                    </div>
                </div>
                <?php } ?>

                <form method="POST" action="comment.php">
                    <div class="d-flex flex-row align-items-center justify-content-around comment-input-box" id="commentInputBox">
                    <?php
                    $image_sql="SELECT * FROM user WHERE user_id='$id'";
                    $image=mysqli_query($con,$image_sql);
                    while($row=mysqli_fetch_array($image)){?>
                        <div style="background: url('<?php echo $_SESSION['ProfilePic']; ?>') center / cover no-repeat;width: 40px;height: 40px;border-radius: 50%;margin-right: 5px;"></div>
                    <?php } ?>
                        <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['Firstname']. ' ' . $_SESSION['Lastname'] ?>">
                        <input type="hidden" name="image" value="<?php echo $profile_picture ?>">
                        <!--input--><textarea type="text" autocomplete="off" onkeyup="textAreaAdjust(this)" name="comment-input" id="commentInput" class="commentInput" style="resize:none;background-color:var(--gray1);border-radius:20px;"></textarea>
                        <button class="btn btn-primary btn-sm" style="width:80px;margin-left:10px;font-size:12px;padding:1px;" type="submit">คอมเม้น</button>
                    </div>  
                </form>
            </div>
            <?php } ?>
        </div>
    </section>
    <script src="js/myown.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/bs-init.js"></script>
    <script>
    
    var postContenttext = $('#postContent-text');
    function checkLength(){
        if(this.text.length >= 10){
            alert("ddddd");
            
        }
    }

    /*window.onclick = function(event) {
    if (event.target ==  $(".back-overlay")){
        $(".back-overlay").css("display","none");
        }
        }*/
    $(".back-overlay").click(function(){
        var target = $( event.target );
        if(target.is($(".back-overlay"))){
            $(".back-overlay").css("display","none");
        }
    });
    
    </script>
    <?php  
    }
    ?>
</body>

</html>