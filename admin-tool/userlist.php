<?php
include('../session.php');
include("../includes/database.php");
$limit = $_GET['limit'];
$filter = $_GET['filter'];

if($_SESSION['UserLevel'] != 'ADMIN'){
    header("location:../home.php");
}
if(!isset($limit)){
    $limit = null;
    header("location:?limit=999");
    return 1;
}
if(!isset($filter)){
    header("location:?limit=999&filter");
}
?>
<script src="../js/jquery-3.5.1.min.js"></script>
<h1>รายชื่อสมาชิกทั้งหมดในเว็บ</h1>

        <fieldset>
        <select id="select">
        <option value="nofilter" select="selected">ล้าง filter</option>
        <option value="banned"><a href="userlist.php?limit=<?php echo $limit; ?>&filter=BANNED">User ที่โดนแบน</a></option>
        <option value="approved"><a href="userlist.php?limit=<?php echo $limit; ?>&filter=APPROVED">User ที่อนุมัติแล้ว</a></option>
        <input type="submit" id="submit">
        </select>
        <script>
        if($('#select').change(function(){
            var value = $(this).val();
            if(value != "nofilter"){

            if (value=="banned"){
                $("#select").value=value;
                $("body").load('userlist.php?limit=<?php echo $limit; ?>&filter=BANNED');    
            }
            if(value=="approved"){
                $("body").load('userlist.php?limit=<?php echo $limit; ?>&filter=APPROVED');
            }
            
        }
      
        }));
        </script>
        
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