<?php if (isset($_SESSION['change-pass'])) : ?>
  <div class="empty-msg-box error">
    <p>
      <?php
      echo $_SESSION['change-pass'];
      unset($_SESSION['change-pass']);
      ?>
    </p>
    <button onclick="this.parentElement.remove()"><i class="fas fa-close"></i></button>
  </div>
<?php elseif (isset($_SESSION['change-pass-success'])) : ?>
  <div class="empty-msg-box success">
    <p>
      <?php
      echo $_SESSION['change-pass-success'];
      unset($_SESSION['change-pass-success']);
      ?>
    </p>
    <button onclick="this.parentElement.remove()"><i class="fas fa-close"></i></button>
  </div>
<?php elseif (isset($_SESSION['save-setting'])) : ?>
  <div class="empty-msg-box error">
    <p>
      <?php
      echo $_SESSION['save-setting'];
      unset($_SESSION['save-setting']);
      ?>
    </p>
    <button onclick="this.parentElement.remove()"><i class="fas fa-close"></i></button>
  </div>
<?php elseif (isset($_SESSION['save-setting-success'])) : ?>
  <div class="empty-msg-box success">
    <p>
      <?php
      echo $_SESSION['save-setting-success'];
      unset($_SESSION['save-setting-success']);
      ?>
    </p>
    <button onclick="this.parentElement.remove()"><i class="fas fa-close"></i></button>
  </div>
<?php elseif (isset($_SESSION['change-picture'])) : ?>
  <div class="empty-msg-box error">
    <p>
      <?php
      echo $_SESSION['change-picture'];
      unset($_SESSION['change-picture']);
      ?>
    </p>
    <button onclick="this.parentElement.remove()"><i class="fas fa-close"></i></button>
  </div>
<?php elseif (isset($_SESSION['change-picture-success'])) : ?>
  <div class="empty-msg-box success">
    <p>
      <?php
      echo $_SESSION['change-picture-success'];
      unset($_SESSION['change-picture-success']);
      ?>
    </p>
    <button onclick="this.parentElement.remove()"><i class="fas fa-close"></i></button>
  </div>
<?php endif ?>