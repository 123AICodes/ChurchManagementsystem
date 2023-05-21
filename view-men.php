<?php
#including header
include_once "./partials/header.php";
?>

<!-- dashboard -->
<div class="main-dash-container">

  <!-- main dashboard -->
  <div class="dashboard-container">
    <h1 class="title text-black">Men's Data Recorded</h1>

    <!-- form container -->
    <div class="content-box-wrapper" style="display: block;">
      <div class="views-button-container">
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>views.php';">All Data</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-officers.php';">Officers</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-women.php';">Women</button>
        <button class="views-btn active" onclick="window.location.href='<?= ROOT_URL ?>view-men.php';">Men</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-youth.php';">Youth</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-children.php';">Children</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-aged.php';">Aged</button>
      </div>
    </div>



    <!-- table current members -->
    <div style="margin-top: 2rem;" class="sub-container">
      <!-- first wrapper -->
      <div class="wrapper">

        <!-- ellipses dropdown -->
        <div class="ellipse-dropdown el-first">
          <button class="top-btn">
            <h4 class="text-blue">All Men Recorded</h4>
          </button>
          <div class="action">
            <button class="ell-btn">
              <span class="text-gray-500"><i class="fas fa-ellipsis-v"></i></span>
            </button>
            <div class="action-box">
              <button class="action-btn" onclick="window.location.href='<?= ROOT_URL ?>views.php';">View All</button>
              <button class="action-btn" onclick="window.location.href='<?= ROOT_URL ?>reports/men-report.php';">
                <i class="fas fa-download"></i>
                Print Report
              </button>
              <button class="action-btn border-top close-action-box" onclick="this.parentElement.remove()">close</button>
            </div>
          </div>
        </div>
        <?php
        $sno = 1;
        $fetch_members_query = " SELECT * FROM members WHERE title='Eld' OR title='Dcn' OR title='Bro' ORDER BY id DESC";
        $fetch_members_query_results = mysqli_query($connection, $fetch_members_query);
        ?>
        <?php if (mysqli_num_rows($fetch_members_query_results) < 1) : ?>
          <div class="text-left">
            <div class="no-data-found">
              <h5>No data found. Start adding members</h5>
            </div>
            <p>
              Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page and text box designs that complement each other. For example, you can add a matching cover page, header and sidebar.
            </p>
            <p>
              Click Insert, then choose the elements you want from the different galleries. Themes and styles also help to keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.
            </p>
          </div>
        <?php else : ?>
          <!-- number of rows per page -->
          <?php
          require_once "./other_partials/__num_rows-per-page.php";
          ?>

          <!-- table -->
          <table class="recent-table">
            <?php
            require_once "./other_partials/__views-table.php";
            ?>
          </table>

          <!-- pagination number list -->
          <?php
          require_once "./other_partials/__pagination-numbers.php";
          ?>
        <?php endif ?>

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
        <!-- recent children box -->
        <?php
        $query = " SELECT * FROM members where title='Eld' || title='Bro' || title='Dcn' ORDER BY id DESC LIMIT 5";
        $query_results = mysqli_query($connection, $query);
        ?>
        <div class="recently-added-yth">
          <?php while ($member = mysqli_fetch_assoc($query_results)) : ?>
            <a href="<?= ROOT_URL ?>view-men.php" class="youth d-flex">
              <div class="img-round-sm"><img src="<?= ROOT_URL ?>profile-avatar/<?= $member['profile'] ?>"></div>
              <div class="content">
                <h5>
                  <small class="text-gray-500 tt-none"><?= $member['date'] ?></small>
                </h5>
                <p class="text-gray"><?= $member['title'] . ' ' . $member['name'] ?></p>
              </div>
            </a>
          <?php endwhile ?>
        </div>



        <?php
        require_once "./other_partials/__upcoming-event.php";
        ?>
      </div>

    </div>
    <a href="#" class="btn-tt"><i class="fas fa-angle-up"></i></a>
    <p class="footer border-top">&copy;2022 | design by AICL Inc. </p>
  </div>

</div>

<?php
#including footer
include_once "./partials/footer.php";
?>