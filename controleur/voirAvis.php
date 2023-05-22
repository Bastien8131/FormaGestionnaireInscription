<?php
// if(!isLoggedOn()){
//     echo ("<script>alert(\"Vous n'est pas connecter\")</script>");
//     include "$racine/controleur/listeFormation.php";
// }
include_once "$racine/modele/bd.session.inc.php";
include_once "$racine/modele/bd.avis.php";



// $listeAvis = getAvisOfSession($idS);
$listeAvis = getAvisOfFormation($idF, $idD);
// var_dump($listeAvis);

$titre = "Liste des formation";
include "$racine/vue/entete.php";
include "$racine/vue/vueVoirAvis.php";
include "$racine/vue/pied.php";
?>