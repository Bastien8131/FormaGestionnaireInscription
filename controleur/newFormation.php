<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.formation.php";
include_once "$racine/modele/bd.domaine.php";
// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["DOMAINID"]) && isset($_POST["nom"]) && isset($_POST["Prix"])){
    $DOMAINID=$_POST["DOMAINID"];
    $nom=$_POST["nom"];
    $Prix=$_POST["Prix"];
    $infoSup=$_POST["infoSup"];
}
else
{
    $DOMAINID=null;
    $nom=null;
    $infoSup=null;
    $Prix=null;
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeDomaine = getAllDomaine();

// traitement si necessaire des donnees recuperees
if (($DOMAINID != "") && ($nom != "") && ($Prix != "")){
    addFormation($DOMAINID, $nom, $infoSup, $Prix);
}

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des restaurants répertoriés";
include "$racine/vue/entete.php";
include "$racine/vue/navFormulaire.php";
include "$racine/vue/vueNewFormation.php";
include "$racine/vue/pied.php";


?>