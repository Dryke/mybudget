<?php
  $backup_ok = false;
  $db = new Db();
  if($backup_content = $db->getDump())
  {
    $backup = fopen(__DIR__.'/../backup/backup_'.date("Ymd_His").'.sql', 'w+');
    fwrite($backup, $backup_content);
    fclose($backup);
    $backup_ok = true;
  }
?>
