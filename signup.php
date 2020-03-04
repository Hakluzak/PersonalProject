<?php
require_once('./utils/JSONfunctions.php');
require_once('./utils/lib_auth.php');

$title = "Sign up";

//if(is_logged('user/uID')) header('location: index.php');


//if(count($_POST)>0){
//	$error=signup('data/users.csv.php','signin.php');
//	if(isset($error{0})) echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
//	else echo '<div class="alert alert-success" role="alert">You made it!!!!!!!!!!!</div>';
//}
?>
<!doctype html>
<style>
.navBut {
	display: block;
	align: right;
	text-align: center;
	margin-left: 90%;
	padding-bottom: 5px;
}
.webLnk {
	padding: 5px;
}
#logo {
	border-style: solid;
	border-width: 5px;
}
.nav {
	
}
</style>

<html lang="en">

	<?php
	require_once('./reqs/header.php');
	?>
	
	<body style="background: url(https://fractalsoftworks.com/wp-content/themes/starfarer/images/bg_top_stars.jpg) repeat-x top center; background-color: black;">
	 <div class="container" style="background-color:#bfbfbf">
		<?php
		require_once('./reqs/nav.php');
		?>
		<form method="POST" action="signup.php">
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" id="exampleInputPassword1" name="password">
			</div>
			<button type="submit" class="btn btn-primary">Create Account</button>
		</form>
		<br>
	 </div>
	</body>
	
	<?php
		require_once('./reqs/footer.php');
	?>
</html>