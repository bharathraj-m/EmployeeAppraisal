<form action="components/update-profile.php" method="post" enctype="multipart/form-data" id="UploadForm">
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
                          <img src="userfiles/avatars/<?php echo $rws['avatar_url'];?>" class="img-responsive">
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
  </form>
