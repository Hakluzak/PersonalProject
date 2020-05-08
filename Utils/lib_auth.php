<?php
require_once(__DIR__ .'/../settings.php');
require_once(APP_ROOT.'/sqldb/dbconnect.php');


class Auth {
	static function signup($data,$success_URL){
		if(count($data)>0){
		//if the user sends the form:
			// Validate the email
			if(!isset($data['email']{0}) || !isset($data['password']{0})) return 'You must enter e-mail and password';
			if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) return 'Please enter a valid email address';
			$data['email']=strtolower($data['email']);
			
			// Validate the password
			$data['password']=trim($data['password']);
			if(strlen($data['password'])<8) return 'Please, enter a password that is at least 8 characters long.';
			
			//open a connection
			$pdo=mysqldb::connect();
			
			//check for duplicate emails
			$q=$pdo->prepare('SELECT ID FROM users WHERE email=?');
			$q->execute([$data['email']]);
			
			if ($q->rowcount() > 0) return 'Email already in use with an account';
			// Encrypt password
			$data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
			
			// Store data in db
			require_once('./sqldb/dbclass.php');
			$user=new Dbuse;
			$user->cuser($data);
			header('location: '.$success_URL.'?message=signup');
		}
	}
	static function signin($data,$user_key,$success_URL){
		if(count($data)>0){
		//if the user sends the form:
			// Validate the email
			if(!isset($data['email']{0}) || !isset($data['password']{0})) return 'You must enter e-mail and password';
			if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) return 'Please enter a valid email address';
			$data['email']=strtolower($data['email']);
			
			// Validate the password
			$data['password']=trim($data['password']);
			if(strlen($data['password'])<8) return 'Please, enter a password that is at least 8 characters long.';
			
			//open a connection
			$pdo=mysqldb::connect();
			
			//check for duplicate emails
			$q=$pdo->prepare('SELECT ID,password FROM users WHERE email=?');
			$q->execute([$data['email']]);
			if($q->rowcount() == 0) return 'No account associated with email';
			$user=$q->fetch();
			
			// Check if email exists
			if(password_verify($data['password'],$user['password']) == false) { return 'Invalid login information'; }
			$_SESSION['uID']=$user['ID'];
			header('location:'.$success_URL);
		}
	}


	static function signout($destination_URL){
		$_SESSION=[];
		session_destroy();
		header('location:'.$destination_URL.'?message=signout');
	}

	static function is_logged($user_key='user/ID'){
		if(isset($_SESSION[$user_key])){
			if(is_numeric($_SESSION[$user_key])) return true;
			elseif(isset($_SESSION[$user_key]{0})) return true;
		}
		return false;
	}
}