<?php
require_once('settings.php');
require_once('./utils/lib_auth.php');

if (!Auth::is_logged('uID')){ 
	header('location: index.php');
	die();
}

//$sqlsettings=[
//	'host'=>'localhost',
//	'db'=>'gamereview',
//	'user'=>'root',
//	'pass'=>''
//];

//$opt=[
//	PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
//	PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
//	PDO::ATTR_EMULATE_PREPARES=>false,
//];
	
//$pdo=new PDO('mysql:host='.$sqlsettings['host'].';dbname='.$sqlsettings['db'].';charset=utf8mb4',$sqlsettings['user'],$sqlsettings['pass'],$opt);


//require('./utils/functions.php');
//require_once('gameclass.php');
if ($_POST != NULL){
	//Using SQL library to insert game
	require_once("./sqldb/dbclass.php");
	$game = new Dbuse;
	
	$game->create($_POST);
	
	//$pdo->query('INSERT INTO `games` (`ID`,`name`,`imagelink`,`genre`,`price`,`devweblink`,`rating`,`description`) VALUES (
	//"NULL",
	//"'.$_POST['game_name'].'",
	//"'.$_POST['image_link'].'",
	//"'.$_POST['game_genere'].'",
	//"'.$_POST['price'].'",
	//"'.$_POST['developers_website'].'",
	//"'.$_POST['rating'].'",
	//"'.$_POST['game_desc'].'")');
	
	//$game=new Game;
	//$game->create($_POST);
	
	//$newgame = [
	//	'name'=>$_POST['game_name'],
	//	'picture'=>$_POST['image_link'],
	//	'genre'=>$_POST['game_genere'],
	//	'price'=>$_POST['price'],
	//	'website'=>$_POST['developers_website'],
	//	'earlyAccess'=>'n/a',
	//	'personalRating'=>$_POST['rating'],
	//	'details'=>$_POST['game_desc']
	//	];
	
	header("Location:index.php?create=done");
	}


$title='Create';

require_once('./reqs/header.php');
?>

<style>
#logo {
	border-style: solid;
	border-width: 5px;
}
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
<body style="background: url(https://fractalsoftworks.com/wp-content/themes/starfarer/images/bg_top_stars.jpg) repeat-x top center; background-color: black;">
	<div class="container" style="background-color: #bfbfbf">
		<?php
			require_once('./reqs/nav.php');
		?>
		<h1>Add Your Game</h1>
		<a href="index.php" id="homeBut"><button type="button" class="btn btn-primary">Home</button></a>
		<form action="create.php" method="POST">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="GameName">Game Name</label>
					<input type="text" class="form-control" id="inputEmail4" name="game_name" required>
				</div>
				<div class="form-group col-md-6">
					<label for="Price">Price</label>
					<input type="text" class="form-control" id="inputPassword4" name="price" placeholder="$##.##" required>
				</div>
			</div>
			<div class="form-group">
				<label for="DeveloperWebsite">Devoloper's Website</label>
				<input type="text" class="form-control" id="inputAddress" name="developers_website" placeholder="https://www.nku.edu/" required>
			</div>
			<div class="form-group">
				<label for="ImageLnk">Link to an image for the game</label>
				<input type="text" class="form-control" id="inputAddress" name="image_link" placeholder="https://www.nku.edu/" required>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="gameGenere">Game Genere</label>
					<input type="text" class="form-control" name="game_genere" id="inputCity" required>
				</div>
				<div class="form-group col-md-4">
					<label for="PersonalRating">Rating</label>
					<select id="inputState" class="form-control" name="rating" required>
						<option selected>Choose...</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="form-group">
					<label for="GameDesc">Game Description</label>
					<textarea rows="5" type="text" class="form-control" id="inputAddress" name="game_desc" placeholder="Type a description of your game here." required></textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<hr>
		</form>

	<?php
	require_once('./reqs/footer.php');
	?>

	</body>
</html>