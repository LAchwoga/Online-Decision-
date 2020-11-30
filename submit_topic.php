<?php

include("connection.php");

if (isset($_POST['submit_topic'])) {
	$topic = $_POST['topic'];
	$op1 = $_POST['op1'];
	$op2 = $_POST['op2'];
	$op3 = $_POST['op3'];
	$op4 = $_POST['op4'];
	$op5 = $_POST['op5'];

	$sql = "SELECT * FROM topic";
	$result = mysqli_query($con, $sql);

	if ($count = mysqli_num_rows($result) > 0) {
		$sql = "DELETE FROM topic";
		$query = mysqli_query($con, $sql);

		if ($query) {
			$sql = "INSERT INTO topic (topic, op1, op2, op3, op4, op5) VALUES('$topic', '$op1', '$op2','$op3','$op4','$op5')";
			$query = mysqli_query($con, $sql);

			if ($query) {
				$sql = "SELECT * FROM vote_count";
				$result = mysqli_query($con, $sql);

				if ($count = mysqli_num_rows($result) > 0) {
					$sql = "DELETE FROM vote_count";
					$query = mysqli_query($con, $sql);

					if ($query) {
						$sql1 = "INSERT INTO vote_count(opt) VALUES('$op1')";
						$op1 = mysqli_query($con, $sql1);

						$sql2 = "INSERT INTO vote_count(opt) VALUES('$op2')";
						$op2= mysqli_query($con, $sql2);

						$sql3 = "INSERT INTO vote_count(opt) VALUES('$op3')";
						$op3 = mysqli_query($con, $sql3);

						$sql4 = "INSERT INTO vote_count(opt) VALUES('$op4')";
						$op4 = mysqli_query($con, $sql4);

						$sql5 = "INSERT INTO vote_count(opt) VALUES('$op5')";
						$op5 = mysqli_query($con, $sql5);
						if ($op1 && $op2 && $op3 && $op4 && $op5) {
							//echo "rada safi";
						}else{
							echo "Failed to populate table vote_count. ".mysqli_error($con);
						}
					}else{
						echo "Failed to empty table vote_count";
					}
				}

				
				echo "Topic has been set";
				header("location:topic.php");
			}else{
				echo "Error: Topic not set. ".mysqli_error($con);
			}
		}else{
			echo "Kuna noma";
		}
	}
}

?>