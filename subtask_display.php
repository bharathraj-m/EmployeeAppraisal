<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
include('header2.php');
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['eid']) ) {
		header("Location: index.php");
		exit;
	}
	$a=7;

	// select loggedin users detail
  $name=$_SESSION['eid'];
	$res=mysqli_query($conn,"SELECT * FROM subtasks as s, projects as p WHERE s.eid='$name' and p.pno=s.pno");


  $eid=$userRow['eid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<thead>
		<tr>
			<th>#</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Age</th>
			<th>City</th>
			<th>Country</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>Anna</td>
			<td>Pitt</td>
			<td>35</td>
			<td>New York</td>
			<td>USA</td>
		</tr>
	</tbody>
</table>
</div>
</div>


</body>
</html>
