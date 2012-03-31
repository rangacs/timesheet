<style type="text/css">
label{
    text-align:left;
    font-weight:bold;
}
input[type="submit"]{
}

input{
    font-size: 14px;
    padding: 8px;
    margin-bottom: 10px;
}
select{
    margin-bottom:10px;
    height:34px;
    width: 228px;
}
</style>

<div class="row">
    <div class="span10">
        <h2>Edit Hours</h2>
        <? foreach($hour as $row): ?>
<?=form_open('dashboard/hours/edit')?>
<?=form_hidden('id', $row->id)?>
<label for="project_id">Project</label><?=form_dropdown('project_id', $projects, $row->project_id)?><br/>
<label for="date">Date</label><?=form_input('date', $row->date)?><br/>
<label for="week">Week</label><?=form_input('week', $row->week)?><br/>
<label for="Hours">Hours</label><?=form_input('hours', $row->hours)?><br/>
<label for="start">Start</label><?=form_input('start', $row->start)?><br/>
<label for="end">End</label><?=form_input('end', $row->end)?><br/>
<label for="Break">Break</label><?=form_input('break', $row->break)?><br/>
<label for="Comment">Comment</label><?=form_input('comment', $row->comment)?><br/>
<label for="submit"></label><input class="btn primary" type="submit" value="Submit" />
<?php echo form_close(); ?>
<? endforeach; ?>
    </div>
    <div class="span4">
        <h3>Tasks</h3>
    </div>
</div>