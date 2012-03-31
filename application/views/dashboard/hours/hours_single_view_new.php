		    <div class="submenu">
			<ul class="nav nav-pills">
			    <li class=""><a href="<?= base_url('dashboard/hours/index') ?>"><i class="icon-align-justify" style="margin-right:5px"></i>List</a></li>
			    <li><a href="<?= base_url('dashboard/hours/add') ?>"><i class="icon-plus" style="margin-right:5px"></i>Add</a></li>
			</ul>
		    </div><!--./submenu-->
		</div><!--./headwrap-->
		
		<div class="content">
    <div class="well">
	<? foreach($hour as $row): $id = $row->id; ?>
        <h2><? getUserName($row->user_id)?> &raquo; <?=$row->date?> <?=anchor('dashboard/hours/edit/' . $row->id, '<span class="label label-info" style="position:relative;top:-5px;left:5px;">Edit</span>') ?></h2><br/>


        
        Date: <?=$row->date?><br/>
        Day: <?=date('l', strtotime($row->date))?><br/>
        Week: <?=$row->week?><br/>
        Hours: <?=$row->hours?><br/>
        Project: <?=$row->project_id?><br/>
        Start: <?=$row->start?><br/>
        End: <?=$row->end?><br/>
        Break: <?=$row->break?><br/>
        Comment: <?=$row->comment?><br/>
        
        <? endforeach; ?>
    </div>
</div><!--./body content-->
	    


