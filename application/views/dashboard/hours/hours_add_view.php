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
        <h2>Add Hours</h2>
<?php echo form_open('dashboard/hours/add'); ?>
<?php echo form_hidden('user_id', $this->session->userdata('user_id')); ?>
<label for="project_id">Project</label><?php echo form_dropdown('project_id', $projects) ?><br/>
<label for="date">Date</label><?php echo form_input('date', date('Y-m-d')) ?><br/>
<label for="start">Start</label><?php echo form_input('start') ?><br/>
<label for="end">End</label><?php echo form_input('end') ?><br/>
<label for="Break">Break</label><?php echo form_input('break') ?><br/>
<label for="Comment">Comment</label><?php echo form_input('comment') ?><br/>
<label for="submit"></label><input class="btn primary" type="submit" value="Submit" />
<?php echo form_close(); ?>
    </div>
    <div class="span4">
        <h3>Tasks</h3>
    </div>
</div>