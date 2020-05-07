<?php

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




$title='Home';

require_once('./reqs/header.php');
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
	require_once('./reqs/nav.php');
	?>
   <body style="background: url(https://fractalsoftworks.com/wp-content/themes/starfarer/images/bg_top_stars.jpg) repeat-x top center; background-color: black;">
   <br>
	<br>
	<?php
	if (isset($_GET['create'])){
			echo '<br><div class="alert alert-success" role="alert">
				Entry Successfuly created.
				</div>';
		}
	if (isset($_GET['delete'])){
		echo '<br><div class="alert alert-danger" role="alert">
				Entry Successfuly deleted.
			</div>';
		}
		?>
	<br>
	<h1>Available Games</h1>
	<hr>
	<?php
		$result=$pdo->query('SELECT * FROM games');
		for($i=1;$i<=$result->rowCount();$i++){
				$record=$result->fetch();
				if (is_logged('uID')) echo '<a href="modify.php?index='.$record['ID'].'" style="margin-left:95%"><button type="button" class="btn btn-secondary">Edit</button></a>';
				echo'<div class="media">
						<img id="logo" src="'.$record['imagelink'].'" class="mr-3" style="max-width:200px">
					<div class="media-body">
						<h5 class="mt-0">'.$record['name'].'</h5>
						<p>Genre: '.$record['genre'].'</p>
						<p>Price: $'.$record['price'].'</p>
						<p>Website:<a href="'.$record['devweblink'].'" target="_blank"><button type="button" class="btn btn-dark">Click here to visit their website.</button></a></p>
						<p><a href="details.php?index='.$record['ID'].'"><button type="button" class="btn btn-dark">Click to see details</button></a></p>
					</div>
				</div>
			<hr>';
		}
	?>
	</div>
	<?php
	require_once('./reqs/footer.php');
	?>

  </body>
</html>