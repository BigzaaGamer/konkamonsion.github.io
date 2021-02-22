<!DOCTYPE html>
<html>

<head>
	<title>Social Platform - Sign In</title>
	<link rel="stylesheet" type="text/css" href="css/signin.css">
</head>

<body>
<table>
	<form method="POST" target="_self" action="signin_form.php" enctype="multipart/form-data">
		<tr>
			<td><label>Username หรือ Email</label></td>
			<td><input type="text" autocomplete="none" id="name" name="name" title="Username หรือ Email" required /><br></td>
		</tr>
		<tr>
			<td><label>รหัสผ่าน</label></td>
			<td><input type="password" name="password" title="รหัสผ่าน" required /><br></td>
		</tr>

		<td>
			<input type="submit" name="submit" value="เข้าสู่ระบบ" title="เข้าสู่ระบบ" />
			<input type="reset" name="cancel" value="กลับสู่หน้าหลัก" title="กลับสู่หน้าหลัก" />
		</td>
		</tr>
	</form>
	
	</table>

		            <div class="back-overlay" id="back-overlay"> 
                    <div class="overlay-block" id="overlay-block">
                        
                    </div>
            </div>
</body>

</html>
