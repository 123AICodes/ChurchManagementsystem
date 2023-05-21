<?php
require_once "./config/database.php";

if (isset($_GET['search-button']) ?? null) {
  $sno = 1;
  $search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if (empty($_GET['search'])) {
    $_SESSION['search-data'] = "No Results found";
    header('location:' . ROOT_URL . 'search-finance.php');
  } else {
    $search_query = " SELECT * FROM finance WHERE CONCAT(ministry, type, received_from, received_by, amount) LIKE '%$search%' ORDER BY id DESC";
    $search_query_results = mysqli_query($connection, $search_query);
  }
} else {
  header('location:' . ROOT_URL . 'search-finance.php');
  die();
}
