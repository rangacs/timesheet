<div class="row">
    <div class="span11">
        <h2>Hours</h2>
        
        <script>
            $(document).ready(function() 
                { 
                    $("#hourstable").tablesorter(); 
                } 
            ); 
        </script>
                <table class="zebra-striped" id="hourstable" style="width:97%">
                    <thead>
                    <tr>
                        <th class="header">Date</th>
                        <th class="header">Week</th>
                        <th class="header">User</th>
                        <th class="header">Hours</th>
                        <th class="header">Start</th>
                        <th class="header">End</th>
                        <th class="header">Break</th>
                        <th class="header">View</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($hours as $row): ?>
                        <tr>
                            <td><?php echo $row->date ?></td>
                            <td><a href="<?= base_url('dashboard/hours/sortby/week') . "/$row->week" ?>"><?=$row->week?></a></td>
                            <td><?php getUserName($row->user_id); ?></td>
                            <td><?=$row->hours ?></td>
                            <td><?php echo $row->start ?></td>
                            <td><?php echo $row->end ?></td>
                            <td><?php echo $row->break ?></td>
                            <td style="text-align:right"><a href="<?=base_url('dashboard/hours/view/' . $row->id)?>" style="text-decoration:none;padding-right:5px"><span class="label notice">View</span></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        
    </div>
    <div class="span3">
        <? $this->load->view('dashboard/hours/sidebar_hours') ?>
    </div>
</div>

