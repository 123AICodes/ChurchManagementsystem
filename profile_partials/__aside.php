   <!-- aside -->
   <aside>
     <div class="navbar">
       <a href="<?= ROOT_URL ?>index.php" class="brand"><img src="<?= ROOT_URL ?>images/logo.png">
         <p id="brand-pgh">Brand</p>
       </a>
       <div class="navbar-items">
         <a class="menu__item" href="<?= ROOT_URL ?>index.php">
           <span><i class="fas fa-dashboard"></i></span>
           <p>Dashboard</p>
         </a>
         <a class="menu__item" href="<?= ROOT_URL ?>member.php">
           <span><i class="fas fa-user-plus"></i></span>
           <p>Members</p>
         </a>
         <a class="menu__item" href="<?= ROOT_URL ?>views.php">
           <span><i class="fas fa-table"></i></span>
           <p>View</p>
         </a>
         <a class="menu__item" href="<?= ROOT_URL ?>finance.php">
           <span><i class="fas fa-dollar"></i></span>
           <p>Finance</p>
         </a>
         <a class="menu__item" href="<?= ROOT_URL ?>auth/register.php">
           <span><i class="fas fa-user-circle"></i></span>
           <p>Register</p>
         </a>
       </div>
       <div class="toggle-wrapper">
         <button class="toggle open-btn"><span><i class="fas fa-angle-right"></i></span></button>
         <button class="toggle close-btn"><span><i class="fas fa-angle-left"></i></span></button>
       </div>
     </div>
   </aside>