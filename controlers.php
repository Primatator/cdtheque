<?php

// Chargement automatique des classes :
spl_autoload_register(function (string $class) {

    // echo $class; // ex : "Models\Label"

    $class = str_replace("\\", "/", $class);
    // echo $class; // ex : "Models/Label"

    $class = lcfirst($class);
    // echo $class; // ex : "models/Label"

    if(file_exists("$class.php")) {
        require_once "$class.php";
        // ex : models/Label.php
        return true;
    }

    throw new Exception("Une erreur est survenue lors du chargement !!!!!!!!!!!!!");

});

// Fonctions "CONTROLERS" = traitements appelés

function ajoutDisque(){
    //contient tous les traitements nécessaires à l'ajout d'un disque
    //echo "J'ajoute un disque";

    // Je dispose des données transmises par l'utilisateur dans $_POST

    // J'insère mon label, puis mon artiste et enfin, mon disque et la relation disque-artiste
$label = new Models\Label();
$label->setNom($_POST["label"]);
if(!$label->select()){
    $label->insert();
}

$artiste = new Models\Artiste();
$artiste->setNom($_POST["artiste"]);

if(!$artiste->selectByNom()){
    $artiste->insert();
}

$artiste->insert();

$disque = new Models\Disque ();
$disque ->setReference($_POST["reference"]);
$disque ->setTitre($_POST["titre"]);
$disque ->setAnnee($_POST["annee"]);
$disque ->setNom($label->getNom());
$disque ->insert();

$enr = new Models\Enregistrer();
$enr->setIdArtiste($artiste->getIdArtiste());
$enr->setReference($disque->getReference());
$enr->insert();


    // Résultat souhaité : enregistrement des données dans la database
}

try {
    $label1 = new Models\Label();
    $disque1 = new Models\Disque();
    $artiste1 = new Models\Artiste();
    $enregistrer1 = new Models\Enregistrer();

    $disque1->setReference('835948');
    $disque1->setTitre('Marshall Matters');
    $disque1->setAnnee('2004');
    $disque1->setNom('Death Row');
    $disque1->insert();


    $enregistrer1->setIdArtiste(1);
    $enregistrer1->setReference('021568');
    $donnees = $enregistrer1->select();

    //var_dump($donnees);

} catch(Exception $e) {
    echo "Une exception est survenue, je peux faire quelque chose dans ce cas là...";
}

//$label1->setNom("Universal");

//var_dump($label1);
//echo "Le nom du label est :" . $label1->getNom();
