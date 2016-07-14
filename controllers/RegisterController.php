<?php
  $register = 0;
  if(isset($_POST['username']) && isset($_POST['password']))
  {
    $user = new User();
    $user->name = $_POST['username'];
    $user->password = $_POST['password'];
    if($user->register())
    {
      $register = 1;
    }
    else
    {
      $register = 2;
    }
  }
?>
