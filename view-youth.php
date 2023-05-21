<?php
#including header
include_once "./partials/header.php";
?>
<!-- dashboard -->
<div class="main-dash-container">

  <!-- main dashboard -->
  <div class="dashboard-container">
    <h1 class="title text-black">Youth's Recorded</h1>

    <!-- form container -->
    <div class="content-box-wrapper" style="display: block;">
      <div class="views-button-container">
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>views.php';">all data</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-officers.php';">officers</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-women.php';">Women</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>view-men.php';">Men</button>
        <button class="views-btn active" onclick="window.location.href='<?= ROOT_URL ?>view-youth.php';">Youth</button>
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
            <h4 class="text-blue">Youth Recorded</h4>
          </button>
          <div class="action">
            <button class="ell-btn">
              <span class="text-gray-500"><i class="fas fa-ellipsis-v"></i></span>
            </button>
            <div class="action-box">
              <button class="action-btn" onclick="window.location.href='<?= ROOT_URL ?>views.php';">view all</button>
              <button class="action-btn" onclick="window.location.href='<?= ROOT_URL ?>reports/youth-report.php';">
                <i class="fas fa-download"></i>
                Print Report
              </button>
              <button class="action-btn border-top close-action-box" onclick="this.parentElement.remove()">close</button>
            </div>
          </div>
        </div>

        <?php
        $sno = 1;
        $fetch_members_query = " SELECT * FROM members WHERE member_type='Youth' || member_type='Teenager' ORDER BY id DESC";
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
          <!-- pagination numbers list -->
          <?php
          require_once "./other_partials/__pagination-numbers.php";
          ?>
        <?php endif ?>

      </div>
      <!-- second wrapper -->
      <div class="wrapper">
        <?php
        require_once "./other_partials/__recent-youth.php";
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