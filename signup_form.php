<?php
	include ('includes/database.php');

		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$username=$_POST['username'];
		$birthday=$_POST['day']." ".$_POST['month']." ".$_POST['year'];
		$gender=$_POST['gender'];
		$number=$_POST['number'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$registerTime = time();
		$sql=mysqli_query($con,"SELECT * FROM user WHERE email='$email'");
		$row=mysqli_num_rows($sql);
		if ($row > 0){
			echo "<script>alert('E-mail already taken!'); window.location='signup.php'</script>";
		}else{

			mysqli_query($con,"INSERT INTO user (firstname,lastname,username,username2,register_time,birthday,gender,number,email,email2,password,password2)
			VALUES ('$firstname','$lastname','$username','$username','$registerTime','$birthday','$gender','$number','$email','$email','$password','$password')");
			echo "<script>alert('Account successfully created!'); window.location='signin.php'</script>";
		}
			
	//}
	
?>