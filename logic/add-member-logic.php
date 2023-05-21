<?php
#requiring database
require_once "../config/database.php";

#checking if add member button is clicked
if (isset($_POST['add-member-button'])) {
  #defining variables
  $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $marital_status = filter_var($_POST['marital_status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $residence = filter_var($_POST['residence'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $group_name = filter_var($_POST['group-name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $member_type = filter_var($_POST['member-type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $status = filter_var($_POST['status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $profile = $_FILES['profile'];

  #checking validations
  if (empty($title)) {
    $_SESSION['add-member'] = "Please select title";
  } elseif (empty($name)) {
    $_SESSION['add-member'] = "Please enter name";
  } elseif (empty($residence)) {
    $_SESSION['add-member'] = "Please enter residence";
  } elseif (empty($group_name)) {
    $_SESSION['add-member'] = "Please select group";
    // } elseif (empty($email)) {
    //   $_SESSION['add-member'] = "Please enter email address";
  } elseif (empty($phone)) {
    $_SESSION['add-member'] = "Please enter phone number";
  } elseif (empty($member_type)) {
    $_SESSION['add-member'] = "Please select member type";
  } elseif (empty($profile['name'])) {
    $_SESSION['add-member'] = "Please select profile picture";
  } else {
    #checking if member already 
    $verify_query = " SELECT * FROM members WHERE name='$name' OR phone='$phone' OR email='$email'";
    $verify_query_result = mysqli_query($connection, $verify_query);
    #verifying
    if (mysqli_num_rows($verify_query_result) > 0) {
      $_SESSION['add-member'] = $name . ' OR ' . $phone . ' OR' . $email . " already exist in the database";
    } else {
      #working on image
      $time = time();
      $profile_name = $time . $profile['name'];
      $profile_tmp_name = $profile['tmp_name'];
      $profile_destination_path = '../profile-avatar/' . $profile_name;
      #allowed files
      $allowed_files = ['jpg', 'png', 'jpeg'];
      $extension = explode('.', $profile_name);
      $extension = end($extension);
      #verifying file ext
      if (in_array($extension, $allowed_files)) {
        #checking file size
        if ($profile['size'] < 1000000) {
          move_uploaded_file($profile_tmp_name, $profile_destination_path);
        } else {
          $_SESSION['signup'] = "File size is too big - 4MB Max";
        }
      } else {
        $_SESSION['add-member'] = "File is not supported - [jpg, png, jpeg]";
      }
    }
  }
  #redirecting
  if (isset($_SESSION['add-member'])) {
    $_SESSION['add-member-data'] = $_POST;
    header('location:' . ROOT_URL . 'member.php');
    die();
  } else {
    #saving user records
    date_default_timezone_get();
    $date = date('M d, y l H:i:s');
    $query = " INSERT INTO members(title, name, marital_status, residence, group_name, email, phone, member_type, status, profile,date) 
                VALUES('$title', '$name', '$marital_status', '$residence', '$group_name', '$email', '$phone', '$member_type', '$status', '$profile_name', '$date')";
    $query_results = mysqli_query($connection, $query);
    #checking connection
    if (!mysqli_errno($connection)) {
      $_SESSION['add-member-success'] = "New member added successfully";
      header('location: ' . ROOT_URL . 'member.php');
    } else {
      die();
    }
  }
} else {
  header('location:' . ROOT_URL . 'member.php');
  die();
}
