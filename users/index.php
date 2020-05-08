<?php
require_once('../settings.php');
require_once(APP_ROOT.'/sqldb/dbconnect.php');
require_once('../utils/lib_auth.php');
if (!Auth::is_logged('uID')){ 
	header('location: ../index.php');
	die();
}
$pdo=mysqldb::connect();
$q=$pdo->prepare('SELECT status FROM users WHERE ID=?');
$q->execute([$_SESSION['uID']]);
$user=$q->fetch();
if ($user['status'] != 'A') header ('location: ../index.php');

$title='Admin Home';

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
	echo '<table>
			<tr>
				<td>Email</td>
				<td>Password</td>
				<td>Status</td>
			</tr>';
	require_once('../sqldb/dbclass.php');
	
	$result=$pdo->query('SELECT * FROM users');
		for($i=1;$i<=$result->rowCount();$i++){
		$record=$result->fetch();
		echo '
		<tr>
			<td>'.$record['email'].'</td>
			<td>'.$record['password'].'</td>
			<td>'.$record['status'].'</td>';
			echo '<td><a class="nav-link" href="modify.php?index='.$record['id'].'"><button type="button" class="btn btn-secondary">Modify</button></a></td>';
			echo '<td><a class="nav-link" href="delete.php?index='.$record['id'].'"><button type="button" class="btn btn-secondary">Delete</button></a></td>';
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