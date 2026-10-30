<?php
/*
FICHIER CONTROLLER pour la page d'Accueil
*/

//Import des Ressources
require_once '../model/modelVendeur.php';
require_once '../view/viewAccueil.php';

function render(){
    //1.Récupérer les données utilisateurs
    // -> appelle à findAll() du model et stocker les données retournés dans une variable
    $data = findAll();

    //2. Vérifier les data pour savoir si je reçois un tableau de donnée ou un message d'erreur
    switch(gettype($data)){
        case "string" :
            //Cas où on reçoit un message d'erreur
            $messageError = $data;
            display("Mon Super Site", [], $messageError);
            break;
        case "array" :
            //Cas où on reçoit nos données
            $list = $data;
            display("Mon Super Site", $list, "");
            break;
    }
}

render();
