<?php
  session_start();

  if(isset($_SESSION['user_id']))
  {
    $user_id = $_SESSION['user_id'];
    $is_logged = true;
  }
  else
  {
    $is_logged = false;
  }
?>
