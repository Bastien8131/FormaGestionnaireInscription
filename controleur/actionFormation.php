<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.formation.php";
include_once "$racine/modele/bd.session.inc.php";
include_once "$racine/modele/bd.participe.php";
include_once "$racine/modele/bd.inscription.inc.php";
include_once "$racine/modele/bd.domaine.php";
include_once "$racine/modele/bd.avis.php";

// recuperation des donnees GET, POST, et SESSION
if(isset($_POST['btnInscription'])){
    $listId = explode('|', $_POST['btnInscription']);
    $idD = $listId[0];
    $idF = $listId[1];
    $idS = $listId[2];
}

if(isset($_POST['btnDesinscription'])){
    $listId = explode('|', $_POST['btnDesinscription']);
    $idD = $listId[0];
    $idF = $listId[1];
    $idS = $listId[2];
}

if(isset($_POST['btnVoirAvis'])){
    $listId = explode('|', $_POST['btnVoirAvis']);
    $idD = $listId[0];
    $idF = $listId[1];
    // $idS = $listId[2];
}

if(isset($_POST['buttonSuppretionFormation'])){
    $listId = str_split($_POST['buttonSuppretionFormation']);
    $idD = $listId[0];
    $idF = $listId[1];
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeFormation = getAllFormation();
$listeSession = getAllSession();
$listeDomaine = getAllDomaine();
$listeInscription = getAllinscription();

if(isLoggedOn()){
    $infoUser = getUserByCourentUser();
}

// traitement si necessaire des donnees recuperees


if(isset($_POST['btnInscription'])){
    addNewInscription($infoUser['COMPTEID'], $idS, $idF, $idD);
}
if(isset($_POST['btnDesinscription'])){
    deleteInscription($infoUser['COMPTEID'], $idS, $idF, $idD);
}
if(isset($_POST['buttonSuppretionFormation'])){
    deleteParticipation($idD, $idF);
    deleteSessionByIdS($idD, $idF);
    dellFormation($idF, $idD);
}

// appel du script de vue qui permet de gerer l'affichage des donnees
if(isset($_POST['btnVoirAvis'])){
    include "$racine/controleur/voirAvis.php";
}else{
    // $titre = "Liste des formation";
    // include "$racine/controleur/listeFormation.php";
    header('Location: ./?action=accueil');
    exit();
}

?>