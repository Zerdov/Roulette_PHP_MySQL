<?php
if (isset($_POST['note']) && isset($_GET['idU'])){
    include_once "$racine/modele/bd.logs.inc.php";

    $Logs=new Logs();
    
    $note=$_POST['note'];
    $idU=$_GET['idU'];
    $Logs->addAction("Note", "addNote", [$note, $idU], "Ajout de la note ".$note." à l'utilisateur d'id ".$idU, "create");

    $title="Confirmé";
    include_once "$racine/vue/entete.html.php";
    include_once "$racine/vue/vueConfirme.php";
    include_once "$racine/vue/pied.html.php";
} else {
    include_once "controleurPrincipal.php";
    $action="accueil";
    $fichier=controleurPrincipal($action);
    include_once "$fichier";
}
?>