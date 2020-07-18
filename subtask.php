<!DOCTYPE html>
<html>
<head>
<title>Subtask</title>
    <link href="new/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="new/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="new/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="new/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="new/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
</head>
<body >
<?php include('side.php');
$pno=$_REQUEST['filename1'];
 $d= date("Y-m-d");
?>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Subtask</h3>
              </div>

            </div>
  <div class="clearfix"></div>
  <div class="row">

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add the Subtasks</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" class="form" action="psub.php" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Project No<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="phard" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pno?>" readonly>
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sub-Task Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="pmed" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="">
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="seid" class="form-control" required="required">
                            <?php
                          $query10= "SELECT * from `employee` where proj_mgr!=1 AND admin!=1";  //busy bit
                          $res10=mysqli_query($conn,$query10);
                          while($count10=mysqli_fetch_array($res10))
                            { ?>

                          <option value="<?php echo $count10["eid"];?>"><?php echo $count10["eid"];?></option>
                          <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Start Date<span class="required">*</span>
                        </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date' id='myDatepicker2'>
                            <input type='text' class="form-control" data-name="stdate" name="stdate" id="stdate" min="<?php echo $d;?>" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                    </div>
<div class='form-group'>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date<span class="required">*</span>
                        </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date' id='myDatepicker3'>
                            <input type='text' class="form-control" data-name="stdate" name="edate" id="edate" min="<?php echo $d;?>" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Priority<span class="required">*</span>
                        </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select   name="pri" class="form-control" >
                      <option value="high">HIGH</option>
                      <option value="medium">MEDIUM</option>
                      <option value="low">LOW</option></select>
                  </div>
                  </div>



                  <div class='form-group'>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Difficulty<span class="required">*</span>
                      </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">



                      <select   name="diff" class="form-control" >
                      <option value="very_low">VERY LOW</option>
                      <option value="low">LOW</option>
                      <option value="medium">MEDIUM</option>
                    <option value="hard">HARD</option>
                    <option value="very_hard">VERY HARD</option>
                  </select>

                </div>
                    </div>
<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message">Description</label>
                          <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"></textarea></div>

                            <br/>
                      <center>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
            </center>
                    </form>
                  </div>
                </div>
              </div>




                </div>
              </div>
</div>












          </div>
                  </div>
                  <!-- /page content -->

    <!-- Datatables -->
    <script src="new/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="new/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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
$('#myDatepicker3').datetimepicker({
       format: 'YYYY.MM.DD'
   });
   </script>
          </body>
          </html>
          <?php include('footer.php');
          ob_end_flush(); ?>
