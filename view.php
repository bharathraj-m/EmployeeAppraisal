<?php
session_start();
require_once 'dbconnect.php';

$v=($_GET['vie']);
$inc=1;
$mark=0;


if( !isset($_SESSION['eid']) ) {
  header("Location: index.php");
  exit;
}
// select loggedin users detail
$name=$_SESSION['eid'];
$res=mysqli_query($conn,"SELECT * FROM subtasks as s, projects as p WHERE s.eid='$name' and p.pno='$v'");

 ?>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Modal Header</h4>
       </div>
       <div class="modal-body">
         <?php


         while($userRow=mysqli_fetch_array($res)){
   echo $userRow['stid'] . " ";
   echo $userRow['pno'] . " ";
   echo $userRow['sname'] . " ";
   echo $userRow['startdate'] . " ";
   echo $userRow['enddate'] . " ";
   echo $userRow['priority'] . " ";

}
         ?>
         <p>Some text in the modal.</p>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>

   </div>
 </div>
