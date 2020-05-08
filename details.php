<?php

require_once('settings.php');
require_once('./sqldb/dbconnect.php');
$pdo=mysqldb::connect();




$title='Details';
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
	
		$result=$pdo->query('SELECT * FROM games WHERE ID='.$_GET['index'].'');
		$record=$result->fetch();
		?>
		<h1><?= $record['name'] ?></h1>
		<div class="nav">
			<?php
			if (Auth::is_logged('uID')) echo '
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link" href="modify.php?index='.$_GET['index'].'"><button type="button" class="btn btn-secondary">Modify</button></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="delete.php?index='.$_GET['index'].'"><button type="button" class="btn btn-secondary">Delete</button></a>
				</li>
			</ul>'
			?>
		</div>
		<img id="logo" src="<?=$record['imagelink']?>" style="max-width:500px"/>
		<p class="webLnk"><a href="<?= $record['devweblink'] ?>" target="_blank"><button type="button" class="btn btn-dark">Official Website</button></a></p>
		<p>$<?= $record['price']?></p>
		<!--<p>Early Access:  //$record['earlyAccess']</p> -->
		<p><?= $record['description']?></p>
		<p class="webLnk"><span class="badge badge-secondary">Personal Rating: <?= $record['rating']?></span></p>
	 </div>
	</body>
	
	<?php
		require_once('./reqs/footer.php');
	?>
  </body>
</html>