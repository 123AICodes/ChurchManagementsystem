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
  <a href="<?= ROOT_URL ?>view-officer.php" class="youth d-flex">
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