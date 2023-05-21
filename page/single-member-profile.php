<?php
#including connection
require_once "../config/database.php";
// #access control and fetching current user
if (!isset($_SESSION['user_id'])) {
  header('location: ' . ROOT_URL . 'auth/login.php');
  die();
} elseif (isset($_SESSION['user_id'])) {
  $id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $query = " SELECT * FROM users WHERE id=$id";
  $results = mysqli_query($connection, $query);
  $user = mysqli_fetch_assoc($results);
}

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
  <link rel="stylesheet" href="<?= ROOT_URL ?>page/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="<?= ROOT_URL ?>page/css/single-profile.css" type="text/css">

</head>

<body>

  <header class="header">
    <!-- humberger menu -->
    <div class="humberger-menu">
      <!-- <button class="humberger open-menu-btn"><span><i class="fas fa-bars"></i></span></button>
        <button class="humberger close-menu-btn"><span><i class="fas fa-close"></i></span></button> -->
    </div>
    <!-- search form -->
    <div class="form-control-box">
      <form action="<?= ROOT_URL ?>search.php" method="get" autocomplete="off" class="form">
        <input type="text" name="search" placeholder="search here..." class="input-box s-box" style="border: 1px solid var(--gray);">
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
          <div class="alert-content notify-container">
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
          <div class="alert-content message-container">
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
          <p class="text-gray"><?= $user['firstname'] . ' ' . $user['lastname'] ?></p> &nbsp; &nbsp;
          <button class="img-round-sm account-btn"><img src="<?= ROOT_URL ?>profile-avatar/<?= $user['profile'] ?>"></button>
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
          <a onclick="window.location.href='<?= ROOT_URL ?>index.php';" class="text-black">
            <span class="text-gray"><i class="fas fa-dashboard"></i></span>
            &nbsp;Dashboard
          </a>
          <a onclick="window.location.href='<?= ROOT_URL ?>logout.php'" class="border-top text-black">
            <span class="text-gray"><i class="fas fa-sign-out"></i></span>
            &nbsp; Logout
          </a>
        </div>
      </div>
    </div>
  </header>

  <div class="previous-page">
    <a href="<?= ROOT_URL ?>views.php" target="_self" title="go back to previous page" class="previous-btn"><i class="fas fa-arrow-left-long"></i></a>
  </div>
  <section class="single-member-profile-container">
    <?php
    if (isset($_GET['member_profile_id_number'])) {
      $member_id = filter_var($_GET['member_profile_id_number'], FILTER_SANITIZE_NUMBER_INT);
      $query = " SELECT * FROM members WHERE id='$member_id'";
      $results = mysqli_query($connection, $query);
      $member = mysqli_fetch_assoc($results);

      if ($member['title'] === "Eld") {
        $member['title'] = "Elder";
      } elseif ($member['title'] === "Dcn") {
        $member['title'] = "Deacon";
      } elseif ($member['title'] === "Dcns") {
        $member['title'] = "Deaconess";
      } elseif ($member['title'] === "Bro") {
        $member['title'] = "Brother";
      } elseif ($member['title'] === "Sis") {
        $member['title'] = "Sister";
      } elseif ($member['title'] === "Kid") {
        $member['title'] = "-";
      }
    }
    ?>
    <h1 class="name">Member Profile</h1>
    <div class="member-profile-wrapper">
      <article style="height: 22rem;">
        <div style="height: 22rem;" class="member-avatar"><img src="<?= ROOT_URL ?>profile-avatar/<?= $member['profile'] ?>"></div>
      </article>
      <article>
        <h4><span></span>Member Info</h4>
        <div class="details">
          <?php if ($member['email'] === "someone@gmail.com" || $member['title'] === "Kid") : ?>
          <?php else : ?>
            <button><span></span>Title: &emsp;&emsp;&emsp;&emsp;<b><?= $member['title'] ?></b>
              <small><i class="fas fa-check-circle"></i></small>
            </button>
          <?php endif ?>
          <button><span></span> Name: &nbsp;&emsp;&emsp;&emsp;<b><?= $member['name'] ?></b>
            <small><i class="fas fa-check-circle"></i></small>
          </button>
          <button><span></span>Marital Status:&nbsp;<b><?= $member['marital_status'] ?></b>
            <small><i class="fas fa-check-circle"></i></small>
          </button>
          <button><span></span>Residence: &nbsp;&emsp;<b><?= $member['residence'] ?></b>
            <small><i class="fas fa-check-circle"></i></small>
          </button>
          <?php if ($member['email'] === "someone@gmail.com" || $member['email'] === "" || $member['title'] === "Kid") : ?>
          <?php else : ?>
            <button><span></span>Group Name: &nbsp;<b><?= $member['group_name'] ?></b>
              <small><i class="fas fa-check-circle"></i></small>
            </button>
            <button><span></span>Email Address: <b><?= $member['email'] ?></b>
              <small><i class="fas fa-check-circle"></i></small>
            </button>
            <button><span></span>Phone Number: <b><?= $member['phone'] ?></b>
              <small><i class="fas fa-check-circle"></i></small>
            </button>
          <?php endif ?>
          <button><span></span>Member Type: &nbsp;<b><?= $member['member_type'] ?></b>
            <small><i class="fas fa-check-circle"></i></small>
          </button>
          <?php if ($member['status'] === "Active") : ?>
            <button class="active"><span></span>Member Status: <b><?= $member['status'] ?></b>
              <small><i class="fas fa-check-circle"></i></small>
            </button>
          <?php elseif ($member['status'] == "Normal") : ?>
            <button class="normal"><span></span>Member Status: <b><?= $member['status'] ?></b>
              <small><i class="fas fa-exclamation-circle"></i></small>
            </button>
          <?php else : ?>
            <button class="inactive"><span></span>Member Status: <b><?= $member['status'] ?></b>
              <small><i class="fas fa-xmark-circle"></i></small>
            </button>
          <?php endif ?>
        </div>
      </article>
    </div>
  </section>

  <footer>
    <p>&copy;CopyRight 2022 | design by AICL</p>
  </footer>


  <script src="<?= ROOT_URL ?>js/all.min.js"></script>
  <script src="<?= ROOT_URL ?>js/search.js"></script>
  <script src="<?= ROOT_URL ?>js/pagination.js"></script>
</body>

</html>