<!DOCTYPE html>
<html>
<head>
<title>Control-Panel</title>
    <link href="new/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="new/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="new/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="new/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="new/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
</head>
<body >
<?php include('side.php');
$q="SELECT * FROM extras";
$rs=mysqli_query($conn,$q);
$Row=mysqli_fetch_array($rs);
$cr=$Row['cred_threshold'];
$mcr=$Row['min_cred'];
$a=1;
$q="SELECT distinct eid FROM subtasks where status='completed' GRoup By eid Having count(*)>='$cr'";
$rs1=mysqli_query($conn,$q);
$Row1=mysqli_fetch_array($rs1);

$q2="create view name1 as SELECT eid,count(*) from subtasks GROUP BY eid, difficulty HAVING COUNT(*)>'$mcr'";
$rs2=mysqli_query($conn,$q2);
$q4="SELECT distinct eid from name1";
$rs4=mysqli_query($conn,$q4);
$row4=mysqli_fetch_array($rs4);
$q2="drop view name1;";
$rs2=mysqli_query($conn,$q2);
?>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Control Panel</h3>
              </div>

            </div>
  <div class="clearfix"></div>



  <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Promotion List <small>Developers</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <p class="text-muted font-13 m-b-30">
                        These below Developers can be promoted to the role of Project Manager
                      </p>
                      <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Credits</th>


                            <th>Action</th>
                          </tr>
                        </thead>


                        <tbody>
                          <?php if(empty($Row1[0])) {?> <tr><td colspan="6">No Employees</td></tr> <?php }
                          else do{
                            $empid=$Row1['eid'];
                            $q3="SELECT * FROM employee WHERE eid='$empid' and proj_mgr!=1 and admin!=1 AND vh_efficiency>=50 AND h_efficiency>=60 and m_efficiency>=70 and l_efficiency>=80 and vl_efficiency>=90";
                            $rs3=mysqli_query($conn,$q3);
                            $Row3=mysqli_fetch_array($rs3);
                                  ?>
                                  <?php if(!empty($Row3[0])){ ?>
                          <tr>
                            <td><?php echo $Row3['eid'] ?></td>
                            <td><?php echo $Row3['ename'] ?></td>
                            <td><?php echo $Row3['email'] ?></td>
                            <td><?php echo $Row3['credits'] ?></td>

                            <td><button class="btn btn-info btn-xs view_data" ><a href="promoteEmp.php?filename=<?php  echo $Row3['eid']; ?>">Promote</a></button></td>
                          </tr> <?php }
                          }while($Row1=mysqli_fetch_array($rs1));?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

  </div>
  <div class="clearfix"></div>
  <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Termination List <small>Developers</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <p class="text-muted font-13 m-b-30">
                        These below Developers are in the Termination list
                      </p>
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Credits</th>


                            <th>Action</th>
                          </tr>
                        </thead>


                        <tbody>
                          <?php if(empty($row4[0])) {?> <tr><td colspan="6">No Employees</td></tr> <?php }
                          else do{
                            $emppid=$row4[0];
                             $qu="SELECT * from employee where eid='$emppid' and admin!=1 AND vh_efficiency<=30 AND h_efficiency<=40 and m_efficiency<=50 and l_efficiency<=60 and vl_efficiency<=70";
                                $ru=mysqli_query($conn,$qu);
                                 $Rowu=mysqli_fetch_array($ru);
                                 if(!empty($Rowu[0])){ ?>
                          <tr>
                            <td><?php echo $Rowu['eid'] ?></td>
                            <td><?php echo $Rowu['ename'] ?></td>
                            <td><?php echo $Rowu['email'] ?></td>
                            <td><?php echo $Rowu['credits'] ?></td>
                            <td><button class="btn btn-info btn-xs view_data" ><a href="deleteEmp.php?filename=<?php  echo $Rowu['eid']; ?>">Delete</a></button></td>

                          </tr> <?php } }while($row4=mysqli_fetch_array($rs4));?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

  </div>


  <div class="row">
    <div class="col-md-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Set Min threshold Subtasks for Promotion List</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" class="form" action="score.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subtasks<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="phard" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Row['cred_threshold']?>">
                <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
              </div>
            </div>
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
    <div class="col-md-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Set Min Subtasks threshold for Termination List</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" class="form" action="score.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subtasks<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="phard" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Row['min_cred']?>">
                <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
              </div>
            </div>
            <center>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="submit1" id="submit1" class="btn btn-success">Submit</button>
              </div>
            </div>
    </center>
          </form>
        </div>
      </div>
    </div>

</div>


            <div class="clearfix"></div>
<br/>
<div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Project Points based on Difficulty</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" class="form" action="pscore.php" method="post" enctype="multipart/form-data" autocomplete="off">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">VERY HARD<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="p_very_hard" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Row['p_very_hard']?>">
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">HARD<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="phard" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Row['p_hard']?>">
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">MEDIUM<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="pmed" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Row['p_med']?>">
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">LOW<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="plow" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Row['p_low']?>">
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">VERY LOW<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="p_very_low" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Row['p_very_low']?>">
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
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



              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Subtasks Points based on Difficulty</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" class="form" action="sscore.php" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">VERY HARD<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="svhard" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Row['s_very_hard']?>">
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">HARD<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="shard" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Row['s_hard']?>">
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">MEDIUM<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="smed" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Row['s_med']?>">
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">LOW<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="slow" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Row['s_low']?>">
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">VERY LOW<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="svlow" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Row['s_very_low']?>">
                          <span class="fa fa-bar-chart form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <center>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit1" id="submit1" class="btn btn-success">Submit</button>
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
                  <!-- /page content -->

    <!-- Datatables -->
    <script src="new/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="new/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
          </body>
          </html>
          <?php include('footer.php');
          ob_end_flush(); ?>
