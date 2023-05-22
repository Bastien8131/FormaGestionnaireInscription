<main>
    <div id="zoneAddFormation">
        <div id="backAddformation">
            <div class="titreFrom">
                <h1>Ajouter une Formation</h1>
            </div>
            <form action="./?action=ajouterFormation" method="post" id="newformation">
                <div class="zoneChildAddF">
                    <div class="sectionChildAddF">
                        <div class="textZone2">
                            Titre <input type="text" name="nom" class="inputAddF" required>
                        </div>
                        <div class="textZone2">
                            Prix <input type="number" name="Prix" min=0 class="inputAddF" required>
                        </div>
                    </div>
                    <div class="sectionChildAddF">
                        <div>
                            Domaine de la formation <br>
                            <select name="DOMAINID" id="" required>
                                <option value=""></option>
                                <?php
                                    foreach ($listeDomaine as $unDomaine){
                                        echo("<option value=\"");
                                        echo($unDomaine["DOMAINID"]);
                                        echo("\">");
                                        echo($unDomaine["DOMAINLABEL"]);
                                        echo("</option>");
                                    }
                                ?>
                            </select>
                        </div>
                        <div>
                            Information complementaire <br>
                            <textarea name="infoSup" id="txtaAddFrom" class="textZone1" cols="30" rows="10" maxlength="250"></textarea>
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