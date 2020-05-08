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
require_once('userclass.php');
if ($_POST != NULL){
	$user=new User;
	$user->create($_POST);
}
?>
<form method="POST" action="create.php">
	<div class="form-group">
		<label for="exampleInputEmail1">Email address</label>
		<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Password</label>
		<input type="password" class="form-control" id="password" name="password">
	</div>
	<button type="submit" class="btn btn-primary">Create User</button>
</form>