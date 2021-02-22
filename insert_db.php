<?php
include("database.php");

    $uname = $_GET['t1'];
    $uglucose_p = $_GET['t2'];
    $uresp_p = $_GET['t3'];
    $ubp = $_GET['t4'];
    $uheart_rate = $_GET['t5'];
    $ucholesterol_p = $_GET['t6'];
    $uoxygen = $_GET['t7'];

$selectquery = "select * from user_data";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

$no=0;
while($res = mysqli_fetch_array($query))
        {
            if($uname == $res['name'])
            {              
                $no = 1;                
            }
        }


if($no == 1)
{

    $qry1="UPDATE user_data SET glucose_p = '$uglucose_p',resp_p = '$uresp_p',
    bp = '$ubp',heart_rate = '$uheart_rate',cholesterol_p = '$ucholesterol_p',
    oxygen = '$uoxygen' WHERE name = '$uname'";
    mysqli_query($con,$qry1);
}
else
{
    
    $qry2 = "INSERT INTO `user_data`(`name`, `glucose_p`, `resp_p`, `bp`, `heart_rate`, `cholesterol_p`, `oxygen`) VALUES ('$uname','$uglucose_p','$uresp_p','$ubp','$uheart_rate','$ucholesterol_p','$uoxygen')";
    mysqli_query($con,$qry2);
}








?>