<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> - Social Platform</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="css/Navigation-with-Search.css">
    <link rel="stylesheet" href="css/timeline.css">
    <link rel="stylesheet" href="css/root.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    a {
        color:black;
        font-size:14px;
    }
    </style>
</head>
<body>
<?php
include ('includes/database.php');

if (isset($_POST['submit']))
{
   $input_name = $_POST['name'];

    $password = $_POST['password'];/*
    {
        if ($input_name != '' && $password != '')
        {
            if (filter_var($input_name, FILTER_VALIDATE_EMAIL))
            {
				$query1 = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$input_name' AND `password` = '$password'");
            }
            else
            {
                $query1 = mysqli_query($con, "SELECT * FROM user WHERE username = '$input_name' and password='$password'");
			}
			$row = mysqli_fetch_array($query1);
            $rows = mysqli_num_rows($query1);
            if ($rows > 0)
            {
                session_start();
                $_SESSION['id'] = $row['user_id'];
                header("location:home.php");
            }
            if ($rows == 0)
            {
                echo "<script>alert('Please check your username and password!'); window.location='signin.php'</script>";

            }
        }
    }
}*/

if (filter_var($input_name, FILTER_VALIDATE_EMAIL))
{
	$result = mysqli_query($con, "SELECT * FROM user WHERE email = '$input_name' AND password = '$password'");
}
else{
$result = mysqli_query($con,"SELECT * FROM user WHERE username = '$input_name' and password='$password'");	}
							$row = mysqli_fetch_array($result);
                            $userstatus = $row['user_status'];

							$count = mysqli_num_rows($result);				
								if ($count == 0) 
									{
									echo "<script>alert('Please check your username and password!'); window.location='signin.php'</script>";
									} 
								else if ($count > 0)
									{
                                        if($userstatus == "BANNED"){
                                            $id = $row['user_id'];
                                            $banned_data = mysqli_query($con,"SELECT * FROM banned JOIN user WHERE banned.user_id = $id AND user.user_id = $id");
                                            while($row2 = mysqli_fetch_array($banned_data)){
                                                $reason = $row2['reason'];
                                                ?>

                                                    <div style="position:relaive;">
                                                        <div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);text-align:center;" role="alert" class="alert alert-danger"><span>บัญชีนี้ถูกระงับการใช้งาน</span><br>
                                                        <?php if(empty($reason)){}else{echo "<span >สาเหตุ : </span><span>$reason </span>";}?>
                                                        <hr><a href="logout.php">ออกจากระบบ</a>
                                                        </div>
                                                        
                                                    </div>
                                               
                                                <?php

                                            
                                        }
                                    }
                                        else{
										session_start();
										$_SESSION['id'] = $row['user_id'];
										header("location:home.php");
                                        }
									}
						}				
						//}


		
?>
 </body>
</html>