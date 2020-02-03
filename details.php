<?php
//require_once('data.php');

require_once('functions.php');

$games=jsonToArray('data.json');
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
#homeBut {
	display: inline;
	align: right;
	text-align: center;
	margin-left: 90%;
}
.webLnk {
	padding: 5px;
}
#logo {
	border-style: solid;
	border-width: 5px;
}
</style>

<html lang="en">

	<?php
	require_once('header.php');
	?>
	
	<body style="background: url(https://fractalsoftworks.com/wp-content/themes/starfarer/images/bg_top_stars.jpg) repeat-x top center; background-color: black;">
	 <div class="container" style="background-color:#bfbfbf">
		<h1><?= $games[$_GET['index']]['name'] ?></h1>
		<a href="/personalproject/index.php" id="homeBut"><button type="button" class="btn btn-primary">Home</button></a>
		<img id="logo" src="<?=$games[$_GET['index']]['picture']?>" style="max-width:500px"/>
		<p class="webLnk"><a href="<?= $games[$_GET['index']]['website'] ?>"><button type="button" class="btn btn-dark">Official Website</button></a></p>
		<p>$<?= $games[$_GET['index']]['price']?></p>
		<p>Early Access: <?= $games[$_GET['index']]['earlyAccess']?></p>
		<p><?= $games[$_GET['index']]['details']?></p>
		<p class="webLnk"><span class="badge badge-secondary">Personal Rating: <?= $games[$_GET['index']]['personalRating']?></span></p>
	 </div>
	</body>
	
	<?php
		require_once('footer.php');
	?>
  </body>
</html>