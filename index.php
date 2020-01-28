<?php
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
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Homepage</title>
  </head>
  <div class="container" style="background-color: #bfbfbf">
  <body>
    <h1>All Games</h1>
	<?php
		for($i=0;$i<count($games);$i++){
				echo '<div class="media">
						<img src="'.$games[$i]['picture'].'" class="mr-3" style="max-width:200px">
					<div class="media-body">
						<h5 class="mt-0">'.$games[$i]['name'].'</h5>
						<p>Genre: '.$games[$i]['genre'].'</p>
						<p>Price: $'.$games[$i]['price'].'</p>
						<p>Website:<a href="'.$games[$i]['website'].'"><button type="button" class="btn btn-dark">Click here to visit their website.</button></a></p>
						<p><a href="details.php?index='.$i.'"><button type="button" class="btn btn-dark">Click to see details</button></a></p>
					</div>
				</div>';
			echo '<hr>';
		}
	?>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>