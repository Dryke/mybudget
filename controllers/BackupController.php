<?php
    if(isset($_POST['submitExport']))
    {
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

    if(isset($_POST['submitImportBackup']))
    {
        if($backup = file_get_contents(__DIR__.'/../backup/'.$_POST['file_name']))
        {
            $queries = explode(';', $backup);
            unset($queries[count($queries)-1]);
            foreach($queries as $query)
            {
                $query .= ';';
                $db->execute($query);
                $notification = new Notification('success', 'Success!', 'Backup imported.');
            }
        }
    }

    $backups = array();
    $files = scandir(__DIR__.'/../backup/');
    $key = 0;
    foreach($files as $file)
    {
        if($file != "." && $file != "..")
        {
            $file_location = __DIR__.'/../backup/'.$file;
            $backups[$key]['name'] = $file;
            $backups[$key]['last_edit'] = date("d/m/Y H:i:s", filemtime($file_location));
            $backups[$key]['link'] = '/mybudget/backup/'.$file;

            // Calcul filesize
            $bytes = filesize($file_location);
            $units = array('B', 'KB', 'MB', 'GB', 'TB');
            $bytes = max($bytes, 0);
            $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
            $pow = min($pow, count($units) - 1);
            $bytes /= pow(1024, $pow);

            $backups[$key]['file_size'] = round($bytes, 2) . ' ' . $units[$pow];
            $key++;
        }
    }
    $backups = array_reverse($backups);

    require_once('NotificationController.php');

    echo $twig->render($actual_page.'.html', array(
        'backups' => $backups
    ));
?>
