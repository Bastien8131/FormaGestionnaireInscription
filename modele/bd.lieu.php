<?php

include_once "bd.inc.php";

function getAllLieu(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `lieu`");

        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

?>