<?php 
//include('session.php');
session_Start();
if(isset($_SESSION['UserID'] )){
    header("location:home.php");
}
else {
    session_destroy();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Social Platform - Home</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="/js/jquery-3.5.1.min.js"></script>
    
</head>

<body>
<h1>Social Platform</h1>
    <a href="signin.php" title="Sign in"><button value="เข้าสู่ระบบ">เข้าสู่ระบบ</button></a>
    <a href="signup.php" title="Sign up"><button value="สมัครสมาชิก">สมัครสมาชิก</button></a>
<div id="login" onload="loadLogin();"></div>
<script>
function loadLogin(){
$('#login').load('signin.php');
}
</script>
</body>

</html>
<!--<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/index.css">
    <style>
        form {
    display: flex;
    flex-direction: column;
    align-items: center;
}
        </style>
<title>Social Platform- ทดสอบ</title>
<style>
    .contain {
        background-color: inherit !important;
    }
    </style>
</head>
<body>
    <header class="header flex-around">
        <span style="color:var(--white);font-size:30px">Social Platform Online</span>

    </header>
    <div class="contain">

    <div class="flex-center">
    <div class="box">
    <h1>สมัครสมาชิก</h1>
    
    <form action="register_action.php" name="register" method="POST">
        <table id="register">
            <tr>
                <th>Username</th>
                <td><input type="text" required name="txt_Username"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" required name="txt_Password"></td>
            </tr>
            <tr>
                <th>ชื่อ</th>
                <td><input type="text" required name="txt_Fname"></td>
            </tr>
            <tr>
                <th>นามสกุล</th>
                <td><input type="text" required name="txt_Lname"></td>
            </tr>
            <tr>
                <th>EMail</th>
                <td><input type="email" required name="txt_email"></td>
            </tr>
			<tr>
                <th>เบอร์โทร</th>
                <td><input type="text" required name="txt_Phone"></td>
            </tr>
            <tr>
                <th>วัน/เดือน/ปี เกิด</th>
                <td><input type="date" required name="birthday"></td>
            </tr>
            <tr>
                <th>เพศ</th>
                <td><input type="radio" required name="gender" <?php if(isset($gender) && $gender=="male")echo "checked";?>
                        value="male">ชาย
                    <input type="radio"  required name="gender" <?php if(isset($gender) && $gender=="female")echo "checked";?>value="female">หญิง
                </td>
            </tr>
        </table>
        <button type="submit">ok</button>
        
    </form>
    
    </div>
    <div class="box">
        <h1>LOGIN</h1>
        <form action="login_action.php" method="POST" name="login" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Username </th>
                    <td> <input type="text" required name="txt_Username" title="Username ของคุณ"></td>
                </tr>
                <tr>
                    <th>Password </th>
                    <td><input type="password" required  name="txt_Password"></td>
                </tr>
            </table>
            <button type="submit">OK</button>
        </form>
    </div>
    </div>
    </div>
</body>
</html>-->
