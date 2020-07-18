<?php
 if(isset($_POST["employee_id"]))
 {
      $output = '';
      require_once 'dbconnect.php';
       $query1 = "SELECT * FROM projects WHERE pno = '".$_POST["employee_id"]."'";
         $query = "SELECT * FROM subtasks  WHERE status='completed' AND pno = '".$_POST["employee_id"]."'";
         $query2 = "SELECT * FROM subtasks  WHERE pno = '".$_POST["employee_id"]."'";
       $result1 = mysqli_query($conn, $query1);
          $result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);
       $row1 = mysqli_fetch_array($result1);
       $totalsub=mysqli_num_rows($result2);
       $compsub=mysqli_num_rows($result);
           $num22=1;
       if($totalsub!=0)
       {
         $progress=round(($compsub/$totalsub)*100);
       }
       else {
         $progress=0;
       }
      $query = "SELECT * FROM subtasks as s, upload as u, employee as e WHERE s.stid=u.stid AND s.eid=e.eid AND pno = '".$_POST["employee_id"]."'";
      $result = mysqli_query($conn, $query);
      $output .= '

      <div>
      <label align="left">Project Name:</label>'.$row1["pname"].'<br>
     <label align="right">Priority:</label>'.$row1["priority"].'<br>
     <label align="left">Start Date:</label>'.$row1["startdate"].'<br>
     <label align="right">End Date:</label>'.$row1["enddate"].'


      </div>
      <label for "prog">Progress</label><div id="prog" class="progress">
<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40"
aria-valuemin="0" aria-valuemax="100" style="width:'.$progress.'%">'.$progress.'%
</div>
</div>
      <h4>Employee List</h4>
      </hr>


      <div class="table-responsive">
           <table class="table table-bordered">
           <tr id="hop" align="center">
           <td width="8%" colspan=2><label>Task</label></td>

             <td width="20%" colspan=2><label>Employee</label></td>




            <td width="12%"><label>Start Date</label></td>
            <td width="12%"><label>End Date</label></td>
              <td width="10%"><label>Submitted Date</label></td>
              <td width="15%"><label>Proof</label></td>


               </tr>';
      while($row = mysqli_fetch_array($result))
      {


        $ddd=$row["submitdate"];
        $date1=date_create($ddd);
        $ddd=date_format($date1,"d-m-Y");

        $ddd1=$row["startdate"];
        $date1=date_create($ddd1);
        $ddd1=date_format($date1,"d-m-Y");

        $ddd2=$row["enddate"];
        $date1=date_create($ddd2);
        $ddd2=date_format($date1,"d-m-Y");

           $output .= '
                <tr id="ho" align="center">
                <td>'.$num22.'</td>


                <td>'.$row["sname"].'</td>


                     <td>'.$row["eid"].'</td>

                     <td>'.$row["ename"].'</td>



                     <td>'.$ddd1.'</td>


                     <td>'.$ddd2.'</td>


                     <td>'.$ddd.'</td>


                     <td>
             					<button class="btn btn-info btn-xs view_data"><a href="fileupload/download.php?filename='.$row["name"].'">Download</a></button>
             				</td>


                </tr>
                ';
                  $num22=$num22+1;
      }
      $query = "SELECT * FROM subtasks as s, employee as e WHERE s.eid=e.eid AND s.stid NOT IN (SELECT u.stid from upload as u) AND pno = '".$_POST["employee_id"]."'";
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($result))

      {


        $ddd=$row["submitdate"];
        $date1=date_create($ddd);
        $ddd=date_format($date1,"d-m-Y");

        $ddd1=$row["startdate"];
        $date1=date_create($ddd1);
        $ddd1=date_format($date1,"d-m-Y");

        $ddd2=$row["enddate"];
        $date1=date_create($ddd2);
        $ddd2=date_format($date1,"d-m-Y");

           $output .= '
                <tr id="ho" align="center">
                <td>'.$num22.'</td>


                <td>'.$row["sname"].'</td>

                     <td>'.$row["eid"].'</td>

                     <td>'.$row["ename"].'</td>



                     <td>'.$ddd1.'</td>


                     <td>'.$ddd2.'</td>


                     <td>'.$ddd.'</td>


                     <td>
             					<button class="btn btn-info btn-xs view_data">Not Uploaded</a></button>
             				</td>
                    <td>
                     <button class="btn btn-info btn-xs view_data">In Progress</a></button>
                   </td>


                </tr>
                ';
                $num22=$num22+1;
      }
      $output .= "</table></div>";
      echo $output;
 }
 ?>
