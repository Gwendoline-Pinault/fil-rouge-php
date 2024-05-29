<?php
// Utilisateur non connecté : affichage du formulaire de connexion
if (!isset($_SESSION['LOGGED_USER'])) { ?>
  <div class="login">  
    <h2>Connexion</h2>
    
    <form action="submit_login.php" method="POST" class="form">
      <!-- Message d'erreur -->
      <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) { ?>
        <p class="alert" role="alert">
          <?php echo($_SESSION['LOGIN_ERROR_MESSAGE']);
          unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?> 
        </p>
      <?php } ?>
    
      <div class="form-subcontainer">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
      </div>
    
      <div class="form-subcontainer">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
      </div>
    
      <button class="button" type="submit">Valider</button>
    </form>
  </div>
<?php } else { ?>
  <!-- L'utilisateur est connecté -->
    <p class="alert" role="alert">Bonjour <?php echo($_SESSION['LOGGED_USER']['email']); ?> ! </p>
<?php } ?>