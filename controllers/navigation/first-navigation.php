<?php
include 'dbconnect.php';
    $current_eid = $_SESSION['eid'];
    $sql = "SELECT * FROM employee WHERE eid='$current_eid'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
?>
    <!-- Navbar1 -->
	    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
	      <div class="fluid-container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
                <a class="navbar-brand" href="home.php"><b>Infismash</b></a>	        
            </div>
	        <div class="navbar-collapse collapse" id="navbar-collapse1">
	           <ul class="nav navbar-nav">
	               <li>
                       <a href="home.php"><i class="fa fa-home"></i> Home</a>
                   </li>
	           </ul>
                <form class="navbar-form navbar-left" role="search" method="post" autocomplete="off" action="search-result.php">
                    <div class="form-group">
                        <input type="text" class="search form-control" id="searchbox" placeholder="Search for People" name="search-form"/><br />
                        <div id="display"></div>
				    </div> 
				</form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $row['fname'];?><strong class="caret"></strong></a>                  
                        <ul class="dropdown-menu">
                            <li>
                                <a href="edit-profile.php"><i class="fa fa-edit"></i> Edit Profile</a>
                            </li>
                        </ul>
                    </li>	
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bars" style="font-size: 1.27em;"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="components/logout.php"><i class="fa fa-mail-reply"></i> Logout</a>
                            </li>
                        </ul>
                    </li>	
                </ul>    
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
      <!-- ./Navbar1 -->
<?php
    }
?>