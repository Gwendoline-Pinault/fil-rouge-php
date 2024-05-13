<?php
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