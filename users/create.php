<?php
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