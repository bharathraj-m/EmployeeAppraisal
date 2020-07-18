<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Projects</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body><nav class="navbar navbar-default" role="navigation">
        <div class="container">
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
          
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a href="home.php"><span class="glyphicon glyphicon-arrow-left"></span>Back</a>
                    </li>
                    
                </ul>
            </div>
    
        </div>
    </nav>
    <h2 class="well" align="center">Projects</h2>
<?php
    ob_start();
    session_start();
    require_once 'dbconnect.php';
    
    // if session is not set this will redirect to login page
    if( !isset($_SESSION['eid']) ) {
        header("Location: index.php");
        exit;
    }
    $sql = mysqli_query($conn, "SELECT * FROM `projects` ORDER BY `enddate` desc") or die(mysqli_error($con));
    $row = mysqli_fetch_array($sql);
    if(!$row[0]){?>
    <h1 align="center">No Projects Assigned.</h1>
    <?php

    }
    else{



    do
    {
        $sql1 = mysqli_query($conn, "SELECT `ename` FROM `projects`,`employee` WHERE `eid`= `p_mgr_id`") or die(mysqli_error($conn));
           $row1 = mysqli_fetch_array($sql1);
        echo ' <div style="margin-left:5%; margin-right:5%; margin-top:5%;" class="panel panel-primary" style="color:#000;">
            <div class="well">
            <h4 >Project ID: '.$row['pno'].'</h4>
             <h4 >Project Name: '.$row['pname'].'</h4>
             <h4 >Project Lender: '.$row['lender'].'</h4>
             <h4 >Project Maneger Name: '.$row1['ename'].'</h4>
             <h4 >Project Field: '.$row1['field'].'</h4>
            </div>
           <div class="panel-footer">
                <h4 >Start Date: '.$row['startdate'].'</h4>
                <h4 >Due Date: '.$row['enddate'].'</h4>
                <h4>Description: '.$row['description'].'</h4>
                <h4>Status: '.$row['status'].'</h4>



                
                </div>
                </div>
                <hr/>';//status- No of subtasks by complted subtasks
    } while($row = mysqli_fetch_array($sql));
}
?>

</body>
</html>