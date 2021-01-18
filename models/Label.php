<?php

namespace Models;
use PDO;

class Label extends DbConnect {
    
    private $nom;

    public function getNom(): ?string {
        return $this->nom;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function selectAll(){
        $query = "SELECT nom FROM labels;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetchall();
        return $datas;
    }

    public function select(){
    
        $query = "SELECT nom FROM labels WHERE nom = :nom;";
        $result = $this->pdo->prepare($query);

        $result->bindValue("nom", $this->nom, PDO::PARAM_STR);
        $result->execute();
        $datas = $result->fetch();

        if($datas){
            $this->nom = $datas['nom'];
        }
        return $datas;

    }

    public function insert(){
    
        $query = "INSERT INTO labels (nom) VALUES (:nom);";
        $result = $this->pdo->prepare($query);

        $result->bindValue("nom", $this->nom, PDO::PARAM_STR);
        if(!$result->execute())
            var_dump($result->errorInfo());

    }

    public function update() {
        
    }

    public function delete() {
        $query = "DELETE FROM labels WHERE nom = :nom;";
        $result = $this->pdo->prepare($query);

        $result->bindValue("nom", $this->nom, PDO::PARAM_STR);
        $result->execute();

    }






}