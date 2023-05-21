<?php
require_once "./partials/__header.php";
?>
<?php

$sno = 1;
$query = " SELECT * FROM members WHERE member_type='Children' || title='Kid' ORDER BY id DESC";
$results = mysqli_query($connection, $query);
?>
<main>
  <div class="print-container">
    <!-- number of rows per page-->
    <?php
    require_once "./partials/__number-of-rows.php";
    ?>
    <h1 style="text-align: center;">The Church of Pentecost - Ashtown District</h1>
    <h2 style="text-align: center;">Ashtown Central Assembly</h2>
    <h2 style="text-align:center; font-size:1.3rem">All Children's Data</h2>
    <!-- table data -->
    <div class="content-wrapper">
      <table class="recent-table">
        <div class="date">
          <?php
          date_default_timezone_get();
          $date = date('M d, Y - l');
          ?>
          <h4><?php echo $date ?></h4>
        </div>
        <thead>
          <tr style="background: none;">
            <th style="padding: .5rem;border:1px solid var(--black)">No.</th>
            <th style="padding: .5rem;border:1px solid var(--black)">Name</th>
            <th style="padding: .5rem;border:1px solid var(--black)">Residence</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($data = mysqli_fetch_assoc($results)) : ?>
            <tr>
              <td><?= $sno ?></td>
              <td><?= $data['name'] ?></td>
              <td><?= $data['residence'] ?></td>
            </tr>
          <?php
            $sno++;
          endwhile
          ?>
        </tbody>
      </table>
    </div>
    <!-- pagination -->
    <?php
    require_once "./partials/__pagination.php";
    ?>
    <!-- print button -->
    <?php
    require_once "./partials/__print-button.php";
    ?>
  </div>
</main>

<?php
require_once "./partials/__footer.php";
?>