<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";

//echo(session_status());

if (isset($_POST["zdtLoginConnexion"]) && isset($_POST["zdtMDPConnexion"])){
    $Login=$_POST["zdtLoginConnexion"];
    $MDP=$_POST["zdtMDPConnexion"];
    //echo($Login);
    //echo($MDP);
}
else
{
    $Login="";
    $MDP="";
}

//include_once "$racine/modele/bd.compte.inc.php";
//echo(identifier($Login, $MDP));

login($Login, $MDP);
//echo($_SESSION["mailU"]);
//echo($_SESSION["mdpU"]);

//var_dump($_SESSION);

if (isLoggedOn()){
    include "$racine/controleur/listeFormation.php";
}else{
    $titre = "Liste des restaurants répertoriés";
    include "$racine/vue/entete.php";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/pied.php";
}




?>