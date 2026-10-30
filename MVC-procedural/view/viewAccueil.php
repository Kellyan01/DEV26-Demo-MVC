<?php
/* FICHIER VIEW pour l'Accueil

Son rôle est de géré l'affichage de l'écran et des données en les nettoyant et les formattant correctement.
*/

function display($title, $list, $messageError){
?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo(htmlentities($title)) ?></title>
    </head>
    <body>
        <header>
            <h1><?php echo(htmlentities($title)) ?></h1>
        </header>

        <main>
            <h2>Liste de Vendeur</h2>
            <ul>
                <?php 
                    foreach($list as $row){
                        echo("<li>".htmlentities($row['nom_vendeur'])." ". htmlentities($row['prenom_vendeur'])." - ".htmlentities($row['email_vendeur'])."</li>");
                    }
                ?>
            </ul>

            <p><?php echo(htmlentities($messageError)); ?></p>
        </main>

        <footer>
        </footer>
    </body>
    </html>

<?php
};
?>