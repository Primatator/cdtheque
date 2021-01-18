<?php

namespace Models;
use PDO;

abstract class DbConnect implements Crud {

    protected $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost:3307;dbname=cdtheque;charset=utf8", "root", "");
    }


}