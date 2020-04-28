<?php
class pdot {
	public $settings=[
	'host'=>'localhost',
	'db'=>'gamereview',
	'user'=>'root',
	'pass'=>''
	];	
	
	public $opt=[
	PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES=>false,
	];

	public $pdostartnew=new PDO('mysql:host='.$sqlsettings['host'].';dbname='.$sqlsettings['db'].';charset=utf8mb4',$sqlsettings['user'],$sqlsettings['pass'],$opt);

	if (rowCount()==0) { die('record does not exist'); 
	
	}