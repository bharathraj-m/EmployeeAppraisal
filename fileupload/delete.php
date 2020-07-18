
<?php
session_start();
//$conn=new PDO('mysql:host=localhost; dbname=dbtest', 'root', '') or die(mysql_error());
include('../dbconnect.php');
$file_name=$_REQUEST['filename'];
$query=$conn->query("UPDATE subtasks set status='pending'  WHERE stid IN (SELECT stid from upload where name='$file_name')");
$file_path='upload/'.$_REQUEST['filename'];


$subject="Subtask Rejected";

$frm1=$_SESSION['eid'];

$query1="SELECT * from subtasks WHERE stid IN (SELECT stid from upload where name='$file_name')";
$result1=mysqli_query($conn,$query1);
$row=mysqli_fetch_array($result1);
$message="Sorry!! Your submission of subtask ".$row["sname"]." of Project No ".$row["pno"]." has been rejected!!";
$to1=$row['eid'];
$_SESSION['subject']=$subject;
$_SESSION['message']=$message;
$_SESSION['from1']=$frm1;
$_SESSION['to1']=$to1;
include('../notification.php');



unlink($file_path);
//echo $file_name;
$query=$conn->query("delete from upload where name='$file_name'");

header('Location:../mgrp.php');
?>
