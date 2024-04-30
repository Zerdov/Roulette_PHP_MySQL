<?php 

include_once "bd.inc.php";

class Note extends Connecteur{

    function getNotes(){
        $resultat=array();
        try{
            $req=$this->conn->prepare("SELECT * FROM notes");
            
            $req->execute();
            $resulat= $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getNotesByIdU($idU){
        $resultat=[];
        try{
            $req=$this->conn->prepare("SELECT n.* FROM notes n INNER JOIN utilisateurs ut ON n.idE=ut.idU WHERE ut.idU=:idU ORDER BY n.dateN");
            $req->bindValue(':idU', $idU, PDO::PARAM_INT);
            $req->execute();

            $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function addNote($note, $idE, $idP){
        try {
            $req=$this->conn->prepare("INSERT INTO notes(valeurN, idE, idP) VALUES(:valeurN,:idE,:idP)");
            $req->bindValue(':valeurN', $note, PDO::PARAM_INT);
            $req->bindValue(':idE', $idE, PDO::PARAM_INT);
            $req->bindValue(':idP', $idP, PDO::PARAM_INT);

            $resultat=$req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }    

    function resetNotesByIdC($idC){
        $resultat=0;
        try{
            $req=$this->conn->prepare("DELETE FROM notes WHERE idE IN (SELECT idU FROM utilisateurs WHERE idC = :idC)");
            $req->bindValue(':idC', $idC, PDO::PARAM_INT);
            $req->execute();

            $resulat=1;           
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function supprNoteByIdN($idN){
        $resultat=0;
        try {
            $req=$this->conn->prepare('DELETE FROM notes WHERE idN=:idN');
            $req->bindValue(':idN',$idN,PDO::PARAM_INT);
            $req->execute();

            $resulat=1;
        } catch (PDOException $e) {
            print "Erreur !: ". $e->getMessage();
            die();
        }
        return $resulat;
    }
}
?>