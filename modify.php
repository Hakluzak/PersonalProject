<?php


if ($_POST != NULL){
	require_once('JSONfunctions.php');
	$editsMade = [
		'name'=>$_POST['game_name'],
		'picture'=>$_POST['image_link'],
		'genre'=>$_POST['game_genere'],
		'price'=>$_POST['price'],
		'website'=>$_POST['developers_website'],
		'earlyAccess'=>'n/a',
		'personalRating'=>$_POST['rating'],
		'details'=>$_POST['game_desc']
		];
		modifyJSON('data.json',$_GET['index'],$editsMade);
		header('Location:details.php?index='.$_GET['index'].'');
	}

// load contents from file
$json_string=file_get_contents('data.json');
// convert json to php array
$games=json_decode($json_string,true);
// use GET index to retrieve a specific element from php array
$game=$games[$_GET['index']];

$title='Modify';

require_once('header.php');
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
		<h1>Modify a Game</h1>
		<a href="index.php" id="homeBut"><button type="button" class="btn btn-primary">Home</button></a>
		<form action="modify.php?index=<?php echo $_GET['index'] ?>" method="POST">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="GameName">Game Name</label>
					<input type="text" class="form-control" id="inputEmail4" name="game_name" value="<?= $game['name'] ?>" required>
				</div>
				<div class="form-group col-md-6">
					<label for="Price">Price</label>
					<input type="text" class="form-control" id="inputPassword4" name="price" value="<?= $game['price'] ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="DeveloperWebsite">Devoloper's Website</label>
				<input type="text" class="form-control" id="inputAddress" name="developers_website" value="<?= $game['website'] ?>" required>
			</div>
			<div class="form-group">
				<label for="ImageLnk">Link to an image for the game</label>
				<input type="text" class="form-control" id="inputAddress" name="image_link" value="<?= $game['picture'] ?>" required>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="gameGenere">Game Genre</label>
					<input type="text" class="form-control" name="game_genere" id="inputCity" value="<?= $game['genre'] ?>" required>
				</div>
				<div class="form-group col-md-4">
					<label for="PersonalRating">Rating</label>
					<select id="inputState" class="form-control" name="rating" required>
						<option selected><?= $game['personalRating'] ?></option>
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
					<textarea rows="5" type="text" class="form-control" id="inputAddress" name="game_desc" required><?= $game['details'] ?> </textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<hr>
		</form>

	<?php
	require_once('footer.php');
	?>

	</body>
</html>