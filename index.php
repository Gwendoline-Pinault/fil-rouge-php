<?php
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
  [
    'title' => 'Salade Romaine',
    'recipe' => 'Etape 1 : prenez une belle salade',
    'author' => 'lorene.castor@exemple.com',
    'is_enabled' => true,
  ],
];

/**
 * displayAuthor : fonction affichant le nom complet et l'âge de l'utilisateur lorsque c'est un utilisateur de la plateforme.
 */
function displayAuthor(string $authorEmail, array $users): string
{
  foreach ($users as $user) {
    //var_dump($authorEmail);
    if ($authorEmail === $user['email']) {
      return $user['full_name'] . '(' . $user['age'] . ' ans)';
    }
  }
  return 'Auteur inconnu';
}

// On définit les fonctions qui vont faire la même chose qu'au-dessus.

/** isValidRecipe : vérifie si la clé 'is_enabled' existe dans le tableau fourni et renvoie le booléen correspondant. */
function isValidRecipe(array $recipes): bool
{
  return $recipes['is_enabled'];
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
  <!-- Insertion du menu de navigation créé dans un composant à part -->
  <?php require_once(__DIR__ . '/header.php'); ?>

  <h1>Affichage des recettes</h1>

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

</body>

</html>