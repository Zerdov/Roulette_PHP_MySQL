<?php 

include_once "bd.inc.php";

class Utilisateur extends Connecteur{

    function getUtilisateurByIdU($idU){
        $resultat=[];
        try {
            $req = $this->conn->prepare("SELECT * FROM utilisateurs WHERE idU=:idU");
            $req->bindParam(":idU",$idU, PDO::PARAM_INT);

            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getUtilisateursNonPassByIdC($classe){
        $resultat=[];
        try {
            $req = $this->conn->prepare("SELECT utilisateurs.* FROM utilisateurs INNER JOIN classes ON utilisateurs.idC=classes.idC WHERE passageU=0 AND classes.idC=:idC ORDER BY utilisateurs.nomU");
            $req->bindParam(":idC",$classe, PDO::PARAM_INT);

            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getUtilisateursPassByIdC($classe){
        $resultat=[];
        try {
            $req = $this->conn->prepare("SELECT utilisateurs.* FROM utilisateurs INNER JOIN classes ON utilisateurs.idC=classes.idC WHERE passageU=1 AND classes.idC=:idC ORDER BY utilisateurs.nomU");
            $req->bindParam(":idC",$classe, PDO::PARAM_INT);

            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getRandomUtilisateurByIdC($classe){
        $resultat=[];
        try {
            $req = $this->conn->prepare("SELECT utilisateurs.*, classes.libelleC FROM utilisateurs INNER JOIN classes ON utilisateurs.idC=classes.idC WHERE utilisateurs.passageU=0 AND classes.idC=:idC ORDER BY RAND() LIMIT 1");
            $req->bindParam(":idC",$classe, PDO::PARAM_INT);

            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function updateStatutU($idU, $idC){
        try {
            $req = $this->conn->prepare("UPDATE utilisateurs SET passageU=1 WHERE idU=:idU AND idC=:idC");
            $req->bindParam(":idU",$idU, PDO::PARAM_INT);
            $req->bindParam(":idC",$idC, PDO::PARAM_INT);

            $resultat=$req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function resetStatutU($idC){
        try{
            $req=$this->conn->prepare("UPDATE utilisateurs SET passageU=0 WHERE idC=:idC");
            $req->bindParam(":idC",$idC, PDO::PARAM_INT);

            $resultat=$req->execute();
        } catch(PDOException $e){
            print "Erreur !: ".$e->getMessage();
            die();
        }
        return $resultat;
    }
}
?>