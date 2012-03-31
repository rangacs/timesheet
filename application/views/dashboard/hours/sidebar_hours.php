<h3>Tasks</h3>
       <div style="padding-bottom:5px"><a href="<?= base_url('dashboard/hours/index') ?>">View List</a></div>
        <div style="padding-bottom:5px"><a href="<?= base_url('dashboard/hours/add') ?>">Add Hours</a></div>
        <b>View only:</b>
        <ul>
            <?php foreach($users as $row): ?>
            <li><a href="<?= base_url('dashboard/hours/sortby/user') . "/$row->id" ?>"><?=$row->username?></a></li>
            <?php endforeach;?>
        </ul>