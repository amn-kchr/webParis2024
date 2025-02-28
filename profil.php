<?php
include 'database.php';

// désactiver tous les types de rapports d'erreurs
error_reporting(0);


session_start();
$identifiant = $_SESSION['identifiant']; // Récupère l'identifiant stocké dans la session

// Vérifie si la session identifiant est définie
if (!isset($_SESSION['identifiant'])) {
    // Redirige vers la page de connexion
    header("Location: login.php");
    exit(); // Assurez-vous de terminer le script après la redirection
}

$results = array(); // Initialisez le tableau des résultats

if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sort_order = isset($_POST['sort_order']) ? $_POST['sort_order'] : 'ASC'; // Par défaut, tri croissant
    $sort_name=$_POST['sort_column_nom'] ?? 'nom_participant';

// Requête SQL pour rechercher dans la table Participant
$query_participant = "SELECT $sort_name FROM Participant WHERE nom_participant LIKE '%' || :search || '%' OR prenom_participant LIKE '%' || :search || '%' ORDER BY nom_participant $sort_order, prenom_participant $sort_order";

    $result_participant = oci_parse($conn, $query_participant);
    $searchParamParticipant = $search; // Utilisation d'une variable distincte pour le paramètre de recherche dans Participant
    oci_bind_by_name($result_participant, ':search', $searchParamParticipant);

    oci_execute($result_participant);
    // Requête SQL pour rechercher dans la table Personnel
    $query_personnel = "SELECT $sort_name FROM Personnel WHERE id_personnel LIKE :searchpersonnel || '%' OR role_personnel LIKE :searchpersonnel || '%' ORDER BY role_personnel $sort_order";

    $result_personnel = oci_parse($conn, $query_personnel);
    $searchParamPersonnel = $search; // Utilisez une variable distincte pour le paramètre de recherche dans Personnel
    oci_bind_by_name($result_personnel, ':searchpersonnel', $searchParamPersonnel);

    oci_execute($result_personnel);


    // Requête SQL pour rechercher dans la table Ville
    $query_ville = "SELECT $sort_name FROM Ville WHERE nom_ville LIKE :searchville || '%' OR identifient_ville LIKE :searchville || '%' ORDER BY identifient_ville $sort_order";

    $result_ville = oci_parse($conn, $query_ville);
    $searchParamVille = $search; // Utilisez une variable distincte pour le paramètre de recherche dans Personnel
    oci_bind_by_name($result_ville, ':searchville', $searchParamVille);

    oci_execute($result_ville);


   // Requête SQL pour rechercher dans la table Catégorie
   $query_categorie = "SELECT $sort_name FROM Categorie WHERE nom_categorie LIKE :searchcategorie || '%' OR id_categorie LIKE :searchcategorie || '%' OR genre_categorie LIKE :searchcategorie || '%' ORDER BY nom_categorie $sort_order";

   $result_categorie = oci_parse($conn, $query_categorie);
   $searchParamCategorie = $search; // Utilisez une variable distincte pour le paramètre de recherche dans Personnel
   oci_bind_by_name($result_categorie, ':searchcategorie', $searchParamCategorie);

   oci_execute($result_categorie);


   // Requête SQL pour rechercher dans la table Discipline
   $query_discipline = "SELECT $sort_name FROM Discipline WHERE id_Discipline LIKE :searchdiscipline || '%' OR nom_Discipline LIKE :searchdiscipline || '%' OR record_Discipline LIKE :searchdiscipline || '%' ORDER BY nom_discipline $sort_order";

   $result_discipline = oci_parse($conn, $query_discipline);
   $searchParamDiscipline = $search; // Utilisez une variable distincte pour le paramètre de recherche dans Personnel
   oci_bind_by_name($result_discipline, ':searchdiscipline', $searchParamDiscipline);

   oci_execute($result_discipline);


   // Requête SQL pour rechercher dans la table Entraineur
   $query_entraineur = "SELECT $sort_name FROM Entraineur WHERE id_entraineur LIKE :searchentraineur || '%' OR diplome_entraineur LIKE :searchentraineur || '%' ORDER BY id_entraineur $sort_order";

   $result_entraineur = oci_parse($conn, $query_entraineur);
   $searchParamEntraineur = $search; // Utilisez une variable distincte pour le paramètre de recherche dans Personnel
   oci_bind_by_name($result_entraineur, ':searchentraineur', $searchParamEntraineur);

   oci_execute($result_entraineur);

// Requête SQL pour rechercher dans la table Equipe
$query_equipe = "SELECT $sort_name FROM Equipe WHERE id_equipe LIKE :searchequipe || '%' OR nom_equipe LIKE :searchequipe || '%' ORDER BY id_equipe  $sort_order";

$result_equipe = oci_parse($conn, $query_equipe);
$searchParamEquipe = $search; // Utilisez une variable distincte pour le paramètre de recherche dans equipe
oci_bind_by_name($result_equipe, ':searchequipe', $searchParamEquipe);

oci_execute($result_equipe);

// Requête SQL pour rechercher dans la table Competition
$query_competition = "SELECT $sort_name FROM Competition WHERE id_competition LIKE :searchcompetition || '%' OR nom_competition LIKE :searchcompetition || '%' OR avancement_competition LIKE :searchcompetition || '%' ORDER BY id_competition $sort_order";

$result_competition = oci_parse($conn, $query_competition);
$searchParamCompetition = $search; // Utilisez une variable distincte pour le paramètre de recherche dans competition
oci_bind_by_name($result_competition, ':searchcompetition', $searchParamCompetition);

oci_execute($result_competition);



    // Fusionner les résultats de toutes les tables
    while ($row = oci_fetch_assoc($result_participant)) {
      // Ajoutez une clé 'source' pour chaque résultat indiquant la table d'origine
      $row['source'] = 'Participant';
      $results[] = $row;
  }
  
  while ($row = oci_fetch_assoc($result_personnel)) {
      $row['source'] = 'Personnel';
      $results[] = $row;
  }
  
  while ($row = oci_fetch_assoc($result_ville)) {
      $row['source'] = 'Ville';
      $results[] = $row;
  }

  while ($row = oci_fetch_assoc($result_categorie)) {
    $row['source'] = 'Categorie';
    $results[] = $row;
  }

  while ($row = oci_fetch_assoc($result_discipline)) {
    $row['source'] = 'Discipline';
    $results[] = $row;
  }

  while ($row = oci_fetch_assoc($result_entraineur)) {
    $row['source'] = 'Entraineur';
    $results[] = $row;
  }

  while ($row = oci_fetch_assoc($result_equipe)) {
    $row['source'] = 'Equipe';
    $results[] = $row;
  }

  while ($row = oci_fetch_assoc($result_competition)) {
    $row['source'] = 'Competition';
    $results[] = $row;
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link rel="stylesheet" href="stylePr.css" />
    <title>PROFIL</title>
  </head>
  <body>
    <header>
    <nav class="navbar">
      <i class='bx bxs-user'></i>
      <ul class="navbar-list">
        <li><a href="Acceuil.php">Acceuil</a></li>
      </ul>

      <div class="profile-dropdown">
        <div onclick="toggle()" class="profile-dropdown-btn">
          <div class="profile-img">
            <i class="fa-solid fa-circle"></i>
          </div>

          <span><?php echo $identifiant; ?><i class="fa-solid fa-angle-down"></i></span>
        </div>

        <ul class="profile-dropdown-list">
          <li class="profile-dropdown-list-item">
            <a href="ajouter.php">
              <i class="fa-regular fa-user"></i>
              Ajouter
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="modifier.php">
              <i class="fa-regular fa-circle-question"></i>
              Modifier
            </a>
          </li>

          <li class="profile-dropdown-list-item">
            <a href="supprimer.php">
              <i class="fa-regular fa-circle-question"></i>
              Supprimer
            </a>
          </li>
          <hr />

          <li class="profile-dropdown-list-item">
            <a href="login.php">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              Deconnexion
            </a>
          </li>
        </ul>
      </div>
    </nav>
</header>

<div class="container">
    <h1>Recherche dans toutes les tables</h1>
    <form method="POST">
        <input type="text" name="search" placeholder="Recherche par mot-clé" required>

        <select name="sort_order">
            <option value="ASC">Croissant</option>
            <option value="DESC">Décroissant</option>
        </select>

        <select name="sort_column_nom">
        <option value="identifient_participant">ID Participant</option>
    <option value="prenom_participant">Prénom Participant</option>
    <option value="nom_participant">Nom Participant</option>
    <option value="date_naissance_participant">date_naissance Participant</option>
    <option value="nationalite_participant">Nationalite Participant</option>
    <option value="id_personnel">ID Personnel</option>
    <option value="role_personnel">Role Personnel</option>
    <option value="nom_ville">Nom Ville</option>
    <option value="identifient_ville">Identifiant Ville</option>
    <option value="nom_categorie">Nom Catégorie</option>
    <option value="id_categorie">ID Catégorie</option>
    <option value="genre_categorie">Genre Catégorie</option>
    <option value="id_Discipline">id_Discipline</option>
    <option value="nom_Discipline">nom_Discipline</option>
    <option value="record_Discipline">record_Discipline</option>
    <option value="id_entraineur">id_entraineur</option>
    <option value="diplome_entraineur">diplome_entraineur</option>
    <option value="id_equipe">id_equipe</option>
    <option value="nom_equipe">nom_equipe</option>
    <option value="id_competition">id_competition</option>
    <option value="nom_competition">nom_competition</option>  
     <option value="avancement_competition">avancement_competition</option>


        </select>
        <button type="submit">Rechercher</button>
    </form>

    <?php if (!empty($results)): ?>
            <?php foreach (array_unique(array_column($results, 'source')) as $source): ?>
                <h2 class='res-titre'>Résultats de la recherche pour '<?php echo $search; ?>' dans la table <?php echo $source; ?></h2>
                <table>
                    <thead>
                        <tr>
                        <?php if ($source === 'Participant' && isset($_POST['sort_column_nom'])): ?>
                        
                        
                        <th><?php echo $sort_name;?> </th>
                          <th>table</th>

                                <!-- Ajoutez d'autres colonnes si nécessaire pour la table Participant -->
                            <?php elseif ($source === 'Personnel'): ?>
                                <th><?php echo $sort_name;?> </th>
                                <th>table</th>
                                <!-- Ajoutez d'autres colonnes si nécessaire pour la table Personnel -->
                            <?php elseif ($source === 'Ville'): ?>
                              <th><?php echo $sort_name;?> </th>
                                <th>table</th>

                                <!-- Ajoutez d'autres colonnes si nécessaire pour la table Ville -->
                            <?php elseif ($source === 'Categorie'): ?>
                              <th><?php echo $sort_name;?> </th>
                                <th>table</th>
                                <!-- Ajoutez d'autres colonnes si nécessaire pour la table Categorie -->
                            <?php elseif ($source === 'Discipline'): ?>
                              <th><?php echo $sort_name;?> </th>
                                <th>table</th>
                                <!-- Ajoutez d'autres colonnes si nécessaire pour la table Discipline -->
                            <?php elseif ($source === 'Entraineur'): ?>
                              <th><?php echo $sort_name;?> </th>
                                <th>table</th>
                                <!-- Ajoutez d'autres colonnes si nécessaire pour la table Entraineur -->
                            <?php elseif ($source === 'Equipe'): ?>
                              <th><?php echo $sort_name;?> </th>
                                <th>table</th>
                                <!-- Ajoutez d'autres colonnes si nécessaire pour la table Equipe -->
                            <?php elseif ($source === 'Competition'): ?>
                                
                              <th><?php echo $sort_name;?> </th>
                                <th>table</th>
                                
                                <!-- Ajoutez d'autres colonnes si nécessaire pour la table Competition -->
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $row): ?>
                            <?php if ($row['source'] === $source): ?>
                                <tr>
                                    <?php foreach ($row as $key => $value): ?>
                                        <?php
                                            $highlight = ''; // Initialisez la variable $highlight à une chaîne vide

                                            // Vérifie si la valeur contient le mot-clé de recherche
                                                if (stripos($value, $search) === 0) {
                                                     $highlight = 'highlight'; // Si la condition est vraie, définissez $highlight sur 'highlight'
                                                }
                                            ?>
                                    <td class='<?php echo $highlight; ?>'><?php echo $value; ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
        <?php elseif (isset($_POST['search'])): ?>
            <p>Aucun résultat trouvé pour '<?php echo $search; ?> Ou erreur de selection !'</p>
        <?php endif; ?>
    </div>

<script src="script.js"></script>
</body>
</html>
