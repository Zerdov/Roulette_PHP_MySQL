<?php
include_once "$racine/modele/bd.utilisateurs.inc.php"; 
include_once "$racine/modele/bd.notes.inc.php";

if (isset($_GET['idU'])){
    $idU=$_GET['idU'];

    date_default_timezone_set('Europe/Paris');

    $Utilisateur=new Utilisateur();
    $Note=new Note();

    $utilisateur=$Utilisateur->getUtilisateurByIdU($idU);
    $notes_utilisateur=$Note->getNoteByIdU($idU);

    $title="Detail ".$utilisateur['nomU']." ".$utilisateur['prenomU'];
    include_once "$racine/vue/entete.html.php";
    include_once "$racine/vue/vueDetail.php";
    include_once "$racine/vue/pied.html.php";
} else {
    include_once "controleurPrincipal.php";
    $action="accueil";
    $fichier=controleurPrincipal($action);
    include_once "$fichier";
}
?>