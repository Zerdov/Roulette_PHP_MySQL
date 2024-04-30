<?php
include_once "bd.utilisateurs.inc.php";
include_once "bd.classes.inc.php";
include_once "bd.notes.inc.php";

class Logs{
    protected $env;
    protected $conn;

    public function __construct(){
        $this->env=parse_ini_file('logs.env');

        try {
            $this->conn = new PDO("mysql:host=".$this->env['SERVER'].";dbname=".$this->env['DB'].";charset=UTF8", $this->env['USER'], $this->env['PASSWORD']); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Erreur de connexion PDO ";
            die();
        }
    }

    public function __toString(){
        $txt=$this->env['USER'].' '.$this->env['PASSWORD'].' '.$this->env['DB'].' '.$this->env['SERVER'].' ';
        return $txt;
    }


    /**
     * Description de la méthode
     *
     * @param String $param1 Description du premier paramètre
     * @param String $param2 Description du deuxième paramètre
     * @return Array Description de la valeur de retour
     * @return Array
     */
    public function addAction($classe, $methode, $args, $libelle, $crud) {
        $success = 0;
        try {
            $ReflectionClass = new ReflectionClass($classe);
            $ReflectionMethod = $ReflectionClass->getMethod($methode);
            $instance = $ReflectionClass->newInstance();
            $result = $ReflectionMethod->invokeArgs($instance, $args);
            if ($result || $result==[]) {
                $req = $this->conn->prepare("INSERT INTO actions(LIBELLE, CRUD) VALUES(:libelle, :crud)");
                $req->bindValue(':libelle', $libelle, PDO::PARAM_STR);
                $req->bindValue(':crud', $crud, PDO::PARAM_STR);
                $success = $req->execute();
            }
        } catch (PDOException $e) {
            print "Erreur : ".$e->getMessage();
            die();
        } catch (ReflectionException $e) {
            print "Erreur de réflexion : " . $e->getMessage();
            die();
        }
        return ['success' => $success, 'result' => $result];
    }
     
}
?>