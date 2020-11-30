<?php
if(!isset($_SESSION)) { 
session_start();
}
include "connection.php";
include "auth.php";
include "header_voter.php";

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
<h4> Welcome <?php echo $_SESSION['SESS_NAME']; ?> </h4>
<h3>Make a Vote </h3>
<form action="submit_vote.php" name="vote" method="post" id="myform" >
<center><font size='6'> <?php echo $topic; ?><BR>
<input type="radio" name="vote" value="<?php echo $op1; ?>">  <?php echo $op1; ?><BR>
<input type="radio" name="vote" value="<?php echo $op2; ?>"><?php echo $op2; ?><BR>
<input type="radio" name="vote" value="<?php echo $op3; ?>">   <?php echo $op3; ?><BR>
<input type="radio" name="vote" value="<?php echo $op4; ?>">  <?php echo $op4; ?><BR>
<input type="radio" name="vote" value="<?php echo $op5; ?>">  <?php echo $op5; ?><BR>
</font></center><br>
<?php global $msg; echo $msg; ?>
<?php global $error; echo $error; ?>
<center><input type="submit" value="Submit Vote" name="submit" style="height:30px; width:100px" /></center>
</form>
