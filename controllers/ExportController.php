<?php
    if(isset($_POST['submitExport']))
    {
        $db = new Db();
        if($backup_content = $db->getDump())
        {
            $backup = fopen(__DIR__.'/../backup/backup_'.date("Ymd_His").'.sql', 'w+');
            fwrite($backup, $backup_content);
            fclose($backup);
            $notification = new Notification('success', 'Success!', 'Dump <a href="/mybudget/backup/backup_'.date("Ymd_His").'.sql">backup.sql</a> created.');
        }
    }

    if(isset($_POST['submitDeleteFile']))
    {
        if(unlink(__DIR__.'/../backup/'.$_POST['file_name']))
        {
            $notification = new Notification('success', 'Success!', 'File removed.');
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

    require_once('NotificationController.php');

    echo $twig->render($actual_page.'.html', array(
        'backups' => $backups
    ));
?>
