<article class="card">
  <?php
  $query = " SELECT * FROM members WHERE member_type='Officer'";
  $query_results = mysqli_query($connection, $query);
  $officer_membership = mysqli_num_rows($query_results);
  ?>
  <h4 class="text-blue">Officer's Membership</h4>
  <div class="flex">
    <div class="content d-flex">
      <p><?php echo $officer_membership ?? 0 ?></p>
    </div>
    <span class="text-gray"><i class="fas fa-users-line"></i></span>
  </div>
</article>

<article class="card">
  <?php
  $query = " SELECT * FROM members WHERE member_type='Youth'";
  $query_results = mysqli_query($connection, $query);
  $youth_membership = mysqli_num_rows($query_results);
  ?>
  <h4 class="text-green">Youth Membership</h4>
  <div class="flex">
    <div class="content d-flex">
      <p><?php echo $youth_membership ?? 0 ?></p>
    </div>
    <span class="text-gray"><i class="fas fa-users-between-lines"></i></span>
  </div>
</article>

<article class="card">
  <?php
  $query1 = " SELECT * FROM members WHERE title='Dcns'";
  $query2 = " SELECT * FROM members WHERE title='Sis'";
  $query_results1 = mysqli_query($connection, $query1);
  $query_results2 = mysqli_query($connection, $query2);
  $women_membership1 = mysqli_num_rows($query_results1);
  $women_membership2 = mysqli_num_rows($query_results2);
  $total = $women_membership1 + $women_membership2;
  ?>
  <h4 class="text-sea-blue">Women's Membership - All</h4>
  <div class="flex">
    <div class="content d-flex">
      <p><?php echo $total ?? 0 ?></p>
    </div>
    <span class="text-gray"><i class="fas fa-user-friends"></i></span>
  </div>
</article>

<article class="card">
  <?php
  $query1 = " SELECT * FROM members WHERE title='Eld'";
  $query2 = " SELECT * FROM members WHERE title='Dcn'";
  $query3 = " SELECT * FROM members WHERE title='Bro'";
  $query_results1 = mysqli_query($connection, $query1);
  $query_results2 = mysqli_query($connection, $query2);
  $query_results3 = mysqli_query($connection, $query3);
  $pemem_membership1 = mysqli_num_rows($query_results1);
  $pemem_membership2 = mysqli_num_rows($query_results2);
  $pemem_membership3 = mysqli_num_rows($query_results3);
  $total = $pemem_membership1 + $pemem_membership2 + $pemem_membership3;
  ?>
  <h4 class="text-yellow">Pemem Membership - All</h4>
  <div class="flex">
    <div class="content d-flex">
      <p><?php echo $total ?? 0 ?></p>
    </div>
    <span class="text-gray"><i class="fas fa-users-viewfinder"></i></span>
  </div>
</article>

<article class="card">
  <?php
  $query = " SELECT * FROM members WHERE member_type='Child'";
  $query_results = mysqli_query($connection, $query);
  $children_membership = mysqli_num_rows($query_results);
  ?>
  <h4 class="text-sea-blue">Children's Membership</h4>
  <div class="flex">
    <div class="content d-flex">
      <p><?php echo $children_membership ?? 0 ?></p>
    </div>
    <span class="text-gray"><i class="fas fa-users-rectangle"></i></span>
  </div>
</article>

<article class="card">
  <?php
  $query = " SELECT * FROM members";
  $query_results = mysqli_query($connection, $query);
  $total_membership = mysqli_num_rows($query_results);
  ?>
  <h4 class="text-yellow">Total Membership</h4>
  <div class="flex">
    <div class="content d-flex">
      <p><?php echo $total_membership ?></p>
    </div>
    <span class="text-gray"><i class="fas fa-users"></i></span>
  </div>
</article>

<article class="card">
  <?php
  $query = " SELECT * FROM users";
  $query_results = mysqli_query($connection, $query);
  $count_users = mysqli_num_rows($query_results);
  ?>
  <h4 class="text-blue">System Users</h4>
  <div class="flex">
    <div class="content d-flex">
      <p><?php echo $count_users ?></p>
    </div>
    <span class="text-gray"><i class="fas fa-user"></i></span>
  </div>
</article>

<article class="card">
  <?php
  $expenses = 0;
  $query = " SELECT * FROM finance WHERE ministry='Welfare'";
  $query_results = mysqli_query($connection, $query);
  while ($data = mysqli_fetch_array($query_results)) {
    $total += $data['amount'];
  }
  ?>
  <h4 class="text-green">Welfare</h4>
  <div class="flex">
    <div class="content d-flex">
      <p><i class="fas fa-dollar"></i><?php echo number_format($total, 2) ?></p>
    </div>
    <span class="text-gray"><i class="fas fa-dollar"></i></span>
  </div>
</article>