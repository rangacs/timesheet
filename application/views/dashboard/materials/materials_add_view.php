		    <div class="submenu">
			<ul class="nav nav-pills">
			    <li class=""><a href="<?= base_url('dashboard/materials/view') ?>"><i class="icon-align-justify" style="margin-right:5px"></i>List</a></li>
			    <li class="active"><a href="<?= base_url('dashboard/materials/add') ?>"><i class="icon-plus icon-white" style="margin-right:5px"></i>Add</a></li>
			</ul>
		    </div><!--./submenu-->
		</div><!--./headwrap-->
		
		<div class="content">
		    
    <style type="text/css">
	label{
	    text-align:left;
	    font-weight:bold;
	}
	input[type="submit"]{
	}
	
	input{
	    font-size: 14px;
	    padding: 8px;
	    margin-bottom: 10px;
	}
	select{
	    margin-bottom:10px;
	    height:34px;
	    width: 228px;
	}
    </style>
<?php echo form_open('dashboard/materials/add'); ?>
<label for="project_id">Project</label><?php echo form_dropdown('matProId', $projects) ?><br/>
<label for="date">Date</label><?php echo form_input('matDate', date('Y-m-d')) ?><br/>
<label for="Comment">Description</label><?= form_textarea(array('name' => 'matDescription', 'rows' => 5, 'cols' => 40, 'style' => 'width:218px;margin-bottom:10px'))?><br/>
<label for="submit"></label><input class="btn primary" type="submit" value="Submit" />
<?php echo form_close(); ?>