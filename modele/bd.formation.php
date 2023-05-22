<?php

include_once "bd.inc.php";

function getFormation() {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `formation`");

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getFormationById($idD, $idF) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare(" SELECT FORMATIONNOM FROM `formation` WHERE DOMAINID = :DOMAINID and FORMATIONID = :FORMATIONID ");

        $req->bindValue(':DOMAINID', $idD, PDO::PARAM_INT);
        $req->bindValue(':FORMATIONID', $idF, PDO::PARAM_INT);

        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat['FORMATIONNOM'];
}

function getAllFormation() {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `formation`");

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

function addFormation($idD, $nom, $label, $cout){
    $idF = maxIdFormation($idD);
    $idF = $idF + 1;
    $resultat = -1;
    if (isset($_POST["DOMAINID"]) && isset($_POST["nom"]) && isset($_POST["Prix"])){
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("INSERT INTO `formation` (`DOMAINID`, `FORMATIONID`, `FORMATIONNOM`, `FORMATIONLABEL`, `FORMATIONCOUT`) values(:DOMAINID,:FORMATIONID,:FORMATIONNOM,:FORMATIONLABEL,:FORMATIONCOUT)");
            $req->bindValue(':DOMAINID', $idD, PDO::PARAM_INT);
            $req->bindValue(':FORMATIONID', $idF, PDO::PARAM_INT);
            $req->bindValue(':FORMATIONNOM', $nom, PDO::PARAM_STR);
            $req->bindValue(':FORMATIONLABEL', $label, PDO::PARAM_STR);
            $req->bindValue(':FORMATIONCOUT', $cout, PDO::PARAM_INT);
        
            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    return $resultat;
}

function dellFormation($idF, $idD){
    
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM `formation` WHERE DOMAINID = :DOMAINID AND FORMATIONID = :FORMATIONID");
        $req->bindValue(':DOMAINID', $idD, PDO::PARAM_INT);
        $req->bindValue(':FORMATIONID', $idF, PDO::PARAM_INT);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function modifForamation($idD, $idF, $nom, $label, $cout){
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE `formation` SET `FORMATIONNOM`=':FORMATIONNOM',`FORMATIONLABEL`=':FORMATIONLABEL',`FORMATIONCOUT`=':FORMATIONCOUT' WHERE `DOMAINID`=':DOMAINID' AND `FORMATIONID`=':FORMATIONID'");
        $req->bindValue(':DOMAINID', $idD, PDO::PARAM_INT);
        $req->bindValue(':FORMATIONID', $idF, PDO::PARAM_INT);
        $req->bindValue(':FORMATIONNOM', $nom, PDO::PARAM_STR);
        $req->bindValue(':FORMATIONLABEL', $label, PDO::PARAM_STR);
        $req->bindValue(':FORMATIONCOUT', $cout, PDO::PARAM_INT);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function maxIdFormation($DOMAINID){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT MAX(FORMATIONID) AS maxId FROM formation where DOMAINID = :DOMAINID");
        $req->bindValue(':DOMAINID', $DOMAINID, PDO::PARAM_INT);
        
        $req->execute();
        
        $table = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $table["maxId"];
}

function countFormation(){
    $resultat=null;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT count(*) as result FROM `formation`");

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC)['result'];
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

?>
