<?php

namespace Models;
use PDO;

class Enregistrer extends DbConnect {

    private $idArtiste;
    private $reference;

    public function getIdArtiste(): int {
        return $this->idArtiste;
    }

    public function setIdArtiste(int $idArtiste) {
        $this->idArtiste = $idArtiste;
    }


    public function getReference(): string {
        return $this->reference;
    }

    public function setReference(string $reference) {
        $this->reference = $reference;
    }

    public function selectAll(){
        $query = "SELECT id_artiste, reference FROM enregistrer;";
        $result = $this->pdo->prepare($query);
        $result->execute();
        $datas = $result->fetchall();
        return $datas;
    }

    public function select(){
        
        $query = "SELECT id_artiste, reference FROM enregistrer WHERE id_artiste = :idArtiste  AND  reference = :ref ;";
        $result = $this->pdo->prepare($query);

        $result->bindValue("idArtiste", $this->idArtiste, PDO::PARAM_INT);
        $result->bindValue("ref", $this->reference, PDO::PARAM_STR);
        $result->execute();
        $datas = $result->fetch();
        return $datas;

    }

    public function insert(){
    
        $query = "INSERT INTO enregistrer (id_artiste, reference) VALUES (:idArtiste, :ref);";
        $result = $this->pdo->prepare($query);

        $result->bindValue("idArtiste", $this->idArtiste, PDO::PARAM_INT);
        $result->bindValue("ref", $this->reference, PDO::PARAM_STR);
        $result->execute();
    }

    public function update() {

        
    }

    public function delete() {
        $query = "DELETE FROM disques WHERE reference = :ref AND id_artiste = :idArtiste;";
        $result = $this->pdo->prepare($query);

        $result->bindValue("ref", $this->reference, PDO::PARAM_STR);
        $result->bindValue("idArtiste", $this->idArtiste, PDO::PARAM_INT);
        $result->execute();

    }



    



    

}