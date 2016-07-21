<?php
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $user = new User();
        $user->name = $_POST['username'];
        $user->password = $_POST['password'];
        if($user->register())
        {
            $notification = new Notification('success', 'Success!', 'You have been registered.');
        }
        else
        {
            $notification = new Notification('danger', 'Too bad!', 'This name is already taken.');
        }
    }

    require_once('NotificationController.php');

    echo $twig->render($actual_page.'.html');
?>
