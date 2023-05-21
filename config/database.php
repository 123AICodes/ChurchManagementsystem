<?php
#including constants file
require_once "constants.php";
#establishing connection
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
#checking connection
if (mysqli_errno($connection)) {
  die(mysqli_errno($connection));
}
