<?php

	require_once 'dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['eid']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
  $name=$_SESSION['eid'];
  $a=$_SESSION['admin'];
  $b=$_SESSION['proj_mgr'];
	$res=mysqli_query($conn,"SELECT * FROM employee WHERE eid='$name'");

	$userRow=mysqli_fetch_array($res);
  $eid=$userRow['eid'];

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['uname']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
<body>
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <?php

        if($a == 1){?>
        <a href="add.php" class="w3-bar-item w3-button">New Project</a>
        <a href="myproject3.php" class="w3-bar-item w3-button">Current Projects</a>
        <a href="Comprojadmin.php" class="w3-bar-item w3-button">Completed Projects</a>
      </div><?php } ?>
       <?php if($b == 1){?>
        <a href="mgrp.php" class="w3-bar-item w3-button">Myprojects</a>
        <a href="comprojmgr.php" class="w3-bar-item w3-button">Completed Projects</a><?php }?>
	<?php			if($a!=1 && $b!=1){?>
		<a href="empproj.php" class="w3-bar-item w3-button">Myprojects</a>
    <a href="Comprojemp.php" class="w3-bar-item w3-button">Completed Projects</a><?php }?>

			</div>

<nav class="navbar navbar-default navbar-fixed-top">
 <ul class="nav navbar-nav navbar-left">
         <li><button  onclick="w3_open()">☰</button></li>
          </ul>
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>


      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">


        </ul>
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      <span class="glyphicon glyphicon-user"></span>&nbsp;Hi <?php if($flag==0){ echo $userRow['uname'];} else {echo $userRow['eid'];}?>&nbsp;<span class="caret"></span></a>
            <ul class="dropdown-menu">
<?php
       $a=$_SESSION['admin'];
       $b=$_SESSION['mgr_projects'];
      if($a == 1){?>


        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span>Add Employee</a></li>


  <?php

       }?>

          <li><a href="edit-profile.php"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit Profile</a></li>
    <li><a href="all-users.php?all-users"><span class="glyphicon glyphicon-pencil"></span>&nbsp;ALL Profile</a></li>

              <li><a href="logout.php">Sign Out</a></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
<a href="logout.php">Sign Out</a>
  </body>
  </html>
