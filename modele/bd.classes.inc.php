<?php 

include_once "bd.inc.php";

class Classe extends Connecteur{

    function getClasses(){
        $resultat=array();
        try {
            $req = $this->conn->prepare("SELECT * FROM classes");
            
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}
?>