<?php
include 'database.php';

$erreur = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['changer'])) {
    $identifiant = $_POST['identifiant'];
    $ancienMot_de_passe = $_POST['password1'];
    $nouveauMot_de_passe = $_POST['password2'];
    $confirmationMot_de_passe = $_POST['password3'];

    // Vérifier si les deux nouveaux mots de passe correspondent
    if ($nouveauMot_de_passe !== $confirmationMot_de_passe) {
        $erreur = "Les nouveaux mots de passe ne correspondent pas.";
    } else {
        // Vérifier si l'ancien mot de passe est correct
        $query = "SELECT * FROM MEMBRE_CIO WHERE ID_MEMBRECIO = :identifiant AND MOT_DE_PASSE_MEMBRECIO = :ancienMot_de_passe";
        $statement = oci_parse($conn, $query);

        oci_bind_by_name($statement, ":identifiant", $identifiant);
        oci_bind_by_name($statement, ":ancienMot_de_passe", $ancienMot_de_passe);

        oci_execute($statement);

        $row = oci_fetch_assoc($statement);
        if ($row) {
            // Mettre à jour le mot de passe dans la base de données
            $update_query = "UPDATE MEMBRE_CIO SET MOT_DE_PASSE_MEMBRECIO = :nouveauMot_de_passe WHERE ID_MEMBRECIO = :identifiant";
            $update_statement = oci_parse($conn, $update_query);

            oci_bind_by_name($update_statement, ":nouveauMot_de_passe", $nouveauMot_de_passe);
            oci_bind_by_name($update_statement, ":identifiant", $identifiant);

            oci_execute($update_statement);

            // Redirection vers la page de profil après la mise à jour réussie
            header("Location: profil.php");
            exit();
        } else {
            // Authentification échouée
            $erreur = "Identifiant ou mot de passe incorrect.";
        }

        oci_free_statement($statement);
        oci_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylemdps.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Changer le mot de passe</title>
</head>
<body>
    <div class="emballage">
        <form action="" method="post">
            <h1>Changer le mot de passe</h1>
            <div class="input-box">
                <i class='bx bxs-user'></i>
                <input type="text" name="identifiant" placeholder="Votre identifiant" required>
            </div>
            <div class="input-box">
                <input type="password" name="password1" placeholder="Votre ancien mot de passe" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password2" placeholder="Votre nouveau mot de passe" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password3" placeholder="Confirmation du nouveau mot de passe" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn" name="changer">Changer</button>

            <?php if (!empty($erreur)): ?>
                <div class="erreur"><?php echo $erreur; ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
