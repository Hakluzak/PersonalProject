<?php
if ($_POST != NULL){
	require_once('userclass.php');
	$user = new User;
	$user->modify($_POST,$_GET['index']);
	header('location:index.php');
}


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
		<?php
		require_once('../Utils/CSVfunctions.php');
		$userArray = readCSV('../data/users.csv.php');
		$user = $userArray[$_GET['index']];
		?>
			<form method="POST" action="modify.php?index=<?php echo $_GET['index'] ?>">
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= $user[0] ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">First Name</label>
				<input type="text" class="form-control" id="fName" name="fName" value="<?= $user[2] ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Last Name</label>
				<input type="text" class="form-control" id="lName" name="lName" value="<?= $user[3] ?>" required>
			</div>
			<button type="submit" class="btn btn-primary">Modify User</button>
		</form>
	</div>
	<?php
		require_once('../reqs/footer.php');
	?>

	</body>
</html>