<?php
session_start();
include('../dbconnect.php');
if((isset($_POST['submit'])!="")&&(!empty($_FILES['photo']['name']))){
  $name=$_FILES['photo']['name'];
  $ext = pathinfo($name, PATHINFO_EXTENSION);
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
 $caption1=$_POST['caption'];
 $link=$_POST['link'];
 $stid2=$_REQUEST['filename'];
  move_uploaded_file($temp,"upload/".$name);
$query=$conn->query("insert into upload(name,stid)values('$name','$stid2')");


$subject="Subtask Submission";

$frm1=$_SESSION['eid'];

$query1="SELECT * from subtasks as s,projects as p WHERE s.pno=p.pno AND s.stid='$stid2'";
$result1=mysqli_query($conn,$query1);
$row=mysqli_fetch_array($result1);
$message=" Subtask  ".$row["sname"]." submission of Project ".$row["pname"]." by ".$row["eid"]." with FILENAME:".$name;
$to1=$row['p_mgr_id'];
$_SESSION['subject']=$subject;
$_SESSION['message']=$message;
$_SESSION['from1']=$frm1;
$_SESSION['to1']=$to1;
include('../notification.php');









if($query){
header("location:../empproj.php");
}
else{
die(mysql_error());
}
}
?>
<html>
<head>
<title>Upload Proof</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
</head>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>

	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<style>
</style>
<body>
<a href="../home.php">HOMEPAGE</a>
	    <div class="row-fluid">
	        <div class="span12">
	            <div class="container">
		<br />
		<h1><p>Upload Proof</p></h1>
		<br />
		<br />
    <?php
    $stid=$_REQUEST['filename'];
    $query="SELECT * from subtasks WHERE $stid=stid";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    ?>
    <div >
<p><h3>Subtask Name: <?php echo $row["sname"];?></h3>
<br/>
<h3>Subtask ID: <?php echo $row["stid"];?></h3>
</p>
			<form enctype="multipart/form-data" action="" name="form" method="post">
        <input type="text" name="stid" id="stid" value="<?php echo $row["stid"];?>" disabled/>
        <label for="remarks">Remarks</label><textarea name="remarks" rows=12 style="margin: 0px 0px 10px; width: 462px; height: 231px;" id="remarks"></textarea>
        <label for="photo">Select File</label>
					<input type="file" name="photo" id="photo" /></td><br/><br />
      		<br />
					<input type="submit" name="submit" id="submit" value="Submit" />
			</form>
		<br />
		<br />
  </div>
	</div>
	</div>

	</div>

</body>
</html>
