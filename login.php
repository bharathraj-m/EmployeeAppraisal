<?php
	session_start();
  include('dbconnect.php');

  // it will never let you open index(login) page if session is set
  if (isset($_SESSION['eid'])!="") {
    header("Location: home.php");
    exit;
  }

  $error = false;

  if(isset($_POST['login'])) {

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

      //$password = hash('sha256', $pass); // password hashing using SHA256

      $res=mysqli_query($conn,"SELECT * FROM employee WHERE eid='$eid' AND password='$pass'");
      $row=mysqli_fetch_array($res);
      $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

      if($count == 1 && $row['password']==$pass) {
        $_SESSION['eid'] = $row['eid'];
        $_SESSION['admin']=$row['admin'];
        $_SESSION['proj_mgr']=$row['proj_mgr'];
        $var=$row['first_log'];
        if($var==0){header("Location: edit-profile.php");}
        else{
        header("Location: home.php");}
      } else {
        $errMSG = "Incorrect Credentials, Try again...";
      }

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
    div.wrappe {


    background-color: white;
    border: 1px solid grey;
    opacity:9.0;
    filter: alpha(opacity=90); /* For IE8 and earlier */
  }
  div.wrappe2 {
  margin: 5%;
  font-weight: bold;
  color: black;
}
    </style>
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">

        <div class="animate form login_form">
            <div class="wrappe">
          <section class="login_content">
            <div class="wrappe2">
            <?php
			if ( isset($errMSG) ) {

				?>
        <div>

				<?php echo $errMSG; ?>
            	</div>
                <?php
			}
			?>
            <form method="post" action="login.php" autocomplete="off">
              <h1>Login Form</h1>
              <div>
                <input type="text" name="eid" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="pass" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" name="login">Sign In</button>

              </div>
              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </div>
          </section>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>
