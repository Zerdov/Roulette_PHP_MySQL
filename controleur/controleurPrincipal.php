<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["accueil"] = "roulette.php";
    $lesActions["detail"] = "detail.php";
    $lesActions["tire"] = "eleve_tire.php";
    $lesActions["envoie"] = "envoie_note.php";
    $lesActions["erreur"] = "erreur.php";

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["accueil"];
    }
}

?>