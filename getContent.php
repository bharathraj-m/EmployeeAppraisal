<?php
if(!empty($_GET['id'])){
    require_once 'dbconnect.php';
    $name=$_SESSION['eid'];
  	$res=mysqli_query($conn,"SELECT * FROM employee");
  	$userRow=mysqli_fetch_array($res);
    $eid=$userRow['eid'];
    if($res->num_rows > 0){
        $cmsData = $res->fetch_assoc();
        echo '<h4>'.$cmsData['eid'].'</h4>';
        echo '<p>'.$cmsData['ename'].'</p>';
    }else{
        echo 'Content not found....';
    }
}else{
    echo 'Content not found....';
}
?>
