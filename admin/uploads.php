<?php

$ds = DIRECTORY_SEPARATOR; // 1

$storeFolder = '../duploads'; // 2

ext = pathinfo($_FILES['fille']['name'], PATHINFO_EXTENSION);
$newname = time();
$random = rand(100,999);
$name = $newname.$random.'.'.$ext;

if (!empty($_FILES)) {

  $tempFile = $_FILES['fille']['tmp_name']; //  3

  $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; // 4

  $targetFile = $targetPath. $name; // 5

  move_uploaded_file($tempFile, $targetFile); // 6

}


 ?>
