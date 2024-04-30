<?php
include_once "$racine/modele/authentification.inc.php";
if(isLoggedOn()){
    if(isProf()){
        if (isset($_POST['choix_classe'])) {
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
            $action="accueil";
            $define=controleurPrincipal($action);
            $header=$define['header'];
            $fichier=$define["action"];
            include_once "$racine/controleur/$fichier";
        }
    } else {
        include_once "controleurPrincipal.php";
        $action="accueil";
        $define=controleurPrincipal($action);
        $header=$define['header'];
        $fichier=$define['action'];
        include_once "$fichier";
    }
} else {
    include_once "controleurPrincipal.php";
    $action="login";
    $define=controleurPrincipal($action);
    $header=$define['header'];
    $fichier=$define['action'];
    include_once "$fichier";
}
?>