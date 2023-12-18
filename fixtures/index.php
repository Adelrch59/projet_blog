<?php

//localhost/PHP/blog/fixtures/index.php?truncate=1
if (isset($_GET['truncate'])) {
    // connexion base de donnée
    require '../connexion.php';
    $bdd = connectBdd('root', '', 'blog_db');

    // requete pour vider les tables sql
    $bdd->query("
    SET FOREIGN_KEY_CHECKS = 0;
    TRUNCATE articles_categories;
    TRUNCATE articles;
    TRUNCATE categories;
    TRUNCATE comments;
    TRUNCATE users;
    SET FOREIGN_KEY_CHECKS = 1;
    ");
}


require_once 'users_fixtures.php';
require_once 'categories_fixtures.php';
require_once 'articles_fixtures.php';
require_once 'comments_fixtures.php';
require_once 'articles_categories_fixtures.php';
?>