		    <div class="submenu">
			<ul class="nav nav-pills">
			    <li class=""><a href="<?= base_url('dashboard/projects/index') ?>"><i class="icon-align-justify" style="margin-right:5px"></i>List</a></li>
			    <li class="active"><a href="<?= base_url('dashboard/projects/add') ?>"><i class="icon-plus icon-white" style="margin-right:5px"></i>Add</a></li>
			</ul>
		    </div><!--./submenu-->
		</div><!--./headwrap-->
		
		<div class="content">
    <div class="page-header" style="margin-top:0px">
	<h1>Add Projects</h1>
    </div>
    <style type="text/css">
	label{
	    text-align:left;
	    font-weight:bold;
	}
	input[type="submit"]{
	    margin-left:0;
	}
	
	input{
	    font-size: 14px;
	    padding: 8px;
	    margin-bottom: 10px;
	}
    </style>
    <div class="well span4" style="width:240px;margin-left:0">
	<?= form_open('dashboard/projects/add') ?>
        
        <label for="name">Name:</label><input type="text" name="name" /><br/>
        <label for="description">Description:</label><input type="text" name="description" /><br/>
        <input class="btn primary" type="submit" value="Submit" />
        
        <?= form_close()?>

    
    </div>
</div><!--./body content-->
	    


