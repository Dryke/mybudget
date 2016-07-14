<?php
  if(isset($_POST['username']) && isset($_POST['password']))
  {
    $user = new User();
    $user->name = $_POST['username'];
    $user->password = $_POST['password'];
    if($user->register())
    {
      ?>
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> You have been registered.
      </div>
      <?php
    }
  }
?>
<form class="form-signin" method="POST">
  <h1>Register</h1>
  <label for="username">Username</label>
  <input name="username" type="text" id="username" class="form-control" placeholder="Username" required="true" autocomplete="off"><br />
  <label for="password">Password</label>
  <input name="password" type="password" id="password" class="form-control" placeholder="Password" required="true" autocomplete="off"><br />
  <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
</form>
