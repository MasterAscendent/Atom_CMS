<?php

# Start the session:
session_start();

if(!isset($_SESSION['username'])) {

  header('Location: login.php');

}

 ?>

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

      <?php include(D_TEMPLATE.'/navigation.php'); // Main navigation ?>

      <h1>Admin Dashboard</h1>

      <div class="row">
          <div class="col-md-3">

            <?php
              $q = "SELECT * FROM pages ORDER BY title ASC";
              $r = mysqli_query($dbc, $q);

              while($page_list = mysqli_fetch_assoc($r)) {

                echo $page_list['title'];

              }

             ?>

          </div>

          <div class="col-md-9">

            <p>Page Form</p>

          </div>
      </div>

    </div><!-- End Wrap -->

    <?php include(D_TEMPLATE.'/footer.php'); // Page Footer ?>

    <?php if($debug == 1) { include('widgets/debug.php'); } ?>
  </body>
</html>
