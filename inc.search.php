<?php 
//echo $_GET['q'];
ini_set('user_agent', 'Mozilla/40.0');

if((@$_GET['lang'])!=""){
	$lang=$_GET['lang'];
}else{
	$lang=$defaultLanguage;
}

if((@$_GET['q'])!=""){

//Getting Serach Results
$url='https://'.$lang.'.wikispaces.org/w/api.php?format=json&action=query&list=search&utf8==&srsearch='.$_GET['q'];
$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);

//print_r($searchResponse);

$searchResponse=$searchResponse['query']['search'];
//End Getting Search Results

$url='https://'.$lang.'.wikispaces.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.$_GET['q'];
$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);

//print_r($searchResponse);

$searchResponse=$searchResponse['query']['pages'];
foreach($searchResponse as $value){
	$wikiResponse=$value;
}
//End Getting HTML Page



//Getting Extracts
$url='https://'.$lang.'.wikispaces.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.$_GET['q'];
$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);

//print_r($searchResponse);

$searchResponse=$searchResponse['query']['pages'];
foreach($searchResponse as $value){
	$wikiResponse=$value;
}
//End Getting Extracts

//Getting HTML Page
$url='https://'.$lang.'.wikispaces.org/w/api.php?format=json&action=parse&section=0&prop=text&page='.$_GET['q'];
$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);
//print_r($searchResponse);
$wikiResponseHTML=$searchResponse['parse']['text']['*'];
//End Getting  HTML Page


//Getting Languages
$url='https://'.$lang.'.wikispaces.org/w/api.php?format=json&action=query&prop=langlinks&exintro=&explaintext=&titles='.$_GET['q'];
$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);

//print_r($searchResponse);

$searchResponse=$searchResponse['query']['pages'];
foreach($searchResponse as $value){
	$wikiResponseLangs=$value;
}
//End Getting Langauges

}
//print_r($wikiResponseLangs['langlinks']);

//Getting Thumb Image
$url='https://'.$lang.'.wikispaces.org/w/api.php?format=json&action=query&prop=pageimages&pithumbsize=500&titles='.$_GET['q'];
$wikiImages= httpGet($url);
//https://en.wikispaces.org/w/api.php?action=query&titles=Angampora&prop=pageimages&format=json&pithumbsize=100

$searchResponse=json_decode($wikiImages,true);
$searchResponse=$searchResponse['query']['pages'];

foreach($searchResponse as $value){
	$wikiThumbImgResponse=$value;
}

//End Getting Thumb Image

//Getting Images
$url='https://'.$lang.'.wikispaces.org/w/api.php?format=json&action=query&prop=images&titles='.$_GET['q'];
$wikiImages= httpGet($url);

$searchResponse=json_decode($wikiImages,true);
$searchResponse=$searchResponse['query']['pages'];

foreach($searchResponse as $value){
	$wikiImgResponse=$value;
}
//End Getting Images
//print_r($wikiImgResponse);
//echo substr($wikiImgResponse['images']['0']['title'],5);

//Getting Images Info
$urls='https://'.$lang.'.wikispaces.org/w/api.php?format=json&action=query&titles=Image:'.substr($wikiImgResponse['images']['0']['title'],5).'&prop=imageinfo&iiprop=url';
//echo "(".$urls.")<br><br>";

$wikiImagesInfo= httpGet($urls);
//echo "F";
$searchResponse=json_decode($wikiImagesInfo,true);
$searchResponse=$searchResponse['query'];
//print_r($searchResponse);

foreach($searchResponse as $value){
	$wikiImgResponseInfo=$value;
}
//End Getting Images Info
//print_r($searchResponse);
//Angampora grip and lock korathota angam.jpg
//https://upload.wikimedia.org/wikispaces/commons/thumb/1/18/Angampora_grip_and_lock_korathota_angam.jpg/220px-Angampora_grip_and_lock_korathota_angam.jpg
?>