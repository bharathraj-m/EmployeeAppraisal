<?php
 if(isset($_POST["employee_id"]))
 {
      $output = '';
      require_once 'dbconnect.php';
      $query = "SELECT * FROM `notification` where nid = '".$_POST["employee_id"]."'";
    
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
       $eid=$row["from1"];
       $query1= "SELECT * FROM `employee`  where  eid = '$eid'";
       $result1= mysqli_query($conn, $query1);
      $row1= mysqli_fetch_array($result1);
       $da=$row["date1"];
      $date=date_create($da);
      $da=date_format($date,"d-m-Y");
                                

        
      $output .= '
      <div>
      <label align="left">FROM:</label>'.$row1["ename"].'<br>
      <label align="right">Employee Id:</label>'.$row["from1"].'<br> <hr/>
      <label align="left">Subject:</label>'.$row["subject"].'<br>
      <label align="right">Date:</label>'.$da.'</br>

    

</div>
      <div class="table-responsive">
           <table class="table table-bordered">
            <tr> <td width="5%"><label>'.$row["message"].'</label></td>
             
            
                </tr>';

      
      $output .= "</table></div>";
      echo $output;
      $query2= "UPDATE `notification` set first=0 where nid = '".$_POST["employee_id"]."'";
    
      $result2 = mysqli_query($conn, $query2);
 }
 ?>
