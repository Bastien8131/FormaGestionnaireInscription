<?php

include_once "bd.inc.php";

function getAllSession(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `session`");

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

function getAllCurrentSession(){
    //SELECT * FROM `session` WHERE SESSIONDATEDEBUT > DATE(NOW());
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `session` WHERE SESSIONDATELIMITE > DATE(NOW());");

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

function getAllSession_PlaceIsFull(){
    $resultat = [];
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT DOMAINID, FORMATIONID, SESSIONID FROM session
                              WHERE NBPLACE = (
                                  SELECT COUNT(*)
                                  FROM participe
                                  WHERE participe.SESSIONID = session.SESSIONID
                              );");

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

function getIdForSession(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT (SESSIONID+1) as idDispo FROM session WHERE SESSIONID+1 NOT IN (SELECT SESSIONID FROM session)");

        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne['idDispo'];
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addSession($dtDebut, $dtFin, $dLimite, $nbPlace, $idD, $idF, $idL, $nomInterv){

    $idS = getIdForSession()[0];
    
    try {
        $cnx = connexionPDO();
        //INSERT INTO `session` (`DOMAINID`, `FORMATIONID`, `SESSIONID`, `LIEUID`, `SESSIONDATEDEBUT`, `SESSIONDATEFIN`, `SESSIONHEUREDEBUT`, `SESSIONHEUREFIN`, `SESSIONINTERVENENT`, `SESSIONDATELIMITE`, `NBINSCRITS`) VALUES ('0', '0', '10', '0', NULL, NULL, NULL, NULL, NULL, NULL, '0');
        
        $req = $cnx->prepare("INSERT INTO `session` (`DOMAINID`, `FORMATIONID`, `SESSIONID`, `LIEUID`, `SESSIONDATEDEBUT`, `SESSIONDATEFIN`, `SESSIONHEUREDEBUT`, `SESSIONHEUREFIN`,
                            `SESSIONINTERVENENT`, `SESSIONDATELIMITE`, `NBPLACE`) VALUES ( :DOMAINID , :FORMATIONID , :SESSIONID , :LIEUID , :SESSIONDATEDEBUT ,
                            :SESSIONDATEFIN , :SESSIONHEUREDEBUT , :SESSIONHEUREFIN , :SESSIONINTERVENENT , :SESSIONDATELIMITE , :NBPLACE )");
        
        //$req = $cnx->prepare("INSERT INTO `FORMATION` (`DOMAINID`, `FORMATIONID`, `FORMATIONNOM`, `FORMATIONLABEL`, `FORMATIONCOUT`) values(:DOMAINID,:FORMATIONID,:FORMATIONNOM,:FORMATIONLABEL,:FORMATIONCOUT)");
        $req->bindValue(':DOMAINID', $idD, PDO::PARAM_INT);
        $req->bindValue(':FORMATIONID', $idF, PDO::PARAM_INT);
        $req->bindValue(':SESSIONID', $idS, PDO::PARAM_INT);
        $req->bindValue(':LIEUID', $idL, PDO::PARAM_INT);
        $req->bindValue(':NBPLACE', $nbPlace, PDO::PARAM_INT);
        $req->bindValue(':SESSIONDATEDEBUT', $dtDebut[0], PDO::PARAM_STR);
        $req->bindValue(':SESSIONDATEFIN', $dtFin[0], PDO::PARAM_STR);
        $req->bindValue(':SESSIONHEUREDEBUT', $dtDebut[1], PDO::PARAM_STR);
        $req->bindValue(':SESSIONHEUREFIN', $dtFin[1], PDO::PARAM_STR);
        $req->bindValue(':SESSIONINTERVENENT', $nomInterv, PDO::PARAM_STR);
        $req->bindValue(':SESSIONDATELIMITE', $dLimite, PDO::PARAM_STR);
    
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function deleteSessionByIdS($idD, $idF){
    $resultat = false;

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare(" DELETE FROM session WHERE DOMAINID = :DOMAINID AND FORMATIONID = :FORMATIONID ");

        $req->bindValue(':DOMAINID', $idD, PDO::PARAM_INT);
        $req->bindValue(':FORMATIONID', $idF, PDO::PARAM_INT);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getSessionOfId($idCompte){
    /*
    
        SELECT p.*, d.DOMAINLABEL, f.FORMATIONNOM, s.SESSIONDATEDEBUT, s.SESSIONDATEFIN FROM participe p

        INNER JOIN session s
        ON p.SESSIONID = s.SESSIONID

        INNER JOIN formation f 
        ON p.FORMATIONID = f.FORMATIONID
        AND p.DOMAINID = f.DOMAINID

        INNER JOIN domaine d 
        ON f.DOMAINID = d.DOMAINID

        WHERE p.COMPTEID = 1;

    */
    $resultat = [];
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare(" SELECT p.DOMAINID, p.FORMATIONID, p.SESSIONID, d.DOMAINLABEL, f.FORMATIONNOM, s.SESSIONDATEDEBUT, s.SESSIONDATEFIN
                            FROM participe p

                            INNER JOIN session s
                            ON p.SESSIONID = s.SESSIONID
                            
                            INNER JOIN formation f 
                            ON p.FORMATIONID = f.FORMATIONID
                            AND p.DOMAINID = f.DOMAINID
                            
                            INNER JOIN domaine d 
                            ON f.DOMAINID = d.DOMAINID
                            
                            WHERE p.COMPTEID = :COMPTEID ");

        $req->bindValue(':COMPTEID', $idCompte, PDO::PARAM_INT);

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

function getSessionPastOfId($idCompte){
    $resultat = [];
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare(" SELECT p.DOMAINID, p.FORMATIONID, p.SESSIONID, d.DOMAINLABEL, f.FORMATIONNOM, s.SESSIONDATEDEBUT, s.SESSIONDATEFIN
                            FROM participe p

                            INNER JOIN session s
                            ON p.SESSIONID = s.SESSIONID
                            
                            INNER JOIN formation f 
                            ON p.FORMATIONID = f.FORMATIONID
                            AND p.DOMAINID = f.DOMAINID
                            
                            INNER JOIN domaine d 
                            ON f.DOMAINID = d.DOMAINID
                            
                            WHERE p.COMPTEID = :COMPTEID
                            AND SESSIONDATEFIN < DATE(NOW()) ");

        $req->bindValue(':COMPTEID', $idCompte, PDO::PARAM_INT);

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

function getSessionPastOfId_NotHaveAvis($idCompte){
    $resultat = [];
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare(" SELECT p.DOMAINID, p.FORMATIONID, p.SESSIONID, d.DOMAINLABEL, f.FORMATIONNOM, s.SESSIONDATEDEBUT, s.SESSIONDATEFIN
        FROM participe p

        INNER JOIN session s
        ON p.SESSIONID = s.SESSIONID
        
        INNER JOIN formation f 
        ON p.FORMATIONID = f.FORMATIONID
        AND p.DOMAINID = f.DOMAINID
        
        INNER JOIN domaine d 
        ON f.DOMAINID = d.DOMAINID
        
        WHERE p.COMPTEID = :COMPTEID
        AND SESSIONDATEFIN < DATE(NOW())
        AND s.SESSIONID NOT IN (SELECT SESSIONID FROM avis WHERE COMPTEID = :COMPTEID ) ");

        $req->bindValue(':COMPTEID', $idCompte, PDO::PARAM_INT);

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