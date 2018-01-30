<?php
/**
* wrap this in your html code
**/
?>
<table class="table table-hover">
    <tr>
        <th><?=$names['user_id']?></th>
        <th><?=$names['ip_address']?></th>
        <th><?=$names['time']?></th>
    </tr>
<?php foreach($logs as $log):?>
    <tr>
        <td><?=$log['user_id']?></td>
        <td><?=$log['ip_address']?></td>
        <td><?=date($date_format,strtotime($log['time']))?></td>
    </tr>
<?php endforeach;?>
</table>
</main>
