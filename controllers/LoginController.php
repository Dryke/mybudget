<?php
  $bad_login = 0;
  if(isset($_POST['username']) && isset($_POST['password']))
  {
    $user = new User();
    $user->name = $_POST['username'];
    $user->password = $_POST['password'];
    if($user_id = $user->login())
    {
      $_SESSION['user_id'] = $user_id;
      header('Location: index.php?page=home');
    }
    else
    {
      $bad_login = 1;
    }
  }
?>
