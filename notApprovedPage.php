<?php
include('session.php');
if($id == '' || $_SESSION['UserID'] == '' || $_SESSION['id'] == ''){
    header("location:index.php");
    return 0;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>not-approve-page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="charset" content="utf-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mitr:400,600&amp;subset=thai">
    <link rel="stylesheet" href="fonts/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.min.css">
</head>

<body style="font-family: Mitr, sans-serif;">
    <section>
        <header>
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" id="platform_name" href="home.php" style="font-size: 30px;">Social Platform</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"><a class="nav-link active" id="home" href="home.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" id="timeline" href="timeline-new.php">Timeline</a></li>
                           
                        </ul> 
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" id="search-field" name="search" placeholder="ค้นหาผู้ใช้"></div>
                        </form><a class="btn btn-light action-button" role="button" id="logout" href="logout.php">ออกจากระบบ</a></div>
                </div>
            </nav>
        </header>
    </section>
    <div class="container" style="width: 1139px;height: 100%;">
        <div class="alert alert-warning d-flex flex-column" role="alert" id="notApprpoveAlert"><span style="font-size: 22px;"><strong>คุณยังไม่สามารถเข้าใช้งานระบบได้ในขณะนี้</strong><br></span><span style="font-size: 20px;">สาเหตุ: บัญชีของคุณยังไม่ได้รับการอนุมัติจากผู้ดูแลระบบ</span><a class="alert-link" href="logout.php">ออกจากระบบ</a></div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>