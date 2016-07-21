<?php
    if($notification->active == 1)
    {
        echo $twig->render('notification.html', array(
            'notification' => $notification
        ));
    }
?>
