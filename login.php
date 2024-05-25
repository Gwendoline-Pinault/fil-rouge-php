<?php
$postData = $_POST;

// Vérification des données du formulaire
if (isset($postData['email']) && isset($postData['password'])) {
  if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
    $alertMessage = "Email incorrect";
  }
  else {
    foreach ($users as $user) {
      if (
        $user['email'] === $postData['email'] &&
        $user['password'] === $postData['password']
      ) {
        $isConnected = true;
        $loggedUser = ['email' => $user['email']];
      }
    }

    if(!isset($loggedUser)) {
      $alertMessage = "Vous n'êtes pas inscrit dans notre base.";
    }
  }
}
if (empty($postData['email']) || empty($postData['password'])) {
  $alertMessage = "Email ou mot de passe manquant";
}


// Utilisateur non connecté : affichage du formulaire de connexion
if (!isset($loggedUser)) { ?>
  <div class="container box">  
    <h2>Connexion</h2>
  
    <?php if (isset($alertMessage)) { ?>
      <p class="alert" role="alert"><?php echo($alertMessage) ?> </p>
    <?php } ?>
    
    <form action="index.php" method="POST" class="form">
    

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
    <p class="alert" role="alert">Bonjour <?php echo($loggedUser['email']); ?> ! </p>
<?php } ?>