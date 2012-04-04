		    <div class="submenu">
			<ul class="nav nav-pills">
			    <li class="active"><a href="<?= base_url('dashboard/projects/index') ?>"><i class="icon-align-justify icon-white" style="margin-right:5px"></i>List</a></li>
			    <li><a href="<?= base_url('dashboard/projects/add') ?>"><i class="icon-plus" style="margin-right:5px"></i>Add</a></li>
			</ul>
		    </div><!--./submenu-->
		</div><!--./headwrap-->
		
		<div class="content">
		    <? if(empty($projects[0])):?>
			<div class="alert alert-info">
			    <b>No records found</b>
			</div>
		    <? else:?>
        <table class="table table-striped" id="hourstable">
            <thead>
            <tr>
                <th class="header" style="width:10%">Id</th>
                <th class="header" style="width:25%">Name</th>
                <th class="header" style="width:40%">Description</th>
		<th class="header" style="width:10%">Last update</th>
                <th class="header" style="width:15%;text-align:right">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($projects as $row): ?>
                <tr>
                    <td><?=$row->id?></td>
                    <td><?=$row->project_name?></td>
                    <td><?=$row->project_description?></td>
		    <td><? projectLastUpdate($row->id)?></td>
                    <td style="text-align:right"><a href="<?=base_url('dashboard/projects/view/' . $row->id)?>" style="text-decoration:none;padding-right:5px"><span class="label notice">View</span></a>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    
    	    <script>
		$(document).ready(function() 
		    { 
			$("#hourstable").tablesorter(); 
		    } 
		); 
	    </script>
	<? endif;?>


