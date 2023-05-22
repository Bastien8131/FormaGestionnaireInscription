<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.formation.php";
include_once "$racine/modele/bd.session.inc.php";
include_once "$racine/modele/bd.inscription.inc.php";
include_once "$racine/modele/bd.domaine.php";
include_once "$racine/modele/bd.participe.php";

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listeFormation = getAllFormation();
$listeSession = getAllSession();
$listeDomaine = getAllDomaine();
$listeInscription = getAllinscription();
$listeParticipation = getAllParticipation();
$ClassementFormationParId = ClassementDesFormation();
if(isLoggedOn()){
    $infoUser = getUserByCourentUser();
}
$NbParticipant = countParticipant();
$NbCompteSAL = countCompteSAL();
$NbFormation = countFormation();
$NomTopFormation = getFormationById($ClassementFormationParId[0]['DOMAINID'], $ClassementFormationParId[0]['FORMATIONID']);


// traitement si necessaire des donnees recuperees


// appel du script de vue qui permet de gerer l'affichage des donnees

$titre = "Liste des formation";
include "$racine/vue/entete.php";
include "$racine/vue/vueCompteRendu.php";
include "$racine/vue/pied.php";


?>