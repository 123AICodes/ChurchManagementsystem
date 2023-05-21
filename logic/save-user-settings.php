<?php
#updating user settings
if (isset($_POST['save-settings'])) {
  $user_id = filter_var($_POST['id_number'], FILTER_SANITIZE_NUMBER_INT);
  $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $residence = filter_var($_POST['residence'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  #validations
  if (empty($firstname)) {
    $_SESSION['save-setting'] = "Please enter firstname";
  } else if (empty($lastname)) {
    $_SESSION['save-setting'] = "Please enter lastname";
  } else if (empty($username)) {
    $_SESSION['save-setting'] = "Please enter username";
  } else if (empty($email)) {
    $_SESSION['save-setting'] = "Please enter email address";
  } else if (empty($phone)) {
    $_SESSION['save-setting'] = "Please enter phone number";
  } else if (empty($residence)) {
    $_SESSION['save-setting'] = "Please enter residence";
  } else {
    #saving user settings
    $save_settings_query = " UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', phone='$phone', residence='$residence' WHERE id='$user_id' LIMIT 1 ";
    $save_settings_query_results = mysqli_query($connection, $save_settings_query);
    if (mysqli_errno($connection)) {
      $_SESSION['save-setting'] = "Failed to save your settings";
      die();
    } else {
      $_SESSION['save-setting-success'] = "Your settings is saved successfully";
    }
  }
}
