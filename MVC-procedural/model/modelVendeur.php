<?php
/*
FICHIER MODEL pour gérer les interractions avec la BDD concernant la table Vendeur
*/

function findAll(){
    //Recupération Liste Vendeur
    try{
        //1. Construire l'objet connexion PDO
        $pdo = new PDO("mysql:host=localhost;dbname=ticket","root","root");

        //2. Préparation de la requête
        $request = $pdo->prepare("SELECT v.id_vendeur, v.nom_vendeur, v.prenom_vendeur, v.email_vendeur FROM vendeur v");

        //3. Execution de la requête
        $request->execute();

        //4. Récupérere la réponse
        return $request->fetchAll(PDO::FETCH_ASSOC);

    }catch(Exception $error){
        return $error->getMessage();
    }
}


function addVendeur($nom, $prenom, $email){
    //Enregistrer un utilisateur en BDD
    try{
        //1. Construire l'objet connexion PDO
        $pdo = new PDO("mysql:host=localhost;dbname=ticket","root","root");

        //2. Préparation de la requête
        $request = $pdo->prepare("INSERT INTO vendeur (nom_vendeur, prenom_vendeur,email_vendeur) VALUES (?,?,?)");

        //3. BindParam
        $request->bindParam(1,$nom,PDO::PARAM_STR);
        $request->bindParam(2,$prenom,PDO::PARAM_STR);
        $request->bindParam(3,$email,PDO::PARAM_STR);

        //4. Execution de la requête
        $request->execute();

        //5. Retour d'une réponse
        return ['code'=>200, "message"=>"$nom $prenom a été enregistré avec succès"];

    }catch(Exception $error){
        return $error->getMessage();
    }
}