<main>
    <div id="zoneAddFormation">
        <div id="backAddformation">
            <div class="titreFrom">
                <h1>Ajouter une Session</h1>
            </div>
            <form action="./?action=ajouterSession" method="post" id="newformation">
                <div class="zoneChildDefault">
                    <div class="sectionChildAddF">
                        <div class="textZone2">
                            <div class="txtInput">Date de debut</div>
                            <input type="datetime-local" name="datetimeDebut" id="" class="inputAddS" required>
                        </div>
                        <div class="textZone2">
                            <div class="txtInput">Date de fin</div>
                            <input type="datetime-local" name="datetimeFin" id="" class="inputAddS" required>
                        </div>
                        <div class="textZone2">
                            <div class="txtInput">Date limite d'inscription</div>
                            <input type="date" name="dateLimite" id="" class="inputAddS" required>
                        </div>
                        <div class="textZone2">
                            <div class="txtInput">Place disponible</div>
                            <input type="number" name="nbPlace" min=2 id="" class="inputAddS" required>
                        </div>
                    </div>
                    <div class="sectionChildAddF">
                        <div class="textZone3">
                            <div class="txtInput">Intervenent</div>
                            <input type="text" name="txtInterv" id="" class="inputAddS" required>
                        </div>
                        <div>
                            Associer à une formation <br>
                            <select name="formation" id="" required>
                                <option value=""></option>
                                <?php
                                    foreach ($listeFormation as $unFormation){
                                        echo("<option value=\"");
                                        echo($unFormation["DOMAINID"].$unFormation["FORMATIONID"]);
                                        echo("\">");
                                        echo($unFormation["FORMATIONNOM"]);
                                        echo("</option>");
                                    }
                                ?>
                            </select>
                        </div>
                        <div>
                            Localisation de la session <br>
                            <select name="lieu" id="" required>
                                <option value=""></option>
                                <?php
                                    foreach ($listeLieu as $unLieu){
                                        echo("<option value=\"");
                                        echo($unLieu["LIEUID"]);
                                        echo("\">");
                                        echo($unLieu["LIEUNOMSALLE"]." - ".$unLieu["LIEUADRESSE"]." ".$unLieu["LIEUCP"]." ".$unLieu["LIEUVILLE"]);
                                        echo("</option>");
                                    }
                                ?>
                            </select>
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