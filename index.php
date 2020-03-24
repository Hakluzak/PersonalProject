<?php
$handle=fopen('./data/data.json','r');


require_once('./utils/functions.php');
//require_once('./utils/lib_auth.php');
$games=jsonToArray('./data/data.json');

$title='Home';

require_once('./reqs/header.php');
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
	require_once('./reqs/nav.php');
	?>
   <body style="background: url(https://fractalsoftworks.com/wp-content/themes/starfarer/images/bg_top_stars.jpg) repeat-x top center; background-color: black;">
   <br>
	<br>
	<?php
	if (isset($_GET['create'])){
			echo '<br><div class="alert alert-success" role="alert">
				Entry Successfuly created.
				</div>';
		}
	if (isset($_GET['delete'])){
		echo '<br><div class="alert alert-danger" role="alert">
				Entry Successfuly deleted.
			</div>';
		}
		?>
	<br>
	<h1>Available Games</h1>
	<hr>
	<?php
		for($i=0;$i<count($games);$i++){
				if (is_logged('uID')) echo '<a href="modify.php?index='.$i.'" style="margin-left:95%"><button type="button" class="btn btn-secondary">Edit</button></a>';
				echo'<div class="media">
						<img id="logo" src="'.$games[$i]['picture'].'" class="mr-3" style="max-width:200px">
					<div class="media-body">
						<h5 class="mt-0">'.$games[$i]['name'].'</h5>
						<p>Genre: '.$games[$i]['genre'].'</p>
						<p>Price: $'.$games[$i]['price'].'</p>
						<p>Website:<a href="'.$games[$i]['website'].'" target="_blank"><button type="button" class="btn btn-dark">Click here to visit their website.</button></a></p>
						<p><a href="details.php?index='.$i.'"><button type="button" class="btn btn-dark">Click to see details</button></a></p>
					</div>
				</div>
			<hr>';
		}
	?>
	</div>
	<?php
	require_once('./reqs/footer.php');
	?>

  </body>
</html>