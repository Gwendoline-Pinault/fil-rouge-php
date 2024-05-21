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
    <h1>Site de recettes</h1>
    <?php
    // Affichage du rendu visuel en fonction des recettes autorisées.
    // rappel : on finit la ligne par ':' à la place des accolades pour écrire du HTML derrière.
    foreach (getRecipes($recipes) as $recipe) : ?>
      <article>
        <h2> <?php echo $recipe['title']; ?> </h2>
        <p> <?php echo $recipe['recipe']; ?> </p>
        <em> <?php echo displayAuthor($recipe['author'], $users); ?> </em>
      </article>
    <?php endforeach; ?>
  </div>

</body>

</html>