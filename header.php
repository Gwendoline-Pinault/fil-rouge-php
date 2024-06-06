<!-- Menu de navigation type en PHP placé dans un composant à part -->
<nav id="menu">
  <div class="flex-row">
    <p>Site de recettes</p>
    <ul class="navbar">
      <li class="nav-item">
        <a href="index.php" aria-current="page" class="link">Home</a>
      </li>
      <li class="nav-item">
        <a href="contact.php" class="link">Contact</a>
      </li>
    </ul>
  </div>

  <div class="flex-row">
    <?php if(isset($_SESSION['LOGGED_USER'])) { ?>
      <p class="nav-item"><?php echo($userFullname) ?></p>
      <a class="button" href="logout.php">Déconnexion</a>
    <?php } else { ?>
      <a class="button" href="login.php">Connexion</a>
    <?php }?>
  </div>
</nav>