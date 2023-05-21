<?php
#including header
include_once "./partials/header.php";

#preventing data
$title = $_SESSION['add-member-data']['title'] ?? null;
$name = $_SESSION['add-member-data']['name'] ?? null;
$residence = $_SESSION['add-member-data']['residence'] ?? null;
$group_name = $_SESSION['add-member-data']['group-name'] ?? null;
$email = $_SESSION['add-member-data']['email'] ?? null;
$phone = $_SESSION['add-member-data']['phone'] ?? null;
$member_type = $_SESSION['add-member-data']['member-type'] ?? null;
unset($_SESSION['add-member-data']);

?>

<!-- dashboard -->
<div class="main-dash-container">


  <!-- main dashboard -->
  <div class="dashboard-container">
    <h1 class="title text-black">Add Member</h1>

    <!-- form container -->
    <div class="form-content-container content-box-wrapper" style="display: block;">
      <!-- error message -->
      <?php if (isset($_SESSION['add-member'])) : ?>
        <div class="empty-msg-bx error">
          <p>
            <?php
            echo $_SESSION['add-member'];
            unset($_SESSION['add-member']);
            ?>
          </p>
          <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
        </div>
      <?php elseif (isset($_SESSION['add-member-success'])) : ?>
        <div class="empty-msg-bx success">
          <p>
            <?php
            echo $_SESSION['add-member-success'];
            unset($_SESSION['add-member-success']);
            ?>
          </p>
          <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
        </div>
      <?php endif ?>
      <!-- member form -->
      <div class="form-container">
        <form action="<?= ROOT_URL ?>logic/add-member-logic.php" method="post" enctype="multipart/form-data" class="form" autocomplete="off">
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
              <input type="text" name="name" placeholder="enter name" class="box" value="<?= $name ?>">
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
              <input type="text" name="residence" placeholder="residence" class="box" value="<?= $residence ?>">
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
              <input type="email" name="email" class="box" placeholder="enter email" value="<?= $email ?>">
            </div>
            <div class="input-box">
              <span>phone No.</span>
              <input type="number" name="phone" class="box" minlength="10" maxlength="10" value="<?= $phone ?>">
            </div>
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
          </div>
          <div class="flex">
            <div class="input-box">
              <span>Member Status</span>
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

          <button class="submit-btn green" type="submit" name="add-member-button">Add Member</button>
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
        <!-- ellipses dropdown -->
        <div class="ellipse-dropdown">
          <button class="top-btn">
            <h4 class="text-sea-blue">Recent</h4>
          </button>
          <div class="action">
            <button class="ell-btn yth-btn">
              <span class="text-gray-500"><i class="fas fa-ellipsis-v"></i></span>
            </button>
            <div class="action-box yth-bx">
              <button class="action-btn" onclick="window.location.href='<?= ROOT_URL ?>views.php;">View All</button>
              <button class="action-btn" onclick="window.location.href='<?= ROOT_URL ?>member.php';">Add Member</button>
              <button class="action-btn border-top close-action-box" onclick="this.parentElement.remove()">close</button>
            </div>
          </div>
        </div>
        <!-- recent women box -->
        <?php
        $query = " SELECT * FROM members ORDER BY id DESC LIMIT 5";
        $query_results = mysqli_query($connection, $query);
        ?>
        <div class="recently-added-yth">
          <?php while ($member = mysqli_fetch_assoc($query_results)) : ?>
            <?php if ($member['member_type'] == 'Youth') : ?>
              <a href="<?= ROOT_URL ?>view-youth.php" class="youth d-flex">
                <div class="img-round-sm"><img src="<?= ROOT_URL ?>profile-avatar/<?= $member['profile'] ?>"></div>
                <div class="content">
                  <h5>
                    <small class="text-gray-500 tt-none"><?= $member['date'] ?></small>
                  </h5>
                  <p class="text-gray"><?= $member['title'] . ' ' . $member['name'] ?></p>
                </div>
              </a>
            <?php elseif ($member['title'] == 'Dcns' || $member['title'] == 'Sis') : ?>
              <a href="<?= ROOT_URL ?>view-women.php" class="youth d-flex">
                <div class="img-round-sm"><img src="<?= ROOT_URL ?>profile-avatar/<?= $member['profile'] ?>"></div>
                <div class="content">
                  <h5>
                    <small class="text-gray-500 tt-none"><?= $member['date'] ?></small>
                  </h5>
                  <p class="text-gray"><?= $member['title'] . ' ' . $member['name'] ?></p>
                </div>
              </a>
            <?php elseif ($member['title'] == 'Bro') : ?>
              <a href="<?= ROOT_URL ?>view-men.php" class="youth d-flex">
                <div class="img-round-sm"><img src="<?= ROOT_URL ?>profile-avatar/<?= $member['profile'] ?>"></div>
                <div class="content">
                  <h5>
                    <small class="text-gray-500 tt-none"><?= $member['date'] ?></small>
                  </h5>
                  <p class="text-gray"><?= $member['title'] . ' ' . $member['name'] ?></p>
                </div>
              </a>
            <?php elseif ($member['member_type'] == 'Officer') : ?>
              <a href="<?= ROOT_URL ?>view-officers.php" class="youth d-flex">
                <div class="img-round-sm"><img src="<?= ROOT_URL ?>profile-avatar/<?= $member['profile'] ?>"></div>
                <div class="content">
                  <h5>
                    <small class="text-gray-500 tt-none"><?= $member['date'] ?></small>
                  </h5>
                  <p class="text-gray"><?= $member['title'] . ' ' . $member['name'] ?></p>
                </div>
              </a>
            <?php elseif ($member['member_type'] == 'Child') : ?>
              <a href="<?= ROOT_URL ?>view-children.php" class="youth d-flex">
                <div class="img-round-sm"><img src="<?= ROOT_URL ?>profile-avatar/<?= $member['profile'] ?>"></div>
                <div class="content">
                  <h5>
                    <small class="text-gray-500 tt-none"><?= $member['date'] ?></small>
                  </h5>
                  <p class="text-gray"><?= $member['title'] . ' ' . $member['name'] ?></p>
                </div>
              </a>
            <?php endif ?>
          <?php endwhile ?>
        </div>
        <!-- upcoming events -->
        <?php
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