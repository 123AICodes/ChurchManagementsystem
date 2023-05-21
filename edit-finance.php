<?php
#including header
include_once "./partials/header.php";
require_once "./other_partials/__finance-get-user.php";

if (isset($_GET['edit_finance_id_number'])) {
  $finance_id = filter_var($_GET['edit_finance_id_number'], FILTER_SANITIZE_NUMBER_INT);
  $query = " SELECT * FROM finance WHERE id='$finance_id'";
  $query_results = mysqli_query($connection, $query);
  $finance = mysqli_fetch_assoc($query_results);
} else {
  header('location:' . ROOT_URL . 'finance.php');
  die();
}
?>
<!-- dashboard -->
<div class="main-dash-container">

  <!-- main dashboard -->
  <div class="dashboard-container">
    <h1 class="title text-black">Edit Finance</h1>

    <!-- form container -->
    <div class="form-content-container content-box-wrapper" style="display: block;">
      <!-- Edit Finance form -->
      <div class="form-container">
        <form action="<?= ROOT_URL ?>logic/edit-finance-logic.php" method="post" class="form" autocomplete="off">
          <div class="flex">
            <div class="input-box">
              <input hidden type="text" name="id_number" value="<?= $finance['id'] ?>" class="box">
            </div>
          </div>
          <div class="flex">
            <div class="input-box">
              <span>Type</span>
              <input type="text" name="type" value="<?= $finance['type'] ?>" class="box">
            </div>
            <div class="input-box">
              <span>amount</span>
              <input type="number" min="1" name="amount" value="<?= $finance['amount'] ?>" class="box">
            </div>
          </div>
          <div class="flex">
            <div class="input-box">
              <span>received from</span>
              <input type="text" name="received-from" placeholder="name" value="<?= $finance['received_from'] ?>" class="box">
            </div>
            <div class="input-box">
              <span>received by</span>
              <input type="text" name="received-by" value="<?= $finance['received_by'] ?>" class="box">
            </div>
          </div>
          <div class="flex">
            <div class=" input-box">
              <span>expenses</span>
              <input type="number" name="expenses" value="<?= $finance['expenses'] ?>" class="box" min="1">
            </div>
            <div class=" input-box">
              <span>Period</span>
              <input type="text" name="period" value="<?= $finance['period'] ?>" class="box">
            </div>
          </div>
          <button class="submit-btn green" type="submit" name="edit-finance">Edit</button>
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
            <h4 class="text-blue">Recent</h4>
          </button>
          <div class="action">
            <button class="ell-btn">
              <span class="text-gray-500"><i class="fas fa-ellipsis-v"></i></span>
            </button>
            <div class="action-box">
              <button class="action-btn" onclick="window.location.href='<? ROOT_URL ?>finance.php';">View All</button>
              <button class="action-btn" onclick="window.location.href='<? ROOT_URL ?>search-finance.php';">
                <i class="fas fa-search"></i>
                Find
              </button>
              <button class="action-btn border-top close-action-box" onclick="this.parentElement.remove()">close</button>
            </div>
          </div>
        </div>

        <?php
        $sno = 1;
        $query = " SELECT * FROM finance ORDER BY id DESC";
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
            <?php while ($finance = mysqli_fetch_assoc($finance_results)) : ?>
              <tr>
                <td><?= $sno ?></td>
                <td><?= $finance['type'] ?></td>
                <td><?= $finance['received_from'] ?></td>
                <td><?= $finance['received_by'] ?></td>
                <td>ghc<?= $finance['amount'] ?></td>
                <td><?= $finance['date'] ?></td>
                <td>ghc<?= $finance['expenses'] ?></td>
                <td>
                  <?php
                  require_once "./other_partials/__finance-edit-del-btn.php";
                  ?>
                </td>
              </tr>
            <?php
              $sno++;
            endwhile
            ?>
          <?php else : ?>
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