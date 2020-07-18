<?php
    if (isset($_GET['eid'])) {
        $eid = $_GET['eid'];
    }
    $sql = "SELECT * FROM employee where eid='$eid'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error()); 
    $rws = mysqli_fetch_array($result);       
?>

        <style> 
            body{
                background-image:url("./userfiles/background-images/1.jpg")!important;
            }
        </style>

