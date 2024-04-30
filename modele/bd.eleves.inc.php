<?php 

include_once "bd.inc.php";

class Eleve extends Connecteur{

    function getEleveByIdE($idE){
        $resultat=[];
        try {
            $req = $this->conn->prepare("SELECT * FROM eleves WHERE idE=:idE");
            $req->bindParam(":idE",$idE, PDO::PARAM_INT);

            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getElevesNonPassByIdC($classe){
        $resultat=[];
        try {
            $req = $this->conn->prepare("SELECT eleves.* FROM eleves INNER JOIN classes ON eleves.idC=classes.idC WHERE passageE=0 AND classes.idC=:idC");
            $req->bindParam(":idC",$classe, PDO::PARAM_INT);

            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getElevesPassByIdC($classe){
        $resultat=[];
        try {
            $req = $this->conn->prepare("SELECT eleves.* FROM eleves INNER JOIN classes ON eleves.idC=classes.idC WHERE passageE=1 AND classes.idC=:idC");
            $req->bindParam(":idC",$classe, PDO::PARAM_INT);

            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function RandomEleveByIdC($classe){
        $resultat=[];
        try {
            $req = $this->conn->prepare("SELECT eleves.*, libelleC FROM eleves INNER JOIN classes ON eleves.idC=classes.idC WHERE eleves.passageE=0 AND classes.idC=:idC ORDER BY RAND() LIMIT 1");
            $req->bindParam(":idC",$classe, PDO::PARAM_INT);

            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function updateStatutE($idE, $idC){
        try {
            $req = $this->conn->prepare("UPDATE eleves SET passageE = 1 WHERE idE=:idE AND idC=:idC");
            $req->bindParam(":idE",$idE, PDO::PARAM_INT);
            $req->bindParam(":idC",$idC, PDO::PARAM_INT);

            $resultat=$req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function resetStatutE($idC){
        try{
            $req=$this->conn->prepare("UPDATE eleves SET passageE=0 WHERE idC=:idC");
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