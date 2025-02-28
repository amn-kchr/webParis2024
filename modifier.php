<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleajout.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Modifier de données</title>
</head>
<body>

<?php

// désactiver tous les types de rapports d'erreurs
 //error_reporting(0);

include 'database.php';

if (isset($_POST['remplacer'])) {
    $table = $_POST['TABLE'];

    if ($table == "Participant") {
        $identifiant = $_POST['identifiant_participant'];
        $nom = $_POST['nom_participant'];
        $prenom = $_POST['prenom_participant'];
        $date_naissance = $_POST['date_naissance_participant'];
        $nationalite = $_POST['nationalite_participant'];
    
        // Construire la requête SQL d'UPDATE
        $querymodify = "UPDATE Participant
                  SET nom_participant = '$nom', prenom_participant = '$prenom', date_naissance_participant = TO_DATE('$date_naissance', 'yyyy-mm-dd'), nationalite_participant = '$nationalite'
                  WHERE identifiant_participant = '$identifiant'";
       
    }else if($table == "Ville"){

        $identifiant_V = $_POST['identifient_ville'];
        $nom_V= $_POST['nom_ville'];
        $adresse = $_POST['adresse_ville'];
         
        $querymodify = "UPDATE Ville SET nom_ville = '$nom_V', adresse_ville = '$adresse'
        WHERE identifient_ville = '$identifiant_V'";

    }else if ($table == "Personnel") {
        $id_personnel = $_POST['id_personnel'];
        $role_personnel = $_POST['role_personnel'];
    
        $querymodify = "UPDATE Personnel
        SET role_personnel = '$role_personnel'
        WHERE id_personnel = '$id_personnel'
        ";
    }else if ($table == "Categorie") {
        $id_categorie = $_POST['id_categorie'];
        $nom_categorie = $_POST['nom_categorie'];
        $genre_categorie = $_POST['genre_categorie'];
    
        $querymodify = "UPDATE Categorie
        SET nom_categorie = '$nom_categorie',genre_categorie = '$genre_categorie'
        WHERE id_categorie = '$id_categorie'
        ";
    
} else if ($table == "Discipline") {
        $id_Discipline = $_POST['id_Discipline'];
        $nom_Discipline = $_POST['nom_Discipline'];
        $record_Discipline = $_POST['record_Discipline'];
    
        $querymodify = "UPDATE Discipline
        SET nom_Discipline = '$nom_Discipline',record_Discipline = '$record_Discipline'
        WHERE id_Discipline = '$id_Discipline';
        ";
   
}else if ($table == "Entraineur") {
        $id_entraineur = $_POST['id_entraineur'];
        $diplome_entraineur = $_POST['diplome_entraineur'];
    
        $querymodify = "UPDATE Entraineur
        SET diplome_entraineur = '$diplome_entraineur'
        WHERE id_entraineur = '$id_entraineur';
        ";
    
}else if ($table == "Equipe") {
        $id_equipe = $_POST['id_equipe'];
        $nom_equipe = $_POST['nom_equipe'];
    
        $querymodify = "UPDATE Equipe SET nom_equipe = '$nom_equipe'WHERE id_equipe = '$id_equipe'";
    
}else if ($table == "Chambre") {
        $id_chambre = $_POST['id_chambre'];
        $nom_chambre = $_POST['nom_chambre'];
        $nombre_lits = $_POST['nombre_lits'];
    
        $querymodify = "UPDATE Chambre
        SET nom_chambre = '$nom_chambre',nombre_lits = '$nombre_lits'
        WHERE id_chambre = '$id_chambre'
        ";
    
}else if ($table == "Competition") {
        $id_competition = $_POST['id_competition'];
        $nom_competition = $_POST['nom_competition'];
        $avancement_competition = $_POST['avancement_competition'];
    
        $querymodify = "UPDATE Competition
        SET nom_competition = '$nom_competition',avancement_competition = '$avancement_competition'
        WHERE id_competition = '$id_competition'
        ";
    
}else if ($table == "Athlete") {
        $id_athlete = $_POST['id_athlete'];
        $poid_athlete = $_POST['poid_athlete'];
        $taille_athlete = $_POST['taille_athlete'];
    
        $querymodify = "UPDATE Athlete
        SET poid_athlete = '$poid_athlete',taille_athlete = '$taille_athlete'
        WHERE id_athlete = '$id_athlete'
        ";
    }else if ($table == "Resultat") {
        $id_resultat = $_POST['id_resultat'];
        $classement = $_POST['classement'];
        $score = $_POST['score'];
    
        $querymodify = "UPDATE Resultat
        SET classement = '$classement',score = '$score'
        WHERE id_resultat = '$id_resultat'
        ";
    
} else if ($table == "se_joue") {
        $id_sj_competition = $_POST['id_sj_competition'];
        $identifient_sj_ville = $_POST['identifient_sj_ville'];
        $date_heure = $_POST['date_heure'];
    
        $querymodify = "UPDATE se_joue
        SET classement = '$classement',score = '$score',date_heure = 'TO_DATE('$date_heure', 'yyyy/mm/dd')'
        WHERE id_resultat = '$id_resultat'
        AND identifient_ville ='$identifient_sj_ville'
        ";
    
}else if ($table == "joue") {
        $id_j_athlete = $_POST['id_j_athlete'];
        $id__j_equipe = $_POST['id__j_equipe'];
        $remplace = $_POST['remplace'];
    
        $querymodify = "UPDATE joue
        SET classement = '$classement',score = '$score'
        WHERE id_athlete = '$id_j_athlete'
        AND identifient_ville = '$identifient_sj_ville'
        ";
   
}else if ($table == "loger") {
        $identifiant_lg_participant = $_POST['identifiant_lg_participant'];
        $id_lg_chambre = $_POST['id_lg_chambre'];
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
    
        $querymodify = "UPDATE loger
        SET date_debut = 'TO_DATE('$date_debut', 'yyyy/mm/dd')',date_fin = 'TO_DATE('$date_fin', 'yyyy/mm/dd')'
        WHERE identifiant_participant = '$identifiant_lg_participant'
        AND id_chambre = '$id_lg_chambre'
        ";
   
}else if ($table == "palmares") {
        $id_palm_athlete = $_POST['id_palm_athlete'];
        $id_palm_Discipline = $_POST['id_palm_Discipline'];
        $id_palmares = $_POST['id_palmares'];
        $type_medaille = $_POST['type_medaille'];
        $Lieu = $_POST['Lieu'];
        $performance = $_POST['performance'];
        $date_palmares = $_POST['date_palmares'];
    
        $querymodify = "UPDATE palmares
        SET Lieu = '$Lieu', performance = '$performance',type_medaille = '$type_medaille',date_palmares = 'TO_DATE('$date_palmares', 'yyyy/mm/dd')'
        WHERE id_palmares = '$id_palmares'";
    
} else{
        echo "Table innexistante";
    }
    
    if ($conn) {
        $stmt = oci_parse($conn, $querymodify);

        if (oci_execute($stmt)) {
            // Redirection vers une page de succès ou affichage d'un message de réussite
            header("Location: profil.php");
            exit();
        } else {
            // Gérer les erreurs d'UPDATEion
            $erreur = "Une erreur lors de l'ajout des données.(soit elle existe deja ou il y a des champs inexistant !)";
        }
    } else {
        // Gérer les erreurs de connexion
        $erreur = "Erreur de connexion à la base de données.";
    }
}
?>
    <div class="emballage">
        <form action="modifier.php" method="POST">
            <h1>Modifier des données</h1>
            <div class="input-box">
                <label for="table">Table:</label>
                <p>Choisissez une table:</p>
                <select id="table" name="TABLE" required>
                <option value="Participant">Participant</option>
                <option value="Personnel">Personnel</option>
                <option value="Ville">Ville</option>
                <option value="Categorie">Categorie</option>
                <option value="Discipline">Discipline</option>
                <option value="Entraineur">Entraineur</option>
                <option value="Equipe">Equipe</option>
                <option value="Chambre">Chambre</option>
                <option value="Competition">Competition</option>
                <option value="Athlete">Athlete</option>
                <option value="resultat">resultat</option>
                <option value="se_joue">se_joue</option>
                <option value="joue">joue</option>
                <option value="loger">loger</option>
                <option value="palmares">palmares</option>
                </select>
            </div>

            <div id="participantFields" style="display: none;">
                <div class="input-box">
                    <input type="text" name="identifiant_participant" placeholder="Identifiant" >
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="nom_participant" placeholder="Nom" >
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="prenom_participant" placeholder="Prenom" >
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="date" name="date_naissance_participant" placeholder="Date naissance" >
                    
                </div>
                <div class="input-box">
                    <input type="text" name="nationalite_participant" placeholder="Nationalité" >
                    <i class='bx bxs-user'></i>
                </div>
            </div>

            <div id="VilleFields" style="display: none;">
                <div class="input-box">
                    <input type="text" name="identifient_ville" placeholder="ID Ville" >
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="nom_ville" placeholder="Nom Ville" >
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="adresse_ville" placeholder="Adresse Ville" >
                    <i class='bx bxs-lock-alt'></i>
                </div>
                
            </div>

 <div id="personnelFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_personnel" placeholder="Identifiant Personnel" >
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="text" name="role_personnel" placeholder="Role Personnel" >
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="text" name="identifiant_per_participant" placeholder="Identifiant Participant" >
        <i class='bx bxs-user'></i>
    </div>
</div>

<div id="categorieFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_categorie" placeholder="Identifiant Catégorie" >
        <i class='bx bxs-category'></i>
    </div>
    <div class="input-box">
        <input type="text" name="nom_categorie" placeholder="Nom Catégorie" >
        <i class='bx bxs-category'></i>
    </div>
    <div class="input-box">
        <input type="text" name="genre_categorie" placeholder="Genre Catégorie" >
        <i class='bx bxs-category'></i>
    </div>
</div>


<div id="disciplineFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_Discipline" placeholder="Identifiant Discipline" >
        <i class='bx bxs-medal'></i>
    </div>
    <div class="input-box">
        <input type="text" name="nom_Discipline" placeholder="Nom Discipline" >
        <i class='bx bxs-medal'></i>
    </div>
    <div class="input-box">
        <input type="number" name="record_Discipline" placeholder="Record Discipline" >
    </div>
    <div class="input-box">
        <input type="text" name="id_categorie_dis" placeholder="Identifiant Catégorie" >
        <i class='bx bxs-category'></i>
    </div>
</div>

<div id="entraineurFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_entraineur" placeholder="Identifiant Entraineur" >
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="text" name="diplome_entraineur" placeholder="Diplôme Entraineur" >
        <i class='bx bxs-award'></i>
    </div>
    <div class="input-box">
        <input type="text" name="identifiant_part_ent" placeholder="Identifiant Participant" >
        <i class='bx bxs-user'></i>
    </div>
</div>

<div id="equipeFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_equipe" placeholder="Identifiant Equipe" >
        <i class='bx bxs-group'></i>
    </div>
    <div class="input-box">
        <input type="text" name="id_entraineur_eq" placeholder="Identifiant Entraineur" >
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="text" name="nom_equipe" placeholder="Nom Equipe" >
        <i class='bx bxs-group'></i>
    </div>
</div>

<div id="chambreFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_chambre" placeholder="Identifiant Chambre" >
        <i class='bx bxs-bed'></i>
    </div>
    <div class="input-box">
        <input type="text" name="nom_chambre" placeholder="Nom Chambre" >
        <i class='bx bxs-bed'></i>
    </div>
    <div class="input-box">
        <input type="number" name="nombre_lits" placeholder="Nombre de Lits" >
    </div>
    <div class="input-box">
        <input type="text" name="identifient_ch_ville" placeholder="Identifiant Ville" >
        <i class='bx bxs-building'></i>
    </div>
</div>

<div id="competitionFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_competition" placeholder="Identifiant Competition" >
        <i class='bx bxs-trophy'></i>
    </div>
    <div class="input-box">
        <input type="text" name="nom_competition" placeholder="Nom Competition" >
        <i class='bx bxs-trophy'></i>
    </div>
    <div class="input-box">
        <input type="text" name="avancement_competition" placeholder="Avancement Competition" >
    </div>
    <div class="input-box">
        <input type="text" name="id_Comp_Disc" placeholder="Identifiant Discipline" >
        <i class='bx bxs-medal'></i>
    </div>
</div>


<div id="athleteFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_athlete" placeholder="Identifiant Athlete" >
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="number" name="poid_athlete" placeholder="Poids Athlete" >
    </div>
    <div class="input-box">
        <input type="number" name="taille_athlete" placeholder="Taille Athlete" >
    </div>
    <div class="input-box">
        <input type="text" name="id_entraineur_ath" placeholder="Identifiant Entraineur" >
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="text" name="identifiant_participant_ath" placeholder="Identifiant Participant" >
        <i class='bx bxs-user'></i>
    </div>
</div> 

<!-- //////////////////////////////////////////////////////////////////////////////////// -->


<div id="resultatFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_resultat" placeholder="Identifiant Résultat" >
        <i class='bx bxs-medal'></i>
    </div>
    <div class="input-box">
        <input type="number" name="classement" placeholder="Classement" >
    </div>
    <div class="input-box">
        <input type="text" name="score" placeholder="Score" >
    </div>
    <div class="input-box">
        <input type="text" name="id_ath_res" placeholder="Identifiant Athlete" >
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="text" name="id_res_dis" placeholder="Identifiant Discipline" >
        <i class='bx bxs-medal'></i>
    </div>
    <div class="input-box">
        <input type="text" name="id_res_equipe" placeholder="Identifiant Equipe" >
        <i class='bx bxs-group'></i>
    </div>
</div>

<div id="se_joueFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_sj_competition" placeholder="Identifiant Compétition" >
        <i class='bx bxs-trophy'></i>
    </div>
    <div class="input-box">
        <input type="text" name="identifient_sj_ville" placeholder="Identifiant Ville" >
        <i class='bx bxs-building'></i>
    </div>
    <div class="input-box">
        <input type="date" name="date_heure" placeholder="Date et heure" >
    </div>
</div>


<div id="joueFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_j_athlete" placeholder="Identifiant Athlète" >
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="text" name="id_j_equipe" placeholder="Identifiant Équipe" >
        <i class='bx bxs-group'></i>
    </div>
    <div class="input-box">
        <input type="text" name="remplace" placeholder="Remplace" >
    </div>
</div>


<div id="logerFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="identifiant_lg_participant" placeholder="Identifiant Participant" >
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="text" name="id_lg_chambre" placeholder="Identifiant Chambre" >
        <i class='bx bxs-bed'></i>
    </div>
    <div class="input-box">
        <input type="date" name="date_debut" placeholder="Date de Début" >
    </div>
    <div class="input-box">
        <input type="date" name="date_fin" placeholder="Date de Fin" >
    </div>
</div>


<div id="palmaresFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_palm_athlete" placeholder="Identifiant Athlète" >
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="text" name="id_palm_Discipline" placeholder="Identifiant Discipline" >
        <i class='bx bxs-medal'></i>
    </div>
    <div class="input-box">
        <input type="text" name="id_palmares" placeholder="Identifiant Palmares" >
        <i class='bx bxs-medal'></i>
    </div>
    <div class="input-box">
        <input type="text" name="type_medaille" placeholder="Type Médaille" >
        <i class='bx bxs-medal'></i>
    </div>
    <div class="input-box">
        <input type="text" name="Lieu" placeholder="Lieu" >
    </div>
    <div class="input-box">
        <input type="number" name="performance" placeholder="Performance" >
    </div>
    <div class="input-box">
        <input type="date" name="date_palmares" placeholder="Date Palmares" >
    </div>
</div>

<div class="rappeler">
                <a href="profil.php">Retour à votre profil?</a>
            </div>
            <button type="submit" class="btn" name="remplacer">remplacer</button>

            <?php if (!empty($erreur)): ?>
                <div class="erreur"><?php echo $erreur; ?></div>
            <?php endif; ?>
        </form>
    </div>

    <script>
        document.getElementById('table').addEventListener('change', function() {
            var table = this.value;
            var participantFields = document.getElementById('participantFields');
            var VilleFields = document.getElementById('VilleFields');
            var personnelFields = document.getElementById('personnelFields');
            var categorieFields = document.getElementById('categorieFields');
            var disciplineFields = document.getElementById('disciplineFields');
            var entraineurFields = document.getElementById('entraineurFields');
            var equipeFields = document.getElementById('equipeFields');
            var chambreFields = document.getElementById('chambreFields');
            var competitionFields = document.getElementById('competitionFields');
            var athleteFields = document.getElementById('athleteFields');
        var resultatFields = document.getElementById('resultatFields');
        var se_joueFields = document.getElementById('se_joueFields');
        var joueFields = document.getElementById('joueFields');
        var palmaresFields = document.getElementById('palmaresFields');
        var logerFields = document.getElementById('logerFields');
        

            // Masquer tous les champs de formulaire
            participantFields.style.display = 'none';
            VilleFields.style.display = 'none';
            personnelFields.style.display = 'none';
            categorieFields.style.display = 'none';
            disciplineFields.style.display = 'none';
            entraineurFields.style.display = 'none';
            equipeFields.style.display = 'none';
            chambreFields.style.display = 'none';
            competitionFields.style.display = 'none';
            athleteFields.style.display = 'none';
            resultatFields.style.display = 'none';
            se_joueFields.style.display = 'none';
                joueFields.style.display = 'none';
                palmaresFields.style.display = 'none';
                logerFields.style.display = 'none';

            

            // Afficher les champs de formulaire en fonction de la table sélectionnée
            if (table === 'Participant') {
                participantFields.style.display = 'block';
            } else if (table === 'Ville') {
                VilleFields.style.display = 'block';
            } else if (table === 'Personnel') {
                personnelFields.style.display = 'block';
            } else if (table === 'Categorie') {
                categorieFields.style.display = 'block';
            } else if (table === 'Discipline') {
                disciplineFields.style.display = 'block';
            } else if (table === 'Entraineur') {
                entraineurFields.style.display = 'block';
            }else if (table === 'Equipe') {
                equipeFields.style.display = 'block';
            } else if (table === 'Chambre') {
                chambreFields.style.display = 'block';
            } else if (table === 'Competition') {
                competitionFields.style.display = 'block';
            } else if (table === 'Athlete') {
                athleteFields.style.display = 'block';
            } else if (table === 'resultat') {
                resultatFields.style.display = 'block';
            } else if (table === 'se_joue') {
                se_joueFields.style.display = 'block';
            } else if (table === 'joue') {
                joueFields.style.display = 'block';
            } else if (table === 'loger') {
                logerFields.style.display = 'block';
            } else if (table === 'palmares') {
                palmaresFields.style.display = 'block';
            }
        });
    </script>
</body>
</html>
