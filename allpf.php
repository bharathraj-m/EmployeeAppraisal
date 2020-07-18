<!DOCTYPE html>
<html>
<head>
<title>All-Users</title>
<!-- iCheck -->
    <link href="new/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="new/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="new/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="new/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="new/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="new/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <style>
    .modal-dialog{
     width:1000px;
    }
    #as{
   color: white;
    }
    </style>
</head>
<body >
<?php include('side.php');

?>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>All Users</h3>
              </div>

            </div>

            <div class="clearfix"></div>



            <div class="row">
                          <div class="col-md-12">
                            <div class="x_panel">
                              <div class="x_content">
                                <div class="row">
                                  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                  <h3>Project Managers</h3>
                                  </div>

                                  <div class="clearfix"></div>
                                  <?php
                                  $query9= "SELECT * from `employee` where admin!=1 AND proj_mgr=1 ORDER BY credits desc";
                                  $res9=mysqli_query($conn,$query9);
                                  $rw9=mysqli_fetch_array($res9);
                                  do
                                  {
                                    ?>
                                  <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                                    <div class="well profile_view">
                                      <div class="col-sm-12">

                                        <div class="left col-xs-7">
                                          <h2><?php echo $rw9['ename'];?></h2>

                                          <ul class="list-unstyled">
                                            <li><i class="fa fa-info"></i> Manager ID:<?php echo $rw9['eid'];?> </li>
                                            <li><i class="fa fa-inbox"></i> Mail:<?php echo $rw9['email'];?> </li>
                                            <li><i class="fa fa-mobile"></i> Mobile:<?php echo $rw9['phone'];?> </li>
                                            <li><i class="fa fa-building"></i> Address:<?php echo $rw9['address'];?>  </li>
                                            <li><i class="fa fa-money"></i> Credits:<?php echo $rw9['credits'];?>  </li>
                                            <li><input type="button" name="view" value="more" id="<?php echo $rw9['eid']; ?>" class="btn btn-info btn-xs view_data" /></li>
                                            </ul>
                                        </div>
                                        <div class="right col-xs-5 text-center">
                                          <img src="userfiles/avatars/<?php echo $rw9['avatar_url'];?>" alt="" class="img-circle img-responsive">
                                        </div>
                                      </div>
                                    <!--     <div class="col-xs-12 bottom text-center">
                                     <div class="col-xs-12 col-sm-6 emphasis">
                                          <p class="ratings">
                                            <a>4.0</a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star"></span></a>
                                            <a href="#"><span class="fa fa-star-o"></span></a>
                                          </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                          <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                            </i> <i class="fa fa-comments-o"></i> </button>
                                          <button type="button" class="btn btn-primary btn-xs">
                                            <i class="fa fa-user"> </i> View Profile
                                          </button>
                                        </div>
                                      </div>  -->
                                    </div>
                                  </div>
<?php }while($rw9=mysqli_fetch_array($res9));?>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>












<!--EMPLOYEESSS-->


<div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                      <h3>Developers</h3>
                      </div>

                      <div class="clearfix"></div>
                      <?php
                      $query9= "SELECT * from `employee` where admin!=1 AND proj_mgr!=1 ORDER BY credits desc";
                      $res9=mysqli_query($conn,$query9);
                      $rw9=mysqli_fetch_array($res9);
                      do
                      {
                        ?>
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">

                            <div class="left col-xs-7">
                              <h2><?php echo $rw9['ename'];?></h2>

                              <ul class="list-unstyled">
                                <li><i class="fa fa-info"></i> Employee ID:<?php echo $rw9['eid'];?> </li>
                                <li><i class="fa fa-inbox"></i> Mail:<?php echo $rw9['email'];?> </li>
                                <li><i class="fa fa-mobile"></i> Mobile:<?php echo $rw9['phone'];?> </li>
                                <li><i class="fa fa-building"></i> Address:<?php echo $rw9['address'];?>  </li>
                                <li><i class="fa fa-money"></i> Credits:<?php echo $rw9['credits'];?>  </li>
                             <input type="button" name="view" value="more" id="<?php echo $rw9['eid']; ?>" class="btn btn-info btn-xs view_data" />

                                </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="userfiles/avatars/<?php echo $rw9['avatar_url'];?>" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                        <!--     <div class="col-xs-12 bottom text-center">
                         <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> View Profile
                              </button>
                            </div>
                          </div>  -->
                        </div>
                      </div>
<?php }while($rw9=mysqli_fetch_array($res9));?>

                    </div>
                  </div>
                </div>
              </div>
            </div>












  <div class="clearfix"></div>



</div>

        </div>
        <div id="dataModal" class="modal fade">
             <div class="modal-dialog">
                  <div class="modal-content">
                       <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View Details</h4>

                       </div>
                       <div class="modal-body" id="employee_detail">
                       </div>
                       <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       </div>
                  </div>
             </div>
        </div>
        <!-- /page content -->
<script src="new/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<!-- bootstrap-daterangepicker -->
    <script src="new/vendors/moment/min/moment.min.js"></script>
    <script src="new/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="new/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script>
$('#myDatepicker').datetimepicker();
$('#myDatepicker2').datetimepicker({
       format: 'YYYY.MM.DD'
   });
   </script>
   <script>
   $(document).ready(function(){
        $('.view_data').click(function(){
             var employee_id = $(this).attr("id");
             $.ajax({
                  url:"viewemp.php",
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
</body>
</html>
<?php include('footer.php');
ob_end_flush(); ?>
