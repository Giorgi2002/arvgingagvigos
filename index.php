<?php require_once('inc-main.php'); ?>
<?php 
header('Content-Type: text/html; charset=utf-8');
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
<style type="text/css">
/* centered columns styles */
.row-centered {
    text-align:center;
}
.col-centered {
    display:inline-block;
    float:none;
    /* reset the text-align */
    text-align:left;
    /* inline-block space fix */
    margin-right:-4px;
}
.col-fixed {
    /* custom width */
    width:320px;
}
.col-min {
    /* custom min width */
    min-width:320px;
}
.col-max {
    /* custom max width */
    max-width:320px;
}

/* visual styles */
body {
    padding-bottom:40px;
}
h1 {
	margin: 40px 0px 20px 0px;
	color: #336600;
	font-size: 28px;
	line-height: 34px;
	text-align: center;
}

.item {
    width:100%;
    height:100%;
	border:1px solid #cecece;
    padding:28px;
	background:#ededed;
	background:-webkit-gradient(linear, left top, left bottom,color-stop(0%, #f4f4f4), color-stop(100%, #ededed));
	background:-moz-linear-gradient(top, #f4f4f4 0%, #ededed 100%);
	background:-ms-linear-gradient(top, #f4f4f4 0%, #ededed 100%);
	border-radius: 5px;
}

/* content styles */
.item {
	display:table;
}
.content {
	display:table-cell;
	vertical-align:middle;
	text-align:center;
}

/* centering styles for jsbin */
html,
body {
    width:100%;
    height:100%;
}
html {
    display:table;
}
body {
    display:table-cell;
}
</style>      
</head>
<body>
<div id="wrapper">
<div class="animated fadeIn">

<h1><img src="logo.png" width="128" height="128" alt="WES"><br>
  Wikipedia Easy Search</h1>
  
<div class="container">
    <div class="row row-centered">
        <div class="col-xs-6 col-centered col-min">
        <div class="item">&nbsp;
        <div class="content">
        <div class="search-form">
        <form action="search.php" method="get">
        <div class="input-group">
                                    <input type="text" placeholder="Search Web" name="q" class="form-control input-lg" value="<?php echo strip_tags(htmlentities(stripslashes(@$cid))); ?>" required>

<div class="input-group-btn" style="width:100px; display:none;">
                                   <select name="lang" id="lang" class="form-control input-lg">
<?php foreach($langUagesList as $key => $value){?>   
                                
                                     <option value="<?php echo $key ?>" <?php if($value==$defaultLanguage){?>selected="selected"<?php }?>><?php echo $value; ?> <?php if($key==$defaultLanguage){?>[Default]<?php }?></option>
                                     
<?php }?>                                     
                                   </select>
                                   </div>                                     
                                   <div class="input-group-btn">
                                       <button class="btn btn-lg btn-primary" type="submit">
                                       <i class="fa fa-search"></i>
                                       </button>
                                    </div>
                                 </div>
      </form>
                           </div>
        </div>
        </div>
        </div>
    </div>
</div>

    <div class="row row-centered">
    <div class="col-xs-6 col-centered col-min circle-border">

<div class="panel panel-default" style="border:none; margin-top:50px;">
<fieldset>
<legend style="text-align:center;">Featured Searches</legend>
<div class="panel-body text-center">
<a href="search.php?q=Insecta" class="btn btn-white btn-cons" style="margin:2px;">Insecta</a>
<a href="search.php?q=virus" class="btn btn-white btn-cons" style="margin:2px;">virus</a>
<a href="search.php?q=hiv" class="btn btn-white btn-cons" style="margin:2px;">hiv</a>
<a href="search.php?q=Phisidina" class="btn btn-white btn-cons" style="margin:2px;">Phisidina</a>
<a href="search.php?q=elephant" class="btn btn-white btn-cons" style="margin:2px;">elephant</a>
</div>
</fieldset>
</div>
    </div>
    </div>

</div>

<div class="container">
    <hr>
        <div class="text-center center-block">
            
               <p>Developed by <a href="https://codecanyon.net/user/nelliwinne/portfolio?ref=nelliwinne" target="_blank">Nelliwinne</a></p>
</div>
    <hr>
</div>
</div>      
</body>
</html>