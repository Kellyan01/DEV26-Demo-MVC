<?php
/*
FICHIER MODEL pour gérer les interractions avec la BDD concernant la table Vendeur
*/

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