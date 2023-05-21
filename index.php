<?php
#including header
include_once "./partials/header.php";
?>

<!-- main dashboard -->
<div class="dashboard-container">
  <h1 class="title text-black">Dashboard</h1>

  <?php
  require_once "./other_partials/__cards.php";
  ?>

  <!-- table current members -->
  <div class="sub-container">
    <!-- first wrapper -->
    <div class="wrapper">
      <!-- #recently added -->
      <?php
      require_once "./other_partials/__alldata-table.php";
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
      <!-- recent member data box -->
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

      <!-- #upcoming events -->
      <?php
      require_once "./other_partials/__upcoming-event.php";
      ?>
    </div>

  </div>
  <a href="#" class="btn-tt"><i class="fas fa-angle-up"></i></a>
  <p class="footer border-top">&copy;Copyright 2022 | design by AICL Inc. </p>
</div>

<?php
#including header
include_once "./partials/footer.php";
?>