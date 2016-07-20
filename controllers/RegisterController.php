<?php
    $notification = 0;
    $notification_class = '';
    $notification_title = '';
    $notification_text = '';

    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $user = new User();
        $user->name = $_POST['username'];
        $user->password = $_POST['password'];
        $notification = 1;
        if($user->register())
        {
            $notification_class = 'success';
            $notification_title = 'Success!';
            $notification_text = 'You have been registered.';
        }
        else
        {
            $notification_class = 'danger';
            $notification_title = 'Too bad!';
            $notification_text = 'This name is already taken.';
        }
    }

    echo $twig->render($actual_page.'.html', array(
        'notification' => $notification,
        'notification_class' => $notification_class,
        'notification_title' => $notification_title,
        'notification_text' => $notification_text
    ));
?>
