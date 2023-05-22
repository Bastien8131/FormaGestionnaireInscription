<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/nav.css">
</head>
<body>
    <nav>
        <div id="backNav">
            <div id="globalNav">
                <div id="logoNav"><img src="src/img/png/logo_CROSL_2022_txtOnly.png" alt="" id="logo1"></div>
                <div id="mainNav">
                    <a href="./?action=accueil"><div id="elementNav">Accueil</div></a>
                    <?php if(isLoggedOn()){  if(isInCharge()){?>
                        <a href="./?action=ajouterFormation"><div id="elementNav">Formulaire</div></a>
                        <a href="./?action=compteRendu"><div id="elementNav">Compte rendu</div></a>
                    <?php } ?>
                    <?php if(!isInCharge()){ ?>
                        <a href="./?action=avis"><div id="elementNav">Avis</div></a>
                    <?php } ?>
                        <a href="./?action=profil"><div id="elementNav"><img src="" alt="" />Mon Profil</div></a>
                    <?php } ?>
                </div>
                <div id="logNav">
                    <?php if(isLoggedOn()){ ?>
                        <a href="./?action=deconnexion&check=0"><div id="elementNav"><img src="" alt="" />Deconnexion</div></a>
                    <?php }else{ ?>
                        <a href="./?action=connexion"><div id="elementNav"><img src="" alt="" />Connexion</div></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    
