<?php
// chargement des dépendances faker
require_once '../vendor/autoload.php';


// connexion base de données 
require_once '../connexion.php';

$bdd = connectBdd('root','','blog_db');



// utilisation de la bibliotheque faker
$faker = Faker\Factory::create();

//preparation de la requête d'insertion d'utilisateur
$insertUser = $bdd->prepare("
INSERT INTO articles (title, content,cover, publication_date, user_id) 
VALUES (:title, :content, :cover, :publication_date, :user_id)");

// Séléctionne tous les users
$query = $bdd->query ("SELECT id FROM users");
$users = $query->fetchAll();

// générer 50 articles
for ($i = 0; $i < 50; $i++) {
    // selectionner un user aléatoire
    $user = $faker->randomElement($users);
    // génére une date entre deux ans et aujourd'hui
    $date = $faker->dateTimeBetween('-2 years')->format('Y-m-d H:i:s');
}

// générer trois utilisateurs
for ($i = 0; $i < 3; $i++) {
    
    $insertUser->bindValue(':title', $faker->sentence);
    $insertUser->bindValue(':content', $faker->paragraphs(6, true));
    $insertUser->bindValue(':cover', $faker->imageUrl);
    $insertUser->bindValue(':publication_date', $date);
    $insertUser->bindValue(':user_id', $user['id']);
    $insertUser->execute();

}



























?>