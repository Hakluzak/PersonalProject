<?php
class User {
	public $email;
	public $password;
	public $fName;
	public $lName;
	
	public function create($post){
		$newuser = [
			'email'=>$post['email'],
			'password'=>password_hash ($post['password'],PASSWORD_DEFAULT),
			'fName' =>'n/a',
			'lName' =>'n/a'
			];
			
		
		require_once('../utils/CSVfunctions.php');
		writeCSV('../data/users.csv.php',$newuser);
	}
	
	public function deleteValue($id){
		require_once('../Utils/CSVfunctions.php');
		deleteCSV('../data/users.csv.php',$id);
	}
	
	public function modify($postMod,$id){	
		require_once('../utils/CSVfunctions.php');
		$userArray = readCSV('../data/users.csv.php');
		$user = $userArray[$id];
		$editsMade = [
			$user['0']=>$postMod['email'],
			$user['1']=>$user[1],
			$user['2']=>$postMod['fName'],
			$user['3']=>$postMod['lName']
			];
		modifyCSV('../data/users.csv.php',$id,$editsMade);
		
	}
}