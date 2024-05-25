<?php
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
  <!-- Insertion du menu de navigation créé dans un composant à part -->
  <?php require_once(__DIR__ . '/header.php'); ?>

  <div class="container">
    <?php 
    if ($isConnected === false) {
      require_once(__DIR__ . '/login.php'); 
    }
    ?>

    <!-- Si l'utilisateur est connecté, on affiche les recettes : -->
    <?php if ($isConnected){ ?>
      <?php require_once(__DIR__ . '/recettes.php');
    } ?>
  </div>

</body>

</html>