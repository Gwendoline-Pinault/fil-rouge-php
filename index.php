<!-- Inclusion des variables et fonctions -->
<?php
session_start(); // démarre la session pour l'utilisateur qui arrive sur le site.
require_once(__DIR__ . '\config\mysql.php');
require_once(__DIR__ . '\databaseconnect.php') ;
require_once(__DIR__ . '\variables.php');
require_once(__DIR__ . '\functions.php');
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
    <h1>Site de recettes</h1>

    <!-- Affichage des recettes -->
    <?php 
      foreach (getRecipes($recipes) as $recipe) : ?>
        <article>
          <h2> <?php echo $recipe['title']; ?> </h2>
          <p> <?php echo $recipe['recipe']; ?> </p>
          <em> <?php echo $recipe['author']; ?> </em>
        </article>
      <?php endforeach; 
    ?>
  </div>

</body>
</html>