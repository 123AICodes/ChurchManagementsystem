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
    <th style="padding-bottom: .5rem;text-align:center;">Action</th>
  </tr>
</thead>
<tbody>
  <?php
  while ($member = mysqli_fetch_assoc($fetch_members_query_results)) :
    $member_id = $member['id'];
  ?>
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
        <a target="_parent" title="edit" href="<?= ROOT_URL ?>edit-member.php?member_id_number=id<?= $member_id ?>" class="btn-sm edit"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
        <a target="_parent" title="delete" href="<?= ROOT_URL ?>logic/delete-member.php?delete-member_id_number=id<?= $member_id ?>" class="btn-sm delete"><i class="fas fa-trash-alt"></i></a>&nbsp;&nbsp;
      </td>
    </tr>
  <?php
    $sno++;
  endwhile
  ?>
</tbody>