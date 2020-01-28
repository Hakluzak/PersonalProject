<?php
if (!isset($_GET['index'])){
	die('Im dieing because of you. Go back <a href="index.php">Home</a>.');
	}


	
$games=[
	[
		'name'=>'Star Sector',
		'website'=>'https://fractalsoftworks.com/',
		'picture'=>'https://www.myplay.it/wp-content/uploads/header-starsector.jpg',
		'price'=>'19.99',
		'earlyAccess'=>'Yes',
		'personalRating'=>'9/10',
		'genre'=>'Space RPG',
		'details'=>'Starsector (formerly “Starfarer”) is an in-development open-world single-player space-combat, roleplaying, exploration, and economic game. You take the role of a space captain seeking fortune and glory however you choose. Though it is in-development, you can purchase Starsector now at a discount to gain access to ongoing builds. Starsector supports custom content & mods and is available now for Windows, MacOS, and Linux.<br><br> The interstellar Gate System which binds the space of the Human Domain in a network of trade, industry, and empire collapses in an instant that shatters known civilization forever. Countless fleets are scattered and lost. The comforts of the high age of civilization are but a memory. Entire worlds cut off from the Gate network starve, burn, and tear themselves apart. Now, humanity is scattered in pockets throughout the galaxy, trying to recover from the great Collapse.',
	],
	[
		'name'=>'Terraria',
		'website'=>'http://terraria.org/',
		'picture'=>'https://i.imgur.com/gyIMUsf.png',
		'price'=>'14.99',
		'earlyAccess'=>'Yes',
		'personalRating'=>'8/10',
		'genre'=>'Sandbox Survival',
		'details'=>'The very world is at your fingertips as you fight for survival, fortune, and glory. Delve deep into cavernous expanses, seek out ever-greater foes to test your mettle in combat, or construct your own city - In the World of Terraria, the choice is yours!<br><br>Blending elements of classic action games with the freedom of sandbox-style creativity, Terraria is a unique gaming experience where both the journey and the destination are as unique as the players themselves!',
	],
	[
		'name'=>'Stardew Valley',
		'website'=>'https://www.stardewvalley.net/',
		'picture'=>'https://cdn57.androidauthority.net/wp-content/uploads/2019/03/stardew-valley-title-1-1340x754.jpg',
		'price'=>'19.99',
		'earlyAccess'=>'No',
		'personalRating'=>'10/10',
		'genre'=>'Sandbox RPG',
		'details'=>"You're moving to the valley... <br><br> You've inherited your grandfather's old farm plot in Stardew Valley. Armed with hand-me-down tools and a few coins, you set out to begin your new life!" ,
	]
];

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
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title><?= $games[$_GET['index']]['name'] ?></title>
  </head>
  <div class="container" style="background-color:#bfbfbf">
	<body>
		<h1><?= $games[$_GET['index']]['name'] ?></h1>
		<a href="/personalproject/index.php" id="homeBut"><button type="button" class="btn btn-primary">Home</button></a>
		<img id="logo" src="<?=$games[$_GET['index']]['picture']?>" style="max-width:500px"/>
		<p class="webLnk"><a href="<?= $games[$_GET['index']]['website'] ?>"><button type="button" class="btn btn-dark">Official Website</button></a></p>
		<p>$<?= $games[$_GET['index']]['price']?></p>
		<p>Early Access: <?= $games[$_GET['index']]['earlyAccess']?></p>
		<p><?= $games[$_GET['index']]['details']?></p>
		<p class="webLnk"><span class="badge badge-secondary">Personal Rating: <?= $games[$_GET['index']]['personalRating']?></span></p>
	</body>
   </div>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>