<?php
    $postData = $_POST;

    if (
        !isset($postData['email']) 
        || !isset($postData['message']) 
        || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL) 
        || empty($postData['message']) 
        || trim($postData['message'] === '')
    ){
        echo('Il faut un email et un message pour soumettre le formulaire.');
        // Arrête l'exécution de ce fichier par PHP
        return;
    }
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Contact reçu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <div class="container flexcol-center">
        <h1>Message bien reçu !</h1>
            
        <div class="card">
            <h4 class="card-title">Rappel de vos informations :</h4>
            <p class="card-text"><b>Email</b> : <?php echo $postData['email']; ?></p>
            <p class="card-text"><b>Message</b> : <?php echo strip_tags($postData['message']); ?></p>
        </div>
    </div>
</body>
</html>
