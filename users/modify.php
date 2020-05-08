<?php
require_once('../settings.php');
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
if ($_POST != NULL){
	require_once('../sqldb/dbclass.php');
	$user = new Dbuse;
	$user->euser($_POST,$_GET['index']);
}

require_once('../settings.php');
require_once(APP_ROOT.'/sqldb/dbconnect.php');
$pdo=mysqldb::connect();

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