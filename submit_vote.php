 <?php
include "connection.php";
session_start();
if(empty($_POST['vote'])){
$error="<center><h4><font color='#FF0000'>Please select an option to vote!</h4></center></font>";
include"voter.php";
exit();
}
$vote = $_POST['vote'];
$sess = $_SESSION['SESS_NAME'] ;
// $vote = addslashes($_POST['vote']);
// $vote = mysqli_real_escape_string($con, $vote);

$sql = mysqli_query($con, 'SELECT * FROM voters WHERE username="'.$_SESSION['SESS_NAME'].'" AND status="VOTED"');
if(mysqli_num_rows($sql) > 0 ) {
	$msg="<center><h4><font color='#FF0000'>You have already voted, No need to vote again</h4></center></font>";
		include 'voter.php';
		exit();	
}else{
	$query = mysqli_query($con, "SELECT * FROM vote_count WHERE opt = '$vote'");
	if ($query) {
		$row = mysqli_fetch_array($query);

		$count = $row['count'];

		$count = $count + 1;
		//echo $count;
		$sql1 =mysqli_query($con, 'UPDATE vote_count SET count = "'.$count.'" WHERE opt = "'.$vote.'"');
		// if ($sql1) {
		// 	echo "freshi";
		// }else{
		// 	echo "noma";
		// }
	}else{
		echo "Couldn't retrieve data";
	}
	
	$sql2 =mysqli_query($con, 'UPDATE voters SET status="VOTED" WHERE username="'.$_SESSION['SESS_NAME'].'"');
	$sql3 = mysqli_query($con, 'UPDATE voters SET voted= "'.$vote.'" WHERE username="'.$_SESSION['SESS_NAME'].'"');
	if(!$sql1 && !$sql2 && !$sql3 ){
	die("Error on mysql query".mysqli_error());
	}
	else{
	$msg="<center><h4><font color='#FF0000'>Congratulation, you have made your vote.</h4></center></font>";
	include 'voter.php';
	exit();
	}
}
?>
