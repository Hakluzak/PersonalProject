<?php

session_start();

function signup($database_file,$success_URL){
	if(count($_POST)>0){
	//if the user sends the form:
		// Validate the email
		if(!isset($_POST['email']{0}) || !isset($_POST['password']{0})) return 'You must enter e-mail and password';
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) return 'Please enter a valid email address';
		$_POST['email']=strtolower($_POST['email']);
		
		// Validate the password
		$_POST['password']=trim($_POST['password']);
		if(strlen($_POST['password'])<8) return 'Please, enter a password that is at least 8 characters long.';
		
		// Encrypt password
		$_POST['password']=password_hash($_POST['password'], PASSWORD_DEFAULT);
		
		// Store data in db
		require_once('./sqldb/dbclass.php');
		$user=new Dbuse;
		$user->cuser($_POST);
		header('location: '.$success_URL.'?message=signup');
	}
}
function signin($database_file,$user_key,$success_URL){
	if(count($_POST)>0){
	//if the user sends the form:
		// Validate the email
		if(!isset($_POST['email']{0}) || !isset($_POST['password']{0})) return 'You must enter e-mail and password';
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) return 'Please enter a valid email address';
		$_POST['email']=strtolower($_POST['email']);
		
		// Validate the password
		$_POST['password']=trim($_POST['password']);
		if(strlen($_POST['password'])<8) return 'Please, enter a password that is at least 8 characters long.';
		
		
		// Check if email exists
		$h=fopen($database_file,'r');
		$userid=1;
		fgets($h);
		while(!feof($h)){
			$line=fgets($h);
			if(strstr($line,$_POST['email'])){
				$line=explode(';',$line);
				// check if passwords match
				
				$_SESSION[$user_key]=$userid;
				header('location:'.$success_URL);
			}
			$userid++;
		}
		fclose($h);
		return 'The e-mail you entered is not associated with any account';
	}
}


function signout($destination_URL){
	$_SESSION=[];
	session_destroy();
	header('location:'.$destination_URL.'?message=signout');
}

function is_logged($user_key){
	if(isset($_SESSION[$user_key])){
		if(is_numeric($_SESSION[$user_key])) return true;
		elseif(isset($_SESSION[$user_key]{0})) return true;
	}
	return false;
}