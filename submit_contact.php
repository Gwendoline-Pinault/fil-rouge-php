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

    $uploaded = false;
    // Variable concernant le fichier transmis (tableau)
    // Vérification si fichier transmis via formulaire
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        if ($_FILES['image']['size'] > 1000000){
            echo('Le fichier est trop lourd');
            return;
        }

        // Vérification de l'extension du fichier
        $fileInfo = pathinfo($_FILES['image']['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];

        if (!in_array($extension, $allowedExtensions)) {
            echo('Le format du fichier est incorrect.');
            return;
        }

        // Vérification de l'existence du dossier de stockage
        $path = __DIR__ . '/uploads/';

        if (!is_dir($path)) {
            echo('Le dossier de destination n\'existe pas.');
            return;
        }

        //Validation de l'upload
        move_uploaded_file($_FILES['image']['tmp_name'], $path . basename($_FILES['image']['name']));
        $uploaded = true;
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

            <?php if ($uploaded) : ?>
                <p>L'envoi a bien été effectué !</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
