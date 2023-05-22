<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.formation.php";
include_once "$racine/modele/bd.domaine.php";
include_once "$racine/modele/bd.lieu.php";
include_once "$racine/modele/bd.session.inc.php";
// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["datetimeDebut"]) && 
    isset($_POST["datetimeFin"]) && 
    isset($_POST["dateLimite"]) &&
    isset($_POST["nbPlace"]) &&
    isset($_POST["txtInterv"]) &&
    isset($_POST["formation"]) &&
    isset($_POST["lieu"])){

    $dLimite = $_POST["dateLimite"];
    $lieuId = $_POST["lieu"];
    $nbPlace = $_POST["nbPlace"];

    if(explode("T",$_POST["datetimeDebut"])[0]!=null){
        $dtDebut = explode("T",$_POST["datetimeDebut"]);
    }else{
        $dtDebut = null;
    }

    if(explode("T",$_POST["datetimeFin"])[0]!=null){
        $dtFin = explode("T",$_POST["datetimeFin"]);
    }else{
        $dtFin = null;
    }

    if(str_split($_POST["formation"])[0]!=""){
        $domainId = str_split($_POST["formation"])[0];
        $formationId = str_split($_POST["formation"])[1];
    }else{
        $domainId = null;
        $formationId = null;
    }

    if($_POST["txtInterv"]!=""){
        $nomInterv = $_POST["txtInterv"];
    }else{
        $nomInterv = null;
    }
}
else
{
    $dtDebut = null;
    $dtFin = null;
    $dLimite = null;
    $nbPlace = null;
    $nomInterv = null;
    $domainId = null;
    $formationId = null;
    $lieuId = null;
}

/*
echo("<br><br><br><br><br>");
var_dump($dtDebut);
var_dump($dtFin);
echo($dLimite.$nomInterv.$domainId.$formationId.$lieuId);
*/

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeDomaine = getAllDomaine();
$listeLieu = getAllLieu();
$listeFormation = getAllFormation();

// traitement si necessaire des donnees recuperees
if (isset($_POST["datetimeDebut"]) != null && 
    isset($_POST["datetimeFin"]) != null && 
    isset($_POST["dateLimite"]) != null &&
    isset($_POST["nbPlace"]) != null &&
    isset($_POST["txtInterv"]) != null &&
    isset($_POST["formation"]) != null &&
    isset($_POST["lieu"]) != null){

    addSession($dtDebut, $dtFin, $dLimite, $nbPlace, $domainId, $formationId, $lieuId, $nomInterv);
}

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des restaurants répertoriés";
include "$racine/vue/entete.php";
include "$racine/vue/navFormulaire.php";
include "$racine/vue/vueSession.php";
include "$racine/vue/pied.php";


?>