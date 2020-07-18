<?php

  // this will avoid mysql_connect() deprecation error.
  error_reporting( ~E_DEPRECATED & ~E_NOTICE );
  // but I strongly suggest you to use PDO or MySQLi.
  
  define('DBHOST', 'localhost');
  define('DBUSER', 'root');
  define('DBPASS', '');
  define('DBNAME', 'dbtest');
  
  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
  //$dbcon = mysqli_select_db(DBNAME);
  
  if ( !$conn ) {
    die("Connection failed : " . mysqli_error("hello"));
  }

    if( isset($_SESSION['submit']) ){

   $eid=$_POST['empid'];
   if($eid==null) {
    ?>
  <script>
     alert("Enter employee ID");
     </script>
     <?php }
     else
      echo $eid;
  $res=mysqli_query($conn,"INSERT INTO EMPLOYEE(eid) values ($eid)");
     
 

    }
         }?> 