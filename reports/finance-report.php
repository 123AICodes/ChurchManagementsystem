<?php
require_once "./partials/__header.php";
?>
<main>
  <div class="print-container">
    <!-- number of rows per page-->
    <div style="margin-top: 1rem;" class="flex">
      <div class="buttons">
        <a target="_parent" title="Go Back" class="dashboard bk" href="<?= ROOT_URL ?>finance.php">
          <i class="fas fa-arrow-left-long"></i>
        </a>
        <a target="_parent" title="Membership" class="dashboard mbp" href="<?= ROOT_URL ?>reports/officers-report.php">
          <i class="fas fa-users-rectangle"></i>
        </a>
      </div>

      <!-- container -->
      <div class="container">
        <div class="wrap">
          <a href="<?= ROOT_URL ?>reports/weekly-tithes-report.php" class="offering-btn">Weekly Tithes</a>
          <a href="<?= ROOT_URL ?>reports/monthly-tithes-report.php" class="offering-btn">Monthly Tithes</a>
          <a href="<?= ROOT_URL ?>reports/weekly-Offering-report.php" class="offering-btn">Weekly Offering</a>
          <a href="<?= ROOT_URL ?>reports/monthly-offering-report.php" class="offering-btn">Monthly offering</a>
          <a href="<?= ROOT_URL ?>reports/missions-offering-report.php" class="offering-btn">Missions offering</a>
        </div>
        <div class="wrap">
          <a href="<?= ROOT_URL ?>reports/youth-offering-report.php" class="offering-btn">Youth Finance</a>
          <a href="<?= ROOT_URL ?>reports/pemem-offering-report.php" class="offering-btn">Pemem Finance</a>
          <a href="<?= ROOT_URL ?>reports/women-offering-report.php" class="offering-btn">Women Finance</a>
          <a href="<?= ROOT_URL ?>reports/children-offering-report.php" class="offering-btn">Children Finance</a>
          <a href="<?= ROOT_URL ?>reports/evangelism-offering-report.php" class="offering-btn">Evangelism Finance</a>
          <a href="<?= ROOT_URL ?>reports/welfare-offering-report.php" class="offering-btn">Welfare Finance</a>
        </div>
      </div>

      <?php
      $sno = 1;
      $query = " SELECT * FROM finance ORDER BY id DESC";
      $results = mysqli_query($connection, $query);
      ?>
      <?php if (mysqli_num_rows($results) < 11) : ?>
      <?php else : ?>
        <div class="number-of-rows">
          <select id="itemperpage">
            <option value="11">11</option>
            <option value="21">21</option>
            <option value="31">31</option>
            <option value="41">41</option>
            <option value="51">51</option>
          </select>
          <p>Rows</p>
        </div>
      <?php endif ?>
    </div>

    <!-- printing data starts here -->
    <?php if (mysqli_num_rows($results) > 0) : ?>
      <!-- table data -->
      <div class="content-wrapper">
        <h1 style="text-align: center;">The Church of Pentecost - Ashtown District</h1>
        <h2 style="text-align: center;">Ashtown Central Assembly</h2>
        <h2 style="text-align:center; font-size:1.3rem">All Finance Data</h2>
        <table class="recent-table">
          <div class="date">
            <?php
            date_default_timezone_get();
            $date = date('M d, Y - l');
            ?>
            <h4>Date : <?php echo $date ?></h4>
          </div>
          <thead>
            <tr style="background: none;">
              <th style="padding: .5rem;border:1px solid var(--black)">No.</th>
              <th style="padding: .5rem;border:1px solid var(--black)">Type</th>
              <th style="padding: .5rem;border:1px solid var(--black)">Received From</th>
              <th style="padding: .5rem;border:1px solid var(--black)">Received By</th>
              <th style="padding: .5rem;border:1px solid var(--black)">Amount</th>
              <th style="padding: .5rem;border:1px solid var(--black);">Date</th>
              <th style="padding: .5rem;border:1px solid var(--black);text-align:center;">Expenses</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($data = mysqli_fetch_assoc($results)) : ?>
              <tr>
                <?php
                if ($data['type'] == 'Ministry' || $data['ministry'] == "Welfare") {
                  $data['type'] = '-';
                }
                if ($data['expenses'] < 1) {
                  $data['expenses'] = '-';
                }
                ?>
                <td><?= $sno; ?></td>
                <td><?= $data['type'] ?></td>
                <td><?= $data['received_from'] ?></td>
                <td><?= $data['received_by'] ?></td>
                <td><?= $data['amount'] ?></td>
                <td><?= $data['date'] ?></td>
                <td style="text-align: center;"><?= $data['expenses'] ?></td>
              </tr>
            <?php
              $sno++;
            endwhile
            ?>
          </tbody>
        </table>
        <div class="computation">
          <?php
          $total = 0;
          $query = " SELECT * FROM finance";
          $query_results = mysqli_query($connection, $query);
          while ($total_amount = mysqli_fetch_array($query_results)) {
            $total += $total_amount['amount'];
          }
          ?>
          <div class="amount">
            <h3>Total Amount: Ghc&nbsp;<span><?php echo number_format($total, 2) ?></span></h3>
          </div>
          <?php
          $total = 0;
          $query = " SELECT * FROM finance";
          $query_results = mysqli_query($connection, $query);
          while ($total_amount = mysqli_fetch_array($query_results)) {
            $total += $total_amount['expenses'];
          }
          ?>
          <div class="expenses">
            <h3>Total Expenses: Ghc&nbsp;<span><?php echo number_format($total, 2) ?></span></h3>
          </div>
        </div>
      </div>
    <?php else : ?>
      <div class="error-msg">
        <p>No record found</p>
      </div>
    <?php endif ?>
    <!-- pagination -->
    <?php if (mysqli_num_rows($results) < 11) : ?>
    <?php else : ?>
      <div class=" bottom-field">
        <ul class="pagination">
          <li class="prev"><a href="#" id="prev">&#139;</a></li>
          <li class="next"><a href="#" id="next">&#155;</a></li>
        </ul>
      </div>
    <?php endif ?>
    <!-- print button -->
    <?php
    require_once "./partials/__print-button.php";
    ?>

  </div>
</main>

<?php
require_once "./partials/__footer.php";
?>