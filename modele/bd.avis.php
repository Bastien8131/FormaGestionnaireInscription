<!-- INSERT INTO `avis` (`AVISID`, `COMPTEID`, `SESSIONID`, `NOTE`, `COMMENTAIRE`) VALUES (NULL, '1', '2', '2', 'test'); -->

<?php 
include_once "bd.inc.php";

function checkAvisExsist($compteId, $sessionId){
    $resultat = [];
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM avis
                              WHERE COMPTEID = :COMPTEID
                              AND SESSIONID = :SESSIONID ");


        $req->bindValue(':COMPTEID', $compteId, PDO::PARAM_INT);
        $req->bindValue(':SESSIONID', $sessionId, PDO::PARAM_INT);

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

    if(count($resultat) > 0){
        return true;
    }else{
        return false;
    }
    //return $resultat;
}

function addAvis($compteId, $sessionId, $note, $comm){

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO `avis` (`AVISID`, `COMPTEID`, `SESSIONID`, `NOTE`, `COMMENTAIRE`)
                              VALUES (NULL, :COMPTEID, :SESSIONID, :NOTE, :COMMENTAIRE)");


        $req->bindValue(':COMPTEID', $compteId, PDO::PARAM_INT);
        $req->bindValue(':SESSIONID', $sessionId, PDO::PARAM_INT);
        $req->bindValue(':NOTE', $note, PDO::PARAM_INT);
        $req->bindValue(':COMMENTAIRE', $comm, PDO::PARAM_STR);
    
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;

}

function getAvisOfSession($sessionId){
    $resultat = [];
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT COMPTEID, NOTE, COMMENTAIRE FROM avis
                              WHERE SESSIONID = :SESSIONID ");

        $req->bindValue(':SESSIONID', $sessionId, PDO::PARAM_INT);

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

function getAvisOfFormation($formationId, $domainId){
    /*
    SELECT a.* FROM avis a
    INNER JOIN session s
    ON a.SESSIONID = s.SESSIONID
    INNER JOIN formation f
    ON s.FORMATIONID = f.FORMATIONID
    WHERE f.DOMAINID = :DOMAINID
    AND f.FORMATIONID = :FORMATIONID ;
    */
    $resultat = [];
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT a.* FROM avis a
                              INNER JOIN session s
                              ON a.SESSIONID = s.SESSIONID
                              WHERE s.DOMAINID = :DOMAINID
                              AND s.FORMATIONID = :FORMATIONID ");

        $req->bindValue(':DOMAINID', $domainId, PDO::PARAM_INT);
        $req->bindValue(':FORMATIONID', $formationId, PDO::PARAM_INT);

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