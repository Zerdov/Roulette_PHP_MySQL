<?php
include_once "$racine/modele/authentification.inc.php";

logout();

$title="Connexion";
include_once "$racine/vue/entete.html.php";
include_once "$racine/vue/vueLogin.php";
include_once "$racine/vue/pied.html.php";
?>