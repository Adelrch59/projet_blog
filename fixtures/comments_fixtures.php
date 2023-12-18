<?php
// chargement des dépendances faker
require_once '../vendor/autoload.php';


// connexion base de données 
require_once '../connexion.php';

$bdd = connectBdd('root','','blog_db');



// utilisation de la bibliotheque faker
$faker = Faker\Factory::create();

//preparation de la requête d'insertion d'utilisateur
$insertComments = $bdd->prepare
("INSERT INTO comments (content, comment_date, user_id, article_id)
VALUES (:content, :comment_date, :user_id, :article_id)");

// selectionner tous les articles 
$query = $bdd->query("SELECT id FROM users");
$users = $query->fetchAll();

// selectionner tous les articles 
$query = $bdd->query("SELECT id, publication_date FROM articles");
$articles = $query->fetchAll();

// générer 200 commentaires 

for ($i = 0; $i < 200; $i++) {

// séléctionner un user aléatoirement
$user = $faker->randomElement($users);

// Séléctionner un article aléatoirement
$article = $faker->randomElement($articles);

// génère une date entre la date de créa et aujourd'hui
$date = $faker->dateTimeBetween($article['publication_date'])->format('Y-m-d H:i:s');

    
    $insertComments->bindValue(':content', $faker->text);
    
    $insertComments->bindValue(':comment_date',$date);
    
    $insertComments->bindValue(':user_id', $user['id']);
    
    $insertComments->bindValue(':article_id', $article['id']);
    
    
    $insertComments->execute();

}



























?>