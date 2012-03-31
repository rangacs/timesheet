<div class="topbar">
    <div class="fill">
        <div class="container">
            <a class="brand" href="<?php echo base_url()?>index.php/members">Timesheet</a>
            <ul class="nav">
                <li><a href="<?php echo base_url()?>index.php/members/view_hours">Se timer</a></li>
                <li><a href="#">Link 2</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="content">
        <div class="page-header">
<h1>Legge inn timer</h1>
        </div>
        <div class="row">
<style type="text/css">
label {
    text-align:left;
    width: 70px;
    padding-left:15px;
}
input, select{
    margin-bottom: 10px;
}
select{
    width: 220px;
}
</style>
    


<?php echo form_open('members/add_hours'); ?>
<?php echo form_hidden('username', $this->session->userdata('user_id')); ?>
<label for="project_id">Project</label><?php echo form_dropdown('project_id', $projects) ?><br/>
<label for="date">Date</label><?php echo form_input('date', date('Y-m-d')) ?><br/>
<label for="start">Start</label><?php echo form_input('start') ?><br/>
<label for="end">End</label><?php echo form_input('end') ?><br/>
<label for="Break">Break</label><?php echo form_input('break') ?><br/>
<label for="Comment">Comment</label><?php echo form_input('comment') ?><br/>
<label for="submit"></label><?php echo form_submit('submit', 'submit') ?>
<?php echo form_close(); ?>
        </div>


