<?php
class mysqldb {
	public static function connect($settings=null){
	require_once('settings.php');
	if (!isset($settings)) $settings=DB_SETTINGS;
	$opt=[
		PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES=>false,
	];
	return new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].';charset=utf8mb4',$settings['user'],$settings['pass'],$opt);
	}
}