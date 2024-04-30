<?php
class Connecteur{
    protected $env;
    protected $conn;

    public function __construct(){
        $this->env=parse_ini_file('.env');

        try {
            $this->conn = new PDO("mysql:host=".$this->env['SERVER'].";dbname=".$this->env['DB'].";charset=UTF8", $this->env['USER'], $this->env['PASSWORD']); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Erreur de connexion PDO ";
            die();
        }
    }

    public function __toString(){
        $txt=$this->login.' '.$this->mdp.' '.$this->bd.' '.$this->serveur.' ';
        return $txt;
    }
}
?>