<?php
$recipes = [
  [
      'title' => 'Cassoulet',
      'recipe' => 'Etape 1 : des flageolets !',
      'author' => 'mickael.andrieu@exemple.com',
      'is_enabled' => true,
  ],
  [
      'title' => 'Couscous',
      'recipe' => 'Etape 1 : de la semoule',
      'author' => 'mickael.andrieu@exemple.com',
      'is_enabled' => false,
  ],
  [
      'title' => 'Escalope milanaise',
      'recipe' => 'Etape 1 : prenez une belle escalope',
      'author' => 'mathieu.nebra@exemple.com',
      'is_enabled' => true,
  ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livre de recettes</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Affichage des recettes</h1>

<!--   <div class="table-of-content">
    <h2>Sommaire</h2>
    <ul>
      <?php for ($lines = 0; $lines <= 3; $lines++) : ?>
        <li>
          <strong><?php echo $recipes[$lines][0] . " - "; ?> </strong>
          <?php echo $recipes[$lines][1]; ?>
        </li>
      <?php endfor; ?>
    </ul>
  </div> 

  <h2>Détail de la recette</h2>
-->

<?php 
// On parcourt le tableau $recipes
foreach ($recipes as $recipe){

  // Je vérifie si la clé 'is_enabled' existe dans l'élément du tableau
  if (array_key_exists('is_enabled', $recipe)) {

    // Si la clé existe et qu'elle vaut 'true', j'affiche les informations de la recette
    if ($recipe['is_enabled']) { ?>
      <h2> <?php echo $recipe['title']; ?> </h2>
      <p> <?php echo $recipe['recipe']; ?> </p>
      <em> <?php echo $recipe['author']; ?> </em>
      <?php 
    }
  } 
}
?>


</body>

</html>