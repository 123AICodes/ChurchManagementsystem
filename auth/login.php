<?php
include_once "partials/header.php";

#preventing data
$username = $_SESSION['login-data']['username'] ?? null;
$password = $_SESSION['login-data']['password'] ?? null;
unset($_SESSION['login-data']);
?>


<main class="lg-main">
  <div class="container lg-container">
    <h5 class="title"> login</h5>
    <!-- error message -->
    <?php if (isset($_SESSION['signup-success'])) : ?>
      <div class="empty-msg-bx success">
        <p>
          <?php
          echo $_SESSION['signup-success'];
          unset($_SESSION['signup-success'])
          ?>
        </p>
        <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
      </div>
    <?php endif ?>
    <?php if (isset($_SESSION['login'])) : ?>
      <div class="empty-msg-bx error">
        <p>
          <?php
          echo $_SESSION['login'];
          unset($_SESSION['login'])
          ?>
        </p>
        <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
      </div>
    <?php endif ?>
    <form action="<?= ROOT_URL ?>auth/login-logic.php" method="post" enctype="multipart/form-data" class="form" autocomplete="off">
      <div class="flex lg-flex">
        <div class="input-box">
          <span>username</span>
          <input type="text" name="username" placeholder="username" class="box" value="<?= $username ?>">
        </div>
        <div class="input-box">
          <span>password</span>
          <div class="p-flex">
            <input type="password" name="password" placeholder="password" class="box password" id="pwd-input" value="<?= $password ?>">
            <div class="p-wrapper">
              <a class="btn-pwd hide-pwd text-gray-500"><i class="fas fa-eye"></i></a>
              <a class="btn-pwd show-pwd text-gray-500"><i class="fas fa-eye-slash"></i></a>
            </div>
          </div>
        </div>
      </div>

      <button class="btn-submit" type="submit" name="login-button">login</button>
      <p class="d-link">don't have an account? <a onclick="window.location.href='<?= ROOT_URL ?>auth/register.php';">sign up here</a></p>
    </form>
  </div>
</main>

<!-- js files -->
<script src="<?= ROOT_URL ?>js/all.min.js"></script>
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