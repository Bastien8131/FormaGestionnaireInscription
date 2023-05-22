<main>
    <div id="zoneAddFormation">
        <div id="backAddformation">
            <div class="titreFrom">
                <h1>Saisir un avis</h1>
            </div>
            <form action="./?action=avis" method="post" id="newformation">
                <div class="zoneChildAddF">
                    <div class="sectionChildAddF">
                        <div class="textZone2">
                            Note <input type="number" name="note" min=0 max=5 class="inputAddF" required>
                        </div>
                        <div>
                            Choisir une session <br>
                            <select name="sessionId" id="" required <?php if(count($listeSessionUser) == 0){ echo "disabled"; } ?> >
                                <?php
                                    if(count($listeSessionUser) == 0){
                                        echo("<option> Aucun avis à renseigner pour une session passée</option>");
                                    }
                                    foreach ($listeSessionUser as $uneSession){
                                        echo("<option value=\"");
                                        echo($uneSession["SESSIONID"]);
                                        echo("\">");
                                        echo($uneSession["SESSIONDATEDEBUT"]);
                                        echo(" | ");
                                        echo($uneSession["FORMATIONNOM"]);
                                        echo(" | ");
                                        echo($uneSession["DOMAINLABEL"]);
                                        echo("</option>");
                                    }
                                ?>
                            </select>
                        </div>
                        <div>
                            Commentaire <br>
                            <textarea name="commentaire" id="txtaAddFrom" class="textZone1" cols="30" rows="10" maxlength="250"></textarea>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit">Ajouter</button>
                    <button type="reset" id="btnReini">Réinitialiser</button>
                </div>
            </form>
        </div>
    </div>
</main>