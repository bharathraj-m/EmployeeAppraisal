<?php
ob_start();
 include('side.php');
include('dbconnect.php');
$pid=$_SESSION['eid'];
$b=1;
      $_SESSION['sno']=$b;

 $query = "SELECT distinct * FROM `projects` EXCEPT  WHERE '$pid'= `p_mgr_id` AND `status`='pending' ORDER BY `enddate` desc";
 $result = mysqli_query($conn, $query);






 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Current-Projects</title>

           <style>
           .modal-dialog{
            width:1000px;
           }
           #as{
          color: white;
           }
           #ho:hover{
             background-color:#baf1e6;
           }
           thead{
             background-color:#2a3f56;
             color:white;
           }
           #hoo{
             background-color:#a09a9a;
             color:black;
           }
           #hop{
             background-color:#2a3f56;
             color:white;
           }
           </style>
      </head>
      <body>
      <div class="right_col" role="main">
      <div class="">
      <div class="row top_tiles">
           <br /><br />
           <div class="container" style="width:700px;">
                <h3 align="center">Ongoing Projects</h3>
                <br />
                <div class="table-responsive">
                     <table class="table table-bordered">
                       <thead>
                          <tr >
                                <th width="5%">Project NUmber</th>
                                <th width="25%">Project Name</th>
                                <th width="25%">Project Manager</th>
                                <th width="20%">Status</th>
                                <th width="10%">Add Subtask</th>
                                <th width="20%">View</th>
                                <th width="20%">Approve</th>
                          </tr>
                        </thead>
                          <?php
                          $row = mysqli_fetch_array($result);
                          if(empty($row[0])){?>


                             <td colspan="4">NO Projects</td>
                             <?php
                          }
                          else{
                          do
                          {
                                 //count of pending or completed subtasks
                             $p=$row["pno"];
                            $query11 = "SELECT * FROM `projects` as p, subtasks as s WHERE p.pno=s.pno and p.pno='$p'";
                            $result11 = mysqli_query($conn, $query11);
                            $row11=mysqli_num_rows($result11);

                            $query12 = "SELECT * FROM `projects` as p, subtasks as s WHERE '$p'=s.pno and p.pno=s.pno and s.status='completed'";
                            $result12 = mysqli_query($conn, $query12);
                            $row12=mysqli_num_rows($result12);

                            $res=$row11-$row12;

                          ?>
                          <tr id="ho" align="center">
                               <td><?php echo $row["pno"]; ?></td>
                               <td><?php echo $row["pname"]; ?></td>
                               <td><?php echo $row["p_mgr_id"]; ?></td>
                               <td><?php echo $row["status"]; ?></td>
                                <td><button class="btn btn-info btn-xs " ><a id="as" href="subtask.php?filename1=<?php echo $row["pno"]; ?>">Add subtask</a></button></td>
                               <td><input type="button" name="view" value="view" id="<?php echo $row["pno"]; ?>" class="btn btn-info btn-xs view_data" /></td>

                               <?php if($res!=0){?>
                                <td><button class="btn btn-info btn-xs view_data" disabled >Approve</button></td>
                                <?php } else { ?>
                               <td><button class="btn btn-info btn-xs view_data" ><a id="as" href="acceptProj.php?filename=<?php echo $row["pno"]; ?> ">Approve</a></button></td> <?php } ?>
                          </tr>
                          <?php
                          }while($row = mysqli_fetch_array($result));
                        }
                          ?>
                     </table>
                </div>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>

           </div>
</div>
</div>
</div>
      </body>
 </html>
 <div id="dataModal" class="modal fade">
      <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Project Details</h4>

                </div>
                <div class="modal-body" id="employee_detail">
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
           </div>
      </div>
 </div>
 <script>
 $(document).ready(function(){
      $('.view_data').click(function(){
           var employee_id = $(this).attr("id");
           $.ajax({
                url:"pmgrview.php",
                method:"post",
                data:{employee_id:employee_id},
                success:function(data){
                     $('#employee_detail').html(data);
                     $('#dataModal').modal("show");
                }
           });
      });
 });
 </script>
