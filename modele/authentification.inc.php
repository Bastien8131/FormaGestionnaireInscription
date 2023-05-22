<?php

include_once "bd.compte.inc.php";

function login($mailU, $mdpU) {
    if (!isset($_SESSION)) {
        session_start();
    }

    //$util = getUtilisateurByMailU($mailU);
    //$mdpBD = $util["mdpU"];
    if(identifier($mailU, $mdpU) == True){
        $_SESSION["mailU"] = $mailU;
        $_SESSION["mdpU"] = getUserByCourentUser()['COMPTEMOTDEPASSE'];
    }
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mailU"]);
    unset($_SESSION["mdpU"]);
    unset($_SESSION["idU"]);
}

function getMailULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["mailU"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mailU"])) {
        $util = getUserByCourentUser();
        //var_dump($util);
        //Var_dump($_SESSION);
        if ($util["COMPTELOGIN"] == $_SESSION["mailU"] && $util["COMPTEMOTDEPASSE"] == $_SESSION["mdpU"]
        ) {
            $ret = true;
        }
    }
    /*if($ret == True){
        echo("True");
    }else{
        echo("False");
    }*/
    return $ret;
}

//Déterminé si le compte connecté est un responsable
function isInCharge(){
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mailU"])) {
        $util = getUserByCourentUser();
        //var_dump($util);
        //Var_dump($_SESSION);
        if ($util["COMPTERESPONSABLE"] == "1") {
            $ret = true;
        }
    }
    /*if($ret == True){
        echo("True");
    }else{
        echo("False");
    }*/
    return $ret;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');


    // test de connexion
    login("test@bts.sio", "sio");
    if (isLoggedOn()) {
        echo "logged";
    } else {
        echo "not logged";
    }

    // deconnexion
    logout();
}
?>