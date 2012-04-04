    <div class="submenu">
        <ul class="nav nav-pills">
            <li class="active"><a href="<?= base_url('dashboard/materials/index') ?>"><i class="icon-align-justify icon-white" style="margin-right:5px"></i>List</a></li>
            <li><a href="<?= base_url('dashboard/materials/add') ?>"><i class="icon-plus" style="margin-right:5px"></i>Add</a></li>
        </ul>
    </div><!--./submenu-->
</div><!--./headwrap-->

<div class="content">
    
    <h2><?getName($this->uri->segment(4))?></h2>
    <div class="row" style="margin-top:10px">
    <div class="well span4">
        <div class="page-title">
            <h3>Hours</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Week</th>
                    <th>Hours</th>
                </tr>
            </thead>
            <tbody>
                <? foreach($sumweek as $row):?>
                <tr>
                    <td><?= $row->week?></td>
                    <td><?= $row->hours?></td>
                </tr>
                <? endforeach?>
            </tbody>
        </table>
            
    </div><!--./well.span4-->
    </div><!--./row-->