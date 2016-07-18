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
?>
