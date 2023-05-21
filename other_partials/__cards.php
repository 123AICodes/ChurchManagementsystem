 <!-- card container -->
 <div class="content-box-wrapper">
   <?php
    $y_total_amt = 0;
    $y_query = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Youth'");
    while ($y_result = mysqli_fetch_array($y_query)) {
      $y_total_amt += $y_result['amount'];
    }
    ?>
   <article class="card">
     <h4 class="text-blue">Youth Ministry</h4>
     <div class="flex">
       <div class="content d-flex">
         <span><i class="fas fa-dollar"></i></span>
         <p><?php echo number_format($y_total_amt, 2) ?></p>
       </div>
       <span class="text-gray"><i class="fas fa-dollar"></i></span>
     </div>
   </article>

   <article class="card">
     <?php
      $w_total_amt = 0;
      $w_query = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Women'");
      while ($w_result = mysqli_fetch_array($w_query)) {
        $w_total_amt += $w_result['amount'];
      }
      ?>
     <h4 class="text-green">Women's Ministry</h4>
     <div class="flex">
       <div class="content d-flex">
         <span><i class="fas fa-dollar"></i></span>
         <p><?php echo number_format($w_total_amt, 2) ?></p>
       </div>
       <span class="text-gray"><i class="fas fa-dollar"></i></span>
     </div>
   </article>

   <article class="card">
     <?php
      $p_total_amt = 0;
      $p_query = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Pemem'");
      while ($p_result = mysqli_fetch_array($p_query)) {
        $p_total_amt += $p_result['amount'];
      }
      ?>
     <h4 class="text-sea-blue">Pemem Finance</h4>
     <div class="flex">
       <div class="content d-flex">
         <span><i class="fas fa-dollar"></i></span>
         <p><?php echo number_format($p_total_amt, 2) ?></p>
       </div>
       <span class="text-gray"><i class="fas fa-dollar"></i></span>
     </div>
   </article>

   <article class="card">
     <?php
      $c_total_amt = 0;
      $c_query = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Children'");
      while ($c_result = mysqli_fetch_array($c_query)) {
        $c_total_amt += $c_result['amount'];
      }
      ?>
     <h4 class="text-yellow">Children's Ministry</h4>
     <div class="flex">
       <div class="content d-flex">
         <span><i class="fas fa-dollar"></i></span>
         <p><?php echo number_format($c_total_amt, 2) ?></p>
       </div>
       <span class="text-gray"><i class="fas fa-dollar"></i></span>
     </div>
   </article>


   <article class="card">
     <?php
      $t_total_amt = 0;
      $t_query = mysqli_query($connection, " SELECT * FROM finance WHERE type='Tithes'");
      while ($t_result = mysqli_fetch_array($t_query)) {
        $t_total_amt += $t_result['amount'];
      }
      ?>
     <h4 class="text-sea-blue">Tithes</h4>
     <div class="flex">
       <div class="content d-flex">
         <span><i class="fas fa-dollar"></i></span>
         <p><?php echo number_format($t_total_amt, 2) ?></p>
       </div>
       <span class="text-gray"><i class="fas fa-dollar"></i></span>
     </div>
   </article>

   <article class="card">
     <?php
      $o_total_amt = 0;
      $o_query = mysqli_query($connection, " SELECT * FROM finance WHERE type='Offering'");
      while ($o_result = mysqli_fetch_array($o_query)) {
        $o_total_amt += $o_result['amount'];
      }
      ?>
     <h4 class="text-yellow">Offering</h4>
     <div class="flex">
       <div class="content d-flex">
         <span><i class="fas fa-dollar"></i></span>
         <p><?php echo number_format($o_total_amt, 2) ?></p>
       </div>
       <span class="text-gray"><i class="fas fa-dollar"></i></span>
     </div>
   </article>

   <article class="card">
     <?php
      $m_total_amt = 0;
      $m_query = mysqli_query($connection, " SELECT * FROM finance WHERE type='Missions'");
      while ($m_result = mysqli_fetch_array($m_query)) {
        $m_total_amt += $m_result['amount'];
      }
      ?>
     <h4 class="text-blue">Missions Offering</h4>
     <div class="flex">
       <div class="content d-flex">
         <span><i class="fas fa-dollar"></i></span>
         <p><?php echo number_format($m_total_amt, 2) ?></p>
       </div>
       <span class="text-gray"><i class="fas fa-dollar"></i></span>
     </div>
   </article>

   <article class="card">
     <?php
      $total = 0;
      $query = mysqli_query($connection, " SELECT * FROM finance");
      while ($result = mysqli_fetch_assoc($query)) {
        $total += $result['amount'];
      }
      ?>
     <h4 class="text-blue">Total Amount</h4>
     <div class="flex">
       <div class="content d-flex">
         <span><i class="fas fa-dollar"></i></span>
         <p><?php echo number_format($total, 2) ?></p>
       </div>
       <span class="text-gray"><i class="fas fa-dollar"></i></span>
     </div>
   </article>

   <button class="load-more-btn">load more</button>

 </div>