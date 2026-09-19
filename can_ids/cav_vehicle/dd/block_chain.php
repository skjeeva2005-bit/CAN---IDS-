<?php


//class Blockchain()
//{
	function addBlock($bc,$bid,$pre,$data,$dtime)
	{
	$fn=$bc."_data.json";
	$hash=sha1($data);
		if($bid<2)
		{
		$response = array("block_id"=>$bid,"pre_hash"=>$pre,"hash"=>$hash,"data"=>$data,"date"=>$dtime);
		$res[]=$response;
		$fp = fopen("data/".$fn, 'w');
		fwrite($fp, json_encode($res));
		fclose($fp);
		}
		else
		{
		$response = array("block_id"=>$bid,"pre_hash"=>$pre,"hash"=>$hash,"data"=>$data,"date"=>$dtime);
		$inp = file_get_contents("data/".$fn);
		$tempArray = json_decode($inp);
		array_push($tempArray, $response);
		$jsonData = json_encode($tempArray);
		
		file_put_contents("data/".$fn, $jsonData);
		//file_put_contents("data/test.json", $jsonData);
		}
	
	}
	/*function getBlock($bc,$data)
	{
	$fn=$bc."_data.json";
	$json = file_get_contents("data/".$fn);
	  
	// Decode the JSON file
	$json_data = json_decode($json,true);
	  
	// Display data
	//print_r($json_data);
		
	}*/
//}
?>