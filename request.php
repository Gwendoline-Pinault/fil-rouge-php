<?php
require_once(__DIR__ . '/client.php');

// Requêtes SQL
$sqlQuery = 'SELECT * FROM recipes';
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();