<?php
//require_once('data.php');

$handle=fopen('data.json','r');


require_once('functions.php');
$games=jsonToArray('data.json');

$title='Home';

require_once('header.php');
?>

<style>
#logo {
	border-style: solid;
	border-width: 5px;
}
</style>

  <div class="container" style="background-color: #bfbfbf">
   <body style="background: url(https://fractalsoftworks.com/wp-content/themes/starfarer/images/bg_top_stars.jpg) repeat-x top center; background-color: black;">
    <h1>Available Games</h1>
	<?php
		for($i=0;$i<count($games);$i++){
				echo '<div class="media">
						<img id="logo" src="'.$games[$i]['picture'].'" class="mr-3" style="max-width:200px">
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
	<?php
	require_once('footer.php');
	?>

  </body>
</html>