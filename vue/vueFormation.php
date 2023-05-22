<main>
    <div id="">
        <div id="titreAcc">
            <h1>Liste des formations</h1>              
        </div>
        <form action="./?action=actionFormation" method="post">
        <div id="globalCard">
                <?php foreach ($listeFormation as $uneFormation){
                    $idDomain = $uneFormation['DOMAINID'];
                    $uneFormationSansID = $uneFormation;
                    array_splice($uneFormationSansID, 0, 2); ?>
                    
                    <div id="card">
                        <div id="infoCard">
                            <div id="titleCard">
                                <h2><?php echo $uneFormationSansID['FORMATIONNOM']; ?></h2>
                                <?php
                                foreach($listeDomaine as $unDomaine){
                                    if($idDomain == $unDomaine['DOMAINID']){
                                        echo "<h3>".$unDomaine['DOMAINLABEL']."</h3>";
                                    }
                                }
                                ?>
                                
                            </div>
                            <div id="descCard">
                                <?php if($uneFormationSansID['FORMATIONLABEL']!=null){ ?>
                                    <h5>Description</h5>
                                    <?php echo $uneFormationSansID['FORMATIONLABEL']; ?>
                                <?php } ?>
                                <div id="moreInfo">
                                    <div>
                                        <h5>Cout</h5>
                                        <?php echo $uneFormationSansID['FORMATIONCOUT']; ?>
                                    </div>
                                    <button name="btnVoirAvis" value="<?php echo $uneFormation['DOMAINID']."|".$uneFormation['FORMATIONID']; ?>">Voir les avis</button>
                                </div>
                            </div>
                        </div>
                        <?php 
                        if(isLoggedOn()){
                            if(!isInCharge()){ ?>
                                <div id="globalSesscard">
                                    <h3>SESSIONS</h3>
                                    <div id="mainSessCard">
                                        <?php foreach($listeSession as $uneSession){
                                            if($uneSession['FORMATIONID']==$uneFormation['FORMATIONID'] && $uneSession['DOMAINID']==$uneFormation['DOMAINID']){ ?>
                                                <div id="childSessCard">
                                                    <div id="dateSesscard">
                                                        <?php echo $uneSession['SESSIONDATEDEBUT']; ?>
                                                    </div>
                                                    <div id="dateSesscard">
                                                        <?php echo $uneSession['SESSIONDATEFIN']; ?>
                                                    </div>
                                                    <div id="hdSessCard">
                                                        <?php echo $uneSession['SESSIONHEUREDEBUT']; ?>
                                                    </div>
                                                    <div id="hfSessCard">
                                                        <?php echo $uneSession['SESSIONHEUREFIN']; ?>
                                                    </div>
                                                    <div id="childSessCardButton">
                                                        <?php
                                                        $listeId=array('COMPTEID'=>$infoUser['COMPTEID'],'DOMAINID'=>$uneFormation['DOMAINID'],'FORMATIONID'=>$uneFormation['FORMATIONID'],'SESSIONID'=>$uneSession['SESSIONID']);
                                                        $valueButton = $uneFormation['DOMAINID']."|".$uneFormation['FORMATIONID']."|".$uneSession['SESSIONID'];
                                                        if(in_array($listeId,$listeInscription)){
                                                            echo(" <button name=btnDesinscription id='btnSupp' value=".$valueButton.">Se désinscrire</button>");
                                                        }else{
                                                            if(in_array(array_slice($listeId, 1),$listeFullSession)){
                                                                echo(" <button disabled>Plein</button>");
                                                            }else{
                                                                echo(" <button name=btnInscription value=".$valueButton.">S'inscrire</button>");
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                        <?php }} ?>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                    <div id="suppCard">
                                        <h3>Voulez-vous supprimer la formation ?</h3>
                                        <?php echo"<button name=buttonSuppretionFormation id='btnSupp' value=".$uneFormation['DOMAINID'].$uneFormation['FORMATIONID'].">Oui</button>";?>
                                    </div>
                            <?php }
                        }else{ ?>
                            <div id="suppCard">
                                <h3>Connectez vous pour afficher les sessions disponibles</h3>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </form>
    </div>
</main>