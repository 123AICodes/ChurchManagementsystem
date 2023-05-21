<?php
#including connection
require_once "config/database.php";
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

#fetching user profile picture

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?= ROOT_URL ?>images/logo.png" type="image/icon">
  <title>Responsive Web Application Using HTML, CSS, JS AND PHP</title>

  <!-- css files -->
  <link rel="stylesheet" href="<?= ROOT_URL ?>css/all.min.css" type="text/css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css" type="text/css">

</head>

<body>

  <main>
    <!-- aside navbar -->
    <aside>
      <div class="navbar">
        <a href="<?= ROOT_URL ?>index.php" class="brand"><img src="<?= ROOT_URL ?>images/logo.png">
          <p id="brand-pgh">Brand</p>
        </a>
        <div class="navbar-items">
          <a class="menu__item" href="<?= ROOT_URL ?>index.php">
            <span><i class="fas fa-dashboard"></i></span>
            <p>Dashboard</p>
          </a>
          <a class="menu__item" href="<?= ROOT_URL ?>member.php">
            <span><i class="fas fa-user-plus"></i></span>
            <p>Members</p>
          </a>
          <a class="menu__item" href="<?= ROOT_URL ?>views.php">
            <span><i class="fas fa-table"></i></span>
            <p>View</p>
          </a>
          <a class="menu__item" href="<?= ROOT_URL ?>finance.php">
            <span><i class="fas fa-dollar"></i></span>
            <p>Finance</p>
          </a>
          <a class="menu__item" href="<?= ROOT_URL ?>auth/register.php">
            <span><i class="fas fa-user-circle"></i></span>
            <p>Register</p>
          </a>
        </div>
        <div class="toggle-wrapper">
          <button class="toggle open-btn"><span><i class="fas fa-angle-right"></i></span></button>
          <button class="toggle close-btn"><span><i class="fas fa-angle-left"></i></span></button>
        </div>
      </div>
    </aside>

    <!-- dashboard -->
    <div class="main-dash-container">
      <!-- header -->
      <header class="header">
        <!-- humberger menu -->
        <div class="humberger-menu">
          <button class="humberger open-menu-btn"><span><i class="fas fa-bars"></i></span></button>
          <button class="humberger close-menu-btn"><span><i class="fas fa-close"></i></span></button>
        </div>
        <!-- search -->
        <div class="form-control-box">
          <form action="<?= ROOT_URL ?>search.php" method="get" autocomplete="off" class="form">
            <input type="text" name="search" placeholder="search here..." class="input-box s-box">
            <button class="btn-search saerch-lg-btn" name="search-button"><span><i class="fas fa-search"></i></span></button>
          </form>
        </div>
        <button class="btn-search small-screen-search-toggle-btn"><span><i class="fas fa-search"></i></span></button>
        <!-- notifications and account container -->
        <div class="notify-and-account-container">
          <!-- notifications and messages -->
          <div class="nofitification-and-messages-box">
            <!-- notifications -->
            <div class="wrapper">
              <button class="icon-btn notify-btn">
                <span class="text-gray-500"><i class="fas fa-bell"></i></span>
                <small class="text-white">3+</small>
              </button>
              <!-- alert content -->
              <div class="alert-content notify">
                <h4 class="text-white blue">Alert Center</h4>
                <button class="alert">
                  <div class="text-white icon-round blue"><i class="fas fa-file-alt"></i></div>
                  <span>
                    <small class="text-gray-500">december 5, 2021</small>
                    <p class="text-gray">A new montly report is ready to download</p>
                  </span>
                </button>
                <button class="alert">
                  <div class="text-white icon-round green"><i class="fas fa-donate"></i></div>
                  <span>
                    <small class="text-gray-500">december 7, 2021</small>
                    <p class="text-gray">$ 20,250 has been deposited in your account</p>
                  </span>
                </button>
                <button class="alert">
                  <div class="text-white icon-round"><i class="fas fa-exclamation-triangle"></i></div>
                  <span>
                    <small class="text-gray-500">January 15, 2022</small>
                    <p class="text-gray">Suspendind alert. Your account is suspended</p>
                  </span>
                </button>
                <button class="show-all border-top">show all notifications</button>
              </div>
            </div>
            <!-- messages -->
            <div class="wrapper">
              <button class="icon-btn message-btn">
                <span class="text-gray-500"><i class="fas fa-envelope"></i></span>
                <small class="text-white">5</small>
              </button>
              <!-- messages -->
              <!-- alert content -->
              <div class="alert-content message-ct">
                <h4 class="text-white blue">Messages Center</h4>
                <button class="alert">
                  <div class="img-round-sm"><img src="<?= ROOT_URL ?>images/tm1.jpg"></div>
                  <span>
                    <h5>Hello there! Greetings from our...</h5>
                    <p class="text-gray">Christian Appiah</p>
                  </span>
                </button>
                <button class="alert">
                  <div class="img-round-sm"><img src="<?= ROOT_URL ?>images/tm2.jpg"></div>
                  <span>
                    <h5>Hello there! Greetings from our...</h5>
                    <p class="text-gray">Sandra Adom</p>
                  </span>
                </button>
                <button class="alert">
                  <div class="img-round-sm"><img src="<?= ROOT_URL ?>images/tm3.jpg"></div>
                  <span>
                    <h5>Hello there! Greetings from our...</h5>
                    <p class="text-gray">Freda Appiah</p>
                  </span>
                </button>
                <button class="alert">
                  <div class="img-round-sm"><img src="<?= ROOT_URL ?>images/tm5.jpg"></div>
                  <span>
                    <h5>Hello there! Greetings from our...</h5>
                    <p class="text-gray">Grace Nyamekye</p>
                  </span>
                </button>
                <button class="alert">
                  <div class="img-round-sm"><img src="<?= ROOT_URL ?>images/tm6.jpg"></div>
                  <span>
                    <h5>Hello there! Greetings from our...</h5>
                    <p class="text-gray">Stephen Adams</p>
                  </span>
                </button>
                <button class="show-all border-top">show all messages</button>
              </div>
            </div>
          </div>
          <!-- account box -->
          <div class="admin-account-box">
            <div class="account">
              <p class="text-gray"><?= $user['firstname'] . ' ' . $user['lastname'] ?? 'Admin' ?></p> &nbsp; &nbsp;
              <button class="img-round-sm account-btn"><img src="<?= ROOT_URL ?>profile-avatar/<?= $user['profile'] ?? '/images/tm1.jpg' ?>"></button>
            </div>
            <div class="dropdown">
              <a onclick="window.location.href='<?= ROOT_URL ?>profile.php';" class="text-black">
                <span class="text-gray"><i class="fas fa-user"></i></span>
                &nbsp; Profile
              </a>
              <a onclick="window.location.href='<?= ROOT_URL ?>settings.php';" class="text-black">
                <span class="text-gray"><i class="fas fa-cogs"></i></span>
                &nbsp; Settings
              </a>
              <a onclick="window.location.href='<?= ROOT_URL ?>membership.php';" class="text-black">
                <span class="text-gray"><i class="fas fa-users"></i></span>
                &nbsp;Membership
              </a>
              <a onclick="window.location.href='<?= ROOT_URL ?>logout.php'" class="border-top text-black">
                <span class="text-gray"><i class="fas fa-sign-out"></i></span>
                &nbsp; Logout
              </a>
            </div>
          </div>

        </div>

      </header>