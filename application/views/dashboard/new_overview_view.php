
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
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
	padding-top: 60px;
	padding-bottom: 40px;
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
	    <div class="container">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		</a>
		<div class="span9 offset1">
		    <a class="brand" href="<?php echo base_url()?>">Timesheet</a>
			<div class="nav-collapse">
			    <ul class="nav">
				<li class="<?=is_active('overview')?>"><a href="<?=base_url('dashboard/overview')?>">Overview</a></li>
				<li class="<?=is_active('hours')?>"><a href="<?=base_url('dashboard/hours')?>">Hours</a></li>
				<li class="<?=is_active('projects')?>"><a href="<?=base_url('dashboard/projects')?>">Projects</a></li>
				<li class="<?=is_active('materials')?>"><a href="<?=base_url('dashboard/materials')?>">Materials</a></li>
				<li class="<?=is_active('people')?>"><a href="<?=base_url('dashboard/people')?>">People</a></li>
			    </ul>
			    <ul class="nav secondary-nav pull-right">
				<script>$('.dropdown-toggle').dropdown()</script>
				<li class="dropdown">
				    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Logged in as <?=$this->session->userdata('username')?>
					<b class="caret"></b>
				    </a>
				    <ul class="dropdown-menu">
					<li><a href="<?=base_url('login/logout')?>">Logout</a></li>
				    </ul>
				</li>
			    </ul>
			</div><!--/.nav-collapse -->
		    </div><!--/.Menu container -->
	    </div>
	</div><!--/.navbar-inner -->
    </div><!--/.navbar -->

    <div class="container" style="padding-left:35px">

	<!-- Main hero unit for a primary marketing message or call to action -->
	<div class="row">
	<div class="hero-unit span8 offset1">
	    <h1>Last week</h1>
	    <p>Nothing much yet!</p>
	</div>
	</div>
	<div class="row">
	    <div class="span3 offset1" style="background-color:whiteSmoke;text-align:center;border-radius:6px;-webkit-border-radius:6px">
		<h3>Legg til timer</h3>
		<a href="<?=base_url('dashboard/hours/add')?>"><img src="../images/clock.png" alt="" /></a>
		
	    </div>
	    <div class="span3" style="background-color:whiteSmoke;padding-right:20px;text-align:center;border-radius:6px;-webkit-border-radius:6px">
		<h3>Legg til materialer</h3>
		<a href="<?=base_url('dashboard/materials/add')?>"><img src="../images/generic_box.png" alt="" /></a>
	    </div>
	    
	    <div class="span3" style="background-color:whiteSmoke;text-align:center;border-radius:6px;-webkit-border-radius:6px">
		<h3>Vis prosjekter</h3>
		<a href="<?=base_url('dashboard/projects')?>"><img src="../images/type_list.png" alt="" /></a>
	    </div>
	    
	</div>

	<hr/>

      

      <footer>
	
	<p>&copy; Company 2012</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
