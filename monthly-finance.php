<?php
#including header
include_once "./partials/header.php";
require_once "./other_partials/__finance-get-user.php";
?>
<!-- dashboard -->
<div class="main-dash-container">

  <!-- main dashboard -->
  <div class="dashboard-container">
    <h1 class="title text-black">Monthly Finances</h1>

    <!-- form container -->
    <div class="form-content-container content-box-wrapper" style="display: block;">
      <div class="views-button-container" style="margin-bottom: 1rem;">
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>finance.php';">All</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>weekly-finance.php';">Weekly</button>
        <button class="views-btn active" onclick="window.location.href='<?= ROOT_URL ?>monthly-finance.php';">Monthly</button>
        <button class="views-btn" onclick="window.location.href='<?= ROOT_URL ?>ministries-finance.php';">Ministries</button>
      </div>
      <!-- error message -->
      <?php
      require_once "./other_partials/__finance-error-msg.php";
      ?>
      <!-- member form -->
      <div class="form-container">
        <form action="<?= ROOT_URL ?>logic/monthly-finance-logic.php" method="post" class="form" autocomplete="off">
          <?php
          require_once "./other_partials/__finance-form.php";
          ?>
        </form>
      </div>
    </div>



    <!-- table current members -->
    <div style="margin-top: 4rem; grid-template-columns: repeat(1, 1fr)" class="sub-container">
      <!-- first wrapper -->
      <div class="wrapper">
        <!-- ellipses dropdown -->
        <div class="ellipse-dropdown el-first">
          <button class="top-btn">
            <h4 class="text-blue">Recently Added</h4>
          </button>
          <div class="action">
            <button class="ell-btn">
              <span class="text-gray-500"><i class="fas fa-ellipsis-v"></i></span>
            </button>
            <div class="action-box">
              <button class="action-btn" onclick="window.location.href='<? ROOT_URL ?>finance.php';">View All</button>
              <button class="action-btn" onclick="window.location.href='<?= ROOT_URL ?>reports/finance-report.php';">
                <i class="fas fa-download"></i>
                Print Report
              </button>
              <button class="action-btn border-top close-action-box" onclick="this.parentElement.remove()">close</button>
            </div>
          </div>
        </div>

        <?php
        $sno = 1;
        $query = " SELECT * FROM finance WHERE period='monthly' ORDER BY id DESC";
        $finance_results = mysqli_query($connection, $query);
        ?>
        <?php if (mysqli_num_rows($finance_results) > 0) : ?>
          <!-- number of rows per page-->
          <?php
          require_once "./other_partials/__finance-num-of-rows-perPage.php";
          ?>
          <!-- table -->
          <table class="recent-table">
            <?php
            require_once "./other_partials/__finance-tbody.php";
            ?>
          <?php else : ?>
            <div class="text-left">
              <div class="no-data-found">
                <h5>No data found. Start adding finances</h5>
              </div>
              <p>
                Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page and text box designs that complement each other. For example, you can add a matching cover page, header and sidebar.
              </p>
              <p>
                Click Insert, then choose the elements you want from the different galleries. Themes and styles also help to keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.
              </p>
            </div>
          <?php endif ?>
          </tbody>
          </table>
          <!-- pagination -->
          <?php
          require_once "./other_partials/__finance-pagination.php";
          ?>
      </div>

    </div>
    <a href="#" class="btn-tt"><i class="fas fa-angle-up"></i></a>
    <p class="footer border-top">&copy;2022 | design by AICL Inc. </p>
  </div>

</div>

<?php
#including header
include_once "./partials/footer.php";
?>