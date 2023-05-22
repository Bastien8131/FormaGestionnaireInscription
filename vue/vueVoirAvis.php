<main>
    <div class="zoneDefault">
        <div class="backDefault">
            <div class="titreFrom">
                <h1>Avis de la formation</h1>
            </div>
            <form action="./?action=" method="post" >
                <div class="zoneChildDefault" id="zoneChildCRendu">
                    <?php
                    $i = 1;
                    $j = 0;
                    $total = 0;
                    if($listeAvis != null){
                        foreach($listeAvis as $unAvis){ $j+=1;?>
                        <div class='sectionChildCRendu'>
                            <div class='lineChildCRendu<?php if($i == 1){ echo $i; $i = 2; }else{ echo $i; $i = 1;  } ?>'>
                                <div class='infoChildCRenduAvis'>
                                    <div><b><?php
                                        echo getUserById($unAvis['COMPTEID'])['COMPTENOM']." ".getUserById($unAvis['COMPTEID'])['COMPTEPRENOM'];
                                    ?></b></div>
                                    <div><?php echo $unAvis['NOTE']; $total = $total + $unAvis['NOTE'];?> / 5</div>
                                    <div></div>
                                </div>
                                <div class='commChildCRendu'><?php echo $unAvis['COMMENTAIRE']; ?></div>
                            </div>
                        <?php } ?>
                        <h2>MOYENNE : <?php echo round(($total/$j)* 100) / 100 ?> / 5</h2>
                    <?php }else{ ?>
                        <h2>Aucun avis disponible</h2>
                    <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>