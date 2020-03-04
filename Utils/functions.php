<?php
//function to get the '$games' array
function jsonToArray($filename){
	$json_string=file_get_contents($filename);
	$array=json_decode($json_string,true);
	return $array;
}

//fopen is used to open files in php. fgets reads one line at a time
//fgets($handle) will read the first line of the file in the variable handle
//feof($handle) is a way to tell php you have reached the end of a file.
//while (!feof($handle)) will print until you reach the end of the file.

function read($filename){
	$handle=fopen($filename,'r');
	$temp='';
	while(!feof($handle)) $temp.=fgets($handle);
	fclose($handle);
	return $temp;
}


//a CSV file is a format of storing data where everything is seperated by a SPECIFIC character
//function readCSV($filename,$target=null){
//	$handle=fopen($filename,'r');
//	$temp=[];
//	$counter=0;
//	while(!feof($handle)) 
//		if($target==null || $counter<$target){
//			$temp[]=explode(';',fgets($handle));
//			$counter++;
//			continue;
//		}
//		else{
//			$temp=explode(';',fgets($handle));
//			fclose($handle);
//			return temp;
//		}
//	fclose($handle);
//	return $temp;
//}

//php has a built in thing that is used for seperating CSV files.
//explode('special character','string to split');
//this will take in a string of values and split them on the special character it will delete the character entirely.


//this will open a file in write mode and then write 'Hello' into the file and then close it. PHP_EOL stands for php end of line.
//fopen('data.csv','w');
//fwrite($handle,'Hello'.PHP_EOL);
//fclose($handle);

//using the function implode, you can do the opposite of explode. This is a way to create a CSV file from a PHP array. it only works for indexed arrays unless you use array_values
//implode(';',$arrayname);
?>