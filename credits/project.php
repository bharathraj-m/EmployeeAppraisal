<?php
//For projects CREDITS EVALUATION
include('../dbconnect.php');
$ss=6;
$q="SELECT * from projects where status='completed' and pno='$ss'";
$r=mysqli_query($conn,$q);
$rs=mysqli_fetch_array($r);
if(!empty($rs[0]))
{
  do{
  $credits=$rs['credits'];
  $diffi=$rs['difficulty'];
  $meid=$rs['p_mgr_id'];
  $pno=$rs['pno'];
  $qm="SELECT * from employee WHERE eid='$meid'";
  $rm=mysqli_query($conn,$qm);
  $rsm=mysqli_fetch_array($rm);
  $curcred=$rsm['main_credits'];

  $qmi="SELECT * from projects WHERE p_mgr_id='$meid' and status='completed'";
  $rmi=mysqli_query($conn,$qmi);
  $countpr=mysqli_num_rows($rmi);
  $countpr=$countpr-1;


  $q1="SELECT * from extras";
  $r1=mysqli_query($conn,$q1);
  $rs1=mysqli_fetch_array($r1);

  if($diffi=='very_low')
    $maxc=$rs1['p_very_low'];
  else if($diffi=='low')
    $maxc=$rs1['p_low'];
    else if($diffi=='medium')
      $maxc=$rs1['p_med'];
      else if($diffi=='hard')
        $maxc=$rs1['p_hard'];
        else if($diffi=='very_hard')
          $maxc=$rs1['p_very_hard'];
        $credmgr=($credits/($maxc*2))*0.2;
        $credmgr=$credmgr*100;
        $a=($curcred*$countpr)+$credmgr;
        $a=$a/($countpr+1);


   echo $a." ";
        if($credmgr!=0){
        $qc="UPDATE employee set main_credits='$a' where eid='$meid'";
        $rc=mysqli_query($conn,$qc);
      }
//Next is for employees, upto now for project manager #barfi 4/24/18 12:23 AM
//echo "PROJECT".$pno;

$qe="SELECT distinct e.eid,e.proj_credits,e.subt_credits,e.main_credits from employee as e, subtasks as s where e.eid=s.eid and s.pno='$ss'";
$re=mysqli_query($conn,$qe);
$rse=mysqli_fetch_array($re);
$counte=mysqli_num_rows($re);

 if($counte!=0){
  $credemp=(($credits/($maxc*2))*0.8)/$counte;
}
echo "$$$";
$credemp=$credemp*100;
if(!empty($rse[0]))
{
 do{
   $empid=$rse[0];
   $projcred=$rse[1];
   $subtcred=$rse[2];
   $maincred=$rse[3];
   $quep="SELECT distinct pno from projects where status='completed' and pno in (SELECT distinct pno from subtasks as s, employee as e where e.eid=s.eid and e.eid='$empid')";
   $resp=mysqli_query($conn,$quep);
   $empcountproj=mysqli_num_rows($resp);
   $b=($projcred*($empcountproj-1))+$credemp;
   $b=$b/$empcountproj;
   $c=$b*0.1;
   echo $b;
   $d=$subtcred*0.9;
   $maincred=$c+$d;
   echo $maincred;
   $qqe="UPDATE employee set main_credits='$maincred',proj_credits='$b' where eid=$empid";
   $rrs=mysqli_query($conn,$qqe);
 }while($rse=mysqli_fetch_array($re));

}

}while($rs=mysqli_fetch_array($r));
}
?>
