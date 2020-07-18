<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">View</button>

<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Faculty Details</h4>
      </div>
      <div class="modal-body">
       <div class="container" style="margin-top:30px">
        <table border="1" class="table">
        <thead>
       <tr>

       <th>Fid</th>
       <th>Fname</th>
       <th>Fdept</th>
       <th>Fexp</th>
       <th>Fage</th>

     </tr>
     </thead>

<?php
     $query="SELECT * FROM faculty";
      $result1=mysql_query($query);
       while($row1=mysql_fetch_array($result1))
       {
        $fid1=$row1['fid'];
        $fname1=$row1['fname'];
        $fdept1=$row1['fdept']; 
        $fexp1=$row1['fexp'];
        $fage1=$row1['fage'];
        ?>
        <tr>
        <td><?php echo $fid1; ?></td>
        <td><?php echo $fname1; ?></td>
        <td><?php echo $fdept1; ?></td>
        <td><?php echo $fexp1; ?></td>
        <td><?php echo $fage1; ?></td>
        </tr>
        <?php
      }

?>
</table>
      </div>
      
    </div>

  </div>
</div>
  </div>