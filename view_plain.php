<?php require_once('inc-main.php'); ?>
<?php 
//https://species.wikimedia.org/w/api.php?format=json&action=query&titles=mother&prop=extracts

if((@$_GET['lang'])!=""){
	$lang=$_GET['lang'];
}else{
	$lang=$defaultLanguage;
}


if(@$_GET['q']!=""){
$cid=@$_GET['q'];
}else{
$cid=$defaltWord;
}

if((@$cid)!=""){

//Getting Search Results
$url='https://species.wikimedia.org/w/api.php?format=json&action=query&prop=extracts&titles='.$cid;

$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);

//If Results are not found trying to find with underscore
if(count($searchResponse)==0){
$cid=str_replace(" ","_",$cid);	

$url='https://species.wikimedia.org/w/api.php?format=json&action=query&prop=extracts&titles='.$cid;

$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);
}

//If Results are not found trying to find withoutspaces
if(count($searchResponse)==0){
$cid=str_replace("_","",$cid);	

$url='https://species.wikimedia.org/w/api.php?format=json&action=query&prop=extracts&titles='.$cid;

$wikiInfo= httpGet($url);
$searchResponse=json_decode($wikiInfo,true);
}

$searchResponse=@$searchResponse['query']['pages'];

$i=0;
foreach($searchResponse as $value){
$i++;
if($i==1){
$searchResponse=$value;	
}
}

//Filter Wrong Outputs
$searchResponse=str_replace("<li>
</li>","",$searchResponse);
$searchResponse=str_replace("<li>

</li>","",$searchResponse);
$searchResponse=str_replace("<ul>

</ul>","",$searchResponse);

$searchResponse=str_replace("<ul><li class=\"mw-empty-elt\">
</li></ul>","",$searchResponse);
//End Getting Search Results
//print_r($searchResponse);
}

//Getting Thumb Image
$url='https://species.wikimedia.org/w/api.php?format=json&action=query&prop=pageimages&pithumbsize=300&titles='.$cid;
$wikiImages= httpGet($url);
//https://en.wikispaces.com/w/api.php?action=query&titles=Angampora&prop=pageimages&format=json&pithumbsize=100

$searchResponseImgs=json_decode($wikiImages,true);
$searchResponseImgs=@$searchResponseImgs['query']['pages'];

foreach($searchResponseImgs as $value){
	$wikiThumbImgResponse=$value;
}

//print_r($wikiThumbImgResponse);
//End Getting Thumb Image
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Wikipedia Easy Search</title>
<link rel="shortcut icon" href="icon.png" type="image/png" />
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
      <link href="css/animate.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      
   </head>
   <body>
      <div id="wrapper">
<div class="animated fadeIn">
<div class="col-lg-2"> 
<a href="index.php"><img src="logo.png"></a>
<br><br>
<a class="btn btn-lg btn-warning full-width" href="search.php?q=<?php echo $_GET['sq']; ?>&lang=<?php echo $_GET['lang']; ?>">Back</a>

<?php if(count(@$wikiResponseLangs['langlinks'])>0){?>
<?php foreach(@$wikiResponseLangs['langlinks'] as $langName){?>
<a href="view_plain.php?q=<?php echo $langName['*']; ?>&sq=<?php echo $_GET['sq']; ?>&lang=<?php echo $langName['lang']; ?>"  class="btn btn-link btn-sm full-width"> <strong class="pull-left"><?php echo $langName['*']; ?></strong> <em class="pull-right"><?php 
if($langUagesList[$langName['lang']]!=""){
echo $langUagesList[$langName['lang']];
}else{
echo strtoupper($langName['lang']);
}?></em></a>
<?php //print_r($wikiResponseLangs['langlinks']);?>
<?php }?>
<?php }?>
</div>
<div class="col-lg-10">

<div class="col-lg-12">
<div class="col-lg-7">

                           <div class="search-form">
                           
                             <form action="" method="get">
                                 <div class="input-group">
                                   <div class="input-group-btn">
                                       
                                    <h1><?php echo @$searchResponse['title']; ?></h1>
                                    </div>
                                    
                                 </div>
                              </form>
                           </div>
</div>
<div class="col-lg-5">
</div>                           
<div class="col-lg-7">
                           
<div class="hr-line-dashed"></div>

</div>
<div class="col-lg-5">
</div>                           

</div>

<div class="col-lg-12">
<div class="inqbox-content">

<?php if(@count($searchResponse)>0){?>                           
<h3>Result for "<?php echo @$cid; ?>"...</h3>
<?php if(@$wikiThumbImgResponse['thumbnail']['source']!=""){?>
<img src="<?php echo $wikiThumbImgResponse['thumbnail']['source']; ?>" class="thumbnail pull-right" style="margin:0 0 10px 10px;" />
<?php }?>
<?php echo @$searchResponse['extract']; ?>
<br style="clear:both;" />
<?php }?>
<?php if(@$searchResponse['extract']==""){?>
0 results found for "<?php echo @$cid; ?>". <br>
FOI:<br>
The word "<?php echo @$_GET['q']; ?>" is missing at Wikispecies.org
<?php } ?>


                        </div>

</div>

</div>

</div>




</div>

<div class="container">
        <div class="text-center center-block">
<hr>
            <h5 class="txt-railway">From <a href="https://www.wikispaces.com/" target="_blank">Wikipedia</a>, the free encyclopedia · View on <a href="https://<?php echo $lang ?>.wikispaces.com/wiki/<?php echo @$_GET['q']; ?>" target="_blank">Wikipedia</a></h5>
            
               <p>Developed by <a href="https://codecanyon.net/user/nelliwinne/portfolio?ref=nelliwinne" target="_blank">Nelliwinne</a></p>
</div>
    <hr>
</div>

</body>
</html>