<?php
date_default_timezone_set("Asia/Bangkok");
    $con=mysqli_connect("localhost","root","1234","social_platform2") or die("Error: " . mysqli_error($con));
    mysqli_query($con, "SET NAMES 'utf8'");

?>
