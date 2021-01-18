<?php
// Point d'entrée des données utilisateur (GET, POST, COOKIES,...)
// Ces données sont reçues automatiquement par PHP ($_GET; $_POST, $_COOKIES)

// On utilise pour différencier les traitements à effectuer, un paramètre
//var_dump($_GET);
//var_dump($_POST);

require_once "controlers.php";

//ROUTER
$routeok = (isset($_GET["route"]))? $_GET["route"]: "default";

//Si route=ajoutdisque on appelle les traitements pour ajouter un disque
switch($routeok){
    case "ajoutdisque" : ajoutDisque();
    break;
    default : //fonction par défaut...
}

// AFFICHAGE (réponse HTTP)

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cdtheque</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<!-- Contenu spécifique de chacune des pages-->
<?php require "form.html" ?>
    
</body>
</html>