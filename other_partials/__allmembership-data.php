       <!-- ellipses dropdown -->
       <div class="ellipse-dropdown el-first">
         <button class="top-btn">
           <h4 class="text-blue">All Membership Data</h4>
         </button>
         <div class="action">
           <button class="ell-btn">
             <span class="text-gray-500"><i class="fas fa-ellipsis-v"></i></span>
           </button>
           <div class="action-box">
             <button class="action-btn" onclick="window.location.href='<?= ROOT_URL ?>views.php';">View All</button>
             <button class="action-btn" onclick="window.location.href='<?= ROOT_URL ?>member.php';">Add Member</button>
             <button class="action-btn border-top close-action-box" onclick="this.parentElement.remove()">close</button>
           </div>
         </div>
       </div>
       <!-- data begins -->
       <?php
        $sno = 1;
        $fetch_members_query = " SELECT * FROM members ORDER BY id DESC";
        $fetch_members_query_results = mysqli_query($connection, $fetch_members_query);
        ?>
       <?php if (mysqli_num_rows($fetch_members_query_results) < 1) : ?>
         <div class="text-left">
           <div class="no-data-found">
             <h5>No data found. Start adding members</h5>
           </div>
           <p>
             Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page and text box designs that complement each other. For example, you can add a matching cover page, header and sidebar.
           </p>
           <p>
             Click Insert, then choose the elements you want from the different galleries. Themes and styles also help to keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.
           </p>
         </div>
       <?php else : ?>
         <!-- number of rows per page -->
         <?php
          require_once "__num_rows-per-page.php";
          ?>
         <!-- table -->
         <table class="recent-table">
           <thead>
             <tr style="background: none;">
               <th style="padding-bottom: .5rem;">No.</th>
               <th style="padding-bottom: .5rem;">Title</th>
               <th style="padding-bottom: .5rem;">Name</th>
               <th style="padding-bottom: .5rem;">Residence</th>
               <th style="padding-bottom: .5rem;">Group</th>
               <th style="padding-bottom: .5rem;">Phone</th>
               <th style="padding-bottom: .5rem;">Profile</th>
               <th style="padding-bottom: .5rem;">Status</th>
               <th style="padding-bottom: .5rem;">Action</th>
             </tr>
           </thead>
           <tbody>
             <?php while ($member = mysqli_fetch_assoc($fetch_members_query_results)) : ?>
               <tr>
                 <td><?= $sno ?></td>
                 <td><?= $member['title'] ?></td>
                 <td><?= $member['name'] ?></td>
                 <td><?= $member['residence'] ?></td>
                 <td><?= $member['group_name'] ?></td>
                 <td><?= $member['phone'] ?></td>
                 <td>
                   <div class="img-round-sm"><img src="<?= ROOT_URL ?>profile-avatar/<?= $member['profile'] ?>"></div>
                 </td>
                 <?php if ($member['status'] === "Active") : ?>
                   <td><a href="<?= ROOT_URL ?>page/single-member-profile.php?member_profile_id_number=<?= $member['id'] ?>" class="atv-member active" target="_self" title="Active"><i class="fas fa-check-circle"></i></a></td>
                 <?php elseif ($member['status'] === "Normal") : ?>
                   <td><a href="<?= ROOT_URL ?>page/single-member-profile.php?member_profile_id_number=<?= $member['id'] ?>" class="atv-member normal" target="_self" title="Normal"><i class="fas fa-exclamation-circle"></i></a></td>
                 <?php else : ?>
                   <td><a href="<?= ROOT_URL ?>page/single-member-profile.php?member_profile_id_number=<?= $member['id'] ?>" class="atv-member inactive" target="_self" title="InActive"><i class="fas fa-circle-xmark"></i></a></td>
                 <?php endif ?>
                 <td style="display: flex; align-items:center;border:none;justify-content:center;padding-top:1rem;">
                   <a href="<?= ROOT_URL ?>edit-member.php?member_id_number=<?= $member['id'] ?>" class="btn-sm edit"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                   <a href="<?= ROOT_URL ?>logic/delete-member.php?delete-member_id_number=<?= $member['id'] ?>" class="btn-sm delete"><i class="fas fa-trash-alt"></i></a>&nbsp;&nbsp;
                 </td>
               </tr>
             <?php
                $sno++;
              endwhile
              ?>
           </tbody>
         </table>
         <!-- pagination numbers list -->
         <?php
          require_once "__pagination-numbers.php";
          ?>
       <?php endif ?>