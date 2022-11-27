<?php require_once('inc-main.php'); ?>
<?php require_once('inc.search.list.php'); ?>
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
<div class="col-lg-1"> 
<a href="index.php"><img src="logo.png"></a>
</div>
<div class="col-lg-11">

<div class="col-lg-12">
<div class="col-lg-7">

                           <div class="search-form">
                           
                             <form action="" method="get">
                                 <div class="input-group">
                                    <input type="text" placeholder="Search Web" name="q" class="form-control input-lg" value="<?php echo strip_tags(stripslashes(@$cid)); ?>">

                                   <div class="input-group-btn" style="width:100px; display:none">
                                   <select name="lang" id="lang" class="form-control input-lg">
<?php foreach($langUagesList as $key => $value){?>   
                                
                                     <option value="<?php echo $key ?>" <?php if($key==$lang){?>selected="selected"<?php }?>><?php echo $value; ?> <?php if($key==$lang){?>[Default]<?php }?></option>
                                     
<?php }?>                                     
                                   </select>
                                   </div>
                                     
                                   <div class="input-group-btn">
                                       <button class="btn btn-lg btn-primary" type="submit">
                                       Search
                                       </button>
                                    </div>
                                 </div>
                              </form>
                           </div>
</div>
<div class="col-lg-5">
</div>                           
<div class="col-lg-7">
                           <h2>
                           <?php if(@$cid==""){ ?>
                              <?php echo count($searchResponse); ?> all results found. 
                           <?php }else{?>
                              <?php echo count($searchResponse); ?> results found for: <span class="text-navy">“<?php echo strip_tags(@$cid); ?>”</span>.
                              <?php }?>
                           </h2>
                           <small>Request time  (<?php $time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'Page generated in '.$total_time.' seconds.'; ?>)</small>
<div class="hr-line-dashed"></div>

</div>
<div class="col-lg-5">
</div>                           

</div>

<div class="col-lg-12">
<div class="col-lg-7">
<div class="inqbox-content">
<?php //print_r($searchResponse); ?>
<?php if(@count($searchResponse)>0){?>                           
<?php foreach ($searchResponse as $ResultsList){ ?>                           
              <div class="search-result">
                              <h3><a href="view_plain.php?q=<?php echo $ResultsList['title']; ?>&sq=<?php echo $_GET['q']; ?>&lang=<?php echo $lang; ?>"><?php echo $ResultsList['title']; ?></a> <a class="btn" href="view_plain.php?q=<?php echo $ResultsList['title']; ?>&sq=<?php echo $_GET['q']; ?>&lang=<?php echo $lang; ?>" target="_blank"><i class="fa fa-external-link-square"></i> </a></h3>
                              <p style="overflow:hidden;">
                                 <?php 

 echo $ResultsList['snippet'];								 
								  ?>...
                              </p>
                              <a href="view_plain.php?q=<?php echo $ResultsList['title']; ?>&sq=<?php echo $_GET['q']; ?>&lang=<?php echo $lang; ?>" class="search-link">
							  Last Update: <?php echo $ResultsList['timestamp'] ?></a> <strong>Word Count</strong> : <?php echo $ResultsList['wordcount']; ?>
                              
                           </div>
                           <div class="hr-line-dashed"></div>

<?php }  ?>
<?php }else if(@count($searchResponse)==0 && @$_GET['q']!=""){?>
<?php echo @count($searchResponse); ?> results found for "<?php echo $_GET['q']; ?>". Please try again !
<?php }?>


                        </div>
</div>
<div class="col-lg-5">
<p>
<?php 
//print_r($searchResponse);
$q=@$searchResponse['0']['title'];
if(@$searchResponse['0']['title']!=""){
include("inc.main.result.php"); 
}
?>
</p>
</div>

</div>

</div>

</div>

      </div>

<div class="container">
    <hr>
        <div class="text-center center-block">
            <h5 class="txt-railway">From <a href="https://www.wikispaces.com/" target="_blank">Wikipedia</a>, the free encyclopedia.</h5>
            
               <p>Developed by <a href="https://codecanyon.net/user/nelliwinne/portfolio?ref=nelliwinne" target="_blank">Nelliwinne</a></p>
</div>
    <hr>
</div>     
   </body>
</html>