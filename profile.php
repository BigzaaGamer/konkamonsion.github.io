<!DOCTYPE html>
<html>

	<head>
		<title>Welcome  To Biobook - Sign up, Log in, Post </title>
		<link rel="stylesheet" type="text/css" href="css/profile.css">
	</head>

<body>
<?php include ('session.php');?>

	<div id="header">
		<div class="head-view">
			<ul>
				<li><a href="home.php" title="Biobook"><b>biobook</b></a></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li><a href="timeline.php" title="<?php echo $username ?>"><label><?php echo $username ?></label></a></li>
				<li><a href="home.php" title="Home"><label>Home</label></a></li>
				<li><a href="profile.php" title="Profile"><label class="active">Profile</label></a></li>
				<li><a href="photos.php" title="Settings"><label>Photos</label></a></li>
				<li><a href="logout.php" title="Log out"><button class="btn-sign-in" value="Log out">Log out</button></a></li>
			</ul>
		</div>
	</div>

	<div id="container">
	
		<div id="left-nav">
				
				<div class="clip1">
				<a href="updatephoto.php" title="Change Profile Picture"><img src="<?php echo $profile_picture ?>"><button>Update Picture</button></a>
				
				</div>

				<div class="user-details">
					<h3><?php echo $firstname ?>&nbsp;<?php echo $lastname ?></h3>
					<h2><?php echo $username ?></h2>
				</div>
		</div>
		
		
		
		<div id="right-nav">
			<h1>ข้อมูลส่วนตัว</h1>
			<hr />
			<br />
			<?php
			include('includes/database.php');
			$sql1 = "SELECT * FROM user where user_id='$id' ";
			$result=mysqli_query($con,$sql1);
			
			while($test = mysqli_fetch_array($result))
			{
				$id = $test['user_id'];	
				echo " <div class='box'>";
				echo " <div>";
				echo " <label>ชื่อ</label>&nbsp;&nbsp;&nbsp;<b>".$test['firstname']."</b>";
				echo "</div> ";
				echo "<hr /> ";		
				echo "<br /> ";		
				echo " <div>";
				echo " <label>นามสกุล</label>&nbsp;&nbsp;&nbsp;&nbsp;<b>".$test['lastname']."</b>";
				echo "</div> ";
				echo "<hr /> ";	
				echo "<br /> ";		
				echo " <div>";
				echo " <label>ชื่อผู้ใช้ (Username)</label>&nbsp;&nbsp;&nbsp;<b>".$test['username']."</b>";
				echo "</div> ";
				echo "<hr /> ";	
				echo "<br /> ";		
				echo " <div>";
				echo " <label>วันเกิด</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>".$test['birthday']."</b>";
				echo "</div> ";
				echo "<hr /> ";	
				echo "<br /> ";		
				echo " <div>";
				echo " <label>Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>".$test['gender']."</b>";
				echo "</div> ";
				echo "<hr /> ";	
				echo "<br /> ";		
				echo " <div>";
				echo " <label>Number</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>".$test['number']."</b>";
				echo "</div> ";
				echo "<hr /> ";	
				echo "<br /> ";	
				echo "</div> ";
				echo "<br /> ";		
				echo " <div class='edit-info'>";
				echo " <a href ='edit_profile.php?user_id=$id'><button>Edit Profile</button></a>";
				echo "</div> ";
				echo "<br /> ";	
				echo "<br /> ";	
			}
			?>
			
		</div>
		<div id="right-nav">
			<h1>เปลี่ยนรหัสผ่าน</h1>
			<form name="edit_password" method="POST" action="change-password.php">
        <label id="currenpassword">รหัสผ่านปัจจุบัน:</label><input type="password" name="currentPassword"><br>

        <label>รหัสผ่านใหม่ </label><input type="password" name="newPassword"><br>
        <label>ยืนยันรหัสผ่านใหม่</label><input type="password" name="confirm-newPassword"><br>
        <hr><br>
        
        <button type="submit">ยืนยันการแก้ไขรหัสผ่าน</button>
    </form>
		</div>

	
		</div>
		

	
		
	</div>

</body>

</html>