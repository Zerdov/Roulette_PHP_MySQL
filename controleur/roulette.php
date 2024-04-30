<?php
include_once "$racine/modele/bd.logs.inc.php";

$Logs=new Logs();

$liste_classes = $Logs->addAction("CLasse", "getClasses", [""], "Lectures des classes", "read")['result'];

if(isset($_POST['reset_opt']) && isset($_POST['choix_classe'])){
    $options=$_POST['reset_opt'];
    $idC=$_POST['choix_classe'];
    foreach($idC as $u){
        foreach($options as $v){
            if($v==="reset_passages"){
                $Logs->addAction("Utilisateur", "resetStatutUtilisateurByIdC", [$u], "Reset des passages de la classe d'id ".$u, "update");
            }
            if($v==="reset_notes"){
                $Logs->addAction("Note", "resetNotesByIdC", [$u], "Reset des notes de la classe d'id ".$u, "delete");
            }
        }
    }
} 

$utilisateurs=[];

foreach ($liste_classes as $v) {
    $utilisateursNonPasses = $Logs->addAction('Utilisateur', 'getUtilisateursNonPassByIdC', [$v['idC']], "Lecture des utilisateurs non passés de la classe d'id ".$v['idC'], "read")['result'];
    $utilisateursPasses = $Logs->addAction('Utilisateur', 'getUtilisateursPassByIdC', [$v['idC']], "Lecture des utilisateurs passés de la classe d'id ".$v['idC'], "read")['result'];
    $utilisateurs[$v['libelleC']] = [
        'Non Passés' => $utilisateursNonPasses,
        'Passés' => $utilisateursPasses,
    ];
}


$title="Roulette";
include_once "$racine/vue/entete.html.php";
include_once "$racine/vue/vueAccueil.php";
include_once "$racine/vue/pied.html.php";
?>