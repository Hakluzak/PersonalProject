<?php
require_once('./utils/lib_auth.php');
?>
<!doctype html>
<html lang="en">
<head>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php">IndieCo</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="index.php"><button type="button" class="btn btn-primary">Home</button></a>
				</li>
				<?php
				if (is_logged('uID')) echo '
				<li class="nav-item">
					<a class="nav-link" href="create.php"><button type="button" class="btn btn-primary">Add Your Game</button></a>
				</li>';
				if (!is_logged('uID')) echo '
				<li>
					<a class="nav-link" href="signup.php"><button type="button" class="btn btn-info">Sign up</button></a>
				</li>';
				if (!is_logged('uID')) echo '
				<li>
					<a class="nav-link" href="signin.php"><button type="button" class="btn btn-info">Sign in</button></a>
				</li>';				
				if (is_logged('uID')) echo '
				<li>
					<a class="nav-link" href="signout.php"><button type="button" class="btn btn-danger">Sign Out</button></a>
				</li>';
				?>
			</ul>
		</div>
	</nav>
	
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>