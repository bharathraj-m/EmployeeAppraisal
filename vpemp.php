<?php
 if(isset($_POST["employee_id"]))
 {
       $empid=$_POST["employee_id"];
      $output = '';
      require_once 'dbconnect.php';
       $query1 = "SELECT * FROM employee WHERE eid = '$empid'";
       $result1 = mysqli_query($conn, $query1);
       $row1 = mysqli_fetch_array($result1);
      $output .= '
      <div class="right_col" role="main">
                <div class="">
                  <div class="page-title">
                    <div class="title_left">
                      <h3>View Profile</h3>
                    </div>

                  </div>

                  <div class="clearfix"></div>

                  <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>'.  $row1['ename'].'</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                  <div class="profile_img">
                    <div id="crop-avatar">
                      <!-- Current avatar -->
                      <img class="img-responsive avatar-view" src="userfiles/avatars/'.  $row1['avatar_url'].'" alt="Avatar" title="Change the avatar">
                    </div>
                  </div>

                  <br />
                </div>
                <div class="col-md-4 col-sm-5 col-xs-10 profile_left" style="float:left  ">
      <h3>'.  $row1['ename'].'</h3>

      <ul class="list-unstyled user_data" style="font-size:20px;">
        <li><i class="fa fa-info user-profile-icon">  &nbsp;Employee ID:</i> '.  $row1['eid'].'
        </li>
        <li><i class="fa fa-inbox user-profile-icon">  &nbsp;Mail:</i> '.  $row1['email'].'
        </li>

        <li><i class="fa fa-calendar user-profile-icon"> &nbsp;DOB:</i>'. $rr=$row1['dob']; $date=date_create($rr);
          $sdate=date_format($date,"d-m-Y");   $sdate.'
        </li>



        <li class="m-top-xs">
          <i class="fa fa-mobile user-profile-icon"> &nbsp;Mobile:</i>'.   $row1['phone'].'

        </li>
        <li class="m-top-xs">
          <i class="fa fa-home user-profile-icon"> &nbsp;Address:</i>'.  $row1['address'].'

        </li>
        <li class="m-top-xs">
          <i class="fa fa-money user-profile-icon"> &nbsp;Credits:</i>'.   $row1['credits'].'

        </li>

      </ul>


                </div>
            '. if($row1['admin']!=1){.'
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <h3>Efficiency</h3>
                  <label for "prog">Very Hard</label><div id="prog" class="progress">
            <div '. if($row1['vh_efficiency']>=50){.'class="progress-bar progress-bar-success progress-bar-striped"'. }
                          else if($row1['vh_efficiency']>=30){'.class="progress-bar progress-bar-warning progress-bar-striped"'. }
                          else{.'class="progress-bar progress-bar-danger progress-bar-striped".' }.' role="progressbar" aria-valuenow="40"
            aria-valuemin="0" aria-valuemax="100" style="width:'.   $row1['vh_efficiency'].'%">.'   $row1['vh_efficiency']."%".'
            </div>
                </div>
                <label for "prog">Hard</label><div id="prog" class="progress">
          <div .' if($row1['h_efficiency']>=60){.'class="progress-bar progress-bar-success progress-bar-striped".' }
                        else if($row1['h_efficiency']>=40){.'class="progress-bar progress-bar-warning progress-bar-striped".' }
                        else{.'class="progress-bar progress-bar-danger progress-bar-striped".' }.' role="progressbar" aria-valuenow="40"
          aria-valuemin="0" aria-valuemax="100" style="width:.'   $row1['h_efficiency'].'%">.'   $row1['h_efficiency']."%".'
          </div>
              </div>
              <label for "prog">Medium</label><div id="prog" class="progress">
        <div .' if($row1['m_efficiency']>=70){.'class="progress-bar progress-bar-success progress-bar-striped".' }
                      else if($row1['m_efficiency']>=50){.'class="progress-bar progress-bar-warning progress-bar-striped".' }
                      else{.'class="progress-bar progress-bar-danger progress-bar-striped".' }.' role="progressbar" aria-valuenow="40"
        aria-valuemin="0" aria-valuemax="100" style="width:.'   $row1['m_efficiency'].'%">.'   $row1['m_efficiency']."%".'
        </div>
            </div>
            <label for "prog">Low</label><div id="prog" class="progress">
      <div .' if($row1['l_efficiency']>=80){.'class="progress-bar progress-bar-success progress-bar-striped".' }
                    else if($row1['l_efficiency']>=60){.'class="progress-bar progress-bar-warning progress-bar-striped".' }
                    else{.'class="progress-bar progress-bar-danger progress-bar-striped".' }.' role="progressbar" aria-valuenow="40"
      aria-valuemin="0" aria-valuemax="100" style="width:.'   $row1['l_efficiency'].'%">.'   $row1['l_efficiency']."%".'
      </div>
          </div>
          <label for "prog">Very Low</label><div id="prog" class="progress">
      <div .' if($row1['vl_efficiency']>=90){.'class="progress-bar progress-bar-success progress-bar-striped".' }
                    else if($row1['vl_efficiency']>=70){.'class="progress-bar progress-bar-warning progress-bar-striped".' }
                    else{.'class="progress-bar progress-bar-danger progress-bar-striped".' }.' role="progressbar" aria-valuenow="40"
      aria-valuemin="0" aria-valuemax="100" style="width:.'   $row1['vl_efficiency'].'%">.'   $row1['vl_efficiency']."%".'
      </div>
        </div>
      </div>.' }.'
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
                ';


      echo  $output;
 }
 ?>
