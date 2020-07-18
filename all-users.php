<?php include 'components/authentication.php' ?>     
<?php include 'controllers/base/head.php' ?>
                                                    <div class="container">
                                                      <div class="row clearfix">
                                                          <div class="col-md-12 column">
                                                              <div class="row clearfix">
<?php
    include 'dbconnect.php';
    $current_eid = $_SESSION['eid'];
    $sql = "SELECT * FROM employee WHERE eid != '$current_eid' order by credits desc";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn)); ?>
	<form action="#" method="post">
	<?php
    while($rws = mysqli_fetch_array($result)){  
?>

                                                                  <div class="col-md-4 column">
																  
                                                                    <div class="panel-group" id="panel-<?php echo $rws['eid']; ?>">
																	
                                                                        <div class="panel panel-default">
																		
                                                                            <div id="panel-element-<?php echo $rws['eid']; ?>" class="panel-collapse collapse in">
                                                                                <div class="panel-body">
                                                                                    <div class="col-md-6 column">
                                                                                        <img src="userfiles/avatars/<?php echo $rws['avatar_url'];?>" name="aboutme" class="img-responsive">                                  
                                                                                    </div>
                                                                                    
                                                                                        <h2><span><a href="profile.php?eid=<?php echo $rws['eid'];?>"><?php echo $rws['ename'];?></a></span></h2>
																						<p><?php echo $rws['credits'];?></p>
                                                                                   <input type=checkbox name=chk[] value="<?php echo $rws['eid']; ?>" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                  </div>
 <?php } ?>                                                        
</form> 
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>