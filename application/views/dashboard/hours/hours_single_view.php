<style type="text/css">

</style>

<div class="row">
    <div class="span10">
        <? foreach($hour as $row): $id = $row->id; ?>
        <h2><? getUserName($row->user_id)?> &raquo; <?=$row->date?></h2>
        
        
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
    <div class="span4">
        <h3>Tasks</h3>
        <?=anchor('dashboard/hours/edit/' . $row->id, 'Edit') ?>
    </div>
</div>