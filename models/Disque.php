<?php

namespace Models;
use PDO;

class Disque extends DbConnect {

    private $reference;
    private $titre;
    private $annee;
    private $nom;

    public function getReference(): ?string {
        return $this->reference;
    }

    public function setReference(string $ref) {
        $this->reference = $ref;
    }


    public function getTitre(): ?string {
        return $this->titre;
    }

    public function setTitre(string $titre) {
        $this->titre = $titre;
    }


    public function getAnnee(): ?string {
        return $this->annee;
    }

    public function setAnnee(string $annee) {
        $this->annee = $annee;
    }


    public function getNom(): ?string {
        return $this->nom;
    }

    public function setNom(string $nom) {
        $this->nom = $nom;
    }

    public function selectAll(){
        $query = "SELECT reference, titre, année, nom FROM disques;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetchall();
        return $datas;
    }

    public function select(){
    
        $query = "SELECT reference, titre, annee, nom FROM disques WHERE reference = :ref;";
        $result = $this->pdo->prepare($query);

        $result->bindValue("ref", $this->reference, PDO::PARAM_STR);
        $result->execute();
        $datas = $result->fetch();
        return $datas;

    }

    public function insert(){

        $query = "INSERT INTO disques (reference, titre, annee, nom) VALUES (:ref, :titre, :annee, ;nom);";
        $result = $this->pdo->prepare($query);

        $result->bindValue("ref", $this->reference, PDO::PARAM_STR);
        $result->bindValue("titre", $this->titre, PDO::PARAM_STR);
        $result->bindValue("annee", $this->annee, PDO::PARAM_STR);
        $result->bindValue("nom", $this->nom, PDO::PARAM_STR);
        $result->execute();
    }

    public function update() {
        $query = "UPDATE disques SET titre = :titre, annee = :annee, nom = :nom WHERE reference = :ref;";
        $result = $this->pdo->prepare($query);

        $result->bindValue("titre", $this->titre, PDO::PARAM_STR);
        $result->bindValue("annee", $this->annee, PDO::PARAM_STR);
        $result->bindValue("nom", $this->nom, PDO::PARAM_STR);
        $result->bindValue("ref", $this->reference, PDO::PARAM_STR);
        $result->execute();
        
    }

    public function delete() {
        $query = "DELETE FROM disques WHERE reference = :ref;";
        $result = $this->pdo->prepare($query);

        $result->bindValue("ref", $this->reference, PDO::PARAM_STR);
        $result->execute();

    }






    

}