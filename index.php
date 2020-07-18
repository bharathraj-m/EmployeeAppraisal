<?php

	ob_start();
	session_start();
	include('dbconnect.php');

	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['eid'])!="" ) {
		header("Location: home.php");
		exit;
	}

	$error = false;

	if( isset($_POST['btn-login']) ) {

		// prevent sql injections/ clear user invalid inputs
		$eid = trim($_POST['eid']);
		$eid = strip_tags($eid);
		$eid = htmlspecialchars($eid);

		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		// if there's no error, continue to login
		if (!$error) {

			$pass1 = hash('sha256', $pass); // password hashing using SHA256

			$res=mysqli_query($conn,"SELECT * FROM employee WHERE eid='$eid' or uname='$eid'  AND password='$pass1'");
			$row=mysqli_fetch_array($res);
			$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

			if( $count == 1 && $row['password']==$pass1 ) {
				$_SESSION['eid'] = $row['eid'];
				$_SESSION['admin']=$row['admin'];
				$_SESSION['proj_mgr']=$row['proj_mgr'];
				$var=$row['first_log'];
				if($var==0){header("Location: pf.php");}
				else{
					 include('deleteact.php');
				header("Location: home.php");}
			} else {
				$errMSG = "Incorrect Credentials, Try again...";
			}

		}

	}
	if ( isset($_POST['btn-signup']) ) {

	$error = false;
	$flag=0;
	// clean user inputs to prevent sql injections


	$eid = trim($_POST['eid']);
	$eid = strip_tags($eid);
	$eid = htmlspecialchars($eid);


	$ans1 = trim($_POST['ans1']);
	$ans1 = strip_tags($ans1);
	$ans1 = htmlspecialchars($ans1);
	$ans1=strtolower($ans1);




	$ans2 = trim($_POST['ans2']);
	$ans2 = strip_tags($ans2);
	$ans2 = htmlspecialchars($ans2);
	$ans2=strtolower($ans2);


		// check email exist or not
		$query = "SELECT * FROM employee WHERE eid='$eid'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		$res1=mysqli_fetch_array($result);

		if($count==0){
			$error = true;
			$errTyp1 = "danger";
			$errMSG1 = "Provided Employee Id is not in use.";

		}

				 $sans1=$res1['s_ans_1'];
				 $sans2=$res1['s_ans_2'];
				 $tomail=$res1["email"];



					if ($ans1==$sans1 && $ans2==$sans2 && !$error){
						$flag=1;

		$pass=mt_rand(55555555,99999999);
					$to=$tomail;
					$s="Password Reset";
					$h="From:csevcetputtur@gmail.com \r\n";
					$h .="MIME-Version:1.0\r\n";
					$h .="Content-Type:text/html\r\n";
					$m="You have successfully reset the password. Your new password is:".$pass;
					$retval=mail($to,$s,$m,$h);
					if($retval==true){
						//echo "sent";

					}
					else{
						//echo "not sent";
					}
			}
			else
			{
				$error=true;
			}

	if (empty($ans1)){
	$error = true;
		$eError = "Please enter Ans1.";
	}
	if (empty($ans2)){
	$error = true;
		$eError = "Please enter Ans2.";
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
	if( !$error) {
 echo $pass;
 $pass1 = hash('sha256', $pass);
		$query = "UPDATE employee  set password='$pass1' where eid='$eid'";
		$res = mysqli_query($conn,$query);

		if ($res) {
			$errTyp1 = "success";
			$errMSG1 = "Password reset Sucessful!, Check Your Mail!, You may login now";

		} else {
			$errTyp1 = "danger";
			$errMSG1 = "Something went wrong, try again later...";
		}

	}
	else if($flag==0 && $count!=0) {
			$errTyp1 = "danger";
			$errMSG1 = "Security answers not matched!, try again later...";
		}




}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign In | To Do </title>

    <!-- Bootstrap -->
    <link href="new/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="new/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="new/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="new/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="new/build/css/custom.min.css" rel="stylesheet">
		<style>
		body {
				height: 100%;
				margin: 0;
		}

		.login {
				/* The image used */
				background-image: url("city.jpg");


				/* Full height */
				height: 100%;

				/* Center and scale the image nicely */
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: fixed;
		}
		
		div.login_wrapper{
			padding-left: 30%;
		}
		div.wrappe {

		background-color: white;
		border: 1px solid grey;
		opacity:0.8;
		filter: alpha(opacity=90); /* For IE8 and earlier */
	}
	div.wrappe2 {
	margin: 5%;
	opacity:1.0;
	font-weight: bold;
	color: Black;
}
		</style>
  </head>

  <body class="login">
<div style="float:left;margin-left:19%;">
	<header class="masthead text-center text-white d-flex">
      <div class="container my-auto">


          <div class="col-lg-14 mx-auto">
            <h1 >
							<br/>
<strong style="color:white;font-size:100px;margin-left:0%;"><p>To Do</p></strong>
            </h1>


          </div>



				<div class="col-lg-15 mx-auto">

						<hr style="border-width:3px;border-color:white;">
<p style="color:white;font-size:19px;float:left;margin-left:0%;">Credit Based Performance Appraisal System </p>
				</div>
      </div>
    </header>
</div>
    <div style="float:center;">
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>


      <div class="login_wrapper">

        <div class="animate form login_form">
					<div class="wrappe">
          <section class="login_content">
						<div class="wrappe2">
						<?php
			if ( isset($errMSG) ) {

				?>
				<div class="form-group">
							<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
								</div>
							</div>
								<?php
			}
			else if ( isset($errMSG1) ) {

				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp1=="success") ? "success" : $errTyp1; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG1; ?>
                </div>
            	</div>
                <?php
			}
			?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?signup" autocomplete="off">
              <h1>Login</h1>
              <div>
                <input type="text" name="eid" class="form-control" placeholder="Employee ID" required="" />
              </div>
              <div>
                <input type="password" name="pass" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
								<button type="submit" class="btn btn-default submit" name="btn-login">Sign In</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Lost your Password?
                  <a href="#signup" class="to_register"> Reset Password </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-newspaper-o"></i> To Do!</h1>

                </div>
              </div>
            </form>
					</div>
          </section>
				</div>
        </div>

        <div id="register" class="animate form registration_form">
					<div class="wrappe">
          <section class="login_content">
						<div class="wrappe2">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
              <h1>Reset Password</h1>
							<?php
			if ( isset($errMSG1) ) {

				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp1=="success") ? "success" : $errTyp1; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG1; ?>
                </div>
            	</div>
                <?php
			}
			?>
              <div>
                <input type="text" class="form-control" name="eid" placeholder="Employee ID" required=""  value=""/>
							</div>
              <div>
                <input type="text" class="form-control" name="ans1" placeholder="Your Childhood Bestfriend?" required=""  value=""/>
              </div>
              <div>
                <input type="text" class="form-control" name="ans2" placeholder=" Name of First Teacher?" required="" value="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" name="btn-signup" id="btn-signup">Reset</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Want to Sign In?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Check your Email after reset!</h1>

                </div>
              </div>
            </form>
					</div>
          </section>
				</div>
        </div>
      </div>
    </div>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8495130888351681",
    enable_page_level_ads: true
  });
</script>
  </body>
</html>
