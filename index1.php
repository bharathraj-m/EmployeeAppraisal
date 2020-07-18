<?php

//include('dbconnect.php');
include('side.php');
if((isset($_POST['submit'])!="")&&(!empty($_FILES['photo']['name']))){
  $name=$_FILES['photo']['name'];
  $ext = pathinfo($name, PATHINFO_EXTENSION);
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
 $caption1=$_POST['caption'];
 $link=$_POST['link'];
 $mes=$_POST['message'];
 $stid2=$_REQUEST['filename'];
  move_uploaded_file($temp,"fileupload/upload/".$name);
$query=$conn->query("insert into upload(name,stid)values('$name','$stid2')");


$subject="Subtask Submission";

$frm1=$_SESSION['eid'];

$query1="SELECT * from subtasks as s,projects as p WHERE s.pno=p.pno AND s.stid='$stid2'";
$result1=mysqli_query($conn,$query1);
$row=mysqli_fetch_array($result1);
$message=" Subtask  ".$row["sname"]." submission of Project ".$row["pname"]." by ".$row["eid"]." <br/> FILENAME:".$name."<br/> Remarks:".$mes;
$to1=$row['p_mgr_id'];
$_SESSION['subject']=$subject;
$_SESSION['message']=$message;
$_SESSION['from1']=$frm1;
$_SESSION['to1']=$to1;
include('notification.php');
$name=$_FILES['photo']['name'];


$_SESSION['message1']="Submission of Subtask ".$row["sname"]." with File:".$name;
include("addact.php");





if($query){
	echo "<script>alert('Submission successful!')</script>";
               // header('location:admin.php');
                echo "<script>window.location.href='empproj.php'</script>";
//header("location:empproj.php");
}
else{
	echo "<script>alert('Submission not successful!')</script>";
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
<div class="right_col" role="main">
      <div class="">
      <div class="row top_tiles">

	    <div class="row-fluid">
	        <div class="span12">
	            <div class="container">
		<br />
		<div class="page-title">
              <div class="title_left">
                <h3>Subtask Submission</h3>
              </div>

            </div>
		<br />
		<br />
    <?php
    $stid=$_REQUEST['filename'];
    $query="SELECT * from subtasks WHERE $stid=stid";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    ?>
    <div >

  <br>
   <div class="row">

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Subtask Submission</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
			<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" class="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subtask Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="phard" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row["sname"]; ?>" readonly>
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message">Remarks</label>
                          <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"></textarea></div>

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
	</div>
	</div>

	</div>
</div>
</div>
	</div>

	</div>
</body>
</html>
