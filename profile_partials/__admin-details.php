<div class="wrapper admin-details">
  <h1 class="text-blue">User Settings</h1>
  <form method="post" autocomplete="off" class="form">
    <input type="text" name="id_number" hidden placeholder="<?= $user['id'] ?>" class="box">
    <div class="flex">
      <div class="input-box">
        <span>Firstname</span>
        <input type="text" name="firstname" placeholder="<?= $user['firstname'] ?>" class="box">
      </div>
      <div class="input-box">
        <span>Lastname</span>
        <input type="text" name="lastname" placeholder="<?= $user['lastname'] ?>" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="input-box">
        <span>Username</span>
        <input type="text" name="username" placeholder="<?= $user['username'] ?>" class="box">
      </div>
      <div class="input-box">
        <span>Email</span>
        <input type="email" name="email" placeholder="<?= $user['email'] ?>" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="input-box">
        <span>Residence</span>
        <input type="text" name="residence" placeholder="<?= $user['residence'] ?>" class="box">
      </div>
      <div class="input-box">
        <span>Phone</span>
        <input type="number" name="phone" placeholder="<?= $user['phone'] ?>" class="box">
      </div>
    </div>
    <button type="submit" class="btn-save blue" name="save-settings">Save Settings</button>
  </form>

</div>