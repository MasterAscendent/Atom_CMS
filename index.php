<?php include('config/setup.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $page['title'].' | '.$site_title; ?></title>

    <meta name="viewport" content="width-device-width, initial-scale=1.0">

    <?php include('config/css.php'); ?>
    <?php include('config/js.php'); ?>

  </head>
  <body>
    <div id="wrap">

        <nav style="border-radius:0px; -webkit-border-radius:0px; -moz-border-radius:0px;" class="navbar navbar-default" role="navigation">
          <div class="container">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
          </div>
        </nav> <!-- END Nav -->

        <div class="container">
          <h1><?php echo $page['header']; ?></h1>

          <p><?php echo $page['body']; ?></p>
        </div>
    </div><!-- End Wrap -->

      <footer id="footer">
        <div class="container">
          <p>This is my footer.</p>
        </div>
      </footer><!-- End Footer -->

  </body>
</html>
