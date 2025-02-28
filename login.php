<?php
include 'database.php';

$erreur = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['connexion'])) {
    $identifiant = $_POST['identifiant'];
    $mot_de_passe = $_POST['password'];

    $query = "SELECT * FROM MEMBRE_CIO WHERE ID_MEMBRECIO = :identifiant AND MOT_DE_PASSE_MEMBRECIO = :mot_de_passe";
    $statement = oci_parse($conn, $query);

    oci_bind_by_name($statement, ":identifiant", $identifiant);
    oci_bind_by_name($statement, ":mot_de_passe", $mot_de_passe);
    
    // Exécuter la requête
    oci_execute($statement);

    $row = oci_fetch_assoc($statement);
    if ($row) {
        // Authentification réussie, rediriger vers la page profil
        session_start();
        $_SESSION['identifiant'] = $identifiant;
        header("Location: profil.php");
        exit();
    } else {
        // Authentification échouée
        $erreur = "Identifiant ou mot de passe incorrect.";
    }

    oci_free_statement($statement);
    oci_close($conn);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login Membre CIO</title>
</head>
<body>
    <div class="emballage">
        <form action="login.php" method="post">
            <h1>Connexion</h1>
            <div class="input-box">
                <i class='bx bxs-user'></i>
                <input type="text" name="identifiant" placeholder="Votre identifiant" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Votre mot de passe" required>
                <i class='bx bxs-lock-alt'></i>
            </div> 
            <div class="rappeler">
                <a href="mdpsoublie.php">Changer le Mot de passe ?</a>
            </div>
            <button type="submit" class="btn" name="connexion">Connexion</button>
            <!-- Affichage du message d'erreur -->
            <?php if (!empty($erreur)): ?>
                <div class="erreur"><?php echo $erreur; ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
