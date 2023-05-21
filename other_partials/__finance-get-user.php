<?php
$user_id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
$query = " SELECT * FROM users WHERE id='$user_id'";
$query_results = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($query_results);

$amount = $_SESSION['add-finance-data']['amount'] ?? null;
$received_from = $_SESSION['add-finance-data']['received-from'] ?? null;
$received_by = $_SESSION['add-finance-data']['received-by'] ?? null;
$expenses = $_SESSION['add-finance-data']['expenses'] ?? null;
unset($_SESSION['add-finance-data']);
