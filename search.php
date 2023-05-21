<?php
#including connection
require_once "./config/database.php";
#access control and fetching current user

if (!isset($_SESSION['user_id'])) {
  header('location: ' . ROOT_URL . 'auth/login.php');
  die();
} elseif (isset($_SESSION['user_id'])) {

  $id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $query = " SELECT * FROM users WHERE id=$id";
  $results = mysqli_query($connection, $query);
  $user = mysqli_fetch_assoc($results);
}

if (isset($_GET['search-button']) ?? null) {
  $sno = 1;
  $search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  if (empty($_GET['search'])) {
    $_SESSION['search-data'] = "No Results found";
    header('location:' . ROOT_URL . 'search.php');
  } else {
    $search_query = " SELECT * FROM members WHERE CONCAT(title, name, member_type, group_name, residence,status,marital_status) LIKE '%$search%' ORDER BY id DESC";
    $search_query_results = mysqli_query($connection, $search_query);
  }
} else {
  header('location:' . ROOT_URL . 'index.php');
  die();
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" type="image/icon" href="<?= ROOT_URL ?>images/logo.png">
  <title>Search - Responsive Web Application Using HTML, CSS, JS , PHP</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="<?= ROOT_URL ?>css/all.min.css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>css/search.css">
</head>

<body>

  <main>

    <div class="main-dash-container">

      <!-- header -->
      <?php
      require_once "./partials/search-header.php";
      ?>

      <!-- second container -->
      <section class="section">
        <?php if (mysqli_num_rows($search_query_results) > 0) : ?>
          <!-- search content-->
          <div class="search-content-container">
            <h1>Search Results</h1>
            <!-- number of rows per page-->
            <?php if (mysqli_num_rows($search_query_results) < 10) : ?>
            <?php else : ?>
              <div class="number-of-rows">
                <select id="itemperpage">
                  <option value="11">11</option>
                  <option value="21">21</option>
                  <option value="31">31</option>
                  <option value="41">41</option>
                  <option value="51">51</option>
                </select>
                <p>Row Per Page</p>
              </div>
            <?php endif ?>

            <!-- search results -->
            <?php
            require_once "./other_partials/__search-results.php";
            ?>

            <!-- pagination -->
            <?php if (mysqli_num_rows($search_query_results) < 10) : ?>
            <?php else : ?>
              <div class="bottom-field">
                <ul class="pagination">
                  <li class="prev"><a href="#" id="prev">&#139;</a></li>
                  <li class="next"><a href="#" id="next">&#155;</a></li>
                </ul>
              </div>
            <?php endif ?>

          </div>
        <?php else : ?>
          <!-- error message -->
          <?php if (isset($_SESSION['search-data'])) : ?>
            <div style="margin-top: 6rem;" class="empty-msg-box error">
              <p>
                <?php
                echo $_SESSION['search-data'];
                unset($_SESSION['search-data']);
                ?>
              </p>
            </div>
          <?php else : ?>
            <div style="margin-top: 6rem;" class="empty-msg-box error">
              <p>
                No Results Found
              </p>
            </div>
          <?php endif ?>
        <?php endif ?>
        <?php if (mysqli_num_rows($search_query_results) > 0) : ?>
          <div class="generate-report-container">
            <!-- <button class="generate-report">
              <i class="fas fa-download"></i>
              Generate Report
            </button> -->
          </div>
        <?php else : ?>
        <?php endif ?>
      </section>
  </main>

  <?php if (mysqli_num_rows($search_query_results) > 0) : ?>
    <p class="footer border-top">&copy;Copyright 2022 | design by AICL Inc. </p>
  <?php else : ?>
    <p class="footer border-top" style="position: absolute;">&copy;Copyright 2022 | design by AICL Inc. </p>
  <?php endif ?>



  <script src="<?= ROOT_URL ?>js/all.min.js"></script>
  <script src="<?= ROOT_URL ?>js/search.js"></script>
  <script src="<?= ROOT_URL ?>js/pagination.js"></script>
</body>

</html>