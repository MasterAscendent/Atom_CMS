<?php
// Setup File:

error_reporting(0);

# Database Connection Here...
include('../config/Connection.php');

# Constants:
DEFINE('D_TEMPLATE', 'template');

# Functions:
include('functions/data.php');
include('functions/template.php');
include('functions/sandbox.php');

# Site Setup:
$debug = data_setting_value($dbc, 'debug-status');

$site_title = 'Atom CMS 2.0';

if(isset($_GET['page'])) {

  $pageid = $_GET['page']; // Set $pageid to equel the value given in the URL.

} else {
  $pageid = 1; // Set $pageid equal to 1 or AKA the Home Page.
}

# Page Setup
include('config/querys.php');
$page = data_page($dbc, $pageid);

if(isset($_GET['id'])) { $opened = data_page($dbc, $_GET['id']); }

# User Setup:
$user = data_user($dbc, $_SESSION['username']);

 ?>
