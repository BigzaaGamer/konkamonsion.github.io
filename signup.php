<!DOCTYPE html>
<html>

<head>
	<title>Social Platform - สมัครสมาชิก</title>
	<link rel="stylesheet" type="text/css" href="css/555signup.css">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Mitr:wght@400;600;700&display=swap');

		* {
			box-sizing: border-box;
			font-family: Mitr;
			font-weight: 600;
		}
	</style>
</head>

<body>
	<h1>สมัครสมาชิก</h1>

	<br />
	<form method="POST" action="signup_form.php" enctype="multipart/form-data" autocomplete="off">
	<fieldset>
	
		<legend>ข้อมูลที่ใช้ในการ Login</legend>
		<table>
			<tr>
				<td><label>ชื่อผู้ใช้ (Username)</label></td>
				<td><input type="text" name="username" title="ชือผู้ใช้ของคุณ" required></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td><input type="email" name="email"  required /></td>
			</tr>
			<tr>
				<td><label>รหัสผ่าน</label></td>
				<td><input type="password" name="password" required /></td>
			</tr>
		</table>
	</fieldset>
	<fieldset>
		<legend>ข้อมูลส่วนตัว</legend>
		
			<table>
				<tr>
					<td><label>ชื่อจริง</label></td>
					<td><input type="text" name="firstname" placeholder="" title="Enter your firstname"
							required /></td>
				</tr>
				<tr>
					<td><label>นามสกุล</label></td>
					<td><input type="text" name="lastname" placeholder="" title="Enter your lastname"
							required /></td>
				</tr>
				<tr>
					<td><label>วันเกิด</label></td>
					<td>
						<select name="day" required>

<?php
$day=1;
if(isset($_POST['month']) == 'กุมภาพันธ์'){
while($day<=28)
{
echo "<option> $day
</option>";
$day++;
}
}
else{
while($day<=31)
  {
  echo "<option> $day</option>";
  $day++;
  }
}
?>
						</select>
						<select name="month" id="month" required onchange="checkmonth()">
							<option>มกราคม</option>
							<option>กุมภาพันธ์</option>
							<option>มีนาคม</option>
							<option>เมษายน</option>
							<option>พฤษภาคม</option>
							<option>มิถุนายน</option>
							<option>กรกฎาคม</option>
							<option>สิงหาคม</option>
							<option>กันยายน</option>
							<option>ตุลาคม</option>
							<option>พฤศจิกายน</option>
							<option>ธันวาคม</option>

						</select>
						<select name="year" required>
							<?php
								$year=2500;
								while($year<=2564)
								{
								echo "<option> $year </option>";
								$year++;
								}
								?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label>เพศ</label></td>
					<td>
						<label>ชาย<label><input type="radio" name="gender" value="male" required />
								<label>หญิง</label><input type="radio" name="gender" value="female" required />
					</td>
				</tr>
				<tr>
					<td><label>เบอร์โทรศัพท์</label></td>
					<td><input type="tel" name="number" maxlength="10" title="เบอร์โทรศัพท์มือถือ"
							required /></td>
				</tr>
			</table>
	</fieldset>

	<br />

	<br>
	<input type="submit" name="submit" value="สมัครสมาชิก" title="สมัครสมาชิก" />
	</form>

</body>
</html>