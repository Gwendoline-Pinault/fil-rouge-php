<?php $recipes = [
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
  if (array_key_exists('is_enabled', $recipe)){

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