<?php
require_once "partials/__header.php";
?>

<?php
$sno = 1;
$query = " SELECT * FROM members WHERE title='Bro' || title='Dcn' || title='Eld' ORDER BY title ASC";
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
    <h2 style="text-align:center; font-size:1.3rem">All Men Data</h2>
    <!-- table data -->
    <?php
    require_once "./partials/__print-data.php";
    ?>
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
require_once "partials/__footer.php";
?>