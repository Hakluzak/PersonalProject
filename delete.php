<?php
require_once('./utils/lib_auth.php');

if (!is_logged('uID')){ 
	header('location: index.php');
	die();
}

$sqlsettings=[
	'host'=>'localhost',
	'db'=>'gamereview',
	'user'=>'root',
	'pass'=>''
];

$opt=[
	PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES=>false,
];
	
$pdo=new PDO('mysql:host='.$sqlsettings['host'].';dbname='.$sqlsettings['db'].';charset=utf8mb4',$sqlsettings['user'],$sqlsettings['pass'],$opt);


$pdo->query('DELETE FROM games WHERE ID ='.$_GET['index'].'');
header("Location:index.php?delete=yes");
