<?php
require_once "../config/database.php";

if (isset($_GET['delete-member_id_number'])) {

  $member_id = filter_var($_GET['delete-member_id_number'], FILTER_SANITIZE_NUMBER_INT);
  $query = " SELECT * FROM members WHERE id={$member_id} ";
  $query_results = mysqli_query($connection, $query);
  if (mysqli_num_rows($query_results) > 0) {
    $member = mysqli_fetch_assoc($query_results);
    $profil_name = $member['profile'];
    $profile_path = '../profile-avatar/' . $profil_name;
    #removing image
    if ($profile_path) {
      unlink($profile_path);
    }
    #deleting member
    $delete_query = " DELETE FROM members WHERE id={$member_id} LIMIT 1";
    $delete_query_results = mysqli_query($connection, $delete_query);
    if (mysqli_errno($connection)) {
      $_SESSION['delete-member'] = "Failed to delete member";
      header('location: ' . ROOT_URL . 'views.php');
    } else {
      $_SESSION['delete-member-success'] = "member deleted successfully";
      header('location: ' . ROOT_URL . 'views.php');
    }
  }
} else {
  header('location: ' . ROOT_URL . 'views.php');
  die();
}
