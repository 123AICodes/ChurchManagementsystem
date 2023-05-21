<?php
#including header
include_once "./partials/header.php";
$user_id = filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT);
$query = " SELECT * FROM users WHERE id='$user_id'";
$query_results = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($query_results);

?>

<!-- dashboard -->
<div class="main-dash-container">

  <!-- main dashboard -->
  <div class="dashboard-container">
    <h1 class="title text-black">Edit Ministries Finances</h1>

    <!-- form container -->
    <div class="form-content-container content-box-wrapper" style="display: block;">

      <!-- error message -->
      <?php
      require_once "./other_partials/__finance-error-msg.php";
      ?>
      <?php
      if (isset($_GET['edit_min-finance_id-number'])) {
        $ministry_id = filter_var($_GET['edit_min-finance_id-number'], FILTER_SANITIZE_NUMBER_INT);
        $query = " SELECT * FROM finance WHERE id='$ministry_id'";
        $results = mysqli_query($connection, $query);
        $ministry = mysqli_fetch_assoc($results);
      }
      ?>
      <!-- member form -->
      <div class="form-container">
        <form action="<?= ROOT_URL ?>logic/edit-ministries-finance-logic.php" method="post" enctype="multipart/form-data" class="form" autocomplete="off">
          <div class="flex">
            <div class="input-box">
              <span>Ministries</span>
              <select name="ministry" class="box">
                <option value="Youth">Youth</option>
                <option value="Women">Women</option>
                <option value="Pemem">Pemem</option>
                <option value="Welfare">Welfare</option>
                <option value="Children">Children</option>
                <option value="Evangelism">Evangelism</option>
              </select>
            </div>
            <div class="input-box">
              <span>amount</span>
              <input type="number" min="1" value="<?= $ministry['amount'] ?>" name="amount" class="box">
            </div>
          </div>
          <div class="flex">
            <div class="input-box">
              <span>received from</span>
              <input type="text" name="received-from" value="<?= $ministry['received_from'] ?>" placeholder="name" class="box">
            </div>
            <div class="input-box">
              <span>received by</span>
              <input type="text" name="received-by" placeholder="name" value="<?= $ministry['received_by'] ?>" class="box">
            </div>
          </div>
          <div class="flex">
            <div class=" input-box">
              <span>expenses</span>
              <input type="number" name="expenses" value="<?= $ministry['expenses'] ?>" class="box" min="1">
            </div>
            <div style="display: none;" class=" input-box">
              <span>id</span>
              <input hidden type="text" value="<?= $ministry['id'] ?>" name="id_number" class="box">
            </div>
          </div>
          <button class=" submit-btn green" type="submit" name="edit-finance">Edit Record</button>
        </form>
      </div>
    </div>



    <!-- table current members -->
    <div style="margin-top: 4rem; grid-template-columns: repeat(1, 1fr)" class="sub-container">
      <!-- first wrapper -->
      <div class="wrapper">

        <!-- ellipses dropdown -->
        <div class="ellipse-dropdown el-first" style="width: 100%;">
          <button class="top-btn">
            <h4 class="text-blue">Recently Added</h4>
          </button>
          <div class="action">
            <button class="ell-btn">
              <span class="text-gray-500"><i class="fas fa-ellipsis-v"></i></span>
            </button>
            <div class="action-box">
              <button class="action-btn" onclick="window.location.href='finance.php';">View All</button>
              <button class="action-btn border-top close-action-box" onclick="this.parentElement.remove()">close</button>
            </div>
          </div>
        </div>

        <?php
        $sno = 1;
        $ministries = ['Youth', 'Pemem', 'Women', 'Children', 'Evangelism', 'Welfare'];
        $youth = $ministries[0];
        $pemem = $ministries[1];
        $women = $ministries[2];
        $children = $ministries[3];
        $evangelism = $ministries[4];
        $welfare = $ministries[4];
        $query = " SELECT * FROM finance WHERE ministry='$youth' || ministry='$pemem' || ministry='$women' || ministry='$children' || ministry='$evangelism' || ministry='$welfare' ORDER BY id DESC";
        $finance_results = mysqli_query($connection, $query);
        ?>
        <?php if (mysqli_num_rows($finance_results) > 0) : ?>
          <!-- number of rows per page-->
          <?php
          require_once "./other_partials/__finance-num-of-rows-perPage.php";
          ?>

          <!-- table -->
          <table class="recent-table">
            <thead>
              <tr style="background: none;">
                <th style="padding-bottom: .5rem;">No.</th>
                <th style="padding-bottom: .5rem;">Minstry</th>
                <th style="padding-bottom: .5rem;">Received from</th>
                <th style="padding-bottom: .5rem;">Received by</th>
                <th style="padding-bottom: .5rem;">Amount</th>
                <th style="padding-bottom: .5rem;">Date</th>
                <th style="padding-bottom: .5rem;">Expensis</th>
                <th style="padding-bottom: .5rem;">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($finance = mysqli_fetch_assoc($finance_results)) : ?>
                <tr>
                  <td><?= $sno ?></td>
                  <td><?= $finance['ministry'] . ' Minstry' ?></td>
                  <td><?= $finance['received_from'] ?></td>
                  <td><?= $finance['received_by'] ?></td>
                  <td>ghc <?= $finance['amount'] ?></td>
                  <td><?= $finance['date'] ?></td>
                  <td>ghc <?= $finance['expenses'] ?></td>
                  <td>
                    <a href="<?= ROOT_URL ?>edit-min-finance.php?edit_min-finance_id-number=<?= $finance['id'] ?>" class="btn-sm edit"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                    <a href="<?= ROOT_URL ?>delete-min-finance.php?delete_min-finance_id-number=<?= $finance['id'] ?>" class="btn-sm delete"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
              <?php
                $sno++;
              endwhile
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