<?php

include_once "bd.utilisateurs.inc.php";

class Authentification extends Utilisateur{
    public $nomU;
    public $mdpU;

    public function __construct($nomU, $mdpU){
        $this->nomU=$nomU;
        $this->mdpU=$mdpU;
    }

    function login() {
        if (!isset($_SESSION)) {
            session_start();
        }

        $utilisateur=new Utilisateur();
        $util = $utilisateur->getUtilisateurByNomU($this->nomU);
        if ($util){
            $mdpBD = $util["mdpU"];
        }
        else {
            $mdpBD="faux";
        }

        // password_verify (mdp saisie, mdp hashé stocké dans la bdd)
        if (password_verify($this->mdpU,$mdpBD)) {
            // le mot de passe est celui de l'utilisateur dans la base de donnees
            $_SESSION["nomU"] = $this->nomU;
            $_SESSION["mdpU"] = $mdpBD;
        }
    }
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["nomU"]);
    unset($_SESSION["mdpU"]);
}

function getNomULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["nomU"];
    }
    else {
        $ret = "";
    }
    return $ret;
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["nomU"])) {
        $utilisateur=new Utilisateur();
        $util = $utilisateur->getUtilisateurByNomU($_SESSION["nomU"]);
        if ($util["nomU"] == $_SESSION["nomU"] && $util["mdpU"] == $_SESSION["mdpU"]){
            $ret = true;
        }
    }
    return $ret;
}


function isProf(){
    $ret = false;

    if (isset($_SESSION["nomU"])) {
        $utilisateur=new Utilisateur();
        $util = $utilisateur->getUtilisateurByNomU($_SESSION["nomU"]);
        if ($util["droitU"]){
            $ret = true;
        }
    }
    return $ret;
}
?>