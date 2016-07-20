<?php
    $bad_login = false;
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
            $bad_login = true;
        }
    }
?>
