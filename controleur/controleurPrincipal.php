<?php

function controleurPrincipal($action) {
    $lesActions = [];
    $lesActions["accueil"] = "roulette.php";
    $lesActions["detail"] = "detail.php";
    $lesActions["tire"] = "eleve_tire.php";
    $lesActions["envoie"] = "envoie_note.php";
    $lesActions["erreur"] = "erreur.php";

    $result = $lesActions["accueil"];
    if (array_key_exists($action, $lesActions)) {
        $result = $lesActions[$action];
    }
    return $result;
}

?>