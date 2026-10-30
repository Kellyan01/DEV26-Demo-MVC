<?php
/*
FICHIER CONTROLLER pour la page d'Accueil
*/
//Variable d'affichage
$title = "Mon Super Site";
$list = [];
$messageError = "";

require_once '../model/modelVendeur.php';
require_once '../view/view.php';
