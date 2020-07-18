<?php
session_start();
include ('dbconnect.php');
$b=$_SESSION['sno'];   
echo $b;


if($b==1){

$pno=($_GET['filename1']);
echo $pno;

$_SESSION['pno']=$pno;

}

$pno=$_SESSION['pno'];

$d=date("Y-m-d");
$error=false; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subtask</title>
    <!-- Latest compiled and minified CSS -->

  <style>
* {
    box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 10px;

}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
/*for table*/
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<div class="row">
  <div class="container">
<div class="column" style="background-color:#aaa;">
  <h2>Subtask</h2
  <p> Create subtasks for the employees here</p>
  <hr/>
  <form action="" method="post" align="center">
      <div>
          <label> Subtask Title:</label>
          <input type="text" name="stitle" maxlength="50" required="">
      </div>
    <!--  <div>
          <label> Select Employee:</label>
          <input type="button" style="border-radius:5px;padding:5px 10px 5px 10px;" name="addemp" value="Select" required="" />
      </div>-->
      <div class="row">
                        <label for="email"> Employee ID:</label>
                          

                          <select   name="seid" class="form-control" >
                        <?php
                          $query10= "SELECT * from `employee` where proj_mgr!=1 AND admin!=1";  //busy bit
                          $res10=mysqli_query($conn,$query10);
                          while($count10=mysqli_fetch_array($res10))
                            { ?>

                          <option value="<?php echo $count10["eid"];?>"><?php echo $count10["eid"];?></option>
                          <?php } ?></select>
                            

                            
                      
      <div>
          <label> Subtask Start Date:</label>
          <input type="date" id="subdt" name="sdate" placeholder="mm/dd/yyyy" maxlength="15" min="<?php echo $d; ?>"  required="" />
      </div>
      <span class="text-danger"><?php echo $sdError; ?></span>
      <div>
          <label for="email"> Subtask End Date:</label>
          <input type="date" id="subdt2" name="edate" placeholder="mm/dd/yyyy" maxlength="15"  min="<?php echo $d; ?>" required="" />
      </div>
      <span class="text-danger"><?php echo $sdError; ?></span>
      <div>
          <label> Subtask Description:</label><br/>
          <textarea type="textarea" name="sdesc" placeholder="Description goes here" maxlength="6000" rows="7" cols="50" required=""></textarea>
      </div>
      <div >
          <button type="submit" name="add">Add </button>
      </div>
</form> 
</div>
</div>
<div class="column" ">
  <h2>HTML Table</h2>

  <table>
    <tr>
      <th>Subtask Id</th>
      <th>Subtask Title</th>
     <!-- <th>Employee Name</th>-->
      <th>Employee ID</th>
      <th>Start Date</th>
      <th>End Date</th>
   </tr>

<?php
if(isset($_POST['add'])){
   $sdate =($_POST['sdate']);
    
    if (empty($sdate)){
     
      $errMsg = "Please enter Start Date.";}
    
        $tday=date("m/d/Y");
    $date=date_create($sdate);
      $sdate=date_format($date,"m/d/Y");
    if ($tday>$sdate){
      
      $errMsg = "Please enter Start Date grater than Current DATE.";
    }
    else
    {
           
    }


 $edate =($_POST['edate']);
    if (empty($edate)){
      $error = true;
      $sdError = "Please enter End Date.";}
    
        $tday=date("m/d/Y");
    $date1=date_create($edate);
      $edate=date_format($date1,"m/d/Y");
       if ($sdate>=$edate){
      $error = true;
      $edError = "Please enter End Date grater than Start DATE.";
    }
    
    $b=$_SESSION['sno'];
    $pno=$_SESSION['pno'];

    $stitle = trim($_POST['stitle']);
    $stitle = strip_tags($stitle);
    $stitle= htmlspecialchars($stitle);
    
    
    $sdesc = trim($_POST['sdesc']);
    $sdesc = strip_tags($sdesc);
    $sdesc = htmlspecialchars($sdesc);

    $seid = trim($_POST['seid']);
    $seid = strip_tags($seid);
    $seid = htmlspecialchars($seid);

   // $seid = trim($_POST['seid']);


    $date=date_create($sdate);  //converting the date format for start and end-date
      $sdate=date_format($date,"Y-m-d");

      $date1=date_create($edate);
      $edate=date_format($date1,"Y-m-d");


      if( !$error ) {
      
      $query = "INSERT INTO `subtasks`(`stid`, `pno`, `sno`, `sname`, `eid`, `startdate`, `enddate`) VALUES ('','$pno','$b','$stitle','$seid','$sdate','$edate')";

$subject="Subtask Assignment";
$message="You have been assigned to a new subtask ".$stitle." of Project No:".$pno;
$frm1=$_SESSION['eid'];


$to1=$seid;
$_SESSION['subject']=$subject;
$_SESSION['message']=$message;
$_SESSION['from1']=$frm1;
$_SESSION['to1']=$to1;
include('notification.php');
       







     

      $res = mysqli_query($conn,$query);

      $b=$b+1;
      $_SESSION['sno']=$b;

      $query1 = "SELECT * from subtasks where `pno`='$pno'";
      $res1 = mysqli_query($conn,$query1);
      $row1 = mysqli_fetch_array($res1);
          if(empty($row1[0])){?>


                             <td colspan="5" align="center">NO Subtasks</td>
                             <?php
                          }
                          else{
                          do
                          {
                          ?>
                          <tr align="center">
                               <td><?php echo $row1["sno"]; ?></td>
                               <td><?php echo $row1["sname"]; ?></td>
                               <td><?php echo $row1["eid"]; ?></td>
                                <td><?php

                              $date=date_create($row1["startdate"]);  //converting the date format for start and end-date
                              $sdat=date_format($date,"d-m-Y");
                               echo $sdat ; ?></td>
                               <td><?php
                              $date=date_create($row1["enddate"]);  //converting the date format for start and end-date
                              $sdat1=date_format($date,"d-m-Y");
                                   


                               echo $sdat1 ; ?></td>
                             
                          </tr>
                          <?php
                          }while($row1 = mysqli_fetch_array($res1));
                        }




        
      if ($res) {
        
        $errTyp = "success";
        $errMSG = "Successfully Created, you may assign tasks now";
       
        
      } else {
        $errTyp = "danger";
        $errMSG = "Something went wrong, try again later..."; 
      } 
        
    }
     header('Location:subtask1.php');
   
}

?>


  </table>
</div>

</div>
 <a href="mgrp.php">go back</a>
</body>
</html>
