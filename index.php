<?php
include_once "getRacine.php";
include_once "$racine/controleur/controleurPrincipal.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} elseif (isset($_POST["action"])) {
    $action = $_POST["action"];
} else {
    $action = "login";
}

$define = controleurPrincipal($action);
$header = $define["header"];
$fichier = $define["action"];
include_once "$racine/controleur/$fichier";
?>
     