<style type="text/css">

</style>

<div class="row">
    <div class="span10">
        <h2><?=$project->project_name?></h2>
        <?=$project->project_description?>
        <br/><br/>
        <h3>Timer</h3>
        <? if($hours !== false): ?>
            <table class="zebra-striped" id="hourstable" style="width:97%">
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
                    <?php endforeach;?>
                </tbody>
            </table>
        <? else: ?>
        <p>No hours found</p>
        <? endif;?>
        
        <h3>Materials</h3>
        <? if($materials !== false): ?>
            <table class="zebra-striped" id="hourstable" style="width:97%">
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
                        <td style="text-align:right"><a href="<?=base_url('dashboard/hours/view/' . $row->matId)?>" style="text-decoration:none;padding-right:5px"><span class="label notice">View</span></a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        <? else: ?>
        <p>No Materials Found</p>
        <? endif;?>
        
    </div>
    <div class="span4">
        <h3>Tasks</h3>
    </div>
</div>