		    <div class="submenu">
			<ul class="nav nav-pills">
			    <li class=""><a href="<?= base_url('dashboard/hours/index') ?>"><i class="icon-align-justify" style="margin-right:5px"></i>List</a></li>
			    <li class="active"><a href="<?= base_url('dashboard/hours/add') ?>"><i class="icon-plus icon-white" style="margin-right:5px"></i>Add</a></li>
			</ul>
		    </div><!--./submenu-->
		</div><!--./headwrap-->
		
		<div class="content">
		    
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
    <div class="well span4" style="">
<?= form_open('dashboard/hours/add'); ?>
<label for="user">User</label><select name="user_id" class="input-small">
    <option value="1">Bj&oslash;rn</option>
    <option value="2">Kim</option>
    <option value="3">Begge</option>
    </select>
<label for="project_id">Project</label><?php echo form_dropdown('project_id', $projects) ?><br/>
<label for="date">Date</label><?php echo form_input('date', date('Y-m-d'))?><br/>
<label for="start">Start</label><select name="start-hour" class="input-mini">
    <option value="07:">07</option>
    <option value="08:" selected="selected">08</option>
    <option value="09:">09</option>
    <option value="10:">10</option>
    <option value="11:">11</option>
    <option value="12:">12</option>
    <option value="13:">13</option>
    <option value="14:">14</option>
    <option value="15:">15</option>
    <option value="16:">16</option>
    <option value="17:">17</option>
    <option value="18:">18</option>
    </select>
    <select name="start-minute" class="input-mini">
	<option value="00" selected="selected">00</option>
	<option value="15">15</option>
	<option value="30">30</option>
	<option value="45">45</option>
    </select>
<label for="end">End</label><select name="end-hour" class="input-mini">
    <option value="07:">07</option>
    <option value="08:">08</option>
    <option value="09:">09</option>
    <option value="10:">10</option>
    <option value="11:">11</option>
    <option value="12:">12</option>
    <option value="13:">13</option>
    <option value="14:">14</option>
    <option value="15:">15</option>
    <option value="16:" selected="selected">16</option>
    <option value="17:">17</option>
    <option value="18:">18</option>
    <option value="19:">19</option>
    <option value="20:">20</option>
    <option value="21:">21</option>
    <option value="22:">22</option>
    <option value="23:">23</option>
    <option value="24:">24</option>
    </select>
    <select name="end-minute" class="input-mini">
	<option value="00" selected="selected">00</option>
	<option value="15">15</option>
	<option value="30">30</option>
	<option value="45">45</option>
    </select>
<label for="Break">Break</label><select name="break" class="input-mini">
	<option value="00" selected="selected">00</option>
	<option value="15" selected="selected">15</option>
	<option value="30">30</option>
	<option value="45">45</option>
	<option value="60">1</option>
	<option value="75">1.25</option>
	<option value="90">1.5</option>
	<option value="105">1.75</option>
	<option value="120">2</option>
    </select>
<label for="Comment">Comment</label><?php echo form_input('comment') ?><br/>
<label for="submit"></label><input class="btn primary" type="submit" value="Submit" />
<?php echo form_close(); ?>
    </div>
    </div>

	    


