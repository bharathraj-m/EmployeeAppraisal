<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript">
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(127)
                    .height(127);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>
<title>Edit-Profile</title>
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
</head>
<body >
<?php include('side.php');

?>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Profile</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>General</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" class="form" action="upd.php" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Full Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $userRow['ename']?>"/>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $userRow['email']?>">
                            <span class="fa fa-inbox form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone Number<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" name="pno" id="pno" data-name="pno" required="required" data-inputmask="'mask' : '(999) 999-9999'" value="<?php echo $userRow['phone']?>">
                          <span class="fa fa-mobile form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <?php $gen=$userRow['gender'];?>
                              <input type="radio" name="gender" value="male" <?php if($gen=="male"){ ?> checked <?php }?>> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default" >
                              <input type="radio" name="gender" value="female" <?php if($gen=="female"){ ?> checked <?php }?>> Female
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth<span class="required">*</span>
                        </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date' id='myDatepicker2'>
                            <input type='text' class="form-control" data-name="dob" name="dob" id="dob" value="<?php echo $userRow['dob']?>"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="addr" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $userRow['address'];?>">
                        <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Short Bio
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="short-bio" name="sbio"  rows="4" class="form-control col-md-7 col-xs-12"><?php echo htmlspecialchars($userRow['short_bio']);?></textarea>

                      </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Image
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type='file' name="photo" id="photo" onchange="readURL(this);" />
                          <br/>

                          <br/>
                          <div class="profile_pic">
                              <img id="blah" class="img-square profile_img" src="#"  />
                            </div>
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
            </div>
            <div class="clearfix"></div>



            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Personal</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" class="form" action="upd.php" method="post" enctype="multipart/form-data" autocomplete="off">
                     
                    
                        

                      <div class="form-group">
                        <h5><b>Security Questions</b></h5>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Your Childhood Bestfriend?<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="te" name="ans1" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $userRow['s_ans_1']?>">
                            <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <h5><b>Security Questions</b></h5>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> Name of First Teacher?<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" name="ans2" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $userRow['s_ans_2']?>">
                            <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
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

   <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Change Password</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" class="form" action="upd.php" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Current Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="pass" id="first-name" required="required" class="form-control col-md-7 col-xs-12" >
                          <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">New Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="npass" id="first-name" required="required" class="form-control col-md-7 col-xs-12" >
                          <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirm Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="cpass" id="first-name" required="required" class="form-control col-md-7 col-xs-12" >
                          <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>

                      
                      <center>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="submit2" id="submit1" class="btn btn-success">Submit</button>
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
</body>
</html>
<?php include('footer.php');
ob_end_flush(); ?>
