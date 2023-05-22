<?php

session_start();

include_once "bd.inc.php";

function identifier($loginUser, $pasword){
    /*echo("<br>");
    echo($loginUser);
    echo($pasword);*/
    if (!isset($_SESSION)) {
        session_start();
    }
    
    $resultat = false;
    $motDePasseHasher = hash('md5', $pasword);
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT COMPTEMOTDEPASSE, COMPTEID FROM `compte` WHERE COMPTELOGIN = :COMPTELOGIN");
        $req->bindValue(':COMPTELOGIN', $loginUser, PDO::PARAM_STR);
        
        $req->execute();
        
        $table = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    
    if (isset($table["COMPTEMOTDEPASSE"])){
        
        $mdpBD = $table["COMPTEMOTDEPASSE"];

        if ($mdpBD == $motDePasseHasher) {
            $resultat = true;
            $_SESSION["mailU"] = $loginUser;
            $_SESSION["mdpU"] = $motDePasseHasher;
            $_SESSION["idU"] = $table["COMPTEID"];
        }
    }
    
    /*if($resultat == True){
        echo("True");
    }else{
        echo("False");
    }*/
    return $resultat;
}

function getUserById($id){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `compte` WHERE COMPTEID = :COMPTEID");
        $req->bindValue(':COMPTEID', $id, PDO::PARAM_INT);
        
        $req->execute();
        
        $table = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $table;
}

function getUserByStatue($statue){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `compte` WHERE COMPTESTATUE = :COMPTESTATUE");
        $req->bindValue(':COMPTESTATUE', $statue, PDO::PARAM_STR);
        $req->execute();
        $table = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $table;
}

function getOppositeUserByStatue($statue){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `compte` WHERE COMPTESTATUE != :COMPTESTATUE");
        $req->bindValue(':COMPTESTATUE', $statue, PDO::PARAM_STR);
        var_dump($req);
        
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

function getUserByCourentUser(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM `compte` WHERE COMPTEID = :COMPTEID");
        $req->bindValue(':COMPTEID', $_SESSION["idU"], PDO::PARAM_INT);
        
        $req->execute();
        
        $table = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $table;
}

function maxIdUser(){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT MAX(COMPTEID) AS maxId FROM compte");
        $req->bindValue(':COMPTEID', $_SESSION["idU"], PDO::PARAM_INT);
        
        $req->execute();
        
        $table = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $table["maxId"];
}

function newUser($nom, $prenom, $Email, $motDePasse){
    $id = maxIdUser() + 1;
    $compteResponcable = 0;
    $motDePasseHasher = hash('md5', $motDePasse);
    
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO `compte` (`COMPTEID`, `COMPTENOM`, `COMPTEPRENOM`, `COMPTELOGIN`, `COMPTEMOTDEPASSE`, `COMPTERESPONSABLE`) VALUES (:COMPTEID, :COMPTENOM, :COMPTEPRENOM, :COMPTELOGIN, :COMPTEMOTDEPASSE, :COMPTERESPONSABLE);");
        $req->bindValue(':COMPTEID', $_SESSION["idU"], PDO::PARAM_INT);
        $req->bindValue(':COMPTERESPONSABLE', $compteResponcable, PDO::PARAM_INT);
        $req->bindValue(':COMPTENOM', $nom, PDO::PARAM_STR);
        $req->bindValue(':COMPTEPRENOM', $prenom, PDO::PARAM_STR);
        $req->bindValue(':COMPTELOGIN', $Email, PDO::PARAM_STR);
        $req->bindValue(':COMPTEMOTDEPASSE', $motDePasseHasher, PDO::PARAM_STR);

        $req->execute();
        
        $table = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function newMotDePasse($mdpC, $newMDP){
    $table = getUserByCourentUser();
    $mdpChash = hash('md5', $mdpC);
    $newMDPhash = hash('md5', $hashmdp);

    if ($table["COMPTEMOTDEPASSE"] == $mdpChash){
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("UPDATE compte set COMPTEMOTDEPASSE = :COMPTEMOTDEPASSE WHERE COMPTEID = :COMPTEID");
            $req->bindValue(':COMPTEID', $_SESSION["idU"], PDO::PARAM_INT);
            $req->bindValue(':COMPTEMOTDEPASSE', $newMDP, PDO::PARAM_INT);
            
            $req->execute();
            
            $table = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}

function updateCompte($idU, $mdpU, $loginU){
    try {
        $cnx = connexionPDO();
        
        $req = $cnx->prepare("UPDATE compte SET `COMPTEMOTDEPASSE` = :mdpU, `COMPTELOGIN` = :loginU WHERE COMPTEID = :idU");
        

        $req->bindValue(':idU', $idU, PDO::PARAM_STR);
        $req->bindValue(':mdpU', $mdpU, PDO::PARAM_STR);
        $req->bindValue(':loginU', $loginU, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function dellCompte($idU){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM `compte` WHERE COMPTEID = :COMPTEID");
        $req->bindValue(':COMPTEID', $idU, PDO::PARAM_INT);
        
        $req->execute();
        
        $table = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function countCompteSAL(){
    $resultat=null;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT count(*) as result FROM `compte` where COMPTESTATUE = 'SAL' ");

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC)['result'];
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


/*

SELECT c.COMPTELOGIN FROM `compte` c
INNER JOIN participe p
ON c.COMPTEID = p.COMPTEID
INNER JOIN session s
ON p.SESSIONID = s.SESSIONID
WHERE s.SESSIONDATELIMITE <= DATE(NOW())
GROUP BY c.COMPTELOGIN;

*/

?>