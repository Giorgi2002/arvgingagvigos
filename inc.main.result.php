<?php require_once('inc-main.php'); ?>
<?php 
if((@$_GET['lang'])!=""){
	$lang=$_GET['lang'];
}else{
	$lang=$defaultLanguage;
}

//Getting Extracts
$url='https://species.wikimedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.$q;
$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);

if(count($searchResponse)==0){
$q=str_replace(" ","_",$q);	

$url='https://species.wikimedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles='.$q;
$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);
}
//print_r($searchResponse);


$searchResponse=$searchResponse['query']['pages'];
foreach($searchResponse as $value){
	$wikiResponse=$value;
}
//End Getting Extracts

//Getting Thumb Image
$url='https://species.wikimedia.org/w/api.php?format=json&action=query&prop=pageimages&pithumbsize=300&titles='.$q;
$wikiImages= httpGet($url);
//https://en.wikispaces.com/w/api.php?action=query&titles=Angampora&prop=pageimages&format=json&pithumbsize=100

$searchResponse=json_decode($wikiImages,true);
$searchResponse=@$searchResponse['query']['pages'];

foreach($searchResponse as $value){
	$wikiThumbImgResponse=$value;
}

//End Getting Thumb Image
 ?>
<?php if(@$wikiResponse['extract']!=""){?>
<h3>Main result</h3>
<h1><?php echo $wikiResponse['title']; ?></h1>             
<p>
<?php if(@$wikiThumbImgResponse['thumbnail']['source']!=""){?>
<img src="<?php echo $wikiThumbImgResponse['thumbnail']['source']; ?>" class="thumbnail pull-left" style="margin:0 10px 10px 0;" />
<?php }?>
<?php echo $wikiResponse['extract']; ?></p>
<?php }?> 
