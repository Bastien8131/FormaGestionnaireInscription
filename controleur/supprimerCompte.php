<?php
if(!isLoggedOn()){
    echo ("<script>alert(\"Vous n'est pas connecter\")</script>");
    include "$racine/controleur/listeFormation.php";
}
echo "test";

$infoUser = getUserByCourentUser();

include "$racine/controleur/deconnexion.php";
//dellCompte($infoUser['COMPTEID']);

?>