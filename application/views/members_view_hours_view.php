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
<h1>View Hours</h1>
        </div>
        <div class="row">
            <div class="span10">
                <script>
                    $(document).ready(function() 
                        { 
                            $("#hourstable").tablesorter(); 
                        } 
                    ); 
                </script>
                <table class="zebra-striped" id="hourstable">
                    <thead>
                    <tr>
                        <th class="header">Date</th>
                        <th class="header">Project</th>
                        <th class="header">User</th>
                        <th class="header">Start</th>
                        <th class="header">End</th>
                        <th class="header">Break</th>
                        <th class="header">Comment</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($hours as $row): ?>
                        <tr>
                            <td><?php echo $row->date ?></td>
                            <td><?php echo $row->project_id ?></td>
                            <td><?php echo $row->username ?></td>
                            <td><?php echo $row->start ?></td>
                            <td><?php echo $row->end ?></td>
                            <td><?php echo $row->break ?></td>
                            <td><?php echo $row->comment ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>