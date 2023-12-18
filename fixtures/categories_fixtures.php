<?php
// chargement des dépendances faker
require_once '../vendor/autoload.php';


// connexion base de données 
require_once '../connexion.php';

$bdd = connectBdd('root','','blog_db');



// utilisation de la bibliotheque faker
$faker = Faker\Factory::create();

//preparation de la requête d'insertion d'utilisateur
$insertCategories = $bdd->prepare
("INSERT INTO categories (name)VALUES ( :name)");


// générer trois utilisateurs
for ($i = 0; $i < 3; $i++) {
    $insertCategories->bindValue(':name', $faker->word); 
    $insertCategories->execute();

}



























?>