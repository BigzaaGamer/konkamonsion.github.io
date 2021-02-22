<?php include ('session.php');?>
<?php
	include ('includes/database.php');
	
	if (isset($_POST['submit']))
	{
		$firstname=$_POST['txt_Fname'];
		$lastname=$_POST['txt_Lname'];
		$username=$_POST['txt_Username'];
		//$username2=$_POST['username2'];
		$birthday=$_POST['birthday'];
		$gender=$_POST['gender'];
		$number=$_POST['txt_Phone'];
		$email=$_POST['txt_email'];
		//$email2=$_POST['email2'];
		$password=$_POST['txt_Password'];
		//$password2=$_POST['password2'];
		
			$sql1="SELECT * FROM user WHERE email='$email'";
			$result = mysqli_query($con,$sql1);
			$row=mysqli_num_rows($result);
			if ($row > 0)
			{
			echo "<script>alert('E-mail already taken!'); window.location='signup.php'</script>";
			}
			else if($password != $password2)
			{
			echo "<script>alert('Password do not match!'); window.location='signup.php'</script>";
			}else
		{
			$sql2 = "INSERT INTO user (firstname,lastname,username,username2,birthday,gender,number,email,email2,password,password2)
			VALUES ('$firstname','$lastname','$username','$username2','$birthday','$gender','$number','$email','$email2','$password','$password2')";
			mysqli_query($con,$sql2);
			echo "<script>alert('Account successfully created!'); window.location='signin.php'</script>";
		}
			
	}
	
?>