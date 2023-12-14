<?php
session_start();

//vérifie si l'utilisateur peut accéder à cette page
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>administration</title>
    <!-- Ajout des styles Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1>administration</h1>
<a href="logout.php"> Déconnexion</a>
</body>
</html>