<?php
/* FICHIER VIEW pour l'Accueil
*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($title) ?></title>
</head>
<body>
    <header>
        <h1><?php echo($title) ?></h1>
    </header>

    <main>
        <h2>Liste de Vendeur</h2>
        <ul>
            <?php 
                foreach($list as $row){
                    echo("<li>{$row['nom_vendeur']} {$row['prenom_vendeur']} - {$row['email_vendeur']}</li>");
                }
            ?>
        </ul>

        <p><?php echo($messageError); ?></p>
    </main>

    <footer>
    </footer>
</body>
</html>