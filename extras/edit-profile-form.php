<form action="components/update-profile.php" method="post" enctype="multipart/form-data" id="UploadForm">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#general" data-toggle="tab">Personal</a></li>
      <li><a href="#personal" data-toggle="tab">Security</a></li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="general">
            <div class="col-md-6">
                <div class="form-group float-label-control">
                    <label for="">Full Name</label>
                    <input type="text" class="form-control" placeholder="<?php echo $rws['ename'];?>" name="ename" value="<?php echo $rws['ename'];?>">
                </div>
                <div class="form-group float-label-control">
                    <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="<?php echo $rws['email'];?>" name="email" value="<?php echo $rws['email'];?>">
                </div>
                <div class="form-group float-label-control">
                    <label for="">Avatar</label>
                    <input name="ImageFile" type="file" id="uploadFile"/>
                    <div class="col-md-6">
                        <div class="shortpreview">
                            <label for="">Previous Avatar </label>
                            <br>
                            <img src="userfiles/avatars/2-.jpg" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="shortpreview" id="uploadImagePreview">
                            <label for="">Current Uploaded Avatar </label>
                            <br>
                            <div id="imagePreview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group float-label-control">
                  <label for="">Address</label>
                  <input type="text" class="form-control" rows="10" placeholder="<?php echo $rws['address'];?>" name="address" value="<?php echo $rws['address'];?>">
              </div>
              <div class="form-group float-label-control">
                  <label for="">Birthday</label>
                  <input type="date" class="form-control" placeholder="<?php echo $rws['dob'];?>" name="dob" value="<?php echo $rws['dob'];?>">
              </div>
              <label for="">Gender</label>
              <div class="form-group float-label-control">
                  <div class="radio-inline">
                      <label>
                        <?php $gen=$rws['gender'];?>
                          <input type="radio" name="gender" id="optionsRadios1" value="Male" <?php if($gen=="Male"){ ?> checked <?php }?> >Male</label>
                  </div>
                  <div class="radio-inline">
                      <label>
                          <input type="radio" name="gender" id="optionsRadios1" value="Female" <?php if($gen=="Female"){ ?> checked <?php }?>>Female</label>
                  </div>
              </div>
              <div class="form-group float-label-control">
                  <label for="">Short Bio</label>
                  <textarea class="form-control" placeholder="<?php echo $rws['short_bio'];?>" rows="6" placeholder="<?php echo $rws['short_bio'];?>" name="short_bio" value="<?php echo $rws['short_bio'];?>"><?php echo $rws['short_bio'];?></textarea>
              </div>
            </div>
        </div>
        <div class="tab-pane fade" id="personal">
            <div class="col-md-6">
              <label for="">Username</label>
              <div class="row">
  <div class="col-lg-12">
     <div class="form-group">
         <div class="input-group">
             <span class="input-group-addon">
                 <!-- http://<?php echo $rws['domain_websiteaddress'];?>/user_username= --> know.me/
             </span>
             <input type="username" class="form-control input-lg" placeholder="<?php echo $rws['uname'];?>" name="uname" id="user_username" value="<?php echo $rws['uname'];?>" autocomplete="off" required>
             <span class="input-group-addon" id="status"></span>
         </div>
      </div>
     </div>
 </div>
 <div class="form-group float-label-control">
     <label for="">Password</label>
     <input type="password" class="form-control" placeholder="<?php echo $rws['password'];?>" name="password" value="<?php echo $rws['password'];?>">
 </div>

            </div>
            <div class="col-md-6">

                <label for="">Security Questions</label>
                <div class="form-group float-label-control">
                    <div class="input-group">
                        <span class="input-group-addon">Firstfriend</span>
                        <input type="text" class="form-control" placeholder="<?php echo $rws['s_ans_1'];?>" name="s_ans_1" value="<?php echo $rws['s_ans_1'];?>">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Birthplace</span>
                        <input type="text" class="form-control" placeholder="<?php echo $rws['s_ans_2'];?>" name="s_ans_2" value="<?php echo $rws['s_ans_2'];?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="submit">
        <center>
            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Save Your Profile</button>
        </center>
    </div>
</form>
<a href="home.php"><h1>HomePage</h1></a>
