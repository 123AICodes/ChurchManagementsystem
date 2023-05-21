<?php
require_once "../config/database.php";

if (isset($_GET['delete_finance_id_number'])) {
  $finance_id = filter_var($_GET['delete_finance_id_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $query = " SELECT * FROM finance WHERE id='$finance_id'";
  $query_results = mysqli_query($connection, $query);
  if (mysqli_num_rows($query_results) > 0) {
    $delete_query = "DELETE FROM finance WHERE id='$finance_id' LIMIT 1";
    $delete_query_results = mysqli_query($connection, $delete_query);
    if (!mysqli_errno($connection)) {
      $_SESSION['delete-finance-success'] = 'Record deleted successfully';
      header('location:' . ROOT_URL . 'finance.php');
      die();
    } else {
      $_SESSION['delete-finance'] = 'Failed to complete this operation';
      die();
    }
  }
}
