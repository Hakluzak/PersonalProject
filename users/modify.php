<?php
if ($_POST != NULL){
	require_once('../sqldb/dbclass.php');
	$user = new Dbuse;
	$user->euser($_POST,$_GET['index']);
}

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

$result=$pdo->query('SELECT * FROM users WHERE ID='.$_GET['index'].'');
$user=$result->fetch();


require_once('../utils/functions.php');

$title='User Edit';

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
		
			<form method="POST" action="modify.php?index=<?php echo $_GET['index'] ?>">
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= $user['email'] ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Status</label>
				<input type="text" class="form-control" id="status" name="status" value="<?= $user['status'] ?>" required>
			</div>
			
			<button type="submit" class="btn btn-primary">Modify User</button>
		</form>
	</div>
	<?php
		require_once('../reqs/footer.php');
	?>

	</body>
</html>