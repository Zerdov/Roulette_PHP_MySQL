<?php
if (isset($_POST['note']) && isset($_GET['idU'])){
    include_once "$racine/modele/bd.notes.inc.php";

    $Note=new Note();
    
    $note=$_POST['note'];
    $idU=$_GET['idU'];
    $Note->addNote($note,$idU);

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