<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesupp.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Insertion de données</title>
</head>
<body>

<?php
include 'database.php';

// Désactiver tous les types de rapports d'erreurs
//error_reporting(0);

if (isset($_POST['supprimer']) && isset($_POST['identifient'])) {
    $table = $_POST['tabledelete'];
    $identifiant = $_POST['identifient'];
    
    $case = explode('.', $table);

        // Utilisez la première partie comme nom de table et la deuxième partie comme nom de colonne
        $tabledel = $case[0];
        $column = $case[1];
        // Construire la requête SQL de suppression
        $query = "DELETE FROM $tabledel WHERE $column LIKE '$identifiant'";

    if ($conn) {
        $stmt = oci_parse($conn, $query);

        if (oci_execute($stmt)) {
            // Redirection vers une page de succès ou affichage d'un message de réussite
         header("Location: profil.php");
            exit();
        } else {
            // Gérer les erreurs d'insertion
            $erreur = "Une erreur lors de la suppression des données.";
        }
    } else {
        // Gérer les erreurs de connexion
        $erreur = "Erreur de connexion à la base de données.";
    }
}
?>

    <div class="emballage">
        <form action="supprimer.php" method="post">
            <h1>Supprimer des données</h1>
            <div class="input-box">
                <label for="table">Table:</label>
                <p>Choisissez une table:</p>
                <select id="table" name="tabledelete" required>
                <option value="Participant.identifiant_participant">Participant</option>
                <option value="Personnel.id_personnel">Personnel</option>
                <option value="Ville.identifient_ville">Ville</option>
                <option value="Categorie.id_categorie">Categorie</option>
                <option value="Discipline.id_Discipline">Discipline</option>
                <option value="Entraineur.id_entraineur">Entraineur</option>
                <option value="Equipe.id_equipe">Equipe</option>
                <option value="Chambre.id_chambre">Chambre</option>
                <option value="Competition.id_competition">Competition</option>
                <option value="Athlete.id_athlete">Athlete</option>
                <option value="resultat.id_resultat">resultat</option>
                <option value="se_joue.id_competition">se_joue</option>
                <option value="rattache.id_personnel">rattache</option>
                <option value="joue.id_athlete">joue</option>
                <option value="inscrit.id_personnel">inscrit</option>
                <option value="loger.identifiant_participant">loger</option>
                <option value="possede.id_discipline">possede</option>
                <option value="palmares.id_palmares">palmares</option>
                <option value="arbitre.id_personnel">arbitre</option>
                <option value="pratique.id_athlete">pratique</option>
                </select>
            </div>

            <div id="Tabledelete">
                <div class="input-box">
                    <input type="text" name="identifient" placeholder="identifient de l'element" required>
                    <i class='bx bxs-user'></i>
                </div>
            </div>

<div class="rappeler">
                <a href="profil.php">Retour à votre profil?</a>
            </div>
            <button type="submit" class="btn" name="supprimer">Supprimer</button>

            <?php if (!empty($erreur)): ?>
                <div class="erreur"><?php echo $erreur; ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
