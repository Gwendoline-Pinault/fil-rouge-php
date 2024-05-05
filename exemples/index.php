<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Ceci est une page HTML de test</title>
</head>

<body>
    <h2>Page de test</h2>
    <p>
        Cette page contient <strong>uniquement</strong> du code HTML.<br />


        Voici quelques petits tests :


    </p>

    <ul>
        <li style="color: blue;">Texte en bleu</li>
        <li style="color: red;">Texte en rouge</li>
        <li style="color: green;">Texte en vert</li>
    </ul>

    <p>
        Cette partie affiche du code généré avec PHP :
    </p>

    <?php echo "
        <p style=\"color: violet\">Un texte à afficher</p>
        <strong>Je suis du HTML dans du PHP !</strong>"; ?>

    <?php // Ce code affiche la date et l'heure actuelle 
    ?>
    <p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i'); ?> .</p>


    <!-- Déclaration de variable et affichage de sa valeur sur la page -->
    <?php
    $fullname = 'Gwendoline Pinault';
    echo $fullname;
    ?>


    <!-- La condition if else -->
    <?php
    $isEnabled = true;

    if ($isEnabled === true) {
        echo ": Vous êtes autorisé à accéder au site.";
    } else {
        echo "Vous n'avez pas l'autorisation.";
    }
    ?>

    <h2>Les conditions</h2>
    <p><strong>Afficher un texte en fonction de la valeur d'une variable : </strong></p>

    <!-- Autre façon d'écrire le code avec une condition -->

    <?php $chickenRecipeEnabled = true; ?>

    <?php if ($chickenRecipeEnabled) : ?> <!-- Ne pas oublier les ":" -->

        <p>Liste des recettes de poulet</p>

    <?php endif; ?> <!-- On clôture la condition avec "endif;" -->

    <p><strong>Exemple de switch : cas d'un message à affiche en fonction de la note.</strong></p>

    <?php
    $grade = 15;

    echo "Note : {$grade} <br> Commentaire : ";

    switch ($grade) {
        case 0:
            echo "A revoir.";
            break;

        case 10:
            echo "Tout juste la moyenne.";
            break;

        case 15:
            echo "Super !";
            break;

        case 20:
            echo "Rien à redire, c'est parfait !";
            break;

        default:
            echo "Pas de message spécifique.";
    }
    ?>

    <p><strong>Exemple de la boucle while sur un tableau de tableaux :</strong></p>
    <?php
    $users = [
        [
            'full_name' => 'Mickaël Andrieu',
            'email' => 'mickael.andrieu@exemple.com',
            'age' => 34,
        ],
        [
            'full_name' => 'Mathieu Nebra',
            'email' => 'mathieu.nebra@exemple.com',
            'age' => 34,
        ],
        [
            'full_name' => 'Laurène Castor',
            'email' => 'laurene.castor@exemple.com',
            'age' => 28,
        ],
    ];
    $lines = 3; // nombre d'utilisateurs dans le tableau
    $counter = 0;
    while ($counter < $lines) {
        echo $users[$counter]['full_name'] . ' ' . $users[$counter]['email'] . '<br />';
        $counter++;
    }
    ?>

    <?php
    $recipes = [
        ['Cassoulet', 'MamiLou52', true, 'Instructions'],
        ['Couscous', 'Fatima91280', false, 'Mon couscous en 2-2'],
    ];
    ?>

    <h1>Livre de recettes</h1>

    <ul>
        <?php for ($lines = 0; $lines <= 1; $lines++) : ?>
            <li><?php echo $recipes[$lines][0] . ' (' . $recipes[$lines][1] . ')'; ?></li>
        <?php endfor; ?>
    </ul>

</body>

</html>