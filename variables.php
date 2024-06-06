<?php
// Récupération des recettes autorisées
$queryRecipes = 'SELECT * FROM recipes WHERE is_enabled = TRUE';

$recipesStatement = $mysqlClient->prepare($queryRecipes);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();



$isConnected = false;