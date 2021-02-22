<?php
include('includes/database.php');
    //$searchquery = $_POST['search'];
    $searchquery =$_GET['search'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="css/Navigation-with-Search.css">
    <link rel="stylesheet" href="css/search-result.css">
    <title><?php echo $searchquery; ?> - ผลการค้นหา | Social Platform</title>
</head>
<body>
    <section>
        <header>
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" id="platform_name" href="home.php" style="font-size: 30px;">Social Platform</a><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a class="nav-link" id="home" href="home.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" id="timeline" href="timeline-new.php">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="/admin-tool">Admin Page</a></li>
                        </ul>
                        <form class="form-inline mr-auto" target="">
                            <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input type="search" class="form-control search-field" id="search-field" name="search" placeholder="ค้นหาผู้ใช้" value="<?php echo $searchquery; ?> " /></div>
                        </form><a class="btn btn-light action-button" role="button" id="logout" href="logout.php">ออกจากระบบ</a></div>
                </div>
            </nav>
        </header>
    </section>
    <section>
        <div class="container" style="width: 70%;padding-top: 10px;">
            <div style="background: #ffffff;padding: 10px;border-radius: 10px;margin-bottom: 20px;">
                <div style="font-size: 25px;"><span>ผลการค้นหา : </span><span>&quot; <?php echo "$searchquery"; ?> &quot;</span></div>
            </div>
<?php
    $sql1= mysqli_query($con,"SELECT * FROM user WHERE username LIKE '".$searchquery."%' OR firstname LIKE '".$searchquery."%'");
    if(mysqli_num_rows($sql1)> 0){
        $amount = 0;
        
        while($row=mysqli_fetch_array($sql1)){
            $amount++;
            $username =$row['username'];
            $profile_pic = $row['profile_picture'];
            $fullname = $row['firstname'].' '.$row['lastname'];
            $userid = $row['user_id'];
            $user_status = $row['user_status'];
?> 
            <div>              
                <div style="background: #ffffff;padding: 10px;border-radius: 10px;margin-bottom:10px;">
                    <div class="d-flex align-items-center" style="font-size: 20px;">
                        <div style="background: url('<?php echo $profile_pic; ?>') center / cover;width: 40px;height: 40px;margin-right: 10px;"></div>
                        <a href="timeline-new.php?user_id=<?php echo $userid; ?>"><?php echo $fullname; ?></a>
                        <?php if($user_status == "APPROVED"){
                            echo "<i class='fa fa-check-circle-o' data-toggle='tooltip' title='บัญชีนี้อนุมัติแล้ว' style='margin-left: 5px;color: #00ea25;'></i>";
                        }if($user_status == "WAITING"){
                            echo "<i class='fa fa-times-circle-o' style='margin-left: 5px;color: #ce1126;'></i>";
                        }                     
                        ?>
                    </div>
                </div>
            </div>
<?php
        }
		?><div style="background: #ffffff;padding: 10px;border-radius: 10px;margin-bottom:10px;">สิ้นสุดการค้นหา <?php echo $amount;?></div><?php
		
    
    }else{?>
    <section>
        <div>
            <div style="background: #ffffff;padding: 10px;border-radius: 10px;">
<span style="font-size:18px;">ไม่พบผลลัพธ์</span>
            </div>
        </div>
    </section>
<?php } ?>
</div>
    </section>
</body>

</html>
