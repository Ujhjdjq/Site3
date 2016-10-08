<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<title>Shop</title>
</head>

<body>
<?php
include_once('pages/classes.php');


?>


<div class="container-fluid">
	<header id="header">
		<div class="row-fluid">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
					<img src="image/images (13).jpg" height="200" width="270">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
					<img src="image/images (3).jpg" height="200" width="270">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
					<img src="image/images (2).jpg" height="200" width="270">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
					<img src="image/images (5).jpg" height="200" width="270">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
					<img src="image/images (4).jpg" height="200" width="270">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
					<img src="image/images (10).jpg" height="200" width="270">
				</div>
		</div>
	</header>
</div>
	
<menu id= "menu">
<?php
include_once('pages/menu.php');
?>
</menu>

<section id="content">
<?php
if(isset($_GET['id']))
{
	$id= $_GET['id'];
	if($id == 1) include('pages/catalog.php');
	if($id == 2) include('pages/reports.php');
	if($id == 3) include('pages/cart.php');
	if($id == 4) include('pages/newgoods.php');
}
?>
</section>

<footer id="footer">
	
</footer>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="css/js/bootstrap.min.js"></script>
</body>
</html>