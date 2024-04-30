<?php

function controleurPrincipal($action) {
    $lesActions = [];
    $lesActions["accueil"] = "roulette.php";
    $lesActions["detail"] = "detail.php";
    $lesActions["tire"] = "eleveTire.php";
    $lesActions["envoie"] = "envoieNote.php";
    $lesActions["erreur"] = "erreur.php";

    $result = $lesActions["accueil"];
    if (array_key_exists($action, $lesActions)) {
        $result = $lesActions[$action];
    }
    return $result;
}

?>