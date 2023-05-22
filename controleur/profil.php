<?php
if(!isLoggedOn()){
    echo ("<script>alert(\"Vous n'est pas connecter\")</script>");
    include "$racine/controleur/listeFormation.php";
}else{

    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    }
    //include_once "$racine/modele/bd.formation.php";
    // recuperation des donnees GET, POST, et SESSION
    if(isset($_POST['newLogin'])){
        $newLogin = $_POST['newLogin'];
    }else{
        $newLogin = null;
    }

    if(isset($_POST['newMDP'])){
        $newMDP = $_POST['newMDP'];
        if($newMDP!=""){
            echo $newMDP;
            $newMDP = hash('md4', $newMDP);
        }else{
            $newMDP = null;
        }
    }else{
        $newMDP = null;
    }

    if(isset($_POST['lastMDP'])){
        $lastMDP = $_POST['lastMDP'];
        $lastMDP = hash('md4', $lastMDP);
    }else{
        $lastMDP = null;
    }

    // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
    $infoUser = getUserByCourentUser();

    // traitement si necessaire des donnees recuperees
    ;

    // appel du script de vue qui permet de gerer l'affichage des donnees
    if($lastMDP == $infoUser['COMPTEMOTDEPASSE']){
        if($newLogin != null || $newMDP != null){
            if($newMDP != null){
                updateCompte($infoUser['COMPTEID'], $newMDP, $infoUser['COMPTELOGIN']);
            }
            $infoUser = getUserByCourentUser();
            if($newLogin != null){
                updateCompte($infoUser['COMPTEID'], $infoUser['COMPTEMOTDEPASSE'], $newLogin);
            }
            include "$racine/controleur/deconnexion.php";
        }
    }else{
        include "$racine/vue/entete.php";
        include "$racine/vue/vueProfil.php";
        include "$racine/vue/pied.php";
    }
    

    
}

?>