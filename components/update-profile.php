<?php
    ini_set("display_errors",1);
    session_start();
    $temp=$_SESSION['eid'];
    if(isset($_POST)){
        require '../dbconnect.php';
        $Destination = '../userfiles/avatars';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.jpg';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum   = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        $sql5="UPDATE employee SET avatar_url='$NewImageName' WHERE eid = '$temp'";
        $sql6="INSERT INTO employee (avatar_url) VALUES ('$NewImageName') WHERE eid = '$temp'";
        $result = mysqli_query($conn,"SELECT * FROM employee WHERE eid = '$temp'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['ImageFile']['name'])){
                mysqli_query($conn,$sql5)or die(mysqli_error($conn));
                header("location:../edit-profile.php?eid=$temp");
            }
        }
        else {
            mysqli_query($conn,$sql6)or die(mysqli_error($conn));
            header("location:../edit-profile.php?eid=$temp");
        }
        $ename=$_REQUEST['ename'];
        $uname=$_REQUEST['uname'];
        $email1=$_REQUEST['email'];
        $password1=$_REQUEST['password'];
        $address=$_REQUEST['address'];
        $short_bio=$_REQUEST['short_bio'];
        $dob=$_REQUEST['dob'];
        $gender=$_REQUEST['gender'];
      $s1=$_REQUEST['s_ans_1'];
          $s2=$_REQUEST['s_ans_2'];
          $a=1;
        $sql3="UPDATE employee SET ename='$ename',uname='$uname',address='$address',email='$email1',password='$password1',short_bio='$short_bio',dob='$dob',gender='$gender',s_ans_1='$s1',s_ans_2='$s2', first_log='$a' WHERE eid = '$temp'";
            $query=mysqli_query($conn,$sql3)or die(mysqli_error($conn));
            header("location:../edit-profile.php?eid=$temp&request=profile-update&status=success");

    }
?>
