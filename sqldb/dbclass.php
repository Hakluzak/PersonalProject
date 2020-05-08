<?php

//database class
class Dbuse{
	public function create ($postVals) {
		require_once('settings.php');
		require_once('dbconnect.php');
		$pdo=mysqldb::connect();
		

		$q=$pdo->prepare('INSERT INTO games (ID,name,imagelink,genre,price,devweblink,rating,description) VALUES ("NULL",?,?,?,?,?,?,?)');
		$q->execute([$postVals['game_name'],$postVals['image_link'],$postVals['game_genere'],$postVals['price'],$postVals['developers_website'],$postVals['rating'],$postVals['game_desc']]);
	}
	
	public function deleteDB ($ID){
		require_once('settings.php');
		require_once('dbconnect.php');
		$pdo=mysqldb::connect();
		
		$q=$pdo->prepare('DELETE FROM games WHERE ID =?');
		$q->execute([$ID]);
	}
	
	public function edit ($postVals,$id){
		require_once('settings.php');
		require_once('dbconnect.php');
		$pdo=mysqldb::connect();
		
		$q=$pdo->prepare('UPDATE games SET name = ?, imagelink = ?,	genre = ?, price = ?, devweblink = ?,	rating = ?, description = ? WHERE ID = ?');
		$q->execute([$_POST['game_name'],$postVals['image_link'],$postVals['game_genere'],$postVals['price'],$postVals['developers_website'],$postVals['rating'],$postVals['game_desc'],$id]);
		
		header('Location:details.php?index='.$id.'');
	}
	
	
	
	public function cuser($postVals) {
		require_once(__DIR__ .'/../settings.php');
		require_once('dbconnect.php');
		$pdo=mysqldb::connect();
		
		$q=$pdo->prepare('INSERT INTO users (ID,email,password,status) VALUES ("NULL",?,?,"NULL")');
		$q->execute([$postVals['email'],$postVals['password']]);
	}
	
	public function duser($id) {
		require_once(__DIR__ .'/../settings.php');
		require_once('dbconnect.php');
		$pdo=mysqldb::connect();
		
		$q=$pdo->prepare('DELETE FROM users WHERE ID =?');
		$q->execute([$id]);
	}
	
	public function euser($postVals) {
		require_once(__DIR__ .'/../settings.php');
		require_once('dbconnect.php');
		$pdo=mysqldb::connect();
		
		$q=$pdo->prepare('UPDATE users SET email = ?, status = ? WHERE id = ?');
		$q->execute([$postVals['email'],$postVals['status'],$_GET['index']]);
		
		header('Location:index.php');
	}
	
	public function conlog($postVals): string {
		require_once('settings.php');
		require_once('dbconnect.php');
		$pdo=mysqldb::connect();
		
		$check = 'fail';
		$result=$pdo->query('SELECT * FROM users');
		for($i=1;$i<=$result->rowCount();$i++){
			$record=$result->fetch();
			if ($record['email'] == $postVals['email']) {
				if (password_verify($postVals['password'],$record['password']) == true){
					return $check = 'success';
				} 
			}
		}
	return $check;
	}
}