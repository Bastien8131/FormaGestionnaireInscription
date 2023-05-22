<main>
    <div class="zoneDefault">
        <div class="backDefault">
            <div class="titreFrom">
                <h1>Compte rendu global</h1>
            </div>
            <form action="./?action=" method="post" >
                <div class="zoneChildDefault">
                    <div class="bullInfo1">
                        <div class="bullTitle">Compte salarié</div>
                        <div class="bullValue"><?php echo $NbCompteSAL ?></div>
                    </div>
                    <div class="bullInfo1">
                        <div class="bullTitle">Formation disponible</div>
                        <div class="bullValue"><?php echo $NbFormation ?></div>
                    </div>
                    <div class="bullInfo1">
                        <div class="bullTitle">Nombre d'inscription</div>
                        <div class="bullValue"><?php echo $NbParticipant ?></div>
                    </div>
                    <div class="bullInfo2">
                        <div class="bullTitle">Formation la plus choisie</div>
                        <div class="bullTxt"><?php echo $NomTopFormation ?></div>
                    </div>
                </div>
                <div class="zoneChildDefault" id="zoneChildCRendu">
                    <?php
                    $i = 1;
                    foreach($listeDomaine as $unDomaine){
                        echo "<div class='sectionChildCRendu'>";
                        echo "<div class='domainChildCRendu'><h2>".$unDomaine['DOMAINLABEL']."</h2></div >";
                        foreach($listeFormation as $uneFormation){
                            if($unDomaine['DOMAINID'] == $uneFormation['DOMAINID']){
                                ?><div class='lineChildCRendu<?php if($i == 1){ echo $i; $i = 2; }else{ echo $i; $i = 1;  } ?>'>
                                    <div class='titreChildCRendu'><?php echo $uneFormation['FORMATIONNOM']; ?></div>
                                    <div class='infoChildCRendu'>
                                        <div>Coût <?php echo $uneFormation['FORMATIONCOUT']; ?> €</div>
                                        <?php foreach($ClassementFormationParId as $ClassFormation){
                                            if($ClassFormation['DOMAINID'] == $uneFormation['DOMAINID'] && $ClassFormation['FORMATIONID'] == $uneFormation['FORMATIONID']){
                                                echo "<div>Inscrit ".$ClassFormation['NbIncr']."</div>";
                                                $NbInscit = $ClassFormation['NbIncr'];
                                            }
                                            $Gain = intval($uneFormation['FORMATIONCOUT'])*intval($NbInscit) ;
                                        }
                                        ?>
                                        <div>Gain <?php echo $Gain ; $Gain = 0; $NbInscit=0; ?> €</div>
                                    </div>
                                </div><?php
                            }
                        }
                        echo "</div>";
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</main>