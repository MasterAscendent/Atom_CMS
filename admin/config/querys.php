<?php

  switch ($page) {
    case 'dashboard':

    break; // End Dashboard

    case 'pages':

    if(isset($_POST['submitted']) == 1) {

      $title = mysqli_real_escape_string($dbc, $_POST['title']);
      $label = mysqli_real_escape_string($dbc, $_POST['label']);
      $header = mysqli_real_escape_string($dbc, $_POST['header']);
      $body = mysqli_real_escape_string($dbc, $_POST['body']);

      if(isset($_POST['id']) != '') {
        $action = 'updated';
        $q = "UPDATE pages SET user = $_POST[user], slug = '$_POST[slug]', title = '$title', label = '$label', header = '$header', body = '$body' WHERE id = $_GET[id]";

      } else {
        $action = 'added';
        $q = "INSERT INTO pages (user, slug, title, label, header, body) VALUES ($_POST[user], '$_POST[slug]', '$title', '$label', '$header','$body')";

      }

      $r = mysqli_query($dbc, $q);

      if($r) {

        $message = '<p>Page was' .$action. '!</p>';

      } else {

        $message = '<p>Page could not be ' .$action. ' becuase: '.mysqli_error($dbc);
        $message .= '<p>'.$q.'</p>';

      }
    }

    if(isset($_GET['id'])) { $opened = data_page($dbc, $_GET['id']); }

    break; // End Pages

    case 'users':

    if(isset($_POST['submitted']) == 1) {

      $first = mysqli_real_escape_string($dbc, $_POST['first']);
      $last = mysqli_real_escape_string($dbc, $_POST['last']);

      if(isset($_POST['id']) != '') {
        $action = 'updated';
        $q = "UPDATE users SET first = '$first', last = '$last', password = SHA1('$_POST[password]'), status = $_POST[status] WHERE id = $_GET[id]";

      } else {
        $action = 'added';
        $q = "INSERT INTO users (first, last, password, status) VALUES ('$first', '$last', SHA1 ('$_POST[password]'),'$_POST[status]')";

      }

      $r = mysqli_query($dbc, $q);

      if($r) {

        $message = '<p>User was' .$action. '!</p>';

      } else {

        $message = '<p>User could not be ' .$action. ' becuase: '.mysqli_error($dbc);
        $message .= '<p>'.$q.'</p>';

      }
    }

    if(isset($_GET['id'])) { $opened = data_user($dbc, $_GET['id']); }

    break; //End Users

    case 'settings':

    break; // End Settings

    default:
      # code...
    break;
  }



 ?>
