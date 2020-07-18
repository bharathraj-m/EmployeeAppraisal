
<!DOCTYPE html>
<html>
<head>
	<title>Home Page | To Do </title>
	<style>


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


</style>
</head>
<body >
<?php include('side.php');
if($a==1)
{
$queryA1="SELECT * FROM projects where status='completed'";
$queryA2="SELECT * FROM projects where status='pending'";
}
if($b==1)
{
	$queryA1="SELECT * FROM projects WHERE status='completed' AND p_mgr_id='$name'";
	$queryA2="SELECT * FROM projects WHERE status='pending' AND p_mgr_id='$name'"; //$name is actually $eid
}
if($a!=1 && $b!=1)
{
	$queryA2 = "SELECT distinct * from projects as p,employee as e where p_mgr_id=e.eid AND pno IN (SELECT distinct pno from  `subtasks`  WHERE '$name'= eid AND status='pending' ORDER BY enddate desc)";
	$queryA1 = "SELECT distinct * from projects as p,employee as e where p_mgr_id=e.eid AND p.status='completed' AND pno IN (SELECT distinct pno from  `subtasks`  WHERE '$name'= eid AND status='completed' ORDER BY enddate desc)";
}
$querynot= "SELECT * from `notification` where to1='$name' AND first=1 ORDER BY date1 desc";
$resnot=mysqli_query($conn,$querynot);
$countnot=mysqli_num_rows($resnot);
$resA1=mysqli_query($conn,$queryA1);
$resA2=mysqli_query($conn,$queryA2);
$countA1=mysqli_num_rows($resA1);
$countA2=mysqli_num_rows($resA2);
$qu1="SELECT * from employee where admin!=1";
$rss=mysqli_query($conn,$qu1);
$countnot1=mysqli_num_rows($rss);
?>
<!--COntent of Page Here -->
	<div class="right_col" role="main">
<div class="">
<div class="row top_tiles">
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i style="color:#1abb9c;" class="fa fa-caret-square-o-right"></i></div>
			<div  class="count"><?php echo $countA2; ?></div>
			<?php if($a==1) {?>
			<h3><a href="myproject3.php">Current Projects</a></h3>
		<?php } ?>
		<?php if($b==1) {?>
		<h3><a href="mgrp.php">Current Projects</a></h3>
	<?php } ?>
	<?php if($a!=1 && $b!=1) {?>
	<h3><a href="empproj.php">Current Projects</a></h3>
<?php } ?>
			<br/>
		</div>
	</div>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i style="color:#1abb9c;" class="fa fa-comments-o"></i></div>
			<div class="count"><?php echo $countnot;?></div>
			<h3><a href="notify.php">Notifications</a></h3>
			<br/>
		</div>
	</div>
	<?php if($a==1) {?>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i style="color:#1abb9c;" class="fa fa-sort-amount-desc"></i></div>
			<div class="count"><?php echo $countnot1;?></div>
			<h3><a href="allpf.php">All Profiles</a></h3>
			<br/>
		</div>
	</div> <?php } ?>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i style="color:#1abb9c;" class="fa fa-check-square-o"></i></div>
			<div class="count"><?php echo $countA1; ?></div>
			<?php if($a==1) {?>
			<h3><a href="comprojadmin.php">Completed Projects</a></h3>
		<?php } ?>
		<?php if($b==1) {?>
		<h3><a href="comprojmgr.php">Completed Projects</a></h3>
	<?php } ?>
	<?php if($a!=1 && $b!=1) {?>
	<h3><a href="comprojemp.php">Completed Projects</a></h3>
<?php } ?>
			<br/>
		</div>
	</div>
</div>
			</div>


			<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="x_panel">
												<div class="x_title">
													<h2>Recent Activities</h2>
													<ul class="nav navbar-right panel_toolbox">
														<li style="float:right;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
														</li>

													</ul>
													<div class="clearfix"></div>
												</div>
												<div class="x_content">



 														<?php
															$q4="SELECT date1 from activities WHERE eid='$name' group by date1 order by date1 desc, ampm desc,time1 desc ";
															$rs4=mysqli_query($conn,$q4);
															$Row4=mysqli_fetch_array($rs4);

															if(empty($Row4[0])) {?> <tr><td align="center" ><b>No Activities</b></td></tr> <?php }
															else do{
																$edate= $Row4['date1'];
																$date1=date_create($edate);
																	$edate1=date_format($date1,"d-m-Y");

																		?>

                                                         <table id="datatable" class="table table table-bordered">
														<thead>
															<tr></tr>
															<tr><td colspan="3" align="center"><b> <?php echo $edate1; ?></b></td> </tr>
															<tr id="hoo" align="Center">
																<th width="60%" >Activity</th>
																<th width="20%" >Date</th>
																<th width="20%" >Time</th>

															</tr>
														</thead>


														<tbody>
															<?php
															$q3="SELECT * FROM activities WHERE eid='$name' and date1='$edate' order by ampm desc,time1 desc ";
															$rs3=mysqli_query($conn,$q3);
															$Row3=mysqli_fetch_array($rs3);

															if(empty($Row3[0])) {?> <tr><td align="center" colspan="3"><b>No Activities</b></td></tr> <?php }
															else do{
																$edate= $Row3['date1'];
																$date1=date_create($edate);
																	$edate=date_format($date1,"d-m-Y");

																		?>
															<tr id="ho">
																<td ><?php echo $Row3['msg'] ?></td>
																<td><?php echo $edate; ?></td>
																<td><?php echo $Row3['time1']; echo $Row3['ampm'] ?></td>
																															</tr> <?php
														}while($Row3=mysqli_fetch_array($rs3));
																?></tbody>
													</table> <?php
                                                        }while($Row4=mysqli_fetch_array($rs4));
														?>

												</div>
											</div>
										</div>

			</div>
		</div>

<!-- /page content -->

<!--COntent of Page ends Here -->
</body>
</html>
<?php include('footer.php');
ob_end_flush(); ?>
