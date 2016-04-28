<?php
// Setup File:

# Database Connection Here...
$dbc = mysqli_connect('localhost', 'dev', 'Pinkfloyd7', 'AtomCMS') OR die('Could not connect to MySQL Database: '.mysqli_connect_error());

$site_title = 'Atom CMS 2.0';

# Page Setup
$q = "SELECT * FROM pages WHERE id = 1";
$r = mysqli_query($dbc, $q);

$page = mysqli_fetch_assoc($r);


 ?>
