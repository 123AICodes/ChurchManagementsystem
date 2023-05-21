<?php if (isset($_SESSION['add-finance'])) : ?>
  <div class="empty-msg-bx error-message error">
    <p>
      <?php
      echo $_SESSION['add-finance'];
      unset($_SESSION['add-finance']);
      ?>
    </p>
    <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
  </div>
<?php elseif (isset($_SESSION['add-finance-success'])) : ?>
  <div class="empty-msg-bx error-message success">
    <p>
      <?php
      echo $_SESSION['add-finance-success'];
      unset($_SESSION['add-finance-success']);
      ?>
    </p>
    <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
  </div>
<?php elseif (isset($_SESSION['edit-finance'])) : ?>
  <div class="empty-msg-bx error-message error">
    <p>
      <?php
      echo $_SESSION['edit-finance'];
      unset($_SESSION['edit-finance']);
      ?>
    </p>
    <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
  </div>
<?php elseif (isset($_SESSION['edit-finance-success'])) : ?>
  <div class="empty-msg-bx error-message success">
    <p>
      <?php
      echo $_SESSION['edit-finance-success'];
      unset($_SESSION['edit-finance-success']);
      ?>
    </p>
    <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
  </div>
<?php elseif (isset($_SESSION['delete-finance'])) : ?>
  <div class="empty-msg-bx error-message error">
    <p>
      <?php
      echo $_SESSION['delete-finance'];
      unset($_SESSION['delete-finance']);
      ?>
    </p>
    <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
  </div>
<?php elseif (isset($_SESSION['delete-finance-success'])) : ?>
  <div class="empty-msg-bx error-message success">
    <p>
      <?php
      echo $_SESSION['delete-finance-success'];
      unset($_SESSION['delete-finance-success']);
      ?>
    </p>
    <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
  </div>
<?php elseif (isset($_SESSION['edit-finance'])) : ?>
  <div class="empty-msg-bx error-message error">
    <p>
      <?php
      echo $_SESSION['edit-finance'];
      unset($_SESSION['edit-finance']);
      ?>
    </p>
    <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
  </div>
<?php elseif (isset($_SESSION['edit-finance-success'])) : ?>
  <div class="empty-msg-bx error-message success">
    <p>
      <?php
      echo $_SESSION['edit-finance-success'];
      unset($_SESSION['edit-finance-success']);
      ?>
    </p>
    <div onclick="this.parentElement.remove()"><i class="fas fa-close"></i></div>
  </div>
<?php endif ?>