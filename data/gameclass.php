<?php
class Game {
		public $name;
		public $picture;
		public $genere;
		public $price;
		public $website;
		public $earlyAccess;
		public $personalRating;
		public $details;
		
	public function create($post){
		
			$newgame = [
			'name'=>$post['game_name'],
			'picture'=>$post['image_link'],
			'genre'=>$post['game_genere'],
			'price'=>$post['price'],
			'website'=>$post['developers_website'],
			'earlyAccess'=>'n/a',
			'personalRating'=>$post['rating'],
			'details'=>$post['game_desc']
			];
		
		require_once('./utils/JSONFunctions.php');
		writeJSON('./data/data.json',$newgame);
	}
	
	public function deleteValue($id){
		require_once('./utils/JSONfunctions.php');
		deleteValue($id,'./data/data.json');
	}
	
	public function modifyValue($postMod,$id){
			require_once('./utils/JSONfunctions.php');
			$editsMade = [
				'name'=>$postMod['game_name'],
				'picture'=>$postMod['image_link'],
				'genre'=>$postMod['game_genere'],
				'price'=>$postMod['price'],
				'website'=>$postMod['developers_website'],
				'earlyAccess'=>'n/a',
				'personalRating'=>$postMod['rating'],
				'details'=>$postMod['game_desc']
				];
		modifyJSON('./data/data.json',$id,$editsMade);
	}
}
?>