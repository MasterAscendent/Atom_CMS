 <!-- Database Connection Here... -->

<?php include('../config/Connection.php'); ?>

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

      <?php // include(D_TEMPLATE.'/navigation.php'); // Main navigation ?>

      <div class="container">

      <h1>Login</h1>

            <form>
             <div class="form-group">
               <label for="exampleInputEmail1">Email address</label>
               <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
             </div>
             <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
             </div>

             <!--
              <div class="checkbox">
               <label>
                 <input type="checkbox"> Check me out
               </label>
             </div> -->
             <button type="submit" class="btn btn-default">Submit</button>
            </form>

          </div>
    </div><!-- End Wrap -->


    <?php // include(D_TEMPLATE.'/footer.php'); // Page Footer ?>

    <?php // if($debug == 1) { include('widgets/debug.php'); } ?>
  </body>
</html>
