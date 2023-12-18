<?php
// chargement des dépendances faker
require_once '../vendor/autoload.php';


// connexion base de données 
require_once '../connexion.php';

$bdd = connectBdd('root','','blog_db');



// utilisation de la bibliotheque faker
$faker = Faker\Factory::create();

//preparation de la requête d'insertion d'utilisateur
$insertArticlescategory = $bdd->prepare
("INSERT INTO articles_categories (article_id, category_id )
VALUES (:article_id, :category_id)");

// selectionner tous les articles 
$query = $bdd->query("SELECT id FROM categories");
$categories = $query->fetchAll();

$query = $bdd->query("SELECT id FROM articles");
$articles = $query->fetchAll();

foreach ($articles as $article) {
    // génère un nombre d'itération aléatoire pour for 
    $iteration = $faker->randomNumber(1, 4);

      // générer trois utilisateurs
       for ($j = 0; $j < $iteration; $j++) {
         $categorie = $faker->randomElement($categories);

    $insertArticlescategory->bindValue(':article_id', $article['id']);
    $insertArticlescategory->bindValue(':category_id', $categorie['id']);
    $insertArticlescategory->execute();

}
}


























?>