<?php
include('side.php');
 $query = "SELECT distinct * FROM projects as p, employee as e WHERE status!='completed' AND e.eid=p.p_mgr_id ORDER BY `enddate`";
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
                <h3 align="center">Current Projects</h3>
                <br />
                <div class="table-responsive">
                     <table class="table table-bordered">
                       <thead align="center">
                          <tr align="center">
                            <th align="center"  width="14%">Project No</th>
                              <center> <th width="30%">Project name</th></center>
                               <th width="25%" colspan=2>Project Manager</th>

                               <th width="25%">Status</th>
                               <th width="20%">View</th>
                          </tr>
                        </thead>
                          <?php
                          $row = mysqli_fetch_array($result);
                          if($row[0]=="")
                          {
                            ?> <tr>
                                 <td colspan="5" align="center"><?php echo "No Projects"; ?></td>
                                 <tr>
                          <?php }
                          else {
                            do
                          {
                          ?>
                          <tr id="ho" align="center">
                              <td><?php echo $row["pno"]; ?></td>
                               <td><?php echo $row["pname"]; ?></td>
                               <td><?php echo $row["p_mgr_id"]; ?></td>
                               <td><?php echo $row["ename"]; ?></td>
                               <td><?php echo $row["status"]; ?></td>
                               <td><input type="button" name="view" value="view" id="<?php echo $row["pno"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                          </tr>
                          <?php
                        }  while($row = mysqli_fetch_array($result));
                      }
                          ?>
                     </table>
                   </div>
                   </div>
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
                   <br/>
                   <br/>

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
                url:"select.php",
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
