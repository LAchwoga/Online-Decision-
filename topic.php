<?php
if(!isset($_SESSION)) { 
session_start();
}
include "connection.php";
include "auth.php";

$sql = "SELECT * FROM topic";
$query = mysqli_query($con,$sql);

if ($query) {
	while ($row = mysqli_fetch_array($query)) {
		$topic = $row['topic'];
		$op1 = $row['op1'];
		$op2 = $row['op2'];
		$op3 = $row['op3'];
		$op4 = $row['op4'];
		$op5 = $row['op5'];
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<script src="jscript/validation.js" type="text/javascript"></script>
</head>

<body bgcolor="#EBE9E9">
<marquee>Welcome To Online Voting System Coded By Achwoga</marquee>
<center><font size='6' >
<a href="admin.php">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="view.php">Vote Results</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="topic.php">Topic</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a>
</font></center> 

<h4> Welcome <?php echo $_SESSION['SESS_NAME']; ?> </h4>
<h3>Current Topic</h3>
	<p>Topic: <?php echo $topic; ?><p>
	<p>Option 1: <?php echo $op1; ?><p>
	<p>Option 2: <?php echo $op2; ?><p>
	<p>Option 3: <?php echo $op3; ?><p>
	<p>Option 4: <?php echo $op4; ?><p>
	<p>Option 5: <?php echo $op5; ?><p>

</body>
</html>
