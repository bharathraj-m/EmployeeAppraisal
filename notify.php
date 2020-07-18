<?php
ob_start();
include('side.php');
include('dbconnect.php');
$pid=$_SESSION['eid'];



 $query = "SELECT * from `notification` where to1='$pid' ORDER BY nid desc";

 $result = mysqli_query($conn, $query) or die("connection_aborted");
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Notifications</title>

           <style>
           .modal-dialog{
            width:500px;
           }
           tbody:hover {
             background-color:#baf1e6;
           }
           thead{
             background-color:#2a3f54; color:white;
           }

           </style>

      </head>
      <body>
        <div class="right_col" role="main">
      <div class="">
      <div class="row top_tiles">
           <br /><br />
           <div class="container" style="width:700px;">
                <h3 align="center">Notifications</h3>
                <br />
                <div class="table-responsive">
                     <table class="table table-bordered" id="i1">
                       <thead>
                          <tr >
                               <th align="center" width="30%" colspan="2">From</th>

                                <th width="25%">Subject</th>
                                 <th width="25%">Date</th>
                               <th width="25%">Message</th>

                          </tr>
                        </thead>
                          <?php
                          $row = mysqli_fetch_array($result);
                          if(empty($row[0])){?>


                             <td colspan="5" align="center">NO Notifications</td>
                             <?php
                          }
                          else{
                          do
                          {
                          ?>
                          <tbody>
                          <tr align="center" >
                               <td><?php if($row["first"]==1){ ?><small style="color:red;"><?php  echo "new   ";?></small><?php } echo $row["from1"];
                               $mgr=$row["from1"];
                               $query1= "SELECT * from `employee` where eid='$mgr'";

                              $result1 = mysqli_query($conn, $query1) or die("connection_aborted");
                              $row1 = mysqli_fetch_array($result1);

                               ?></td>
                               <td><?php echo $row1["ename"]; ?></td>
                               <td><?php echo $row["subject"]; ?></td>
                                <?php $da=$row["date1"];
                              $date=date_create($da);
                              $da=date_format($date,"d-m-Y");
                                 ?>


                               <td><?php echo $da; ?></td>

                               <td><input type="button" name="view" value="view" id="<?php echo $row["nid"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                          </tr>
                          <?php
                          }while($row = mysqli_fetch_array($result));
                        }
                          ?>
                        </tbody>
                     </table>
                </div>

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
                    <center> <h4 class="modal-title">Notification</h4></center>

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
                url:"notifyview.php",
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
 <?php include('footer.php');
 ob_end_flush(); ?>
