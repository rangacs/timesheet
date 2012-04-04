		    <div class="submenu">
			<ul class="nav nav-pills">
			    <li class="active"><a href="<?= base_url('dashboard/hours/index') ?>"><i class="icon-align-justify icon-white" style="margin-right:5px"></i>List</a></li>
			    <li><a href="<?= base_url('dashboard/hours/add') ?>"><i class="icon-plus" style="margin-right:5px"></i>Add</a></li>
			</ul>
		    </div><!--./submenu-->
		</div><!--./headwrap-->
		
		<div class="content">
		    <? $this->notify->output()?>
		    <? if(empty($hours[0])):?>
			<div class="alert alert-info">
			<b>No records found</b>
			</div>
		    <? else:?>
                <table class="table table-striped" id="hourstable">
                    <thead>
                    <tr>
                        <th class="header" style="">Date</th>
                        <th class="header" style="">Week</th>
			<th class="header">Day</th>
			<th class="header">Project</th>
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
                            <td><?php echo $row->date ?></td>
                            <td><a href="<?= base_url('dashboard/hours/sortby/week') . "/$row->week" ?>"><?=$row->week?></a></td>
			    <td><?=date('l', strtotime($row->date))?></td>
                            <td><a href="<?=base_url("dashboard/projects/view/$row->project_id")?>"><?projectName($row->project_id)?></a></td>
			    <td><a href="<?= base_url('dashboard/hours/sortby/user') . "/$row->user_id" ?>"><?php getName($row->user_id); ?></a></td>
                            <td><?=$row->hours ?></td>
                            <td><?php echo $row->start ?></td>
                            <td><?php echo $row->end ?></td>
                            <td><?php echo $row->break ?></td>
                            <td style="text-align:right">
				<a href="<?=base_url('dashboard/hours/view/' . $row->id)?>" style="text-decoration:none;padding-right:5px"><span class="label">View</span></a>
				<a href="<?=base_url('dashboard/hours/edit/' . $row->id)?>" style="text-decoration:none;padding-right:5px"><span class="label label-info">Edit</span></a>
				<a class="confirm" href="<?=base_url('dashboard/hours/delete/' . $row->id)?>" style="text-decoration:none;padding-right:0px"><span class="label" style="background-color:black">Delete</span></a>
			    </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
		
		

    
	    <? endif?>
	    
<script type="text/javascript" charset="utf-8">
				    $(document).ready(function() {
					    $('.confirm').click(function(e) {
						    if(!confirm('Are you sure?'))
						    {
							    return false;
						    }
					    });
					     $("#hourstable").tablesorter({ 
						// sort on the first column and third column, order asc 
						sortList: [[0,1]]
					    }); 
				    });
				</script>
