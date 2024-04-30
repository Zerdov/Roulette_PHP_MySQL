<?php
include_once "$racine/modele/authentification.inc.php";
if(isLoggedOn()){
    if(isProf()){
        if (isset($_POST['note']) && isset($_GET['idU'])){
            include_once "$racine/modele/bd.utilisateurs.inc.php";
            include_once "$racine/modele/bd.notes.inc.php";

            $Utilisateur=new Utilisateur();
            $Note=new Note();

            $note=$_POST['note'];
            $idE=$_GET['idU'];
            $nomU=getNomULoggedOn();
            $idP=$Utilisateur->getUtilisateurByNomU($nomU)['idU'];
            $Note->addNote($note,$idE,$idP);

            $title="Confirmé";
            include_once "$racine/vue/entete.html.php";
            include_once "$racine/vue/vueConfirme.php";
            include_once "$racine/vue/pied.html.php";
        } else {
            $action="accueil";
            $define=controleurPrincipal($action);
            $header=$define['header'];
            $fichier=$define["action"];
            include_once "$fichier";
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