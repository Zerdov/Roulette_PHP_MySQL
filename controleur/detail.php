<?php
include_once "$racine/modele/authentification.inc.php";
if(isLoggedOn()){
    include_once "$racine/modele/bd.utilisateurs.inc.php"; 
    include_once "$racine/modele/bd.notes.inc.php";

    date_default_timezone_set('Europe/Paris');

    $Utilisateur=new Utilisateur();
    $Note=new Note();

    $idU=$Utilisateur->getUtilisateurByNomU(getNomULoggedOn())['idU'];
    $prof=isProf();
    if ($prof) {
        if (isset($_GET['idU'])) {
            $idU=$_GET['idU'];
        }
    }
    $utilisateur=$Utilisateur->getUtilisateurByIdU($idU);
    $notes_utilisateur=$Note->getNotesByIdU($idU);

    $title="Detail ".$utilisateur['nomU']." ".$utilisateur['prenomU'];
    include_once "$racine/vue/entete.html.php";
    include_once "$racine/vue/vueDetail.php";
    include_once "$racine/vue/pied.html.php";
} else {
    include_once "controleurPrincipal.php";
    $action="login";
    $define=controleurPrincipal($action);
    $header=$define['header'];
    $fichier=$define['action'];
    include_once "$fichier";
}
?>