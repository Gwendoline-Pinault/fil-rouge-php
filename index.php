<?php
function console($output)
{
  echo '<script>' . json_encode($output, JSON_HEX_TAG) . '</script>';
}

$users = [
  [
    'full_name' => 'Mickaël Andrieu',
    'email' => 'mickael.andrieu@exemple.com',
    'age' => 34,
  ],
  [
    'full_name' => 'Mathieu Nebra',
    'email' => 'mathieu.nebra@exemple.com',
    'age' => 34,
  ],
  [
    'full_name' => 'Laurène Castor',
    'email' => 'laurene.castor@exemple.com',
    'age' => 28,
  ]
];

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

/**
 * displayAuthor : fonction affichant le nom complet et l'âge de l'utilisateur lorsque c'est un utilisateur de la plateforme.
 */
function displayAuthor(string $authorEmail, array $users): string
{
  foreach ($users as $user) {
    if ($authorEmail === $user['email']) {
      return $user['full_name'] . '(' . $user['age'] . ' ans)';
    }
  }
}

// On définit les fonctions qui vont faire la même chose qu'au-dessus.

/** isValidRecipe : vérifie si la clé 'is_enabled' existe dans le tableau fourni et renvoie le booléen correspondant. */
function isValidRecipe(array $recipe): bool
{
  if (array_key_exists('is_enabled', $recipe)) {
    $isEnabled = $recipe['is_enabled'];
  } else {
    $isEnabled = false;
  }

  return $isEnabled;
}

/** getRecipes : génère un tableau comprenant les recettes autorisées en fonction du tableau fourni en entrée et renvoie le tableau en résultat. */
// On précise le type du paramètre et celui du retour.
function getRecipes(array $recipes): array
{
  $validRecipes = [];

  foreach ($recipes as $recipe) {
    if (isValidRecipe($recipe)) {
      $validRecipes[] = $recipe;
    }
  }

  return $validRecipes;
}

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
  /* // On parcourt le tableau $recipes
foreach ($recipes as $recipe){

  // Je vérifie si la clé 'is_enabled' existe dans l'élément du tableau
  if (array_key_exists('is_enabled', $recipe)){

    // Si la clé existe et qu'elle vaut 'true', j'affiche les informations de la recette
    if ($recipe['is_enabled']) { ?>
      <h2> <?php echo $recipe['title']; ?> </h2>
      <p> <?php echo $recipe['recipe']; ?> </p>
      <em> <?php echo $recipe['author']; ?> </em>
      <?php 
    }
  } 
} */

  // Affichage du rendu visuel en fonction des recettes autorisées.
  // rappel : on finit la ligne par ':' à la place des accolades pour écrire du HTML derrière.
  foreach (getRecipes($recipes) as $recipe) : ?>
    <h2> <?php echo $recipe['title']; ?> </h2>
    <p> <?php echo $recipe['recipe']; ?> </p>
    <em> <?php echo displayAuthor($recipe['author'], $users); ?> </em>
  <?php endforeach; ?>

  <?php

  ?>

  <!-- <div class="box" aria-label="Exemples de manipulations de texte">
  <h2>Tests d'affichage</h2>
  <h3>Les fonctions de manipulation du texte :</h3>
  
  <ul>
    <li>Compter la longueur d'une string</li>
    <?php
    $stringTest = $recipes[1]['recipe'];
    $recipeLength = strlen($stringTest);
    echo 'La phrase suivante comporte ' . $recipeLength . ' caractères : [' . $stringTest . ']';
    ?>
    
    <li>Remplacer du texte</li>
    <?php
    // on dit que qu'on remplace et par quoi. On pourrait chercher un mot à la place.
    echo str_replace('ca', 'Ca', 'le cassoulet, c\'est très bon');
    ?>

    <li>Formater une string</li>
    <?php
    echo sprintf(
      '%s par "%s" : %s',
      $recipe['title'],
      $recipe['author'],
      $recipe['recipe']
    );
    // INFO : [%s] signifie argument chaine de caractère (cf Doc PHP)
    ?>

    <li>La date</li>
    <?php
    $date = date('d/m/Y');
    $time = date('H:i'); // 'H' pour la version 24h et 'h' pour 12h ; 'i' pour minute parce que m est déjà pris par month

    echo "Bonjour, nous sommes le " . $date . " et il est " . $time;
    ?>

  </ul>
</div> -->

</body>

</html>