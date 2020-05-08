<?php
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

require_once("./sqldb/dbclass.php");
$delVal = new Dbuse;
$delVal->deleteDB($_GET['index']);
header('location: index.php?delete=yes');
