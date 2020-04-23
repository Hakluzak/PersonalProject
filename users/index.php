<?php
require_once('../utils/functions.php');

$title='Home';

require_once('../reqs/header.php');
?>

<style>
#logo {
	border-style: solid;
	border-width: 5px;
}
#create {
	
}
</style>

  <div class="container" style="background-color: #bfbfbf">
	<?php
	require_once('../reqs/nav.php');
	?>
   <body style="background: url(https://fractalsoftworks.com/wp-content/themes/starfarer/images/bg_top_stars.jpg) repeat-x top center; background-color: black;">
	<?php
	//show a list of users in a table
	require_once('../Utils/CSVfunctions.php');
	$userArray = readCSV('../data/users.csv.php');
	echo '<table>
			<tr>
				<td>Username</td>
				<td>Password</td>
				<td>First Name</td>
				<td>Last Name</td>
			</tr>';
	for ($i = 0; $i < count($userArray); $i++){
		echo '
		<tr>
			<td>'.$userArray[$i][0].'</td>
			<td>'.$userArray[$i][1].'</td>';
			if (!isset($userArray[$i][2])){
				echo '<td>N/A</td>';
			} else echo '<td>'.$userArray[$i][2].'</td>';
			if (!isset($userArray[$i][3])){
				echo '<td>N/A</td>';
			} else echo '<td>'.$userArray[$i][3].'</td>';
			echo '<td><a class="nav-link" href="modify.php?index='.$i.'"><button type="button" class="btn btn-secondary">Modify</button></a></td>';
			echo '<td><a class="nav-link" href="delete.php?index='.$i.'"><button type="button" class="btn btn-secondary">Delete</button></a></td>';
		echo '</tr>';
	}
	echo '</table>';
	?>
	</div>
	<?php
		require_once('../reqs/footer.php');
	?>

	</body>
</html>