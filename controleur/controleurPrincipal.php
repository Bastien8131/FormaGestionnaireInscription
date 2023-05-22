<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "listeFormation.php";
    $lesActions["accueil"] = "listeFormation.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "profil.php";
    $lesActions["supprimerCompte"] = "supprimerCompte.php";
    $lesActions["ajouterFormation"] = "newFormation.php";
    $lesActions["ajouterSession"] = "addSession.php";
    $lesActions["actionFormation"] = "actionFormation.php";
    $lesActions["compteRendu"] = "compteRendu.php";
    $lesActions["avis"] = "avis.php";
    $lesActions["voirAvis"] = "voirAvis.php";
    

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
}

?>