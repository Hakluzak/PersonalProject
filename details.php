<?php
//require_once('data.php');

require_once('./utils/functions.php');

$games=jsonToArray('./data/data.json');
//$json_string=file_get_contents('data.json');
//$games=json_decode($json_string,true);

$title=$games[$_GET['index']]['name']; 
if (!isset($_GET['index'])){
	die('Im dieing because of you. Go back <a href="index.php">Home</a>.');
	}


if (!is_numeric($_GET['index']) ||($_GET['index']<0 || $_GET['index']>count($games))){
	die('Im dieing because of you. Go back <a href="index.php">Home</a>.');
	}

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
		<h1><?= $games[$_GET['index']]['name'] ?></h1>
		<div class="nav">
			<?php
			if (is_logged('uID')) echo '
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link" href="modify.php?index=<?= $_GET['.'index'.'] ?>"><button type="button" class="btn btn-secondary">Modify</button></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="delete.php?index=<?= $_GET['.'index'.'] ?>"><button type="button" class="btn btn-secondary">Delete</button></a>
				</li>
			</ul>'
			?>
		</div>
		<img id="logo" src="<?=$games[$_GET['index']]['picture']?>" style="max-width:500px"/>
		<p class="webLnk"><a href="<?= $games[$_GET['index']]['website'] ?>" target="_blank"><button type="button" class="btn btn-dark">Official Website</button></a></p>
		<p>$<?= $games[$_GET['index']]['price']?></p>
		<p>Early Access: <?= $games[$_GET['index']]['earlyAccess']?></p>
		<p><?= $games[$_GET['index']]['details']?></p>
		<p class="webLnk"><span class="badge badge-secondary">Personal Rating: <?= $games[$_GET['index']]['personalRating']?></span></p>
	 </div>
	</body>
	
	<?php
		require_once('./reqs/footer.php');
	?>
  </body>
</html>