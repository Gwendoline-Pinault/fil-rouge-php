<?php
session_start();
require_once(__DIR__ . '/functions.php');

// Déconnexion de l'utilisateur en supprimant la session
session_destroy();
redirectToUrl('index.php');