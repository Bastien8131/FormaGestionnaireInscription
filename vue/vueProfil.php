<main>
    <?php //var_dump($infoUser); ?>
    <div id="zoneProfil">
        <div id="backProfil">
            <div class="zoneChildProf">
                <div class="titreFrom">
                    <h1>Mes information</h1>
                </div>
                <div id="">
                    <div>
                    <?php echo ("<h3>".$infoUser['COMPTENOM']." ".$infoUser['COMPTEPRENOM']." - ".$infoUser['COMPTESTATUE']."</h3>"); ?>
                    </div>
                    <div id="contactProfil">
                        <?php
                        echo(
                            "<p>".$infoUser['COMPTEADRESSE']."<br>".
                            $infoUser['COMPTECP']." ".$infoUser['COMPTEVILLE']."</p>"
                        )
                        ?>
                    </div>
                </div>
            </div>
            <div class="zoneChildProf">
                <div class="titreFrom">
                    <h1>Modifier mes identifiants</h1>
                </div>
                <form action="./?action=profil" method="post">
                    <div id="backEditProf">
                        <div class="textZone1">
                            Login
                            <input type="text" name="newLogin" id="">
                        </div>
                        <div class="textZone1">
                            Mot de passe
                            <input type="text" name="newMDP" id="">
                        </div>
                        <div class="textZone1">
                            Mot de passe actuel
                            <input type="text" name="lastMDP" id="" required>
                        </div>
                    </div>
                    <button type="submit">Mettre a jour</button>
                    <!--<a href="./?action=supprimerCompte" ><input type="button" value="Supprimer le compte" id="btnSupp"></a>-->
                </form>
            </div>
        </div>
    </div>
</main>