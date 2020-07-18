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
       if($totalsub!=0)
       {
         $progress=round(($compsub/$totalsub)*100);
       }
       else {
         $progress=0;
       }
      $query = "SELECT * FROM subtasks as s, upload as u, employee as e WHERE s.stid=u.stid AND s.eid=e.eid AND pno = '".$_POST["employee_id"]."' and s.status='pending'";

      $result = mysqli_query($conn, $query);
      $num22=1;
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
              <td width="7%"><label>Status</label></td>
              <td width="15%"><label>Proof</label></td>
              <td width="15%" colspan=2><label>Action</label></td>

               </tr>';
      while($row = mysqli_fetch_array($result))
      {
           $output .= '
                <tr id="ho" align="center">
                     <td>'.$num22.'</td>
                      <td>'.$row["sname"].'</td>

                     <td>'.$row["eid"].'</td>

                     <td>'.$row["ename"].'</td>



                     <td>'.$row["startdate"].'</td>


                     <td>'.$row["enddate"].'</td>


                     <td>'.$row["status"].'</td>


                     <td>
             					<button class="btn btn-info btn-xs view_data"><a style="color:white" href="fileupload/download.php?filename='.$row["name"].'">Download</a></button>
             				</td>
                    <td>
                     <button class="btn btn-info btn-xs view_data" ><a style="color:white" href="acceptSub.php?filename='.$row["stid"].'">Accept</a></button>
                    </td>
                    <td>
                     <button class="btn btn-info btn-xs view_data"><a style="color:white" href="delete.php?filename='.$row["name"].'">Reject</a></button>
                   </td>

                </tr>
                ';
      $num22=$num22+1; }

      $query = "SELECT * FROM subtasks as s, employee as e WHERE s.eid=e.eid AND s.stid NOT IN (SELECT u.stid from upload as u) AND pno = '".$_POST["employee_id"]."'  ";
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($result))
      {
           $output .= '
                <tr id="ho" align="center">
                     <td>'.$num22.'</td>
                     <td>'.$row["sname"].'</td>

                     <td>'.$row["eid"].'</td>

                     <td>'.$row["ename"].'</td>



                     <td>'.$row["startdate"].'</td>


                     <td>'.$row["enddate"].'</td>


                     <td>'.$row["status"].'</td>


                     <td>
             					<button class="btn btn-info btn-xs view_data">Not Uploaded</a></button>
             				</td>
                    <td>
                     <button class="btn btn-info btn-xs view_data" disabled >Accept</a></button>
                   </td>
                   <td>
                    <button class="btn btn-info btn-xs view_data" disabled >Reject</a></button>
                  </td>


                </tr>
                ';
      $num22=$num22+1;}


       $query = "SELECT * FROM subtasks as s, employee as e WHERE s.eid=e.eid AND s.stid  IN (SELECT u.stid from upload as u) AND pno = '".$_POST["employee_id"]."' and s.status='completed' ";
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($result))
      {
           $output .= '
                <tr id="ho" align="center">
                     <td>'.$num22.'</td>
                     <td>'.$row["sname"].'</td>

                     <td>'.$row["eid"].'</td>

                     <td>'.$row["ename"].'</td>



                     <td>'.$row["startdate"].'</td>


                     <td>'.$row["enddate"].'</td>


                     <td>'.$row["status"].'</td>


                      <td>
                      <button class="btn btn-info btn-xs view_data"><a style="color:white" href="fileupload/download.php?filename='.$row["name"].'">Download</a></button>
                    </td>
                    <td>
                     <button class="btn btn-info btn-xs view_data" disabled >Accept</a></button>
                   </td>
                   <td>
                    <button class="btn btn-info btn-xs view_data" disabled >Reject</a></button>
                  </td>


                </tr>
                ';
      $num22=$num22+1;}


      $output .= "</table></div>";
      echo $output;
 }
 ?>
