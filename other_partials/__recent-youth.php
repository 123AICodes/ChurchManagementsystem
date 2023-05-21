   <!-- ellipses dropdown -->
   <div class="ellipse-dropdown">
     <button class="top-btn">
       <h4 class="text-sea-blue">Recent Youth</h4>
     </button>
     <div class="action">
       <button class="ell-btn yth-btn">
         <span class="text-gray-500"><i class="fas fa-ellipsis-v"></i></span>
       </button>
       <div class="action-box yth-bx">
         <button class="action-btn" onclick="window.location.href='<?= ROOT_URL ?>views.php';">view all</button>
         <button class="action-btn" onclick="window.location.href='<?= ROOT_URL ?>member.php';">add youth</button>
         <button class="action-btn border-top close-action-box" onclick="this.parentElement.remove()">close</button>
       </div>
     </div>
   </div>
   <!-- recent youth box -->
   <?php
    $query = " SELECT * FROM members where member_type='Youth' OR member_type='Teenager' ORDER BY id DESC LIMIT 5";
    $query_results = mysqli_query($connection, $query);
    ?>
   <!-- recent youth box -->
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