<!DOCTYPE html>
<html>

<head>
	
	<link rel="stylesheet" type="text/css" href="css/55profile.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/Navigation-with-Search.css">
</head>

<body>
	<?php include ('session.php');
include('includes/isApproved.php');
?>	<h1>ข้อมูลส่วนตัว</h1>
	<hr />
	<br />
	<?php
			include('includes/database.php');
			/*$sql1 = "SELECT * FROM user where user_id='$id' ";
			$result=mysqli_query($con,$sql1);
			
			while($test = mysqli_fetch_array($result))
			{
				$id = $test['user_id'];	
				echo "<label>".$_SESSION['Firstname'].' '.$_SESSION['Lastname']."<br>";
				echo "".$_SESSION['Fullname']."";
				echo " <div class='box'>";
				echo " <div>";
				echo " <label>ชื่อ</label>&nbsp;&nbsp;&nbsp;<b>".$test['firstname']."</b>";
				
				echo "</div> ";
				echo "<hr /> ";		
					
				echo " <div>";
				echo " <label>นามสกุล</label>&nbsp;&nbsp;&nbsp;&nbsp;<b>".$test['lastname']."</b>";
				echo "</div> ";
				echo "<hr /> ";	
					
				echo " <div>";
				echo " <label>ชื่อผู้ใช้ (Username)</label>&nbsp;&nbsp;&nbsp;<b>".$test['username']."</b>";
				echo "</div> ";
				echo "<hr /> ";	
					
				echo " <div>";
				echo " <label>วันเกิด</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>".$test['birthday']."</b>";
				echo "</div> ";
				echo "<hr /> ";	
					
				echo " <div>";
				echo " <label>Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>".$test['gender']."</b>";
				echo "</div> ";
				echo "<hr /> ";	
					
				echo " <div>";
				echo " <label>Number</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>".$test['number']."</b>";
				echo "</div> ";
				echo "<hr /> ";	
				
				echo "</div> ";
					
				echo " <div class='edit-info'>";
				echo " <a href ='edit_profile.php?user_id=$id'><button>Edit Profile</button></a>";
				echo "</div> ";
				
				
			}*/
			
			?>
	<form action="settings/basicinfo.php" method="POST" id="basicinfo">
		<label>ชื่อ</label><input name="newfName" value="<?php printf("$_SESSION[Firstname]"); ?>"><br>
		<label>นามสกุล</label><input name="newlName" value="<?php printf("$_SESSION[Lastname]"); ?>"><br>
		<label>ชื่อเล่น</label><input name="newnName" value="<?php printf("$_SESSION[Nickname]"); ?>"><br>
		<!--<label>ชื่อใหม่ </label> <input type="text" name="newfName"><br>
		<label>นามสกุลใหม่ </label> <input type="text" name="newlName"><br>
		<label>ชื่อเล่นใหม่ </label><input type="text" name="newnName"><br>-->
		<br>
		<label>รหัสผ่านยืนยัน</label> <input type="password" name="confirmPass"><br>
		<button type="submit">OK</button>
	</form>
<hr>
<h1>ที่อยู่และอื่นๆ</h1>
<form action="settings/address.php" method="POST" id="address">
	<label>ที่อยู่</label>
	<textarea style="resize:none"></textarea>
</form>

	<h1>เปลี่ยนรหัสผ่าน</h1>
	<form name="edit_password" method="POST" action="change-password.php">
		<label id="currenpassword">รหัสผ่านปัจจุบัน:</label><input type="password" name="currentPassword"><br>

		<label>รหัสผ่านใหม่ </label><input type="password" name="newPassword"><br>
		<label>ยืนยันรหัสผ่านใหม่</label><input type="password" name="confirm-newPassword"><br>
		<hr><br>

		<button type="submit">ยืนยันการแก้ไขรหัสผ่าน</button>
	</form>

</body>

</html>