<?php
$sid=$_SESSION['sid'];
$q="SELECT * from subtasks where stid='$sid'";
$r=mysqli_query($conn,$q);
$rw=mysqli_fetch_array($r);
$eid=$rw['eid'];
$diff=$rw['difficulty'];
$q2="SELECT * from employee where eid=$eid";
$r2=mysqli_query($conn,$q2);
$rw2=mysqli_fetch_array($r2);
$curempcred=$rw2['credits'];
$q4="SELECT * from extras";
$r4=mysqli_query($conn,$q4);
$rw4=mysqli_fetch_array($r4);


if($diff=='very_low')
{
  $credits=$rw['credits'];
  $curempcred=$curempcred+$credits;
  $maxcredits=$rw4['s_very_low'];
  $eff=($credits/($maxcredits*2))*100;
  $cureff=$rw2['vl_efficiency'];
  $q3="SELECT * from subtasks where eid=$eid and difficulty='very_low' and status='completed'";
  $r3=mysqli_query($conn,$q3);
  $count=mysqli_num_rows($r3);
  $a=($cureff*($count-1))+$eff;
  $a=$a/$count;
  $q5="UPDATE employee set vl_efficiency='$a',credits='$curempcred' where eid=$eid";
  mysqli_query($conn,$q5);
}

if($diff=='low')
{
  $credits=$rw['credits'];
  $curempcred=$curempcred+$credits;
  $maxcredits=$rw4['s_low'];
  $eff=($credits/($maxcredits*2))*100;
  $cureff=$rw2['l_efficiency'];
  $q3="SELECT * from subtasks where eid=$eid and difficulty='low' and status='completed'";
  $r3=mysqli_query($conn,$q3);
  $count=mysqli_num_rows($r3);
  $a=($cureff*($count-1))+$eff;
  $a=$a/$count;
  $q5="UPDATE employee set l_efficiency='$a',credits='$curempcred' where eid=$eid";
  mysqli_query($conn,$q5);
}
if($diff=='medium')
{
  $credits=$rw['credits'];
  $curempcred=$curempcred+$credits;
  $maxcredits=$rw4['s_medium'];
  $eff=($credits/($maxcredits*2))*100;
  $cureff=$rw2['m_efficiency'];
  $q3="SELECT * from subtasks where eid=$eid and difficulty='medium' and status='completed'";
  $r3=mysqli_query($conn,$q3);
  $count=mysqli_num_rows($r3);
  $a=($cureff*($count-1))+$eff;
  $a=$a/$count;
  $q5="UPDATE employee set m_efficiency='$a',credits='$curempcred' where eid=$eid";
  mysqli_query($conn,$q5);
}
if($diff=='hard')
{
  $credits=$rw['credits'];
  $curempcred=$curempcred+$credits;
  $maxcredits=$rw4['s_hard'];
  $eff=($credits/($maxcredits*2))*100;
  $cureff=$rw2['h_efficiency'];
  $q3="SELECT * from subtasks where eid=$eid and difficulty='hard' and status='completed'";
  $r3=mysqli_query($conn,$q3);
  $count=mysqli_num_rows($r3);
  $a=($cureff*($count-1))+$eff;
  $a=$a/$count;
  $q5="UPDATE employee set h_efficiency='$a',credits='$curempcred' where eid=$eid";
  mysqli_query($conn,$q5);
}
if($diff=='very_hard')
{
  $credits=$rw['credits'];
  $curempcred=$curempcred+$credits;
  $maxcredits=$rw4['s_very_hard'];
  $eff=($credits/($maxcredits*2))*100;
  $cureff=$rw2['vh_efficiency'];
  $q3="SELECT * from subtasks where eid=$eid and difficulty='very_hard' and status='completed'";
  $r3=mysqli_query($conn,$q3);
  $count=mysqli_num_rows($r3);
  $a=($cureff*($count-1))+$eff;
  $a=$a/$count;
  $q5="UPDATE employee set vh_efficiency='$a',credits='$curempcred' where eid=$eid";
  mysqli_query($conn,$q5);
}
?>
