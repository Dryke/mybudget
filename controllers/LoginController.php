<?php
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $user = new User();
        $user->name = $_POST['username'];
        $user->password = $_POST['password'];
        if($id_user = $user->login())
        {
            $_SESSION['id_user'] = $id_user;
            header('Location: index.php?page=home');
        }
        else
        {
            $notification = new Notification('danger', 'Error!', 'Bad login or password.');
        }
    }

    require_once('NotificationController.php');

    echo $twig->render('login.html');
?>
