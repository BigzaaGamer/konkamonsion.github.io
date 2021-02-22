					
<?php
include('includes/database.php');

						if(isset($_POST['submit']))
						{
							//$email=$_POST['email'];
							$username=$_POST['txt_Username'];
							$password=$_POST['txt_Password'];
						{
							$sql1= "SELECT * FROM user WHERE username = '$username' and password='$password'" ;
							$result = mysqli_query($con,$sql1) or die (mysqli_error($sql1));
							echo $sql1;
							
							$row = mysqli_fetch_array($result);
							$count = mysqli_num_rows($result);				
								if ($count == 0) 
									{
									echo "<script>alert('Please check your username and password!'); window.location='signin.php'</script>";
									} 
								else if ($count > 0)
									{
										session_start();
										$_SESSION['id'] = $row['user_id'];
										header("location:home.php");
									}
						}				
						}
?>