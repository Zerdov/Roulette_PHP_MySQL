<?php
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/controleur/controleurPrincipal.php";

if(isset($_POST['nomU']) && isset($_POST['mdpU'])) {
    $nomU=$_POST['nomU'];
    $mdpU=$_POST['mdpU'];
} else {
    $nomU="";
    $mdpU="";
}

$auth=new Authentification($nomU, $mdpU);
$auth->login();

if(isLoggedOn()) {
    include_once "$racine/modele/bd.utilisateurs.inc.php";
    $Utilisateur=new Utilisateur();
    if(isProf()){
        include_once "$racine/modele/bd.classes.inc.php";
        include_once "$racine/modele/bd.notes.inc.php";

        $Classe=new Classe();
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
    } else {
        $action="detail";
        $define=controleurPrincipal($action);
        $header=$define['header'];
        $fichier=$define["action"];
        include_once "$fichier";
    }
} else {
    $action="login";
    $define=controleurPrincipal($action);
    $header=$define['header'];
    $fichier=$define["action"];
    include_once "$fichier";
}
?>