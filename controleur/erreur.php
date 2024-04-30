<?php
$cause=$_GET['cause'];
$title=ucfirst($_GET['action']).' '.$cause;

switch ($cause) {
    case '403':
        $description="<p class='text-center mt-5 fs-3'>Désolé, vous n'avez pas l'accès à cette page</p>";
        break;
    case '404':
        $description="<p class='text-center mt-5 fs-3'>Désolé, il nous est impossible de vous afficher la page souhaitée car elle n'existe pas</p>";
        break;
    case '500':
        $description="<p class='text-center mt-5 fs-3'>Désolé, le serveur rencontre un problème et est actuellement hors-service</p>";
        break;
}

include_once "$racine/vue/entete.html.php";
include_once "$racine/vue/vueErreur.php";
include_once "$racine/vue/pied.html.php";
?>