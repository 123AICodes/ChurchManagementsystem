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

#change user avatar
require_once "./logic/change-user-profile.php";
#saving-user-setting
require_once "./logic/save-user-settings.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" type="type/icon" href="<?= ROOT_URL ?>images/logo.png">
  <title>Profile - Responsive Web Application Using HTML, CSS, JS AND PHP</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="<?= ROOT_URL ?>css/all.min.css">
  <link href="<?= ROOT_URL ?>css/profile_and_search.css" rel="stylesheet">
</head>

<body>

  <main>
    <!-- aside navbar -->
    <?php
    require_once "./profile_partials/__aside.php";
    ?>
    <!-- dashboard -->
    <div class="main-dash-container">
      <!-- header -->
      <?php
      require_once "./profile_partials/__header.php";
      ?>
      <!-- content -->
      <article class="main-content">
        <h1 class="title text-black">Profile</h1>
        <!-- error message -->
        <?php
        require_once "./profile_partials/__save-settings-err-msg.php";
        ?>


        <!-- content container -->
        <div class="content-container">
          <div class="wrapper admin-profile">
            <form class="form" method="post" enctype="multipart/form-data">
              <div class="profile"><img src="<?= ROOT_URL ?>profile-avatar/<?= $user['profile'] ?>"></div>
              <input type="file" name="profile" class="box">
              <input hidden type="text" name="prev_profile" class="box" value="<?= $user['profile'] ?>">
              <input hidden type="text" name="id_number" class="box" value="<?= $user['id'] ?>">
              <button type="submit" class="btn-save blue" name="change-picture">Change Picture</button>
            </form>
          </div>

          <!-- admin details -->
          <?php
          require_once "./profile_partials/__admin-details.php";
          ?>

        </div>
      </article>

      <a href="#" class="btn-go-up"><i class="fas fa-angle-up"></i></a>
      <p class="footer border-top">&copy;CopyRight 2022 | design by AICL Inc.</p>
    </div>


  </main>


  <script src="<?= ROOT_URL ?>js/all.min.js"></script>
  <script defer src="<?= ROOT_URL ?>js/profile_and_search.js"></script>
</body>

</html>