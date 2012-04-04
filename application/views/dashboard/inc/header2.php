<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<title>Timesheet</title>
	<meta name="description" content="">
	<meta name="author" content="">
    
	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
	<!-- Le styles -->
	<link href="<?=base_url('assets/css/site.css')?>" rel="stylesheet">
	<script src="<?=base_url('assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('assets/js/jquery.tablesorter.min.js')?>"></script>
	<!-- jQuery-ui -->
	<script type="text/javascript" src="<?=base_url('assets/js/jquery-ui-1.8.17.custom.min.js')?>"></script>
	<link type="text/css" href="<?=base_url('assets/css/smoothness/jquery-ui-1.8.17.custom.css')?>" rel="Stylesheet" />
	
	
	<!-- fullcalendar -->
	<link rel='stylesheet' type='text/css' href="<?=base_url('assets/css/fullcalendar.css')?>" />
	<script type='text/javascript' src="<?=base_url('assets/js/fullcalendar.js')?>"></script>
	    
	<!-- Datepicker styles and scripts -->

    
	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    </head>

    <body>
	    <div id="w980">
		<div id="headwrap">
		    <div class="navbar">
			<div class="navbar-inner">
			    <div class="container">
				<a class="brand" href="#">Timesheet</a>
				
				<ul class="nav">
				    <li class="<?=is_active('overview')?>"><a href="<?=base_url('dashboard/overview/index')?>"><i class="icon-home icon-white"></i></a></li>
				    <li class="<?=is_active('hours')?>"><a href="<?=base_url('dashboard/hours/index')?>">Hours</a></li>
				    <li class="<?=is_active('materials')?>"><a href="<?=base_url('dashboard/materials/index')?>">Materials</a></li>
				    <li class="<?=is_active('projects')?>"><a href="<?=base_url('dashboard/projects/index')?>">Projects</a></li>
				    <li class="<?=is_active('clockout')?>"><a href="<?=base_url('dashboard/clockout/index')?>">Clockout</a></li>
				    <li class="<?=is_active('people')?>"><a href="<?=base_url('dashboard/people/index')?>">People</a></li>
				</ul>
				<ul class="nav" style="float:right;margin-right:50px">
				    <li><a href="#">Logged in as <?=$this->session->userdata('username')?></a></li>
				    <li><a href="<?=base_url('login/logout')?>">Logout</a></li>
				</ul>
			    </div><!--./container-->
			</div><!--./navbar-inner-->
		    </div>