<?php
// Setup File:

# Database Connection Here...
$dbc = mysqli_connect('localhost', 'dev', 'Pinkfloyd7', 'AtomCMS') OR die('Could not connect to MySQL Database: '.mysqli_connect_error());

$site_title = 'Atom CMS 2.0';

if(isset($_GET['page'])) {

  $pageid = $_GET['page']; // Set $pageid to equel the value given in the URL.

} else {
  $pageid = 1; // Set $pageid equal to 1 or AKA the Home Page.
}

# Page Setup
$q = "SELECT * FROM pages WHERE id = $pageid";
$r = mysqli_query($dbc, $q);

$page = mysqli_fetch_assoc($r);


 ?>
