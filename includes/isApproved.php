<?php 
if($id == '' || $_SESSION['UserID'] == '' || $_SESSION['id'] == ''){
    header("location:index.php");
    return 0;
}
if ($userStatus == "WAITING"){
	echo " <script>alert('Your Account ยังหกห');</script>";
	header('location:notApprovedPage.php');
	return 0;
}
?>