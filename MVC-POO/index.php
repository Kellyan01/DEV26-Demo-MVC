<?php
//Import des Ressources
require_once './model/modelVendeur.php';
require_once './view/viewAccueil.php';
require_once './controller/ControllerAccueil.php';


//Rendu de la page d'accueil
//Création d'un objet Controller Accueil pour après effectuer le rendu de la page
$model = new ModelVendeur(new PDO("mysql:host=localhost;dbname=ticket","root","root"));
$view = new ViewAccueil();

$controllerAccueil = new ControllerAccueil($model,$view);

//Lancer le rendu
$controllerAccueil->render();

