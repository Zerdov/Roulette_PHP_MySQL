<?php
if (isset($_POST['choix_classe'])){
    include_once "$racine/modele/bd.logs.inc.php";
    $Logs = new Logs();

    $idC=$_POST['choix_classe'];
    $random = $Logs->addAction("Utilisateur", "getRandomUtilisateurByIdC", [$idC], "Lecture d'un utilisateur tiré au hasard de la classe d'id ".$idC, "read")['result'];
    $Logs->addAction("Utilisateur", "updateStatusU", [$random['idU']], "Update du satus de l'utilisateur d'id ".$random['idU'], "update");

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