<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.formation.php";
include_once "$racine/modele/bd.session.inc.php";
include_once "$racine/modele/bd.inscription.inc.php";
include_once "$racine/modele/bd.domaine.php";

if(isLoggedOn()){
    $infoUser = getUserByCourentUser();
}
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeFormation = getAllFormation();
$listeSession = getAllCurrentSession();
$listeDomaine = getAllDomaine();
$listeInscription = getAllinscription();
$listeFullSession = getAllSession_PlaceIsFull();



// traitement si necessaire des donnees recuperees



// appel du script de vue qui permet de gerer l'affichage des donnees

$titre = "Liste des formation";
include "$racine/vue/entete.php";
include "$racine/vue/vueFormation.php";
include "$racine/vue/pied.php";


?>