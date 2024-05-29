<?php
session_start(); // démarre la session pour l'utilisateur qui arrive sur le site.
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livre de recettes</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
// Utilisateur non connecté : affichage du formulaire de connexion
if (!isset($_SESSION['LOGGED_USER'])) { 
  require_once(__DIR__ . '/header.php'); ?>
  
  <section class="flex-center size-full">
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
  </section>
<?php } else { ?>
  <!-- L'utilisateur est connecté -->
    <p class="alert" role="alert">Bonjour <?php echo($_SESSION['LOGGED_USER']['email']); ?> ! </p>
<?php } ?>

</body>
</html>