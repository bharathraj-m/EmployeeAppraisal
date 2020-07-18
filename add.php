<?php
	/*ob_start();
	session_set_cookie_params(0);
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';

$d= date("Y-m-d");
	if ( isset($_POST['btn-signup']) ) {


		$pname=$_SESSION['pname'];
		$pmanid=$_SESSION['pmanid'];
		$lname=$_SESSION['lname'];
		$pfield=$_SESSION['pfiled'];
		$pdesc=$_SESSION['pdesc'];
		//$priority=$_SESSION['pri'];


		$error = false;
		// clean user inputs to prevent sql injections
//start date
		$sdate =($_POST['sdate']);
				if (empty($sdate)){
			$error = true;
			$sdError = "Please enter Start Date.";}

        $tday=date("m/d/Y");
		$date=date_create($sdate);
	    $sdate=date_format($date,"m/d/Y");
		if ($tday>$sdate){
			$error = true;
			$sdError = "Please enter Start Date grater than Current DATE.";
		}
		else
		{
            echo "valid";
		}

//End date
		$edate =($_POST['edate']);
		if (empty($edate)){
			$error = true;
			$edError = "Please enter End Date.";}

        $tday=date("m/d/Y");
		$date1=date_create($edate);
	    $edate=date_format($date1,"m/d/Y");
		if ($sdate>=$edate){
			$error = true;
			$edError = "Please enter End Date grater than Start DATE.";
		}
		else
		{
            echo "valid";
		}
		$pname = trim($_POST['pname']);
		$pname = strip_tags($pname);
		$pname = htmlspecialchars($pname);


		$pmanid = trim($_POST['pmanid']);
		$pmanid = strip_tags($pmanid);
		$pmanid = htmlspecialchars($pmanid);

		$lname = trim($_POST['lname']);
		$lname = strip_tags($lname);
		$lname = htmlspecialchars($lname);

		$pfield = trim($_POST['pfield']);
		$pfield = strip_tags($pfield);
		$pfield = htmlspecialchars($pfield);

		$pdesc = trim($_POST['pdesc']);
		$pdesc = strip_tags($pdesc);
		$pdesc = htmlspecialchars($pdesc);

		$date=date_create($sdate);  //converting the date format for start and end-date
	    $sdate=date_format($date,"Y-m-d");

	    $date1=date_create($edate);
	    $edate=date_format($date1,"Y-m-d");

			// check email exist or not
			/*
			$query = "SELECT * FROM employee WHERE eid='$eid'";
			$result = mysqli_query($conn,$query);
			$count = mysqli_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Employee Id is already in use.";
			}

		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}

		// password encrypt using SHA256();
	//	$password = hash('sha256', $pass);

		// if there's no error, continue to signup
		if( !$error ) {

			$query = "INSERT INTO `projects`(`pno`, `pname`, `p_mgr_id`, `startdate`, `enddate`,`lender`,`description`, `field`) VALUES ('','$pname','$pmanid','$sdate','$edate','$lname','$pdesc','$pfield')";
			$res = mysqli_query($conn,$query);

			if ($res) {
				echo $sdate;
				echo $edate;
				$errTyp = "success";
				$errMSG = "Successfully Created, you may assign tasks now";

			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";
			}

		}


	}*/
?>
<?php
ob_start();
 include("side.php");
  if( isset($_SESSION['user'])!="" ){
    header("Location: home.php");
  }
 //include 'components/authentication.php';
    include_once 'dbconnect.php';
    $current_eid = $_SESSION['eid'];
    $sql = "SELECT * FROM employee WHERE eid != '$current_eid' order by credits desc";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn)); ?>
<?php


  $d= date("Y-m-d");




  $error = false;

  if ( isset($_POST['btn-signup']) ) {


    $pname=$_SESSION['pname'];
    $pmanid=$_SESSION['pmanid'];
    $lname=$_SESSION['lname'];
    $pfield=$_SESSION['pfiled'];
    $pdesc=$_SESSION['pdesc'];
    //$priority=$_SESSION['pri'];


    $error = false;
    // clean user inputs to prevent sql injections
//start date
    $sdate =($_POST['sdate']);

    if (empty($sdate)){
      $error = true;
      $errMsg = "Please enter Start Date.";}

        $tday=date("m/d/Y");
    $date=date_create($sdate);
      $sdate=date_format($date,"m/d/Y");
    if ($tday>$sdate){
      $error = true;
      $errMsg = "Please enter Start Date grater than Current DATE.";
    }
    else
    {

    }

//End date
    $edate =($_POST['edate']);
    if (empty($edate)){
      $error = true;
      $edError = "Please enter End Date.";}

        $tday=date("m/d/Y");
    $date1=date_create($edate);
      $edate=date_format($date1,"m/d/Y");
    if ($sdate>=$edate){
      $error = true;
      $errMSG = "Please enter End Date grater than Start DATE.";
    }
    else
    {

    }
    $pname = trim($_POST['pname']);
    $pname = strip_tags($pname);
    $pname = htmlspecialchars($pname);


    $pmanid = trim($_POST['pmanid']);
    $pmanid = strip_tags($pmanid);
    $pmanid = htmlspecialchars($pmanid);

     $pri = trim($_POST['pri']);
    $pri = strip_tags($pri);
    $pri = htmlspecialchars($pri);

    $diff = trim($_POST['diff']);
  $diff = strip_tags($diff);
  $diff = htmlspecialchars($diff);


    $lname = trim($_POST['lname']);
    $lname = strip_tags($lname);
    $lname = htmlspecialchars($lname);

    $pfield = trim($_POST['pfield']);
    $pfield = strip_tags($pfield);
    $pfield = htmlspecialchars($pfield);

    $pdesc = trim($_POST['pdesc']);
    $pdesc = strip_tags($pdesc);
    $pdesc = htmlspecialchars($pdesc);

    $date=date_create($sdate);  //converting the date format for start and end-date
      $sdate=date_format($date,"Y-m-d");

      $date1=date_create($edate);
      $edate=date_format($date1,"Y-m-d");

      // check email exist or not
      /*
      $query = "SELECT * FROM employee WHERE eid='$eid'";
      $result = mysqli_query($conn,$query);
      $count = mysqli_num_rows($result);
      if($count!=0){
        $error = true;
        $emailError = "Provided Employee Id is already in use.";
      }

    // password validation
    if (empty($pass)){
      $error = true;
      $passError = "Please enter password.";
    } else if(strlen($pass) < 6) {
      $error = true;
      $passError = "Password must have atleast 6 characters.";
    }

    // password encrypt using SHA256();
  //  $password = hash('sha256', $pass);

    // if there's no error, continue to signup
    */if( !$error ) {

      $query = "INSERT INTO `projects`(`pno`, `pname`,`priority`,`difficulty`, `p_mgr_id`, `startdate`, `enddate`,`lender`,`description`, `field`) VALUES ('','$pname','$pri','$diff','$pmanid','$sdate','$edate','$lname','$pdesc','$pfield')";


      $res = mysqli_query($conn,$query);
      $query1 = "SELECT * from projects ORDER BY  pno desc";
      $res1 = mysqli_query($conn,$query1);
      $row1 = mysqli_fetch_array($res1);
      $a=$row1['pno'];
      $_SESSION['pno']=$a;
      $b=1;
      $_SESSION['sno']=$b;




      if ($res) {

        $errTyp = "success";
        $errMSG = "Successfully Created.";




$subject="Project Assignment";

$frm1=$_SESSION['eid'];


$result1=mysqli_query($conn,$query1);
$row=mysqli_fetch_array($result1);
$query2="SELECT * from employee WHERE admin=1";
$result2=mysqli_query($conn,$query2);
$row1=mysqli_fetch_array($result2);
$message="Project \"".$pname."\" of PNO: ".$a." is assigned to you. Select the employees and carry out the Task within due date ".$edate;
$to1=$row1['eid'];
$_SESSION['subject']=$subject;
$_SESSION['message']=$message;
$_SESSION['from1']=$frm1;
$_SESSION['to1']=$pmanid;
include('notification.php');

$_SESSION['message1']="Created new Project \'".$pname."\'.";
   include("addact.php");










      } else {
        $errTyp = "danger";
        $errMSG = "Something went wrong, try again later...";
      }

    }


  }?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>New Project</title>
        <!-- Latest compiled and minified CSS -->

    </head>
    <body >
    <div class="right_col" role="main">
      <div class="">
      <div class="row top_tiles">
      <div class="container" >

      	<div id="login-form">

            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    <form role="form" method="post" id="reused_form">
                      <h2>New Project</h2>
                      <hr/>
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

          //form
          			?>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                              <div>
                                <label for="name"> Project Name:</label>
                              <input type="text" name="pname" class="form-control" maxlength="40" value="<?php if(isset($pname)) echo $pname;?>"  required="required"/>
                            </div>
                            <?php $_SESSION['pname']=$_POST['pname'];?>
                          </div>
                            <div class="col-sm-6 form-group">
                                <label for="name"> Project Field:</label>
                                <input type="text" class="form-control"  name="pfield" maxlength="50" maxlength="40" value="<?php if(isset($pfield)) echo $pfield;?>"  required="required"/>
                            </div>
                            <?php $_SESSION['pfield']=$_POST['pfield'];?>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="email"> Project Lender:</label>
                                <input type="text" class="form-control" id="projectlender" name="lname" maxlength="50"value="<?php if(isset($lname)) echo $lname;?>"  required="required" />
                            </div>
                            <?php $_SESSION['lname']=$_POST['lname'];?>
                           <!-- <div class="col-sm-6 form-group">
                                <label for="email"> Project Manager ID:</label>
                                <input type="text" class="form-control" name="pmanid" maxlength="50" value="<?php if(isset($pmanid)) echo $pmanid;?>" required="required"/>
                            </div>-->
                        <div class="row">
                        <label for="email"> Project Manager ID:</label>
                          <div class="col-sm-6 form-group">





                          <select   name="pmanid" class="form-control" >
                        <?php
                          $query10= "SELECT * from `employee` where proj_mgr=1";
                          $res10=mysqli_query($conn,$query10);
                          while($count10=mysqli_fetch_array($res10))
                            { ?>

                          <option value="<?php echo $count10["eid"];?>"><?php echo $count10["eid"];?></option>
                          <?php } ?></select>
                            </div>



                            <?php $_SESSION['pmanid']=$_POST['pmanid'];?>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="email"> Project Start Date:</label>
                                <input type="date" id="dt" name="sdate" class="form-control" placeholder="mm/dd/yyyy"  min="<?php echo $d; ?>"   />
                            </div>
                            <span class="text-danger"><?php echo $sdError; ?></span>


                            <div class="col-sm-6 form-group">
                                <label for="email"> Project End Date:</label>
                                <input type="date" id="dt2" name="edate" class="form-control" placeholder="mm/dd/yyyy"  min="<?php echo $d; ?>"    />
                            </div>
                            <span class="text-danger"><?php echo $sdError; ?></span>
                        </div>
                        <div class="row">
                        <div class="col-sm-6 form-group">
                        <h5>Priority</h5>



                        	<select   name="pri" class="form-control" >
                        	<option value="high">HIGH</option>
                        	<option value="medium">MEDIUM</option>
                        	<option value="low">LOW</option></select>


                        </div>
                        <div class="col-sm-6 form-group">
                        <h5>Difficulty</h5>



                          <select   name="diff" class="form-control" >
                          <option value="very_low">VERY LOW</option>
                          <option value="low">LOW</option>
                          <option value="medium">MEDIUM</option>
                        <option value="hard">HARD</option>
                        <option value="very_hard">VERY HARD</option>
                      </select>


                        </div>
                      </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="name"> Project Description:</label>
                                <textarea class="form-control" type="textarea" id="projectdesc" name="pdesc" placeholder="Project Description goes here" maxlength="6000" rows="7" value="<?php if(isset($pdesc)) echo $pdesc;?>"  required="required"></textarea>
                            </div>
                              <?php $_SESSION['pdesc']=$_POST['pdesc'];?>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-lg btn-success btn-block" name="btn-signup">Create </button>
                            </div>
                        </div>
                        <a href="home.php">BACK</a>
                    </form>

                </div>
            </div>
        </div>
      </div>

      </div>
      </div>
      </div>
    </body>
</html>

<?php ob_end_flush(); ?>
