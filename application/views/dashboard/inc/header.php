
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">



<head>

    <title></title>

    <link rel="stylesheet" href="http://localhost/timesheet/css/bootstrap.css" type="text/css" />

    <script src="http://localhost/timesheet/js/jquery-1.7.1.min.js"></script>

    <script src="http://localhost/timesheet/js/jquery.tablesorter.js"></script>

   <style type="text/css">

      /* Override some defaults */

      html, body {

        background-color: #eee;

      }

      body {

        padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */

      }

      .container > footer p {

        text-align: center; /* center align it with the container */

      }

      .container {

        width: 820px; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16. */

      }



      /* The white background content wrapper */

      .content {

        background-color: #fff;

        padding: 20px;

        margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */

        -webkit-border-radius: 0 0 6px 6px;

           -moz-border-radius: 0 0 6px 6px;

                border-radius: 0 0 6px 6px;

        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);

           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);

                box-shadow: 0 1px 2px rgba(0,0,0,.15);

      }



      /* Page header tweaks */

      .page-header {

        background-color: #f5f5f5;

        padding: 20px 20px 10px;

        margin: -20px -20px 20px;

      }



      /* Styles you shouldn't keep as they are for displaying this base example only */

      .content .span11,

      .content .span3 {

        min-height: 500px;

      }

      /* Give a quick and non-cross-browser friendly divider */

      .content .span3 {

        margin-left: 0;

        padding-left: 19px;

        border-left: 1px solid #eee;

      }



      .topbar .btn {

        border: 0;

      }



    </style>



    <!-- Le fav and touch icons -->

    <link rel="shortcut icon" href="images/favicon.ico">

    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">

    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

  </head>



  <body>



    <div class="topbar">

      <div class="fill">

        <div class="container">

          <a class="brand" href="http://localhost/timesheet/">Timesheet</a>

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

      <div class="content">
        <div class="page-header">
            <h1><?=$page_title?> <small><?=$page_tagline?></small></h1>
        </div>
    

