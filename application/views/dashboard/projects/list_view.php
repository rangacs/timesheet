<div class="row">
    <div class="span10">
        <h2>Projects</h2>
        
        <script>
            $(document).ready(function() 
                { 
                    $("#hourstable").tablesorter(); 
                } 
            ); 
        </script>
        <table class="zebra-striped" id="hourstable" style="width:97%">
            <thead>
            <tr>
                <th class="header" style="width:10%">Id</th>
                <th class="header" style="width:25%">Name</th>
                <th class="header" style="width:50%">Description</th>
                <th class="header" style="width:15%;text-align:right">View</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($projects as $row): ?>
                <tr>
                    <td><?=$row->id?></td>
                    <td><?=$row->project_name?></td>
                    <td><?=$row->project_description?></td>
                    <td style="text-align:right"><a href="<?=base_url('dashboard/projects/view/' . $row->id)?>" style="text-decoration:none;padding-right:5px"><span class="label notice">View</span></a>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
    <div class="span4">
        <h3>Tasks</h3>
        <a href="<?= base_url('dashboard/projects/add') ?>">Add Project</a>
    </div>
</div>

