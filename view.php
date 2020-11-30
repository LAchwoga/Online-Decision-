<?php
if(!isset($_SESSION)) { 
session_start();
}
include "auth.php";
include "header_voter.php";
?>
<center><h3> Voting So Far  </h3></center>
<?php
include "connection.php";
$member = mysqli_query($con, 'SELECT * FROM vote_count' );
if (mysqli_num_rows($member)== 0 ) {
	echo '<font color="red">No results found</font>';
}
else {
	echo '<center><table><tr bgcolor="#FF6600">
<td width="30px">ID</td>		
<td width="100px">OPTION</td>
<td width="30px">VOTE</td>
</tr>';
$id = 0;
while($mb=mysqli_fetch_object($member))
		{	
			$id+=1;
			$option=$mb->opt;
			$vote=$mb->count;
			echo '<tr bgcolor="#BBBEFF">';
	echo '<td>'.$id.'</td>';	
	echo '<td>'.$option.'</td>';
	echo '<td>'.$vote.'</td>';
	echo "</tr>";
		}
		echo'</table></center>';
	}
?>