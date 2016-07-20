<?php
    $backup_ok = false;
    $file_removed = false;
    if(isset($_POST['submitExport']))
    {
        $db = new Db();
        if($backup_content = $db->getDump())
        {
            $backup = fopen(__DIR__.'/../backup/backup_'.date("Ymd_His").'.sql', 'w+');
            fwrite($backup, $backup_content);
            fclose($backup);
            $backup_ok = true;
        }
    }

    if(isset($_POST['submitDeleteFile']))
    {
        if(unlink(__DIR__.'/../backup/'.$_POST['file_name']))
        {
            $file_removed = true;
        }
    }

    $backups = array();
    $files = scandir(__DIR__.'/../backup/');
    $key = 0;
    foreach($files as $file)
    {
        if($file != "." && $file != "..")
        {
            $backups[$key]['name'] = $file;
            $backups[$key]['last_edit'] = date("d/m/Y H:i:s", filemtime(__DIR__.'/../backup/'.$file));
            $key++;
        }
    }
?>
