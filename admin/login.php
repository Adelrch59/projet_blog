<?php
// démarrage de la session
// doit être placé le plus haut possible
session_start();
/**
 * Login.php
 * Permet de vérifier si un utilisateur peut accéder à l'administration
 */

/**
 * Logique : 
 * 1. Vérifier si le formulaire est complet -> sinon erreur
 * 2. Nettoyer les données issues du formulaire
 * 3. Sélectionner l'utilisateur en BDD via son email -> sinon erreur
 * 4. Vérifier si le mot de passe du formulaire correspond à celui en BDD -> sinon erreur
 * 5. Rédiriger l'utilisateur vers la page "dashboard.php"
 */

require_once '../connexion.php';

// Initialisation des erreurs à NULL
$error = null;

// vérifier si le formulaire est complet
if (!empty($_POST['email']) && !empty($_POST['password'])) {
 
    // Nettoyer les données issus du formulaire
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $password = htmlspecialchars(strip_tags($_POST['password']));

    // Retirer les espaces en début et fin de chaine
    $email = trim($email);
    $password = trim($password);


    // Connexion à la base de données
    $bdd = connectBdd('root', '', 'blog_db');
    $query = $bdd->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindValue(':email', $email);
    $query->execute();

    /**
     * fetch() retourne un tableau associatif contenant soit : 
     *  - les informations d'un utilisateur
     *  - FALSE
     */
    $user = $query->fetch();

    // Vérification de l'email
    if ($user && password_verify($password, $user['password'])){
        // stocker les infos de l'utilisateur en session
        $_SESSION['user'] = $user;

            // Redirection
            header('Location: dashboard.php');
            exit;
        
    } else {
        $error = 'Identifiants incorrects';
       
    }
} else {
    $error = 'Tous les champs sont obligatoires';
}

if ($error !== null) {
    //déclaration d'une session contenant l'erreur
    $_SESSION['error'] = $error;


    header('Location: index.php');
    exit;
}