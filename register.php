<?php

	include_once 'side.php';
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}


	$error = false;

	if ( isset($_POST['btn-signup']) ) {

		$error = false;
		// clean user inputs to prevent sql injections


		$eid = trim($_POST['eid']);
		$eid = strip_tags($eid);
		$eid = htmlspecialchars($eid);

		$mail1 = trim($_POST['mail1']);
		$mail1 = strip_tags($mail1);
		$mail1 = htmlspecialchars($mail1);


	/*	$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		*/


			// check email exist or not
			$query = "SELECT * FROM employee WHERE eid='$eid'";
			$result = mysqli_query($conn,$query);
			$count = mysqli_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Employee Id is already in use.";
			}


		if (empty($mail1)){
		$error = true;
	    $eError = "Please enter Email Id.";
		}

		// password validation
		/*if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}*/

		// password encrypt using SHA256();
	//	$password = hash('sha256', $pass);

		// if there's no error, continue to signup
		if( !$error ) {
$pass=mt_rand(55555555,99999999);
$pass1 = hash('sha256', $pass);
			$query = "INSERT INTO employee(eid,email,password) VALUES('$eid','$mail1','$pass1')";
			$res = mysqli_query($conn,$query);

			if ($res) {

	            $to=$mail1;
	            $s="Registration";
	            $h="From:csevcetputtur@gmail.com \r\n";
	            $h .="MIME-Version:1.0\r\n";
	            $h .="Content-Type:text/html\r\n";
	            $m="Your Employee ID:".$eid." \n Password:".$pass;
	            $retval=mail($to,$s,$m,$h);
	            if($retval==true){
	            	//echo "sent";

	            }
	            else{
	            	//echo "not sent";
	            }
				$errTyp = "success";
				$errMSG = "Successfully registered. Tell Employee to check his Email.".$pass;
				$_SESSION['message1']="Added new Employee of ID: \'".$eid."\'.";
				   include("addact.php");

			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";
			}

		}


	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Employee</title>
</head>
<body>
	<div class="right_col" role="main">
	<div class="">
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>ADD EMPLOYEE</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>

					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
					<?php
		if ( isset($errMSG) ) {

			?>
			<div class="form-group">
						<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
			<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
							</div>
						</div>
							<?php
		}
		?>


					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User ID<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
<input type="text" name="eid" id="eid" class="form-control col-md-7 col-xs-12" placeholder="Enter User ID" maxlength="40" required />

							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
						<span class="text-danger"><?php echo $emailError; ?></span>
					</div>
					<br/>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email ID<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="email" name="mail1" class="form-control col-md-7 col-xs-12" placeholder="Enter Email" maxlength="40" required />

								<span class="fa fa-inbox form-control-feedback right" aria-hidden="true"></span>
						</div>
						<span class="text-danger"><?php echo $eError; ?></span>
					</div>
					<center>
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

								<button type="submit" class="btn btn-success"  id="submit1" name="btn-signup">Register</button>
						</div>
					</div>
</center>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>

</body>
</html>
<?php ob_end_flush(); ?>
