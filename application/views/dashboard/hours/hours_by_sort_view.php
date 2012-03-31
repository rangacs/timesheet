<div class="submenu">
			<ul class="nav nav-pills">
			    <li class="active"><a href="<?= base_url('dashboard/hours/index') ?>"><i class="icon-align-justify icon-white" style="margin-right:5px"></i>List</a></li>
			    <li><a href="<?= base_url('dashboard/hours/add') ?>"><i class="icon-plus" style="margin-right:5px"></i>Add</a></li>
			</ul>
		    </div><!--./submenu-->
		</div><!--./headwrap-->
		
		<div class="content">
        <h2>Hours &raquo; <?=$under_title?></h2>
        
        <script>
            $(document).ready(function() 
                { 
                    $("#hourstable").tablesorter(); 
                } 
            ); 
        </script>
                <table class="table table-striped" id="hourstable" style="width:97%">
                    <thead>
                    <tr>
                        <th class="header">Date</th>
                        <th class="header">Week</th>
                        <th class="header">User</th>
                        <th class="header">Hours</th>
                        <th class="header">Start</th>
                        <th class="header">End</th>
                        <th class="header">Break</th>
                        <th class="header">View</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($hours as $row): ?>
                        <tr>
                            <td><?php echo $row->date ?></td>
                            <td><?=$row->week?></td>
                            <td><? getUserName($row->user_id)?></td>
                            <td><?=$row->hours ?></td>
                            <td><?php echo $row->start ?></td>
                            <td><?php echo $row->end ?></td>
                            <td><?php echo $row->break ?></td>
                            <td style="text-align:right"><a href="<?=base_url('dashboard/hours/view/' . $row->id)?>" style="text-decoration:none;padding-right:5px"><span class="label notice">View</span></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

