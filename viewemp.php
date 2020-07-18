<!DOCTYPE html>
<html>
<head>
<title>View-Profile</title>
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
<?php include('dbconnect.php');
$empid=$_POST["employee_id"];
$quemp="SELECT * from employee where eid='$empid'";
$remp=mysqli_query($conn,$quemp);
$userRow=mysqli_fetch_array($remp);
?>

          <div class="">


            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">


        <div class="x_content">
          <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
            <div class="profile_img">
              <div id="crop-avatar">
                <!-- Current avatar -->
                <img class="img-responsive avatar-view" src="userfiles/avatars/<?php echo $userRow['avatar_url'];?>" alt="Avatar" title="Change the avatar">
              </div>
            </div>



            <br />



          </div>
          <div class="col-md-4 col-sm-5 col-xs-2 profile_left" style="float:left;">
<h3><?php echo $userRow['ename'];?></h3>

<ul class="list-unstyled user_data" style="font-size:15px;">
  <li><i class="fa fa-info user-profile-icon">  &nbsp;Employee ID:</i> <?php echo $userRow['eid'];?>
  </li>
  <li><i class="fa fa-inbox user-profile-icon">  &nbsp;Mail:</i> <?php echo $userRow['email'];?>
  </li>

  <li><i class="fa fa-calendar user-profile-icon"> &nbsp;DOB:</i> <?php $rr=$userRow['dob']; $date=date_create($rr);
    $sdate=date_format($date,"d-m-Y"); echo $sdate;?>
  </li>

  <li>
    <i class="fa fa-briefcase user-profile-icon"> &nbsp;Designation:</i> <?php if($userRow['admin']==1) echo "Admin"; else if($userRow['proj_mgr']==1) echo "Project Manager"; elseif ($userRow['admin']!=1&&$userRow['proj_mgr']!=1) echo "Developer";?>
  </li>

  <li class="m-top-xs">
    <i class="fa fa-mobile user-profile-icon"> &nbsp;Mobile:</i><?php echo $userRow['phone'];?>

  </li>
  <li class="m-top-xs">
    <i class="fa fa-home user-profile-icon"> &nbsp;Address:</i><?php echo $userRow['address'];?>

  </li>
  <li class="m-top-xs">
    <i class="fa fa-money user-profile-icon"> &nbsp;Credits:</i><?php echo $userRow['credits'];?>

  </li>

</ul>


          </div>
      <?php if($userRow['admin']!=1){?>

          <div class="col-md-5 col-sm-5 col-xs-5">
            <h3>Efficiency</h3>
            <label for "prog">Very Hard</label><div id="prog" class="progress">
      <div <?php if($userRow['vh_efficiency']>=50){?>class="progress-bar progress-bar-success progress-bar-striped"<?php }
                    else if($userRow['vh_efficiency']>=30){?>class="progress-bar progress-bar-warning progress-bar-striped"<?php }
                    else{?>class="progress-bar progress-bar-danger progress-bar-striped"<?php }?> role="progressbar" aria-valuenow="40"
      aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $userRow['vh_efficiency'];?>%"><?php echo $userRow['vh_efficiency']."%";?>
      </div>
          </div>
          <label for "prog">Hard</label><div id="prog" class="progress">
    <div <?php if($userRow['h_efficiency']>=60){?>class="progress-bar progress-bar-success progress-bar-striped"<?php }
                  else if($userRow['h_efficiency']>=40){?>class="progress-bar progress-bar-warning progress-bar-striped"<?php }
                  else{?>class="progress-bar progress-bar-danger progress-bar-striped"<?php }?> role="progressbar" aria-valuenow="40"
    aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $userRow['h_efficiency'];?>%"><?php echo $userRow['h_efficiency']."%";?>
    </div>
        </div>
        <label for "prog">Medium</label><div id="prog" class="progress">
  <div <?php if($userRow['m_efficiency']>=70){?>class="progress-bar progress-bar-success progress-bar-striped"<?php }
                else if($userRow['m_efficiency']>=50){?>class="progress-bar progress-bar-warning progress-bar-striped"<?php }
                else{?>class="progress-bar progress-bar-danger progress-bar-striped"<?php }?> role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $userRow['m_efficiency'];?>%"><?php echo $userRow['m_efficiency']."%";?>
  </div>
      </div>
      <label for "prog">Low</label><div id="prog" class="progress">
<div <?php if($userRow['l_efficiency']>=80){?>class="progress-bar progress-bar-success progress-bar-striped"<?php }
              else if($userRow['l_efficiency']>=60){?>class="progress-bar progress-bar-warning progress-bar-striped"<?php }
              else{?>class="progress-bar progress-bar-danger progress-bar-striped"<?php }?> role="progressbar" aria-valuenow="40"
aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $userRow['l_efficiency'];?>%"><?php echo $userRow['l_efficiency']."%";?>
</div>
    </div>
    <label for "prog">Very Low</label><div id="prog" class="progress">
<div <?php if($userRow['vl_efficiency']>=90){?>class="progress-bar progress-bar-success progress-bar-striped"<?php }
              else if($userRow['vl_efficiency']>=70){?>class="progress-bar progress-bar-warning progress-bar-striped"<?php }
              else{?>class="progress-bar progress-bar-danger progress-bar-striped"<?php }?> role="progressbar" aria-valuenow="40"
aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $userRow['vl_efficiency'];?>%"><?php echo $userRow['vl_efficiency']."%";?>
</div>
  </div>
</div><?php }?>
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
