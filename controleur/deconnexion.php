<?php
if(!isLoggedOn()){
    include "$racine/controleur/listeFormation.php";
}else{ if($_GET['check']=="0"){ ?>
    <script>
        if (confirm("Est vous sûr de vous déconnecter.") == true) {
            document.location.href='./?action=deconnexion&check=1';
        }
    </script>
<?php }
    if($_GET['check']=="1"){
        if (isset($_SESSION)) {
            logout();
        }
    }
    echo "<script> document.location.href='./?action=accueil' </script>";
}
?>