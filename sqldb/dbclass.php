<?php

//database class
class Dbuse {
	
	public static $sqlsettings=[
		'host'=>'localhost',
		'db'=>'gamereview',
		'user'=>'root',
		'pass'=>''
	];
		
	public static $opt=[
		PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES=>false,
	];
	
		
	
	public function create ($postVals) {
		$pdo=new PDO('mysql:host='.self::$sqlsettings['host'].';dbname='.self::$sqlsettings['db'].';charset=utf8mb4',self::$sqlsettings['user'],self::$sqlsettings['pass'],self::$opt);

		$q=$pdo->prepare('INSERT INTO games (ID,name,imagelink,genre,price,devweblink,rating,description) VALUES ("NULL",?,?,?,?,?,?,?)');
		$q->execute([$postVals['game_name'],$postVals['image_link'],$postVals['game_genere'],$postVals['price'],$postVals['developers_website'],$postVals['rating'],$postVals['game_desc']]);
	}
	
	public function deleteDB ($ID){
		$pdo=new PDO('mysql:host='.self::$sqlsettings['host'].';dbname='.self::$sqlsettings['db'].';charset=utf8mb4',self::$sqlsettings['user'],self::$sqlsettings['pass'],self::$opt);
		
		$q=$pdo->prepare('DELETE FROM games WHERE ID =?');
		$q->execute([$ID]);
	}
	
	public function edit ($postVals,$id){
		$pdo=new PDO('mysql:host='.self::$sqlsettings['host'].';dbname='.self::$sqlsettings['db'].';charset=utf8mb4',self::$sqlsettings['user'],self::$sqlsettings['pass'],self::$opt);

		$q=$pdo->prepare('UPDATE games SET name = ?, imagelink = ?,	genre = ?, price = ?, devweblink = ?,	rating = ?, description = ? WHERE ID = ?');
		$q->execute([$_POST['game_name'],$postVals['image_link'],$postVals['game_genere'],$postVals['price'],$postVals['developers_website'],$postVals['rating'],$postVals['game_desc'],$id]);
		
		header('Location:details.php?index='.$id.'');
	}
	
	
	
	public function cuser($postVals) {
		$pdo=new PDO('mysql:host='.self::$sqlsettings['host'].';dbname='.self::$sqlsettings['db'].';charset=utf8mb4',self::$sqlsettings['user'],self::$sqlsettings['pass'],self::$opt);

		$q=$pdo->prepare('INSERT INTO users (ID,email,password,status) VALUES ("NULL",?,?,"NULL")');
		$q->execute([$postVals['email'],$postVals['password']]);
	}
	
	public function duser($id) {
		$pdo=new PDO('mysql:host='.self::$sqlsettings['host'].';dbname='.self::$sqlsettings['db'].';charset=utf8mb4',self::$sqlsettings['user'],self::$sqlsettings['pass'],self::$opt);
		
		$q=$pdo->prepare('DELETE FROM users WHERE ID =?');
		$q->execute([$id]);
	}
	
	public function euser($postVals) {
		$pdo=new PDO('mysql:host='.self::$sqlsettings['host'].';dbname='.self::$sqlsettings['db'].';charset=utf8mb4',self::$sqlsettings['user'],self::$sqlsettings['pass'],self::$opt);

		$q=$pdo->prepare('UPDATE users SET email = ?, status = ? WHERE id = ?');
		$q->execute([$postVals['email'],$postVals['status'],$_GET['index']]);
		
		header('Location:index.php');
	}
	
	public function conlog($postVals) {
		$pdo=new PDO('mysql:host='.self::$sqlsettings['host'].';dbname='.self::$sqlsettings['db'].';charset=utf8mb4',self::$sqlsettings['user'],self::$sqlsettings['pass'],self::$opt);
		
		$q=$pdo->query('SELECT * FROM users');
		for($i=1;$i<=$result->rowCount();$i++){
			$record=$result->fetch();
				if ($record['email'] == $postVals['email'])
					if ($record['password'] == password_verify($postVals['password'],trim($postVals['password'])){
					return sucess;
					}
				else return fail;
		
	}
}