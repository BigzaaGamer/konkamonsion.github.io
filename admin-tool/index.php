<?php
include('../session.php');
include("../includes/database.php");
$limit = $_GET['userlist-limit'];
$filter = $_GET['filter'];
if($_SESSION['UserLevel'] != 'ADMIN'){
    header("location:../home.php");
}
if(!isset($limit)){
    $limit = null;
    header("location:?userlist-limit=10");
    return 1;
}
if(!isset($filter)){
    header("location:?userlist-limit=999&filter");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="../js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <!--<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <div style="display:flex;flex-direction:row;align-items:center;">
        <div id="profile" style="background-image: url('../<?php echo $profile_picture; ?>');width:30px;height:30px;background-size:cover;background-position:center;border-radius:50%;"></div>
        <span><?php echo $_SESSION['Fullname']; ?> </span>
    </div>
        <h1>ผู้ใช้ที่กำลังรออนุมัติ</h1>
        <fieldset>
            <legend>ผู้ใช้ที่กำลังรอ</legend>
            
                            <?php            
            $pending = "SELECT * FROM user WHERE user_status = 'WAITING'";
            $pending_query = mysqli_query($con,$pending);
            
            if(mysqli_num_rows($pending_query) > 0){
                echo "<table cellpadding='5'>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>วันที่สมัคร</th>";
                    echo "<th>ชื่อ</th>";
                    echo "<th>นามสกุล</th>";
                    echo "<th>ชื่อผู้ใช้</th>";
                    echo "<th>วันเกิด</th>";
                    echo "<th>เพศ</th>
                        <th>เบอร์โทร</th>
                        <th>Action</th>
                    </tr>";
                while($row=mysqli_fetch_array($pending_query)){
                    
                    echo "<tr>";
                    echo "<td>$row[user_id]</td>";
                    echo "<td>";
                    echo (date("F j, Y, g:i a", $row['register_time']));
                    echo "</td>";
                    echo "<td>$row[firstname]</td>";
                    echo "<td>$row[lastname]</td>";
                    echo "<td>$row[username]</td>";
                    echo "<td>$row[birthday]</td>";
                    echo "<td>$row[gender]</td>";
                    echo "<td>$row[number]</td>";
                    //mysqli_query($con, "SELECT * from user")
                    echo "<td><a href='approve-user.php?userid=$row[user_id]'>อนุมัติ</a>&nbsp;";
                    echo "<a href='decline-user.php?userid=$row[user_id]' style='color:#fa0000'>ไม่อนุมัติ</a></td>";
                    echo "</tr>";
                }
            }
            else{
                echo "<span>ไม่มีผู้ใช้ที่กำลังรออนุมัติ</span>";
            }
            echo "</table>"
            
            ?>
        </fieldset>
        <div style="display:flex;align-items:center;"><h1>รายชื่อสมาชิกทั้งหมดในเว็บ</h1><a href="userlist.php">ดูในหน้าใหม่</a></div>
        <fieldset>
        <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ชื่อ-นามสกุล</th>
                <th>Username</th>
                <th>E-Mail</th>
                <th>สถานะของบัญชี</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php 

        if(empty($limit)){$all_user = "SELECT * FROM user order by user_id ASC ";}
        if(empty($filter)){$all_user = "SELECT * FROM user WHERE user_status != 'WAITING' order by user_id ASC LIMIT $limit ";}
        else{$all_user = "SELECT * FROM user WHERE user_status= '$filter' AND user_status != 'WAITING' order by user_id ASC LIMIT $limit ";}
        $all_user_Query = mysqli_query($con,$all_user);
        $amount=1;
        while($row2=mysqli_fetch_array($all_user_Query)){
            
            if(mysqli_num_rows($all_user_Query)>0){

                $amount++;
?> 
        <tbody>

            <tr>
                <td><?php echo $row2['user_id'];?></td>
                <td><?php echo "<a href='../timeline-new.php?user_id=$row2[user_id]'>"; echo $row2['firstname']." ".$row2 ['lastname'];?></td>
                <td><?php echo $row2['username'];?></td>
                <td><?php echo $row2['email'];?></td>
                <td><?php echo $row2['user_status'];?> </td>
                <td><?php if($row2['user_status'] == 'BANNED'){echo "<a href='unban-user.php?userid=$row2[user_id]'>UNBAN</a>";}else{echo "<a href='ban-user.php?userid=$row2[user_id]'>BAN</a>";}?>
            </tr>

        </tbody>
        <?php }
                
             } echo "สมาชิกทั้งหมด : $amount";?>
    </table>
</div>
        </fieldset>
    </body>
</html>