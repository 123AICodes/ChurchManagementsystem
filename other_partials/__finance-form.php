<div class="flex">
  <div class="input-box">
    <span>Type</span>
    <select name="type" class="box">
      <option value="Tithes">Tithes</option>
      <option value="Offering">Offering</option>
      <option value="Missions">Missions Offering</option>
    </select>
  </div>
  <div class="input-box">
    <span>amount</span>
    <input type="number" min="1" name="amount" value="<?= $amount ?>" class="box">
  </div>
</div>
<div class="flex">
  <div class="input-box">
    <span>received from</span>
    <input type="text" name="received-from" placeholder="name" value="<?= $received_from ?>" class="box">
  </div>
  <div class="input-box">
    <span>received by</span>
    <input type="text" name="received-by" value="<?= $user['firstname'] . ' ' . $user['lastname'] ?>" class="box">
  </div>
</div>
<div class="flex">
  <div class=" input-box">
    <span>expenses</span>
    <input type="number" name="expenses" value="<?= $expenses ?>" class="box" min="1">
  </div>
</div>
<button class="submit-btn green" type="submit" name="add-finance">Save Record</button>