<?php
$pno=$_SESSION['pno'];
$q="SELECT * from projects where pno='$pno'";
$r=mysqli_query($conn,$q);
$rw=mysqli_fetch_array($r);
$mgr=$rw['p_mgr_id'];
$diff=$rw['difficulty'];
$q2="SELECT * from employee where eid=$mgr and proj_mgr=1";
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
  $maxcredits=$rw4['p_very_low'];
  $eff=($credits/($maxcredits*2))*100;
  $cureff=$rw2['vl_efficiency'];
  $q3="SELECT * from projects where p_mgr_id=$mgr and difficulty='very_low' and status='completed'";
  $r3=mysqli_query($conn,$q3);
  $count=mysqli_num_rows($r3);
  $a=($cureff*($count-1))+$eff;
  $a=$a/$count;
  $q5="UPDATE employee set vl_efficiency='$a',credits='$curempcred' where eid=$mgr";
  mysqli_query($conn,$q5);
}

if($diff=='low')
{
  $credits=$rw['credits'];
  $curempcred=$curempcred+$credits;
  $maxcredits=$rw4['p_low'];
  $eff=($credits/($maxcredits*2))*100;
  $cureff=$rw2['l_efficiency'];
  $q3="SELECT * from projects where p_mgr_id=$mgr and difficulty='low' and status='completed'";
  $r3=mysqli_query($conn,$q3);
  $count=mysqli_num_rows($r3);
  $a=($cureff*($count-1))+$eff;
  $a=$a/$count;
  $q5="UPDATE employee set l_efficiency='$a',credits='$curempcred' where eid=$mgr";
  mysqli_query($conn,$q5);
}
if($diff=='medium')
{
  $credits=$rw['credits'];
  $curempcred=$curempcred+$credits;
  $maxcredits=$rw4['p_med'];
  $eff=($credits/($maxcredits*2))*100;
  $cureff=$rw2['m_efficiency'];
  $q3="SELECT * from projects where p_mgr_id=$mgr and difficulty='medium' and status='completed'";
  $r3=mysqli_query($conn,$q3);
  $count=mysqli_num_rows($r3);
  $a=($cureff*($count-1))+$eff;
  $a=$a/$count;
  $q5="UPDATE employee set m_efficiency='$a',credits='$curempcred' where eid=$mgr";
  mysqli_query($conn,$q5);
}
if($diff=='hard')
{
  $credits=$rw['credits'];
  $curempcred=$curempcred+$credits;
  $maxcredits=$rw4['p_hard'];
  $eff=($credits/($maxcredits*2))*100;
  $cureff=$rw2['h_efficiency'];
  $q3="SELECT * from projects where p_mgr_id=$mgr and difficulty='medium' and status='completed'";
  $r3=mysqli_query($conn,$q3);
  $count=mysqli_num_rows($r3);
  $a=($cureff*($count-1))+$eff;
  $a=$a/$count;
  $q5="UPDATE employee set h_efficiency='$a',credits='$curempcred' where eid=$mgr";
  mysqli_query($conn,$q5);
}
if($diff=='very_hard')
{
  $credits=$rw['credits'];
  $curempcred=$curempcred+$credits;
  $maxcredits=$rw4['p_very_hard'];
  $eff=($credits/($maxcredits*2))*100;
  $cureff=$rw2['vh_efficiency'];
  $q3="SELECT * from projects where p_mgr_id=$mgr and difficulty='very_hard' and status='completed'";
  $r3=mysqli_query($conn,$q3);
  $count=mysqli_num_rows($r3);
  $a=($cureff*($count-1))+$eff;
  $a=$a/$count;
  $q5="UPDATE employee set vh_efficiency='$a',credits='$curempcred' where eid=$mgr";
  mysqli_query($conn,$q5);
}
?>
