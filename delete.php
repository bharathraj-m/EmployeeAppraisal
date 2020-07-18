
<?php
//$conn=new PDO('mysql:host=localhost; dbname=dbtest', 'root', '') or die(mysql_error());
//include('../dbconnect.php');
include('side.php');
$file_name=$_REQUEST['filename'];

if((isset($_POST['submit'])!="")){
$file_name=$_REQUEST['filename'];



$query=$conn->query("UPDATE subtasks set status='pending'  WHERE stid IN (SELECT stid from upload where name='$file_name')");
$file_path='fileupload/upload/'.$_REQUEST['filename'];
$mes=$_POST['message'];

$subject="Subtask Rejected";

$frm1=$_SESSION['eid'];

$query1="SELECT * from subtasks WHERE stid IN (SELECT stid from upload where name='$file_name')";
$result1=mysqli_query($conn,$query1);
$row=mysqli_fetch_array($result1);
$message="Sorry!! Your submission of subtask ".$row["sname"]." of Project No ".$row["pno"]." has been rejected!! <br/> Remarks: ".$mes."<br/> Please resubmit it.";
$to1=$row['eid'];
$_SESSION['subject']=$subject;
$_SESSION['message']=$message;
$_SESSION['from1']=$frm1;
$_SESSION['to1']=$to1;
include('notification.php');

$_SESSION['message1']="You rejected the Subtask ".$row["sname"]."of Project NO:".$row["pno"];
   include("addact.php");


unlink($file_path);
//echo $file_name;
$query=$conn->query("delete from upload where name='$file_name'");
if($query){
echo "<script>alert('Submission Rejected!')</script>";
               // header('location:admin.php');
echo "<script>window.location.href='mgrp.php'</script>";}
else
  echo "<script>alert('Failed!')</script>";
}
?>
<html>
<head>
<title>Subtask Rejection</title>
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
                <h3>Subtask Rejection</h3>
              </div>

            </div>
		<br />
		<br />

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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Submission File<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="phard" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $file_name; ?>" readonly>
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message">Remarks</label>
                          <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"></textarea></div>


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
