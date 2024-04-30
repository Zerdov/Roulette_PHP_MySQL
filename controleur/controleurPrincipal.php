<?php
include_once "$racine/modele/authentification.inc.php";

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["login"] = "login.php"; 
    $lesActions["accueil"] = "roulette.php";
    $lesActions["detail"] = "detail.php";
    $lesActions["suppression"] ="suppr_note.php";
    $lesActions["tire"] = "eleve_tire.php";
    $lesActions["envoie"] = "envoie_note.php";
    $lesActions["showNotes"] = "show_notes.php";
    $lesActions["erreur"] = "erreur.php";  

    $header=
    "<nav class='navbar navbar-expand-lg bg-body-tertiary'>
        <div class='container-fluid'>
            <span class='navbar-brand'><i class='bi bi-r-square-fill'></i> Projet Roulette</span>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
                <div class='navbar-nav ms-auto'>
                    <a class='nav-link text-primary mx-2' href='./accueil'>Accueil</a>
                    <a class='nav-link text-danger mx-2' href='./logout'>Déconnexion</a>
                </div>
            </div>
        </div>
    </nav>";
    if (array_key_exists($action, $lesActions)) {
        $resultat=$lesActions[$action];
        if ($action==="login") {
            $header="";
        }
    } else {
        $resultat=$lesActions["accueil"];
        if(!isLoggedOn()){
            $header="";
            $resultat=$lesActions["login"];
        }
    }
    return ["action"=>$resultat,"header"=>$header];
}
?>