<div class="sidebarwrap" style="width:175px;float:left;padding-top:85px;"><!-- Sidebar -->
<div class="well sidebar-nav">
	<ul class="nav nav-list">
	    <li class="nav-header" style="font-size:12px">Sidebar</li>
	    <li class="<?=is_active('overview')?>">
		<a href="<?=base_url('dashboard/overview')?>"><i class="icon-home"></i> Home</a>
	    </li>
	    <li class="nav-header" style="font-size:12px">Hours</li>
	    <li><a href="<?=base_url('dashboard/hours/index')?>"><i class="icon-list-alt"></i> View Hours</a></li>
	    <li><a href="<?=base_url('dashboard/hours/add')?>"><i class="icon-plus"></i> Add Hours</a></li>
	    <li class="nav-header" style="font-size:12px">Projects</li>
	    <li><a href="<?=base_url('dashboard/projects')?>"><i class="icon-list-alt"></i> View Projects</a></li>
	    <li><a href="<?=base_url('dashboard/projects/add')?>"><i class="icon-plus"></i> Add Project</a></li>
	    <li class="nav-header" style="font-size:12px">Materials</li>
	    <li><a href="<?=base_url('dashboard/materials/add')?>"><i class="icon-plus"></i> Add Materials</a></li>
	    <li class="nav-header" style="font-size:12px">Calendar</li>
	    <li><div id="datepicker"></div></li>
	</ul>
</div>
</div><!--./sidebar-->