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