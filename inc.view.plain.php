<?php 
//echo $_GET['q'];
ini_set('user_agent', 'Mozilla/40.0');

if((@$_GET['lang'])!=""){
	$lang=$_GET['lang'];
}else{
	$lang=$defaultLanguage;
}

if((@$_GET['q'])!=""){

$cid=$_GET['q'];
//Getting Extracts
$url='https://species.wikimedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.$cid;
$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);

//Replacing Space with Underscore when Resutlts are not found
if(count($searchResponse)==0){
$cid=str_replace(" ","_",$cid);	
$url='https://species.wikimedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.$cid;
$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);
}

//Trimming Underscore when Resutlts are not found
if(count($searchResponse)==0){
$cid=str_replace("_","",$cid);	
$url='https://species.wikimedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.$cid;
$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);
}


$searchResponse=@$searchResponse['query']['pages'];
foreach($searchResponse as $value){
	$wikiResponse=$value;
}
//End Getting Extracts




//Getting Languages
$url='https://species.wikimedia.org/w/api.php?format=json&action=query&prop=langlinks&exintro=&explaintext=&titles='.$cid;
$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);

//print_r($searchResponse);

$searchResponse=@$searchResponse['query']['pages'];
foreach($searchResponse as $value){
	$wikiResponseLangs=$value;
}
//End Getting Langauges

}

//Getting Thumb Image
$url='https://species.wikimedia.org/w/api.php?format=json&action=query&prop=pageimages&pithumbsize=500&titles='.$_GET['q'];
$wikiImages= httpGet($url);
//https://en.wikispaces.com/w/api.php?action=query&titles=Angampora&prop=pageimages&format=json&pithumbsize=100

$searchResponse=json_decode($wikiImages,true);
$searchResponse=@$searchResponse['query']['pages'];

foreach($searchResponse as $value){
	$wikiThumbImgResponse=$value;
}

//End Getting Thumb Image

//Getting Images Info
$urls='https://species.wikimedia.org/w/api.php?format=json&action=query&titles=Image:'.substr(@$wikiImgResponse['images']['0']['title'],5).'&prop=imageinfo&iiprop=url';
//echo "(".$urls.")<br><br>";

$wikiImagesInfo= httpGet($urls);
//echo "F";
$searchResponse=json_decode($wikiImagesInfo,true);
$searchResponse=@$searchResponse['query'];
//print_r($searchResponse);

foreach($searchResponse as $value){
	$wikiImgResponseInfo=$value;
}
//End Getting Images Info
?>