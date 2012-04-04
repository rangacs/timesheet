		    <div class="submenu">
			<ul class="nav nav-pills">
			    <li class="active"><a href="<?= base_url('dashboard/materials/index') ?>"><i class="icon-align-justify icon-white" style="margin-right:5px"></i>List</a></li>
			    <li><a href="<?= base_url('dashboard/materials/add') ?>"><i class="icon-plus" style="margin-right:5px"></i>Add</a></li>
			</ul>
		    </div><!--./submenu-->
		</div><!--./headwrap-->
		
		<div class="content">
        <? if(empty($materials[0])):?>
	    <div class="alert alert-info">
		<b>No records found</b>
	    </div>
	<? else: ?>
        
        <table class="table table-striped" id="hourstable" style="width:100%">
            <thead>
            <tr>
                <th class="header" style="width:10%">Id</th>
                <th class="header" style="width:20%">Date</th>
                <th class="header" style="width:20%">Project</th>
		<th class="header" style="width:40%">Description</th>
                <th class="header" style="width:10%;text-align:right">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($materials as $row): ?>
                <tr>
                    <td><?=$row->matId?></td>
                    <td><?=$row->matDate?></td>
                    <td><?projectName($row->matProId)?></td>
		    <td><?=$row->matDescription?></td>
                    <td style="text-align:right">
			<a href="<?=base_url('dashboard/materials/view/' . $row->matId)?>" style="text-decoration:none;padding-right:5px"><span class="label notice">View</span></a>
			<a href="<?=base_url('dashboard/materials/edit/' . $row->matId)?>" style="text-decoration:none;padding-right:0px"><span class="label label-info">Edit</span></a>
		    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
	<? endif;?>
	<script>
            $(document).ready(function() 
                { 
                    $("#hourstable").tablesorter(); 
                } 
            ); 
        </script>
