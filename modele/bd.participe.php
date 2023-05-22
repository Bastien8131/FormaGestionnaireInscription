<?php

include_once "bd.inc.php";

function getAllParticipation(){
    $resultat=null;
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

function countParticipant(){
    $resultat=null;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT count(*) as result FROM `participe`");

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC)['result'];
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function countParticipantByCompte(){
    $resultat=null;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare(" SELECT COMPTEID, count(*) as NbInsc FROM `participe` GROUP by COMPTEID ");

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

function ClassementDesFormation(){
    $resultat=null;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare(" SELECT DOMAINID, FORMATIONID, COUNT(FORMATIONID) as NbIncr FROM `participe`
                            GROUP by DOMAINID, FORMATIONID ORDER by NbIncr DESC ");

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

function deleteParticipation($idD, $idF){
    $resultat = false;

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare(" DELETE FROM participe WHERE DOMAINID = :DOMAINID AND FORMATIONID = :FORMATIONID ");

        $req->bindValue(':DOMAINID', $idD, PDO::PARAM_INT);
        $req->bindValue(':FORMATIONID', $idF, PDO::PARAM_INT);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

?>