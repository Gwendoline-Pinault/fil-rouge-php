<?php
// Récupération des recettes autorisées
$queryRecipes = 'SELECT * FROM recipes WHERE is_enabled = TRUE';
$recipesStatement = $mysqlClient -> prepare($queryRecipes);
$recipesStatement -> execute();
$recipes = $recipesStatement -> fetchAll();

// Récupération des utilisateurs existants
$queryUsers = 'SELECT * FROM users';
$usersStatement = $mysqlClient -> prepare($queryUsers);
$usersStatement -> execute();
$users = $usersStatement -> fetchAll();

// Récupération du nom de l'utilisateur connecté 

$queryLoggedUser = 'SELECT full_name FROM users WHERE email = :email';
$loggedUserStatement = $mysqlClient -> prepare($queryLoggedUser);
$loggedUserStatement -> execute(['email' => $_SESSION['LOGGED_USER']['email']]);
$loggedUser = $loggedUserStatement -> fetchAll();
$userFullname = $loggedUser[0][0]; // la sortie du fetch donne un tableau de tableau, on récupère uniquement la string du résultat

// Variable de gestion du statut "Connecté"
$isConnected = false;