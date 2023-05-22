<?php

include_once "bd.inc.php";

function getAllinscription(){
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `participe`");


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

function addNewInscription($idC, $idS, $idF, $idD){
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        
        $req = $cnx->prepare("INSERT INTO `participe` ( COMPTEID , `DOMAINID`, `FORMATIONID`, `SESSIONID`) VALUES ( ".$idC.", ".$idD.", ".$idF.", ".$idS." )");
        /*
        $req->bindValue(':COMPTEID', $idC, PDO::PARAM_INT);
        $req->bindValue(':DOMAINID', $idD, PDO::PARAM_INT);
        $req->bindValue(':FORMATIONID', $idF, PDO::PARAM_INT);
        $req->bindValue(':SESSIONID', $idS, PDO::PARAM_INT);*/

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function deleteInscription($idC, $idS, $idF, $idD){
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        //DELETE FROM `participe` WHERE `participe`.`COMPTEID` = 3 AND `participe`.`DOMAINID` = 0 AND `participe`.`FORMATIONID` = 1 AND `participe`.`SESSIONID` = 5
        $req = $cnx->prepare("DELETE FROM `participe` WHERE `participe`.`COMPTEID` = ".$idC." AND `participe`.`DOMAINID` = ".$idD." AND `participe`.`FORMATIONID` = ".$idF." AND `participe`.`SESSIONID` = ".$idS."");
        //$req = $cnx->prepare("INSERT INTO `participe` ( COMPTEID , `DOMAINID`, `FORMATIONID`, `SESSIONID`) VALUES ( ".$idC.", ".$idD.", ".$idF.", ".$idS." )");
        

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


?>