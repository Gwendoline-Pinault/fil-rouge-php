<?php 
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

$postData = $_POST;

// Vérification des données du formulaire
if (isset($postData['email']) && isset($postData['password'])) {
  if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['LOGIN_ERROR_MESSAGE'] = "Email incorrect";
  }
  else {
    foreach ($users as $user) {
      if (
        $user['email'] === $postData['email'] &&
        $user['password'] === $postData['password']
      ) {
        $_SESSION['LOGGED_USER'] = [
          'email' => $user['email'],
          'user_id' => $user['user_id'],
        ];
      }
    }

    if(!isset($_SESSION['LOGGED_USER'])) {
      $_SESSION['LOGIN_ERROR_MESSAGE'] = "Vous n'êtes pas inscrit dans notre base.";
    }
  }
}

redirectToUrl('index.php');