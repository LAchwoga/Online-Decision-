<?php
if(!isset($_SESSION)) { 
session_start();
}
include "auth.php";

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

<h4> Welcome <?php echo $_SESSION['SESS_NAME']; ?> </h4><center>
<h3>Input the options to be selected from</h3>

<form action="submit_topic.php" name="vote" method="post" id="myform" >
	
	<div>		
		<label>Topic</label><br>
		<input type="text" name="topic" placeholder="Enter Topic">
	</div>
	<div>		
		<label>Options</label><br>
		<input type="text" name="op1" placeholder="Enter Option 1"><br><br>
		<input type="text" name="op2" placeholder="Enter Option 2"><br><br>
		<input type="text" name="op3" placeholder="Enter Option 3"><br><br>
		<input type="text" name="op4" placeholder="Enter Option 4"><br><br>
		<input type="text" name="op5" placeholder="Enter Option 5"><br><br>
	</div>
<?php global $msg; echo $msg; ?>
<?php global $error; echo $error; ?>
<input type="submit" value="Submit Topic" name="submit_topic" style="height:30px; width:100px" /></center>
</form>
