<div class="submenu">
    <ul class="nav nav-pills">
	<li class="active"><a href="<?= base_url('dashboard/hours/index') ?>"><i class="icon-align-justify icon-white" style="margin-right:5px"></i>List</a></li>
	<li><a href="<?= base_url('dashboard/hours/add') ?>"><i class="icon-plus" style="margin-right:5px"></i>Add</a></li>
    </ul>
</div><!--./submenu-->
</div><!--./headwrap-->

<div class="content">
<? $this->notify->output()?>
<div id="calendar"></div>
<pre>
<? print_r($hours)?>
</pre>
    