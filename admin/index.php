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

            <div class="list-group">

              <?php
                if(isset($_POST['submitted']) == 1) {

                  $q = "INSERT INTO pages (title, label, header, body) VALUES ('$_POST[title]', '$_POST[label]', '$_POST[header]','$_POST[body]')";
                  $r = mysqli_query($dbc, $q);

                  if($r) {

                    echo '<p>Page was added!</p>';

                  } else {

                    echo '<p>Page could not be added becuase: '.mysqli_error($dbc);
                    echo '<p>'.$q.'</p>';

                  }
                }

               ?>

            <?php
              $q = "SELECT * FROM pages ORDER BY title ASC";
              $r = mysqli_query($dbc, $q);

              while($page_list = mysqli_fetch_assoc($r)) {

                $blurb = substr(strip_tags($page_list['body']), 0, 144);

                 ?>


                <a class="list-group-item" href="#">
                  <h4 class="list-group-item-heading"><?php echo $page_list['title']; ?></h4>
                  <p class="list-group-item-text"><?php echo $blurb; ?></p>


                </a>

                <?php } ?>
              </div>
          </div>

          <div class="col-md-9">



            <form action="index.php" method="post" role="form">

              <div class="form-group">

                <label for="title">Title:</label>
                <input class="form-control" type="text" name="title" id=title placeholder="Page Title">

              </div>

              <div class="form-group">

                <label for="label">label:</label>
                <input class="form-control" type="text" name="label" id=label placeholder="Page Label">

              </div>

              <div class="form-group">

                <label for="header">Header:</label>
                <input class="form-control" type="text" name="header" id=header placeholder="Page Header">

              </div>

              <div class="form-group">

                <label for="body">Body:</label>
                <textarea class="form-control" name="body" rows="8" id=body placeholder="Page Body"></textarea>

              </div>

              <button type="submit" class="btn btn-default">Save</button>

              <input type="hidden" name="submitted" value="1">
            </form>

          </div>
      </div>

    </div><!-- End Wrap -->

    <?php include(D_TEMPLATE.'/footer.php'); // Page Footer ?>

    <?php if($debug == 1) { include('widgets/debug.php'); } ?>
  </body>
</html>
