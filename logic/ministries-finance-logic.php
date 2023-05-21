<?php
require_once "../config/database.php";

if (isset($_POST['add-finance'])) {
  $ministry = filter_var($_POST['ministry'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $amount = filter_var($_POST['amount'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $received_from = filter_var($_POST['received-from'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $received_by = filter_var($_POST['received-by'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $expenses = filter_var($_POST['expenses'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  if (empty($amount)) {
    $_SESSION['add-finance'] = "Please enter amount";
  } elseif (empty($received_from)) {
    $_SESSION['add-finance'] = 'Please received from is required';
  } elseif (empty($received_by)) {
    $_SESSION['add-finance'] = 'Please received by is required';
  }

  if (isset($_SESSION['add-finance'])) {
    $_SESSION['add-finance-data'] = $_POST;
    header('location:' . ROOT_URL . 'ministries-finance.php');
    die();
  } else {
    date_default_timezone_get();
    $date = date('M d, Y - l H:i:s A');
    $insert_query = " INSERT INTO finance(ministry,type,amount,received_from,received_by, date,expenses)
            VALUES('$ministry', 'Ministry', '$amount','$received_from','$received_by', '$date', '$expenses')";
    $insert_query_results = mysqli_query($connection, $insert_query);
    if (!mysqli_errno($connection)) {
      $_SESSION['add-finance-success'] = 'Record saved successfully';
      header('location:' . ROOT_URL . 'ministries-finance.php');
      die();
    } else {
      die();
    }
  }
}
