<?php
session_start();
include('dbconnect.php');
if( !isset($_SESSION['eid']) ) {
  header("Location: login2.php");
  exit;
}
$eid=$_SESSION['eid'];
$res=mysqli_query($conn,"SELECT * FROM employee WHERE eid='$eid'");
$userRow=mysqli_fetch_array($res);
if(isset($_POST['submit'])!="")
{
  $fname=$_POST['first-name'];
  $mail1=$_POST['email'];
//  $pfield = trim($_POST['pfield']);

  $pno=$_POST['pno'];
  $pno = preg_replace('/[^0-9.]+/', '', $pno);
  $gender=$_POST['gender'];
  $dob=$_POST['dob'];
    $addr=$_POST['addr'];
    $bio= $_POST['sbio'];
  $name=$_FILES['photo']['name'];
  $ext = pathinfo($name, PATHINFO_EXTENSION);
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  $a=1;
 move_uploaded_file($temp,"userfiles/avatars/".$name);
 if(!empty($name))
 $query=$conn->query("update employee set ename='$fname',email='$mail1',phone='$pno',gender='$gender',dob='$dob',short_bio='$bio',address='$addr',first_log='$a',avatar_url='$name' WHERE eid='$eid'");
 else {
   $query=$conn->query("update employee set ename='$fname',email='$mail1',phone='$pno',gender='$gender',dob='$dob',short_bio='$bio',address='$addr',first_log='$a' WHERE eid='$eid'");
 }
 if($query){

$_SESSION['message1']="You updated the personal profile details.";
include("addact.php");
 header("Location:pf.php");
 }
 else{
 die(mysql_error('FAILED'));
 }
}


if(isset($_POST['submit1'])!="")
{
  //$pass=$_POST['pass'];
  $pass1= hash('sha256', $pass);
  $ans1=$_POST['ans1'];
//  $pfield = trim($_POST['pfield']);
$ans2=$_POST['ans2'];
$ans1=strtolower($ans1);
$ans2=strtolower($ans2);
 $query=$conn->query("update employee set s_ans_1='$ans1',s_ans_2='$ans2' WHERE eid='$eid'");
 if($query){
$_SESSION['message1']="You updated the Security Questions details.";
   include("addact.php");
 header("Location:pf.php");
 }
 else{
 die(mysql_error('FAILED'));
 }
}





if(isset($_POST['submit2'])!="")
{

  $empid=$_SESSION['eid'];
  $pass=$_POST['pass'];
  $npass=$_POST['npass'];
  $cpass=$_POST['cpass'];
  $pass1= hash('sha256', $pass);
  $ans1=$_POST['ans1'];
//  $pfield = trim($_POST['pfield']);
$ans2=$_POST['ans2'];
$ans1=strtolower($ans1);
$ans2=strtolower($ans2);

// $userRow=mysqli_fetch_array($res);

$opass=$userRow['password'];
if($opass!=$pass1){

  echo "<script>alert('Incorrect Current Password!!!')</script>";
   echo "<script>window.location.href='pf.php'</script>";
}
else if($cpass!=$npass)
  {
       echo "<script>alert('Passwords did not match!!!')</script>";
     echo "<script>window.location.href='pf.php'</script>";
  }
else{
 $npass1= hash('sha256', $npass);
 $query=$conn->query("update employee set password='$npass1' WHERE eid='$eid'");
 if($query){
     $_SESSION['message1']="You changed your Password!";
     include("addact.php");
     echo "<script>alert('Password change successfull!!!')</script>";
     echo "<script>window.location.href='pf.php'</script>";
 }
 else{
 die(mysql_error('FAILED'));


}
}

}
 ?>
