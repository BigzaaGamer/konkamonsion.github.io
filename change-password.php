<?php
require('includes/database.php');
include('session.php');
if(isset($_POST['currentPassword'])){

    $NewPassword = $_POST['newPassword'];
    $confirmNewPass = $_POST['confirm-newPassword'];
    $oldPassword = $_POST['currentPassword'];
    $sql = "UPDATE user SET password='".$NewPassword."' WHERE user_id  = $id";
    
    if ($oldPassword == $_SESSION['Password']){
        if($NewPassword != $confirmNewPass){
            echo "รหัสผ่านใหม่ ไม่ตรงกัน";
        }
        else{
        $result= mysqli_query($con,$sql);

        echo "Password Changed Successfully!!!!!!";
        }
    }
    else {
        echo "<span style='color:red;'>กรุณาใส่รหัสผ่านปัจจุบันให้ถูกต้อง</span>";
    }
      
    
}
?>