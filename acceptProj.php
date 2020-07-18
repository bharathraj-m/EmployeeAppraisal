<?php
session_start();
include('dbconnect.php');
$pid=$_REQUEST['filename'];
$query="UPDATE projects set status='completed'  WHERE pno='$pid'";
$result=mysqli_query($conn,$query);

//project credit evaluation

$d= date("Y-m-d");
$query11="UPDATE projects set submitdate='$d' WHERE pno='$pid'";
$result1=mysqli_query($conn,$query11);


$query12="SELECT * from projects  WHERE pno='$pid'";
$result12=mysqli_query($conn,$query12);
$row12=mysqli_fetch_array($result12);
if(!empty($row12[0])){

$subd=$row12['submitdate'];
$end=$row12['enddate'];
$diff=$row12['difficulty'];
}


    $max="SELECT * from extras";
    $r=mysqli_query($conn,$max);
    $rowq=mysqli_fetch_array($r);
    if($diff=="very_low")
    	$cred=$rowq['p_very_low'];
    else if($diff=="low")
    	$cred=$rowq['p_low'];
    else if($diff=="medium")
    	$cred=$rowq['p_med'];
    else if($diff=="hard")
    	$cred=$rowq['p_hard'];
    else if($diff=="very_hard")
    	$cred=$rowq['p_very_hard'];


if ($subd>$end){
	$subd1 = strtotime($subd);
	$end1 = strtotime($end);
	$difference = $subd1 - $end1;
    $days = floor($difference / (60*60*24) );

    if($days>=10){
    	$cred=0;
    }else
    {
    	$cred=$cred-(($days*10*$cred)/100);

    }
}
else if($subd<$end)
{

    $subd1 = strtotime($subd);
	$end1 = strtotime($end);
	$difference = $end1 - $subd1;
	$days = floor($difference / (60*60*24) );
    if($days<=10){
    	$cred=$cred+(($days*10*$cred)/100);
    }
    else{
    	$cred=2*$cred;
    }

}

$query111="UPDATE projects set credits='$cred' WHERE pno='$pid'";
$result111=mysqli_query($conn,$query111);



//notification
$subject="Project Completion";

$frm1=$_SESSION['eid'];

$query1="SELECT * from projects WHERE pno='$pid'";
$result1=mysqli_query($conn,$query1);
$row=mysqli_fetch_array($result1);
$query2="SELECT * from employee WHERE admin=1";
$result2=mysqli_query($conn,$query2);
$row1=mysqli_fetch_array($result2);
$message="Project \"".$row["pname"]."\" of Project NO: ".$row["pno"]." is submitted by the Manager of ID ".$row["p_mgr_id"];
$to1=$row1['eid'];
$_SESSION['subject']=$subject;
$_SESSION['message']=$message;
$_SESSION['from1']=$frm1;
$_SESSION['to1']=$to1;
include('notification.php');

$_SESSION['message1']="You accepted the Project of Pno: ".$row["pno"];
   include("addact.php");

$_SESSION['pno']=$pid;
include('credits/credproj.php');








if($result)
{
  echo "<script>alert('Approved');</script>";
}
header('Location:mgrp.php');
?>
