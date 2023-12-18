<?php
// chargement des dépendances faker
require_once '../vendor/autoload.php';


// connexion base de données 
require_once '../connexion.php';

$bdd = connectBdd('root','','blog_db');



// utilisation de la bibliotheque faker
$faker = Faker\Factory::create();

//preparation de la requête d'insertion d'utilisateur
$insertUser = $bdd->prepare("INSERT INTO users (name, email, password)VALUES (:name, :email, :password)");


// générer trois utilisateurs
for ($i = 0; $i < 3; $i++) {
    $insertUser->bindValue(':name', $faker->name);
    $insertUser->bindValue(':email', $faker->email);
    $insertUser->bindValue(':password', password_hash('Phoenix-486', PASSWORD_DEFAULT));
    $insertUser->execute();

}



























?>