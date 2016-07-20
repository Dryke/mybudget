<?php
    if($backup_ok)
    {
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Dump <a href="backup.sql">backup.sql</a> created.
        </div>
        <?php
    }

    if($file_removed)
    {
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> File removed.
        </div>
        <?php
    }
?>
<div class="col-md-3">
    <form method="POST">
        <button class="btn btn-medium btn-primary" type="submit" name="submitExport">Export</button>
    </form>
</div>
<div class="col-md-6">
    <table class="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Last edit</th>
            <th></th>
        </tr>
        <?php
        foreach($backups as $key => $backup)
        {
            ?>
            <tr>
                <td><?php echo $key; ?></td>
                <td><?php echo $backup['name']; ?></td>
                <td><?php echo $backup['last_edit']; ?></td>
                <td>
                    <form method="POST" class="file_remove">
                        <input type="hidden" name="file_name" value="<?php echo $backup['name']; ?>"/>
                        <button type="submit" name="submitDeleteFile"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
