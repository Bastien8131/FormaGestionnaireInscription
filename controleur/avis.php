<?php
if(!isLoggedOn()){
    echo ("<script>alert(\"Vous n'est pas connecter\")</script>");
    include "$racine/controleur/listeFormation.php";
}
include_once "$racine/modele/bd.session.inc.php";
include_once "$racine/modele/bd.avis.php";

if(isLoggedOn()){
    $infoUser = getUserByCourentUser();
}

$listeSessionUser = getSessionPastOfId_NotHaveAvis($infoUser['COMPTEID']);

if(isset($_POST['note']) && isset($_POST['sessionId'])){
    // echo ($_POST['note']);
    // echo ($_POST['sessionId']);
    // echo ($_POST['commentaire']);

    if(!checkAvisExsist($infoUser['COMPTEID'], $_POST['sessionId'])){
        addAvis($infoUser['COMPTEID'], $_POST['sessionId'], $_POST['note'],$_POST['commentaire']);
        header("Refresh:0");
    }
}

$titre = "Liste des formation";
include "$racine/vue/entete.php";
include "$racine/vue/vueAvis.php";
include "$racine/vue/pied.php";
?>