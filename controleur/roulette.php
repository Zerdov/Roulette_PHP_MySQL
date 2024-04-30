<?php
include_once "$racine/modele/bd.classes.inc.php";
include_once "$racine/modele/bd.utilisateurs.inc.php";
include_once "$racine/modele/bd.notes.inc.php";

$Classe=new Classe();
$Utilisateur=new Utilisateur();
$Note=new Note();

$liste_classes=$Classe->getClasses(); 

if(isset($_POST['reset_opt']) && isset($_POST['choix_classe'])){
    $options=$_POST['reset_opt'];
    $idC=$_POST['choix_classe'];
    foreach($idC as $u){
        foreach($options as $v){
            if($v==="reset_passages"){
                $Utilisateur->resetStatutU($u);
            }
            if($v==="reset_notes"){
                $Note->resetNotesByIdC($u);
            }
        }
    }
}

$utilisateurs=[];

foreach ($liste_classes as $v) {
    $utilisateursNonPasses = $Utilisateur->getUtilisateursNonPassByIdC($v['idC']);
    $utilisateursPasses = $Utilisateur->getUtilisateursPassByIdC($v['idC']);
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