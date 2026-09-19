<?php
session_start();
//include("dbconnect.php");
extract($_REQUEST);

//include("block_chain.php");

//$obj=new Blockchain();
//$obj->addBlock($bc,$bid,$pre,$data,$dtime);


///////////////////
$response = array("block_id"=>"2","pre_hash"=>"aaaaaaa","hash"=>"bbb","date"=>"21-03-2022","time"=>"2:15");

//create


/*$res[]=$response;
$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($res));
fclose($fp);
*/

///append
$inp = file_get_contents('results.json');
$tempArray = json_decode($inp);
array_push($tempArray, $response);
$jsonData = json_encode($tempArray);

file_put_contents("results.json", $jsonData);


/////////read
/*$json = file_get_contents('results.json');
  
// Decode the JSON file
$json_data = json_decode($json,true);
  
// Display data
print_r($json_data);*/
?>