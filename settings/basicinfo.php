<?php

    session_start();
    if(isset($_POST['newfName'])){
        include("../includes/database.php");
        $NewFirstName = $_POST['newfName'];
        $NewLastName = $_POST['newlName'];
        $NewNickName = $_POST['newnName'];
        $Password = $_POST['confirmPass'];
        $sql = "UPDATE user SET firstname='".$NewFirstName."' , lastname='".$NewLastName."' , nickname='".$NewNickName."' WHERE '".$_SESSION['UserID']."' = user_id";
        
        if ($Password == $_SESSION['Password']){
            $result= mysqli_query($con,$sql);
            $_SESSION["Fullname"] = $NewFirstName." ".$NewLastName;
            $_SESSION["Nickname"] = $NewNickName;
            echo "<script> window.history.back(); </script>";
            }
        else {
            echo "incorrect password";
            echo "<script> alert(\"incorrect password\") </script>";
            echo "<script> window.history.back(); </script>";
        }
        
    }
    
    mysqli_close($con);
?>
       