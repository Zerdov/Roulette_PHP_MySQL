<?php
if (isset($_POST['choix_classe'])){
    include_once "$racine/modele/bd.utilisateurs.inc.php";
    include_once "$racine/modele/bd.notes.inc.php";

    $Utilisateur=new Utilisateur();
    $Note=new Note();

    $idC=$_POST['choix_classe'];
    $random=$Utilisateur->getRandomUtilisateurByIdC($idC);
    $Utilisateur->updateStatutU($random['idU'],$idC);

    $title="Utilisateur tiré";
    include_once "$racine/vue/entete.html.php";
    include_once "$racine/vue/vueUtilisateurTire.php";
    include_once "$racine/vue/pied.html.php";
} else {
    include_once "controleurPrincipal.php";
    $action="accueil";
    $fichier=controleurPrincipal($action);
    include_once "$fichier";
}
?>