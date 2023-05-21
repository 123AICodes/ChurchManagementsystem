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
     <?php
      while ($search_results = mysqli_fetch_assoc($search_query_results)) : ?>
       <tr>
         <td><?= $sno ?></td>
         <td><?= $search_results['title'] ?? null ?></td>
         <td><?= $search_results['name'] ?? null ?></td>
         <td><?= $search_results['residence'] ?? null ?></td>
         <td><?= $search_results['group_name'] ?? null ?></td>
         <td><?= $search_results['phone'] ?? null ?></td>
         <td>
           <div class="img-round-sm"><img src="<?= ROOT_URL ?>profile-avatar/<?= $search_results['profile'] ?? null ?>"></div>
         </td>
         <?php if ($search_results['status'] === "Active") : ?>
           <td><a href="<?= ROOT_URL ?>page/single-member-profile.php?member_profile_id_number=<?= $search_results['id'] ?>" class="atv-member active" target="_self" title="Active"><i class="fas fa-check-circle"></i></a></td>
         <?php elseif ($search_results['status'] === "Normal") : ?>
           <td><a href="<?= ROOT_URL ?>page/single-member-profile.php?member_profile_id_number=<?= $search_results['id'] ?>" class="atv-member normal" target="_self" title="Normal"><i class="fas fa-exclamation-circle"></i></a></td>
         <?php else : ?>
           <td><a href="<?= ROOT_URL ?>page/single-member-profile.php?member_profile_id_number=<?= $search_results['id'] ?>" class="atv-member inactive" target="_self" title="InActive"><i class="fas fa-circle-xmark"></i></a></td>
         <?php endif ?>
         <td style="display: flex; align-items:center;border:none;justify-content:center;padding-top:1rem;">
           <a href="<?= ROOT_URL ?>edit-member.php?member_id_number=<?= $search_results['id'] ?>" class="btn-sm edit"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
           <a href="<?= ROOT_URL ?>logic/delete-member.php?delete-member_id_number=<?= $search_results['id'] ?>" class="btn-sm delete"><i class="fas fa-trash-alt"></i></a>&nbsp;&nbsp;
         </td>
       </tr>
     <?php
        $sno++;
      endwhile ?>
   </tbody>
 </table>