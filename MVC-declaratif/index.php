<?php
//Variable d'affichage
$title = "Mon Super Site";
$list = [];
$messageError = "";

//Recupération Liste Vendeur
try{
    //1. Construire l'objet connexion PDO
    $pdo = new PDO("mysql:host=localhost;dbname=ticket","root","root");

    //2. Préparation de la requête
    $request = $pdo->prepare("SELECT v.id_vendeur, v.nom_vendeur, v.prenom_vendeur, v.email_vendeur FROM vendeur v");

    //3. Execution de la requête
    $request->execute();

    //4. Récupérere la réponse
    $list = $request->fetchAll(PDO::FETCH_ASSOC);

}catch(Exception $error){
    $messageError = $error->getMessage();
}

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