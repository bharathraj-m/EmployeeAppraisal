<?php

$empid=$_SESSION['eid'];

$qu="SELECT max(date1) FROM `activities` WHERE eid=$empid and date1<(SELECT max(date1) FROM `activities` WHERE eid=$empid and date1<(SELECT max(date1) FROM `activities` WHERE eid=$empid))";
$ru=mysqli_query($conn,$qu);
$resu=mysqli_fetch_array($ru);
$tdate=$resu['0'];
$qu2="DELETE from `activities` WHERE eid='$empid' and date1<'$tdate'";
$ru2=mysqli_query($conn,$qu2);
?>
