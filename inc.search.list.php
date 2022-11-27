<?php 
//echo $_GET['q'];
ini_set('user_agent', 'Mozilla/40.0');

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

if((@$_GET['lang'])!=""){
	$lang=$_GET['lang'];
}else{
	$lang=$defaultLanguage;
}

$cid=@$_GET['q'];

if((@$cid)!=""){

//Getting Serach Results
$url='https://species.wikimedia.org/w/api.php?format=json&action=query&list=search&utf8=&srlimit='.$defaultSearchResultslimit.'&srsearch='.$cid;

$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);

//If Results are not found trying to find with underscore
if(count($searchResponse)==0){
$cid=str_replace(" ","_",$cid);	

$url='https://species.wikimedia.org/w/api.php?format=json&action=query&list=search&utf8=&srlimit='.$defaultSearchResultslimit.'&srsearch='.$cid;

$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);
}

//If Results are not found trying to find withoutspaces
if(count($searchResponse)==0){
$cid=str_replace("_","",$cid);	

$url='https://species.wikimedia.org/w/api.php?format=json&action=query&list=search&utf8=&srlimit='.$defaultSearchResultslimit.'&srsearch='.$cid;

$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);
}

$searchResponse=$searchResponse['query']['search'];
//End Getting Search Results
//print_r($searchResponse);
}
?>