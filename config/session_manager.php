<?php
  session_start();

  if(isset($_SESSION['id_user']))
  {
    $id_user = $_SESSION['id_user'];
    $is_logged = true;
  }
  else
  {
    $is_logged = false;
  }
?>
