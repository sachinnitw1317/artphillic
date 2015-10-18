<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Online_cart</title>
		<link href="<?php echo base_url(); ?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/css/main_page.css" rel="stylesheet">
		<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
	</head>
	<body data-spy="scroll" data-target="#spy" data-offset="5">
	<div class="container-fluid nopadding">
	 <div class="row">
	 	<nav class="navbar navbar-default" role="navigation">
	 		<!-- Brand and toggle get grouped for better mobile display -->
	 		<div class="navbar-header">
	 			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	 				<span class="sr-only">Toggle navigation</span>
	 				<span class="icon-bar"></span>
	 				<span class="icon-bar"></span>
	 				<span class="icon-bar"></span>
	 			</button>
	 			<a class="navbar-brand" href="#">Shopping cart</a>
	 		</div>
	 	
	 		<!-- Collect the nav links, forms, and other content for toggling -->
	 		<div class="collapse navbar-collapse navbar-ex1-collapse">
	 			<ul class="nav navbar-nav">
	 				<li class="active"><a href="<?php echo base_url(); ?>cart">Home</a></li>
	 				<li><a href="<?php echo base_url(); ?>cart/about">About</a></li>
	 			</ul>
	 			<form class="navbar-form navbar-left" role="search">
	 				<div class="form-group">
	 					<input type="text" class="form-control" placeholder="Search">
	 				</div>
	 				<button type="submit" class="btn btn-default">Submit</button>
	 			</form>
	 			<ul class="nav navbar-nav navbar-right">
	 				<li><a href="#">Link</a></li>
	 				<li>
	 					<a href="<?php echo base_url(); ?>cart/login" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
	 					<ul class="dropdown-menu">
	 						<li><a href="<?php echo base_url(); ?>cart/login">Login</a></li>
	 						<li><a href="#">Logout</a></li>
	 						<li><a href="#">Something else here</a></li>
	 						<li><a href="#">Separated link</a></li>
	 					</ul>
	 				</li>
	 			</ul>
	 		</div><!-- /.navbar-collapse -->
	 	</nav>
	 </div>