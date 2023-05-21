<?php
#including database
require_once "config/database.php";

#checking if login button is clicked
if (isset($_POST['login-button'])) {
  #declaring variables
  $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  #validation
  if (empty($username)) {
    $_SESSION['login'] = "enter username";
    header('location: ' . ROOT_URL . 'auth/login.php');
  } elseif (empty($password)) {
    $_SESSION['login'] = "password is required";
    header('location: ' . ROOT_URL . 'auth/login.php');
  } else {
    #checking if user exist
    $check_query = " SELECT * FROM users WHERE username='$username' OR email='$username'";
    $check_query_results = mysqli_query($connection, $check_query);
    if (mysqli_num_rows($check_query_results) == 1) {
      #converting record into an assoc array if user is found
      $user_record = mysqli_fetch_assoc($check_query_results);
      $user_password = $user_record['password'];
      #comparing password
      if (password_verify($password, $user_password)) {
        $_SESSION['user_id'] = $user_record['id'];
        header('location: ' . ROOT_URL . 'index.php');
      } else {
        $_SESSION['login'] = "incorrect password";
      }
    } else {
      $_SESSION['login'] = "user not found";
    }
  }
  if (isset($_SESSION['login'])) {
    $_SESSION['login-data'] = $_POST;
    header('location:' . ROOT_URL . 'auth/login.php');
    die();
  }
}
