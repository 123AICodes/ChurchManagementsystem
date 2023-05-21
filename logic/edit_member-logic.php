<?php
require_once "../config/database.php";

#checking if update member button is clicked
if (isset($_POST['edit-member-button'])) {
  #defining variables
  $member_id = filter_var($_POST['id_number'], FILTER_SANITIZE_NUMBER_INT);
  $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $marital_status = filter_var($_POST['marital_status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $residence = filter_var($_POST['residence'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $group_name = filter_var($_POST['group-name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $member_type = filter_var($_POST['member-type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $status = filter_var($_POST['status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  $prev_profile = filter_var($_POST['prev_profile'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $profile = $_FILES['profile'];

  #checking validations
  if (empty($title)) {
    $_SESSION['edit-member'] = "Please select title";
  } else if (empty($name)) {
    $_SESSION['edit-member'] = "Please enter name";
  } else if (empty($residence)) {
    $_SESSION['edit-member'] = "Please enter residence";
  } else if (empty($group_name)) {
    $_SESSION['edit-member'] = "Please select group";
  } else if (empty($email)) {
    $_SESSION['edit-member'] = "Please enter email address";
  } else if (empty($phone)) {
    $_SESSION['edit-member'] = "Please enter phone number";
  } else if (empty($member_type)) {
    $_SESSION['edit-member'] = "Please select member type";
  } else {
    #removing previous image
    if ($profile['name'] && $profile['size'] < 1000000) {
      #working on edit-upload image
      $time = time();
      $profile_name = $time . $profile['name'];
      $profile_tmp_name = $profile['tmp_name'];
      $profile_destination_path = '../profile-avatar/' . $profile_name;
      #allowed files
      $allowed_files = ['jpg', 'png', 'jpeg'];
      $extension = explode('.', $profile_name);
      $extension = end($extension);
      #verifying file ext
     
     if (!in_array($extension, $allowed_files)) {
        $_SESSION['edit-member'] = "file extension not supported";
      } else {
        $prev_profile_path = '../profile-avatar/' . $prev_profile;
        if ($prev_profile_path) {
          unlink($prev_profile_path);
        }
        move_uploaded_file($profile_tmp_name, $profile_destination_path);
      }
    }
  }
  #redirecting
  if (isset($_SESSION['edit-member'])) {
    header('location:' . ROOT_URL . 'views.php');
    die();
  } else {
    $insert_profile = $profile_name ?? $prev_profile;
    #updating member records records
    $query = " UPDATE members SET title='$title', name='$name', marital_status='$marital_status', residence='$residence', group_name='$group_name', email='$email', phone='$phone', member_type='$member_type', status='$status', profile='$insert_profile' WHERE id='$member_id' LIMIT 1 ";
    $query_results = mysqli_query($connection, $query);
    #checking connection
    if (!mysqli_errno($connection)) {
      $_SESSION['edit-member-success'] = "member updated successfully";
      header('location: ' . ROOT_URL . 'views.php');
    } else {
      die();
    }
  }
} else {
  header('location:' . ROOT_URL . 'member.php');
  die();
}
