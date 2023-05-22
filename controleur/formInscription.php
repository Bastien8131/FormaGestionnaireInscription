<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
if(!isInCharge()){
    echo ("<script>alert(\"Vous n'est pas authoriser a accéder a c'est page\")</script>");
    include "$racine/controleur/listeFormation.php";
}else{
    include_once "$racine/modele/bd.formInscription.inc.php";
    // recuperation des donnees GET, POST, et SESSION
    ;

    // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


    // traitement si necessaire des donnees recuperees
    ;

    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Liste des restaurants répertoriés";
    include "$racine/vue/entete.php";
    include "$racine/vue/vueFormInscription.php";
    include "$racine/vue/pied.php";

}


?>