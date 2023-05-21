<thead>
  <tr style="background: none;">
    <th style="padding-bottom: .5rem;">No.</th>
    <th style="padding-bottom: .5rem;">Type</th>
    <th style="padding-bottom: .5rem;">Received from</th>
    <th style="padding-bottom: .5rem;">Received by</th>
    <th style="padding-bottom: .5rem;">Amount</th>
    <th style="padding-bottom: .5rem;">Date</th>
    <th style="padding-bottom: .5rem;">Expensis</th>
    <th style="padding-bottom: .5rem;">Action</th>
  </tr>
</thead>
<tbody>
  <?php while ($finance = mysqli_fetch_assoc($finance_results)) : ?>
    <tr>
      <td><?= $sno ?></td>
      <td><?= $finance['type'] ?></td>
      <td><?= $finance['received_from'] ?></td>
      <td><?= $finance['received_by'] ?></td>
      <td>ghc <?= $finance['amount'] ?></td>
      <td><?= $finance['date'] ?></td>
      <td>ghc <?= $finance['expenses'] ?></td>
      <td>
        <a class="btn-sm edit" href="<?= ROOT_URL ?>edit-finance.php?edit_finance_id_number=<?= $finance['id'] ?>"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
        <a class="btn-sm delete" href="<?= ROOT_URL ?>logic/delete-finance.php?delete_finance_id_number=<?= $finance['id'] ?>"><i class="fas fa-trash-can"></i></a>&nbsp;&nbsp;
      </td>
    </tr>
  <?php
    $sno++;
  endwhile
  ?>