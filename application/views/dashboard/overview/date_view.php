<div class="submenu">
    <ul class="nav nav-pills">
	<li class="active"><a href="<?= base_url('dashboard/hours/index') ?>"><i class="icon-align-justify icon-white" style="margin-right:5px"></i>List</a></li>
	<li><a href="<?= base_url("dashboard/hours/add/$date") ?>"><i class="icon-time" style="margin-right:5px"></i>Add Hours</a></li>
	<li><a href="<?= base_url("dashboard/materials/add/$date") ?>"><i class="icon-shopping-cart" style="margin-right:5px"></i>Add Materials</a></li>
    </ul>
</div><!--./submenu-->
</div><!--./headwrap-->

<div class="content">
    <? $this->notify->output()?>
    <div class="page-header" style="margin-top:0">
	
	<h1><?=$date . ' <small>' . date('l', strtotime($date))?></small></h1>
    </div>
    
    <div class="page-header">
        <h3 style="margin-bottom:-10px">Timer</h3>
    </div>
    <? if(empty($hours[0])):?>
	<div class="alert alert-info">
	<b>No records found</b>
	</div>
    <? else:?>
	<table class="table table-striped well" id="hourstable">
	     <thead>
	     <tr>
		 <th class="header">Project</th>
		 <th class="header">Date</th>
		 <th class="header">Week</th>
		 <th class="header">User</th>
		 <th class="header">Hours</th>
		 <th class="header">Start</th>
		 <th class="header">End</th>
		 <th class="header">Break</th>
		 <th class="header" style="text-align:right">Action</th>
	     </tr>
	     </thead>
	     <tbody>
		 <?php foreach($hours as $row): ?>
		 <tr>
		     <td><a href="<?=base_url("dashboard/projects/view/$row->project_id")?>"><?projectName($row->project_id)?></a></td>
		     <td><?php echo $row->date ?></td>
		     <td><?=$row->week?></td>
		     <td><? getName($row->user_id)?></td>
		     <td><?=$row->hours ?></td>
		     <td><?php echo $row->start ?></td>
		     <td><?php echo $row->end ?></td>
		     <td><?php echo $row->break ?></td>
		     <td style="text-align:right">
			 <a href="<?=base_url('dashboard/hours/view/' . $row->id)?>" style="text-decoration:none;padding-right:5px"><span class="label notice">View</span></a>
			 <a href="<?=base_url('dashboard/hours/edit/' . $row->id)?>" style="text-decoration:none;padding-right:0px"><span class="label label-info">Edit</span></a>
		     </td>
		 </tr>
		 <?php endforeach;?>
	     </tbody>
	 </table>
    <? endif;?>
    
    <div class="page-header">
	<h3 style="margin-bottom:-10px">Materials</h3>
    </div>
    <? if(empty($materials[0])): ?>
    <div class="alert alert-info">
	<b>No records found</b>
    </div>
    <? else:?>
	<table class="table table-striped well" id="hourstable">
	    <thead>
	    <tr>
		<th class="header">Date</th>
		<th class="header">Description</th>
		<th class="header">View</th>
	    </tr>
	    </thead>
	    <tbody>
		<?php foreach($materials as $row): ?>
		<tr>
		    <td><?php echo $row->matDate ?></td>
		    <td><?php echo $row->matDescription ?></td>
		    <td style="text-align:right"><a href="<?=base_url('dashboard/materials/view/' . $row->matId)?>" style="text-decoration:none;padding-right:5px"><span class="label notice">View</span></a></td>
		</tr>
		<?php endforeach;?>
	    </tbody>
	</table>
    <? endif;?>
	
	