<?php
require_once 'admin/inc/ActiveRecords/ActiveRecords.php';
$db       =  new MySQL\ActiveRecords();
$categories =  $db->select('categories');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Winnie Industries</title>

	<!-- Bootstrap -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/imagehover.min.css" rel="stylesheet">
	<!-- Custom -->
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>
<body class="body_banner">
<div class="main_center">

<div class="top_navbar">
	<div class="container">
		<div class="row">
			<ul class="nav navbar-nav side_right">
			<li>
			<form action='search-products.php' method='get'>
			<input type='search' placeholder='Search Products' name='product' style='outline:none;margin-top:3px;height:25px;border:none;padding-left:10px;padding-right:10px;border-radius:5px;'/>
			</form>
			</li>
				<li><a href="tel:2249930011">Call: (224) 993-0011</a></li>
				<li><a href="assets/pdf/Winnie Brochure 10_2019_web.pdf" target="blank" class="dnd_btn" download>Download Catalog</a></li>
			</ul>
		</div>	
	</div>
</div>

<nav class="navbar navbar-default navbar-black margin_remove">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed mobile-navigation-btn" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" class="logo"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
 	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right nav-items">
       <li><a href="index.php">HOME</a></li>
       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PRODUCTS <span class="caret"></span></a>
          <ul class="dropdown-menu" id="drop">
           <li><a href="products.php#products">POPULAR PRODUCTS</a></li>
           <li><a href="products.php?new#products">NEW PRODUCTS</a></li>

           <?php
            foreach($categories as $item) {
              $sub_cat_menu = $db->select('sub_categories', ['parent_cat_id'=>$item['id']]);
              if (count($sub_cat_menu) > 0) {
                echo '<li><a href="products.php?cat='.$item['id'].'#products">'.strtoupper($item['category_name']).'</a></li>';
              }
            }
           ?>
            
          </ul>
        </li>
        <li><a href="about.php">ABOUT US</a></li>
        <li><a href="contact.php">CONTACT</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav><!-- /.nav-->