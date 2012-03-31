		    <div class="submenu">
			<ul class="nav nav-pills">
			    <li class="active"><a href="<?= base_url('dashboard/materials/index') ?>"><i class="icon-align-justify icon-white" style="margin-right:5px"></i>List</a></li>
			    <li><a href="<?= base_url('dashboard/materials/add') ?>"><i class="icon-plus" style="margin-right:5px"></i>Add</a></li>
			</ul>
		    </div><!--./submenu-->
		</div><!--./headwrap-->
                <div class="content">
        <script>
            $(document).ready(function() 
                { 
                    $("#hourstable").tablesorter(); 
                } 
            ); 
        </script>
        <table class="table table-striped" id="hourstable">
            <thead>
            <tr>
                <th class="header" style="width:30%">Name</th>
                <th class="header" style="width:50%">Email</th>
                <th class="header" style="width:20%;text-align:right">View</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($people as $row): ?>
                <tr>
                    <td><?=$row->username?></td>
                    <td><?=$row->email?></td>
                    <td style="text-align:right"><a href="<?=base_url('dashboard/people/show/' . $row->id)?>" style="text-decoration:none;padding-right:5px"><span class="label notice">View</span></a>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

