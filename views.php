<?php
#including header
include_once "./partials/header.php";

?>

<!-- dashboard -->
<div class="main-dash-container">

  <!-- main dashboard -->
  <div class="dashboard-container">
    <h1 class="title text-black">View All Data</h1>
    <!-- error message -->
    <?php if (isset($_SESSION['edit-member'])) : ?>
      <div class="empty-msg-bx error">
        <p>
          <?php
          echo $_SESSION['edit-member'];
          unset($_SESSION['edit-member']);
          ?>
        </p>
        <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
      </div>
    <?php elseif (isset($_SESSION['edit-member-success'])) : ?>
      <div class="empty-msg-bx success">
        <p>
          <?php
          echo $_SESSION['edit-member-success'];
          unset($_SESSION['edit-member-success']);
          ?>
        </p>
        <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
      </div>
    <?php elseif (isset($_SESSION['delete-member'])) : ?>
      <div class="empty-msg-bx error">
        <p>
          <?php
          echo $_SESSION['delete-member'];
          unset($_SESSION['delete-member']);
          ?>
        </p>
        <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
      </div>
    <?php elseif (isset($_SESSION['delete-member-success'])) : ?>
      <div class="empty-msg-bx success">
        <p>
          <?php
          echo $_SESSION['delete-member-success'];
          unset($_SESSION['delete-member-success']);
          ?>
        </p>
        <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
      </div>
    <?php endif ?>
    <!-- form container -->
    <div class="content-box-wrapper" style="display: block;">
      <div class="views-button-container">
        <button class="views-btn active" onclick="window.location.href='<?= ROOT_URL ?>views.php';">All data</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-officers.php';">Officers</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-women.php';">Women</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-men.php';">Men</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-youth.php';">Youth</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-children.php';">Children</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-aged.php';">Aged</button>
      </div>
    </div>



    <!-- table current members -->
    <div style="margin-top: 2rem;" class="sub-container">
      <!-- first wrapper -->
      <div class="wrapper">
        <?php
        require_once "./other_partials/__allmembership-data.php";
        ?>
      </div>

      <!-- second wrapper -->
      <div class="wrapper">

        <!-- ellipses dropdown -->
        <div class="ellipse-dropdown">
          <button class="top-btn">
            <h4 class="text-sea-blue">Recent</h4>
          </button>
          <div class="action">
            <button class="ell-btn yth-btn">
              <span class="text-gray-500"><i class="fas fa-ellipsis-v"></i></span>
            </button>
            <div class="action-box yth-bx">
              <button class="action-btn" onclick="window.location.href='<?= ROOT_URL ?>views.php;">View All</button>
              <button class="action-btn" onclick="window.location.href='<?= ROOT_URL ?>member.php';">Add Member</button>
              <button class="action-btn border-top close-action-box" onclick="this.parentElement.remove()">close</button>
            </div>
          </div>
        </div>
        <!-- recent women box -->
        <?php
        $query = " SELECT * FROM members ORDER BY id DESC LIMIT 5";
        $query_results = mysqli_query($connection, $query);
        ?>
        <div class="recently-added-yth">
          <?php while ($member = mysqli_fetch_assoc($query_results)) : ?>

            <?php if ($member['member_type'] == 'Youth') : ?>
              <a href="<?= ROOT_URL ?>view-youth.php" class="youth d-flex">
                <div class="img-round-sm"><img src="<?= ROOT_URL ?>profile-avatar/<?= $member['profile'] ?>"></div>
                <div class="content">
                  <h5>
                    <small class="text-gray-500 tt-none"><?= $member['date'] ?></small>
                  </h5>
                  <p class="text-gray"><?= $member['title'] . ' ' . $member['name'] ?></p>
                </div>
              </a>
            <?php elseif ($member['title'] == 'Dcns' || $member['title'] == 'Sis') : ?>
              <a href="<?= ROOT_URL ?>view-women.php" class="youth d-flex">
                <div class="img-round-sm"><img src="<?= ROOT_URL ?>profile-avatar/<?= $member['profile'] ?>"></div>
                <div class="content">
                  <h5>
                    <small class="text-gray-500 tt-none"><?= $member['date'] ?></small>
                  </h5>
                  <p class="text-gray"><?= $member['title'] . ' ' . $member['name'] ?></p>
                </div>
              </a>
            <?php elseif ($member['title'] == 'Bro') : ?>
              <a href="<?= ROOT_URL ?>view-men.php" class="youth d-flex">
                <div class="img-round-sm"><img src="<?= ROOT_URL ?>profile-avatar/<?= $member['profile'] ?>"></div>
                <div class="content">
                  <h5>
                    <small class="text-gray-500 tt-none"><?= $member['date'] ?></small>
                  </h5>
                  <p class="text-gray"><?= $member['title'] . ' ' . $member['name'] ?></p>
                </div>
              </a>
            <?php elseif ($member['member_type'] == 'Officer') : ?>
              <a href="<?= ROOT_URL ?>view-officers.php" class="youth d-flex">
                <div class="img-round-sm"><img src="<?= ROOT_URL ?>profile-avatar/<?= $member['profile'] ?>"></div>
                <div class="content">
                  <h5>
                    <small class="text-gray-500 tt-none"><?= $member['date'] ?></small>
                  </h5>
                  <p class="text-gray"><?= $member['title'] . ' ' . $member['name'] ?></p>
                </div>
              </a>
            <?php elseif ($member['member_type'] == 'Child') : ?>
              <a href="<?= ROOT_URL ?>view-children.php" class="youth d-flex">
                <div class="img-round-sm"><img src="<?= ROOT_URL ?>profile-avatar/<?= $member['profile'] ?>"></div>
                <div class="content">
                  <h5>
                    <small class="text-gray-500 tt-none"><?= $member['date'] ?></small>
                  </h5>
                  <p class="text-gray"><?= $member['title'] . ' ' . $member['name'] ?></p>
                </div>
              </a>
            <?php endif ?>

          <?php endwhile ?>
        </div>

        <!-- upcoming events -->
        <?php
        require_once "./other_partials/__upcoming-event.php";
        ?>
      </div>
    </div>

    <a href="#" class="btn-tt"><i class="fas fa-angle-up"></i></a>
    <p class="footer border-top">&copy;CopyRight 2022 | design by AICL Inc. </p>
  </div>

</div>

<?php
#including footer
include_once "./partials/footer.php";
?>