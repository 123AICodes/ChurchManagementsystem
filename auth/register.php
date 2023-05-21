<?php
include_once "partials/header.php";
#preventing data
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$password = $_SESSION['signup-data']['password'] ?? null;
$cpassword = $_SESSION['signup-data']['cpassword'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$phone = $_SESSION['signup-data']['phone'] ?? null;
$residence = $_SESSION['signup-data']['residence'] ?? null;

unset($_SESSION['signup-data']);
?>

<main>
  <div class="container">
    <h5 class="title"> sign up</h5>
    <!-- error message -->
    <?php if (isset($_SESSION['signup'])) : ?>
      <div class="empty-msg-bx error">
        <p>
          <?php
          echo $_SESSION['signup'];
          unset($_SESSION['signup'])
          ?>
        </p>
        <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
      </div>
    <?php endif ?>

    <form action="<?= ROOT_URL ?>auth/register-logic.php" method="post" enctype="multipart/form-data" class="form" autocomplete="off">
      <div class="flex">
        <div class="input-box">
          <span>firstname</span>
          <input type="text" name="firstname" placeholder="enter firstname" class="box" value="<?= $firstname ?>">
        </div>
        <div class="input-box">
          <span>lastname</span>
          <input type="text" name="lastname" placeholder="enter lastname" class="box" value="<?= $lastname ?>">
        </div>
      </div>
      <div class="flex">
        <div class="input-box">
          <span>username</span>
          <input type="text" name="username" placeholder="username" class="box" value="<?= $username ?>">
        </div>
      </div>
      <div class="flex">
        <div class="input-box">
          <span>password</span>
          <div class="p-flex">
            <input type="password" name="password" placeholder="password" value="<?= $password ?>" class="box password" id="pwd-input">
            <div class="p-wrapper">
              <a class="btn-pwd hide-pwd text-gray-500"><i class="fas fa-eye"></i></a>
              <a class="btn-pwd show-pwd text-gray-500"><i class="fas fa-eye-slash"></i></a>
            </div>
          </div>
        </div>
        <div class="input-box">
          <span>confirm password</span>
          <div class="p-flex">
            <input type="password" name="cpassword" placeholder="confirm password" value="<?= $cpassword ?>" class="box c-password" id="c-pwd-input">
            <div class="p-wrapper">
              <a class="btn-pwd c-hide-pwd text-gray-500"><i class="fas fa-eye"></i></a>
              <a class="btn-pwd c-show-pwd text-gray-500"><i class="fas fa-eye-slash"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="flex">
        <div class="input-box">
          <span>email</span>
          <input type="email" name="email" class="box" placeholder="enter email" value="<?= $email ?>">
        </div>
        <div class="input-box">
          <span>phone No.</span>
          <input type="number" name="phone" class="box" minlength="10" maxlength="10" value="<?= $phone ?>">
        </div>
      </div>
      <div class="flex">
        <div class="input-box">
          <span>residence</span>
          <input type="text" name="residence" placeholder="enter residence" class="box" value="<?= $residence ?>">
        </div>
        <div class="input-box">
          <span>profile</span>
          <input type="file" name="profile" class="box">
        </div>
      </div>

      <button class=" btn-submit" type="submit" name="register-button">sign up</button>
      <p style="margin-top: -.5rem;" class="d-link">already have an account? <a onclick="window.location.href='<?= ROOT_URL ?>auth/login.php';">login here</a></p>
    </form>
  </div>
</main>

<!-- js files -->
<script src="<?= ROOT_URL ?>js/all.min.js"></script>
</body>

</html>
<script>
  // show and hide password
  let passwordInput = document.querySelector('.password'),
    cpasswordInput = document.querySelector('.c-password');

  let showPassword = document.querySelector('.show-pwd'),
    cshowPassword = document.querySelector('.c-show-pwd');

  let hidePassword = document.querySelector('.hide-pwd'),
    chidePassword = document.querySelector('.c-hide-pwd');

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
  //confirm password
  cshowPassword.addEventListener('click', () => {
    if (cpasswordInput.type == "password") {
      cpasswordInput.type = "text";
      cshowPassword.style.display = 'none';
      chidePassword.style.display = 'inline-block';
    }
  })
  chidePassword.addEventListener('click', () => {
    if (cpasswordInput.type == "text") {
      cpasswordInput.type = "password";
      chidePassword.style.display = 'none';
      cshowPassword.style.display = 'inline-block';
    }
  });
</script>