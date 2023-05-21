<?php
#including header
include_once "./partials/header.php";
if (isset($_GET['member_id_number'])) {
  $current_member_id = filter_var($_GET['member_id_number'], FILTER_SANITIZE_NUMBER_INT);
  $query = " SELECT * FROM members WHERE id='$current_member_id' ";
  $query_results = mysqli_query($connection, $query);
  $current_member = mysqli_fetch_assoc($query_results);
} else {
  header('location:' . ROOT_URL . 'views.php');
  die();
}

?>

<!-- dashboard -->
<div class="main-dash-container">

  <!-- main dashboard -->
  <div class="dashboard-container">
    <h1 class="title text-black">Edit Member</h1>

    <!-- form container -->
    <div class="form-content-container content-box-wrapper" style="display: block;">
      <!-- member form -->
      <div class="form-container">
        <form action="<?= ROOT_URL ?>logic/edit_member-logic.php" method="post" enctype="multipart/form-data" class="form" autocomplete="off">
          <div class="flex">
            <div class="input-box">
              <span>title</span>
              <select name="title" class="box">
                <option value="Pastor">Pastor</option>
                <option value="Eld">Elder</option>
                <option value="Dcn">Deacon</option>
                <option value="Dcns">Deaconess</option>
                <option value="Eno">Eno</option>
                <option value="Bro">Brother</option>
                <option value="Sis">Sister</option>
                <option value="Kid">Kid</option>
              </select>
            </div>
            <div class="input-box">
              <span>name</span>
              <input type="text" name="name" placeholder="enter name" class="box" value="<?= $current_member['name'] ?>">
            </div>
            <div class="input-box">
              <span>Marital Status</span>
              <select name="marital_status" class="box">
                <option value="Maried">Maried</option>
                <option value="Widow">Widow</option>
                <option value="Bachelor">Bachelor</option>
                <option value="Spinster">Spinster</option>
              </select>
            </div>
          </div>
          <div class="flex">
            <div class="input-box">
              <span>residence</span>
              <input type="text" name="residence" placeholder="residence" class="box" value="<?= $current_member['residence'] ?>">
            </div>
            <div class="input-box">
              <span>group</span>
              <select name="group-name" class="box">
                <option value="Mark">Mark</option>
                <option value="Luke">Luke</option>
                <option value="John">John</option>
                <option value="James">James</option>
                <option value="Matthew">Matthew</option>
                <option value="Children">Children's Ministry</option>
              </select>
            </div>
          </div>
          <div class="flex">
            <div class="input-box">
              <span>email</span>
              <input type="email" name="email" class="box" placeholder="enter email" value="<?= $current_member['email'] ?>">
            </div>
            <div class="input-box">
              <span>phone No.</span>
              <input type="number" name="phone" class="box" minlength="10" maxlength="10" value="<?= $current_member['phone'] ?>">
            </div>
          </div>
          <div class="flex">
            <div class="input-box">
              <span>member type</span>
              <select name="member-type" class="box">
                <option value="Officer">Officer</option>
                <option value="Teenager">Teenager</option>
                <option value="Youth">Youth</option>
                <option value="Aged">Aged</option>
                <option value="Child">Child</option>
                <option value="Adult">Adult</option>
              </select>
            </div>
            <div class="input-box">
              <span>Status</span>
              <select name="status" class="box">
                <option value="Active">Active</option>
                <option value="Normal">Normal</option>
                <option value="InActive">InActive</option>
              </select>
            </div>
            <div class="input-box">
              <span>profile</span>
              <input type="file" name="profile" class="box">
            </div>
          </div>
          <input hidden type="number" name="id_number" class="box" value="<?= $current_member['id'] ?>">
          <input type="text" name="prev_profile" class="box" value="<?= $current_member['profile'] ?>" hidden>
          <button class="submit-btn green" type="submit" name="edit-member-button">update member</button>
        </form>
      </div>
    </div>



    <!-- table current members -->
    <div style="margin-top: 4rem;" class="sub-container">
      <!-- first wrapper -->
      <div class="wrapper">
        <!-- #recently added -->
        <?php
        require_once "./other_partials/__alldata-table.php";
        ?>
      </div>

      <!-- second wrapper -->
      <div class="wrapper">
        <?php
        #recently added youth
        require_once "./other_partials/__recent-youth.php";
        #upcoming events
        require_once "./other_partials/__upcoming-event.php";
        ?>
      </div>

    </div>
    <a href="#" class="btn-tt"><i class="fas fa-angle-up"></i></a>
    <p class="footer border-top">&copy;CopyRight 2022 | design by AICL Inc. </p>
  </div>

</div>


<?php
#including header
include_once "./partials/footer.php";
?>