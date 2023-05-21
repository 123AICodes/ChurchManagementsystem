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

#changing user password
require_once "./logic/change-password-logic.php";

#saving user settings
require_once "./logic/save-user-settings.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" type="type/icon" href="<?= ROOT_URL ?>images/logo.png">
  <title>Settings - Responsive Web Application Using HTML, CSS, JS AND PHP</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="<?= ROOT_URL ?>css/all.min.css">
  <link href="<?= ROOT_URL ?>css/profile_and_search.css" rel="stylesheet">
</head>

<body>

  <main>
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
        <h1 class="title text-black">Settings</h1>
        <!-- error message -->
        <?php
        require_once "./profile_partials/__save-settings-err-msg.php";
        ?>

        <!-- content container -->
        <div class="content-container">
          <div class="wrapper admin-profile change-password">
            <h1 class="text-blue">Change Password</h1>
            <form class="form" method="post" autocomplete="off">
              <div class="p-flex">
                <input type="password" name="password" placeholder="password" class="box password">
                <div class="p-wrapper">
                  <a class="btn-pwd hide-pwd text-gray-500"><i class="fas fa-eye"></i></a>
                  <a class="btn-pwd show-pwd text-gray-500"><i class="fas fa-eye-slash"></i></a>
                </div>
              </div>
              <input hidden type="text" name="id_number" value="<?= $user['id'] ?>" class="box password">
              <button type="submit" class="btn-save blue" name="change-password">Change Password</button>
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
  <script src="<?= ROOT_URL ?>js/profile_and_search.js"></script>
</body>

</html>
<script>
  // show and hide password
  let passwordInput = document.querySelector('.password');
  let showPassword = document.querySelector('.show-pwd');
  let hidePassword = document.querySelector('.hide-pwd');

  showPassword.addEventListener('click', () => {
    if (passwordInput.type == "password") {
      passwordInput.type = "text";
      showPassword.style.display = 'none';
      hidePassword.style.display = 'inline-block';
    }
  })
  hidePassword.addEventListener('click', () => {
    if (passwordInput.type == "text") {
      passwordInput.type = "password";
      hidePassword.style.display = 'none';
      showPassword.style.display = 'inline-block';
    }
  });
</script>