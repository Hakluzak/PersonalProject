<?php

function readJSON($file, $index = null)
{
	$array = json_decode(file_get_contents($file), true);
	if (isset($index)) return $array[$index];
	return $array;
}

function deleteValue($index,$file){
	//Read json file into string
	$jsonstring=file_get_contents($file);
	//convert json string into php array
	$php=json_decode($jsonstring,true);
	//remove the element at get index from array
	unset($php[$index]);
	$php=array_values($php);
	//convert php array back into json string
	$jsonstring=json_encode($php,JSON_PRETTY_PRINT);
	//echo $jsonstring;
	//write json string back to data.json
	$handle = fopen($file,'w');
	fwrite($handle,$jsonstring);
	fclose($handle);
}

function modifyJSON($file, $index, $data)
{
	$array = json_decode(file_get_contents($file), true);
	$array[$index] = $data;
	writeAllJSON($file, $array);
}

function writeAllJSON($file, $data)
{
	$h = fopen($file, 'w');
	fwrite($h, json_encode($data, JSON_PRETTY_PRINT));
	fclose($h);
}

function writeJSON($file, $data)
{
	$array = json_decode(file_get_contents($file), true);
	$array[] = $data;
	writeAllJSON($file, $array);
}

?>