<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container flexcol-center">
    <!-- On vérifie si les données transmises au formulaire sont présentes : si elles n'existent pas, on renvoie une erreur, sinon, on affiche le message -->
    <?php
    $getData = $_GET;

    if (
        !isset($getData['email']) 
        || !isset($getData['message']) 
        || !filter_var($getData['email'], FILTER_VALIDATE_EMAIL) 
        || empty($getData['message']) 
        || trim($getData['message'] === '')
    ){
        echo('Il faut un email et un message pour soumettre le formulaire.');
        // Arrête l'exécution de ce fichier par PHP
        return;
    }
    else { 
        ?>
        <h1>Message bien reçu !</h1>
            
        <div class="card">
            <h4 class="card-title">Rappel de vos informations :</h4>
            <p class="card-text"><b>Email</b> : <?php echo $_GET['email']; ?></p>
            <p class="card-text"><b>Message</b> : <?php echo $_GET['message']; ?></p>
        </div>
    <?php } ?>

        <a href="/index.php" class="button">Retour à l'accueil</a>
    </div>
</body>
</html>
