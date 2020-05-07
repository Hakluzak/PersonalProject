<?php

require_once('../utils/functions.php');

$sqlsettings=[
	'host'=>'localhost',
	'db'=>'gamereview',
	'user'=>'root',
	'pass'=>''
];

$opt=[
	PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES=>false,
];
	
$pdo=new PDO('mysql:host='.$sqlsettings['host'].';dbname='.$sqlsettings['db'].';charset=utf8mb4',$sqlsettings['user'],$sqlsettings['pass'],$opt);

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