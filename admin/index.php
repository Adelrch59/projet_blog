<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de Connexion avec Bootstrap</title>
    <!-- Ajout des styles Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Connexion</h2>
                        <!-- Mes erreurs ici -->
                        <?php 
                        if (isset($_SESSION['error'])):
                            ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error']; ?>
                    
                </div>
                
                <?php 
                unset ($_SESSION['error']);
                        endif;
                ?>
                    </div>
                    <div class="card-body">
                        
                        <form action="login.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse Email :</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="motDePasse" class="form-label">Mot de passe :</label>
                                <input type="password" class="form-control" id="motDePasse" name="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ajout du script Bootstrap (nécessaire pour les fonctionnalités JavaScript de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
