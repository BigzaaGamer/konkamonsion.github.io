<?php function time_stamp($session_time){
    $time_difference=time()-$session_time;
    $seconds=$time_difference;
    $minutes=round($time_difference/60);
    $hours=round($time_difference/3600);
    $days=round($time_difference/86400);
    $weeks=round($time_difference/604800);
    $months=round($time_difference/2419200);
    $years=round($time_difference/29030400);
if($seconds<=60){/*echo"$seconds วินาทีที่แล้ว";*/echo "ไม่กี่วินาทีที่แล้ว";}else if($minutes<=60){if($minutes==1){echo"1 นาทีที่แล้ว";}else{echo"$minutes นาทีที่แล้ว";}}else if($hours<=24){if($hours==1){echo"1 ชั่วโมงที่แล้ว";}else{echo"$hours ชั่วโมงที่แล้ว";}}else if($days<=7){if($days==1){echo"1 วันที่แล้ว";}else{echo"$days วันที่แล้ว";}}else if($weeks<=4){if($weeks==1){echo"1 สัปดาห์ที่แล้ว";}else{echo"$weeks สัปดาห์ที่แล้ว";}}else if($months<=12){if($months==1){echo"1 เดือนที่แล้ว";}else{echo"$months เดือนที่แล้ว";}}else{if($years==1){echo"1 ปีที่แล้ว";}else{echo"$years ปีที่แล้ว";}}} ?>   