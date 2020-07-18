<?php
require_once 'dbconnect.php';
$q1="SELECT * from employee WHERE admin!=1 and proj_mgr!=1";
$r1=mysqli_query($conn,$q1);
$row1=mysqli_fetch_array($r1);
if(!empty($row1[0]))
{
  do{
    $eid=$row1['eid'];
    $q2="SELECT SUM(credits) as cred from subtasks WHERE eid='$eid' and difficulty='very_low' and status='completed'";
    $q3="SELECT SUM(credits) as cred from subtasks WHERE  eid='$eid' and difficulty='low' and status='completed'";
    $q4="SELECT SUM(credits) as cred from subtasks WHERE  eid='$eid' and difficulty='medium' and status='completed'";
    $q5="SELECT SUM(credits) as cred from subtasks WHERE  eid='$eid' and difficulty='hard' and status='completed'";
    $q6="SELECT SUM(credits) as cred from subtasks WHERE  eid='$eid' and difficulty='very_hard' and status='completed'";


    $qi2="SELECT * from subtasks WHERE eid='$eid' and difficulty='very_low' and status='completed'";
    $qi3="SELECT * from subtasks WHERE  eid='$eid' and difficulty='low' and status='completed'";
    $qi4="SELECT * from subtasks WHERE  eid='$eid' and difficulty='medium' and status='completed'";
    $qi5="SELECT * from subtasks WHERE  eid='$eid' and difficulty='hard' and status='completed'";
    $qi6="SELECT * from subtasks WHERE  eid='$eid' and difficulty='very_hard' and status='completed'";

    $maxq="SELECT * from extras";
    $rq=mysqli_query($conn,$maxq);
    $rowq=mysqli_fetch_array($rq);


    $r2=mysqli_query($conn,$q2);
    $r3=mysqli_query($conn,$q3);
    $r4=mysqli_query($conn,$q4);
    $r5=mysqli_query($conn,$q5);
    $r6=mysqli_query($conn,$q6);

    $ri2=mysqli_query($conn,$qi2);
    $ri3=mysqli_query($conn,$qi3);
    $ri4=mysqli_query($conn,$qi4);
    $ri5=mysqli_query($conn,$qi5);
    $ri6=mysqli_query($conn,$qi6);

    $row2=mysqli_fetch_assoc($r2);
    $row3=mysqli_fetch_assoc($r3);
    $row4=mysqli_fetch_assoc($r4);
    $row5=mysqli_fetch_assoc($r5);
    $row6=mysqli_fetch_assoc($r6);



    $count1=mysqli_num_rows($ri2);
    $count2=mysqli_num_rows($ri3);
    $count3=mysqli_num_rows($ri4);
    $count4=mysqli_num_rows($ri5);
    $count5=mysqli_num_rows($ri6);


    $sum=0;
    $n=0;
    if(!empty($row2['cred'])&&$count1!=0)
    {
         $l1=$row2['cred']/($rowq['s_very_low']*2*$count1);
         $sum=$sum+$l1;
         $n=$n+1;
         //echo $n." ".$sum." ";
       }
    if(!empty($row3['cred'])&&$count2!=0)
    {
         $l2=$row3['cred']/($rowq['s_low']*2*$count2);
         $sum=$sum+$l2;
         $n=$n+1;
        //  echo $n." ".$sum." ";
       }
    if(!empty($row4['cred'])&&$count3!=0)
    {
         $l3=$row4['cred']/($rowq['s_med']*2*$count3);
         $sum=$sum+$l3;
         $n=$n+1;
        //  echo $n." ".$sum." ";
       }
    if(!empty($row5['cred'])&&$count4!=0)
    {
         $l4=$row5['cred']/($rowq['s_hard']*2*$count4);
         $sum=$sum+$l4;
         $n=$n+1;
         //echo $row5['cred']." ".$rowq['s_hard']." ".$count4." ";

          //echo $n." ".$sum." ";
       }
    if(!empty($row6['cred'])&&$count5!=0)
    {
         $l5=$row6['cred']/($rowq['s_very_hard']*2*$count5);
         $sum=$sum+$l5;
         $n=$n+1;
          //echo $n." ".$sum." ";
       }
    //echo "$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$         ".$sum;
if($sum!=0&&$n!=0)
{
  $final=$sum/$n*100;
  //echo "$final";
   $finq="UPDATE employee set perf_value='$final' where eid='$eid' ";
   $finr=mysqli_query($conn,$finq);
 }
   for($i=0;$i<5;$i++)
   {

    $b1[$i]=0;

   }
  }while($row1=mysqli_fetch_array($r1));
}
 ?>
