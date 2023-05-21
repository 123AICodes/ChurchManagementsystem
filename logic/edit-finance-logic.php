<?php
require_once "../config/database.php";

if (isset($_POST['edit-finance'])) {
  $finance_id = filter_var($_POST['id_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $type = filter_var($_POST['type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $amount = filter_var($_POST['amount'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $received_from = filter_var($_POST['received-from'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $received_by = filter_var($_POST['received-by'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $expenses = filter_var($_POST['expenses'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $period = filter_var($_POST['period'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  if (empty($amount)) {
    $_SESSION['edit-finance'] = "Please amount cannot be null";
  } elseif (empty($received_from)) {
    $_SESSION['edit-finance'] = 'Please received from is required';
  } elseif (empty($received_by)) {
    $_SESSION['edit-finance'] = 'Please received by is required';
  }

  if (isset($_SESSION['edit-finance'])) {
    header('location:' . ROOT_URL . 'finance.php');
    die();
  } else {
    date_default_timezone_get();
    $date = date('M d, Y - l H:i:s A');
    $insert_query = " UPDATE finance SET type='$type', amount='$amount', received_from='$received_from', received_by='$received_by', date='$date', expenses='$expenses', period='$period' WHERE id='$finance_id' LIMIT 1";
    $insert_query_results = mysqli_query($connection, $insert_query);
    if (!mysqli_errno($connection)) {
      $_SESSION['edit-finance-success'] = 'Record updated successfully';
      header('location:' . ROOT_URL . 'finance.php');
      die();
    } else {
      die();
    }
  }
}
