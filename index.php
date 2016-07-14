<?php
  require_once('config/config.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>My Budget</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <link href="css/main.css" rel="stylesheet" media="screen"/>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">My Budget</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php
              foreach($pages as $page)
              {
                ?>
                <li <?php if($actual_page == $page['link']) echo 'class="active"'; ?>><a href="index.php?page=<?php echo $page['link']; ?>"><?php echo $page['name']; ?></a></li>
                <?php
              }
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
      <?php include('pages/'.$actual_page.'.php'); ?>
    </div>
  </body>
</html>
