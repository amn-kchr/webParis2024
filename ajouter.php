<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleajout.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Insertion de données</title>
</head>
<body>

<?php

// désactiver tous les types de rapports d'erreurs
 error_reporting(0);

include 'database.php';

if (isset($_POST['inserer'])) {
    $table = $_POST['TABLE'];

    if($table == "Participant"){

        $identifiant = $_POST['identifiant_participant'];
        $nom = $_POST['nom_participant'];
        $prenom = $_POST['prenom_participant'];
        $date_naissance = $_POST['date_naissance_participant'];
        $nationalite = $_POST['nationalite_participant'];
    
        // Construire la requête SQL d'insertion
        $query = "INSERT INTO Participant (identifiant_participant, nom_participant, prenom_participant, date_naissance_participant, nationalite_participant) VALUES ('$identifiant', '$nom', '$prenom', TO_DATE('$date_naissance', 'yyyy/mm/dd'), '$nationalite')";
        
    } else if($table == "arbitre"){

        $identifiant_per = $_POST['identifiant_per'];
        $identifiant_cat= $_POST['identifiant_cat'];
    
         
        $query = "INSERT INTO arbitre (id_personnel, id_categorie) VALUES ('$identifiant_per', '$identifiant_cat')";

    }else if($table == "Ville"){

        $identifiant_V = $_POST['identifient_ville'];
        $nom_V= $_POST['nom_ville'];
        $adresse = $_POST['adresse_ville'];
         
        $query = "INSERT INTO Ville (identifient_ville, nom_ville, adresse_ville)
        VALUES ('$identifiant_V', '$nom_V', '$adresse')";

    }else if ($table == "Personnel") {
        $id_personnel = $_POST['id_personnel'];
        $role_personnel = $_POST['role_personnel'];
        $identifiant_per_participant = $_POST['identifiant_per_participant'];
    
        $query = "INSERT INTO Personnel (id_personnel, role_personnel, identifiant_participant)
        VALUES ('$id_personnel', '$role_personnel', '$identifiant_per_participant')";
    }else if ($table == "Categorie") {
        $id_categorie = $_POST['id_categorie'];
        $nom_categorie = $_POST['nom_categorie'];
        $genre_categorie = $_POST['genre_categorie'];
    
        $query = "INSERT INTO Categorie (id_categorie, nom_categorie, genre_categorie)
        VALUES ('$id_categorie', '$nom_categorie', '$genre_categorie')";
    
} else if ($table == "pratique") {
        $id_prt_athlete = $_POST['id_prt_athlete'];
        $id_prt_Discipline = $_POST['id_prt_Discipline'];
    
        $query = "INSERT INTO pratique (id_athlete, id_Discipline)
        VALUES ('$id_prt_athlete', '$id_prtDiscipline')";
   
} else if ($table == "Discipline") {
        $id_Discipline = $_POST['id_Discipline'];
        $nom_Discipline = $_POST['nom_Discipline'];
        $record_Discipline = $_POST['record_Discipline'];
        $id_categorie_dis = $_POST['id_categorie_dis'];
    
        $query = "INSERT INTO Discipline (id_Discipline, nom_Discipline, record_Discipline, id_categorie)
        VALUES ('$id_Discipline', '$nom_Discipline', '$record_Discipline', '$id_categorie_dis')";
   
}else if ($table == "Entraineur") {
        $id_entraineur = $_POST['id_entraineur'];
        $diplome_entraineur = $_POST['diplome_entraineur'];
        $identifiant_part_ent = $_POST['identifiant_part_ent'];
    
        $query = "INSERT INTO Entraineur (id_entraineur, diplome_entraineur, identifiant_participant)
        VALUES ('$id_entraineur', '$diplome_entraineur', '$identifiant_part_ent')";
    
}else if ($table == "Equipe") {
        $id_equipe = $_POST['id_equipe'];
        $id_entraineur_eq = $_POST['id_entraineur_eq'];
        $nom_equipe = $_POST['nom_equipe'];
    
        $query = "INSERT INTO Equipe (id_equipe, id_entraineur, nom_equipe)
        VALUES ('$id_equipe', '$id_entraineur_eq', '$nom_equipe')";
    
}else if ($table == "Chambre") {
        $id_chambre = $_POST['id_chambre'];
        $nom_chambre = $_POST['nom_chambre'];
        $nombre_lits = $_POST['nombre_lits'];
        $identifient_ch_ville = $_POST['identifient_ch_ville'];
    
        $query = "INSERT INTO Chambre (id_chambre, nom_chambre, nombre_lits, identifient_ville)
        VALUES ('$id_chambre', '$nom_chambre', '$nombre_lits', '$identifient_ch_ville')";
    
}else if ($table == "Competition") {
        $id_competition = $_POST['id_competition'];
        $nom_competition = $_POST['nom_competition'];
        $avancement_competition = $_POST['avancement_competition'];
        $id_Comp_Disc = $_POST['id_Comp_Disc'];
    
        $query = "INSERT INTO Competition (id_competition, nom_competition, avancement_competition, id_Discipline)
        VALUES ('$id_competition', '$nom_competition', '$avancement_competition', '$id_Comp_Disc')";
    
}else if ($table == "Athlete") {
        $id_athlete = $_POST['id_athlete'];
        $poid_athlete = $_POST['poid_athlete'];
        $taille_athlete = $_POST['taille_athlete'];
        $id_entraineur_ath = $_POST['id_entraineur_ath'];
        $identifiant_part_ath = $_POST['identifiant_participant_ath'];
    
        $query = "INSERT INTO Athlete (id_athlete, poid_athlete, taille_athlete, id_entraineur, identifiant_participant)
        VALUES ('$id_athlete', '$poid_athlete', '$taille_athlete', '$id_entraineur_ath', '$identifiant_part_ath')";
    }else if ($table == "Resultat") {
        $id_resultat = $_POST['id_resultat'];
        $classement = $_POST['classement'];
        $score = $_POST['score'];
        $id_ath_res = $_POST['id_ath_res'];
        $id_res_dis = $_POST['id_res_dis'];
        $id_res_equipe = $_POST['id_res_equipe'];
    
        $query = "INSERT INTO resultat (id_resultat, classement, score, id_athlete, id_Discipline, id_equipe)
        VALUES ('$id_resultat', '$classement', '$score', '$id_ath_res', '$id_res_dis', '$id_res_equipe')";
    
} else if ($table == "se_joue") {
        $id_sj_competition = $_POST['id_sj_competition'];
        $identifient_sj_ville = $_POST['identifient_sj_ville'];
        $date_heure = $_POST['date_heure'];
    
        $query = "INSERT INTO se_joue (id_competition, identifient_ville, date_heure)
        VALUES ('$id_sj_competition', '$identifient_sj_ville', TO_DATE('$date_heure', 'yyyy/mm/dd'))";
    
}else if ($table == "rattache") {
        $id_rt_personnel = $_POST['id_rt_personnel'];
        $identifient_rt_ville = $_POST['identifient_rt_ville'];
    
        $query = "INSERT INTO rattache (id_personnel, identifient_ville)
        VALUES ('$id_rt_personnel', '$identifient_rt_ville')";
   
} else if ($table == "joue") {
        $id_j_athlete = $_POST['id_j_athlete'];
        $id__j_equipe = $_POST['id__j_equipe'];
        $remplace = $_POST['remplace'];
    
        $query = "INSERT INTO joue (id_athlete, id_equipe, remplace)
        VALUES ('$id_j_athlete', '$id__j_equipe', '$remplace')";
   
}else if ($table == "inscrit") {
        $id_ins_personnel = $_POST['id_ins_personnel'];
        $id_ins_competition = $_POST['id_ins_competition'];
        $id_ins_equipe = $_POST['id_ins_equipe'];
    
        $query = "INSERT INTO inscrit (id_personnel, id_competition, id_equipe)
        VALUES ('$id_ins_personnel', '$id_cid_ins_competition', '$id_ins_equipe')";
    
} else if ($table == "loger") {
        $identifiant_lg_participant = $_POST['identifiant_lg_participant'];
        $id_lg_chambre = $_POST['id_lg_chambre'];
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];
    
        $query = "INSERT INTO loger (identifiant_participant, id_chambre, date_debut, date_fin)
        VALUES ('$identifiant_lg_participant', '$id_lg_chambre', TO_DATE('$date_debut', 'yyyy/mm/dd'), TO_DATE('$date_fin', 'yyyy/mm/dd'))";
   
}else if ($table == "possede") {
        $id_psd_Discipline = $_POST['id_psd_Discipline'];
        $id_psd_equipe = $_POST['id_psd_equipe'];
    
        $query = "INSERT INTO possede (id_Discipline, id_equipe)
        VALUES ('$id_psd_Discipline', '$id_psd_equipe')";
    
} else if ($table == "palmares") {
        $id_palm_athlete = $_POST['id_palm_athlete'];
        $id_palm_Discipline = $_POST['id_palm_Discipline'];
        $id_palmares = $_POST['id_palmares'];
        $type_medaille = $_POST['type_medaille'];
        $Lieu = $_POST['Lieu'];
        $performance = $_POST['performance'];
        $date_palmares = $_POST['date_palmares'];
    
        $query = "INSERT INTO palmares (id_athlete, id_Discipline, id_palmares, type_medaille, Lieu, performance, date_palmares)
        VALUES ('$id_palm_athlete', '$id_palm_Discipline', '$id_palmares', '$type_medaille', '$Lieu', '$performance', TO_DATE('$date_palmares', 'yyyy/mm/dd'))";
    
}else{
        echo "Table innexistante";
    }
    
    if ($conn) {
        $stmt = oci_parse($conn, $query);

        if (oci_execute($stmt)) {
            // Redirection vers une page de succès ou affichage d'un message de réussite
            header("Location: profil.php");
            exit();
        } else {
            // Gérer les erreurs d'insertion
            $erreur = "Une erreur lors de l'ajout des données.(soit elle existe deja ou il y a des champs inexistant !)";
        }
    } else {
        // Gérer les erreurs de connexion
        $erreur = "Erreur de connexion à la base de données.";
    }
}
?>
    <div class="emballage">
        <form action="ajouter.php" method="post">
            <h1>Insérer des données</h1>
            <div class="input-box">
                <label for="table">Table:</label>
                <p>Choisissez une table:</p>
                <select id="table" name="TABLE" required>
                <option value="Participant">Participant</option>
                <option value="Membre_CIO">Membre_CIO</option>
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
                <option value="rattache">rattache</option>
                <option value="joue">joue</option>
                <option value="inscrit">inscrit</option>
                <option value="loger">loger</option>
                <option value="possede">possede</option>
                <option value="palmares">palmares</option>
                <option value="arbitre">arbitre</option>
                <option value="pratique">pratique</option>
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

            <div id="arbitreFields" style="display: none;">
                <div class="input-box">
                    <input type="text" name="identifiant_per" placeholder="ID personnel" >
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="identifiant_cat" placeholder="Id categorie" >
                    <i class='bx bxs-user'></i>
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

<div id="pratiqueFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_prt_athlete" placeholder="Identifiant Athlète" >
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="text" name="id_prt_Discipline" placeholder="Identifiant Discipline" >
        <i class='bx bxs-medal'></i>
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

<div id="rattacheFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_rt_personnel" placeholder="Identifiant Personnel" >
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="text" name="identifient_rt_ville" placeholder="Identifiant Ville" >
        <i class='bx bxs-building'></i>
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

<div id="inscritFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_ins_personnel" placeholder="Identifiant Personnel" >
        <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="text" name="id_ins_competition" placeholder="Identifiant Compétition" >
        <i class='bx bxs-trophy'></i>
    </div>
    <div class="input-box">
        <input type="text" name="id_ins_equipe" placeholder="Identifiant Équipe" >
        <i class='bx bxs-group'></i>
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

<div id="possedeFields" style="display: none;">
    <div class="input-box">
        <input type="text" name="id_psd_Discipline" placeholder="Identifiant Discipline" >
        <i class='bx bxs-medal'></i>
    </div>
    <div class="input-box">
        <input type="text" name="id_psd_equipe" placeholder="Identifiant Équipe" >
        <i class='bx bxs-group'></i>
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
            <button type="submit" class="btn" name="inserer">Insérer</button>

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
            var arbitreFields = document.getElementById('arbitreFields');
            var personnelFields = document.getElementById('personnelFields');
            var categorieFields = document.getElementById('categorieFields');
            var pratiqueFields = document.getElementById('pratiqueFields');
            var disciplineFields = document.getElementById('disciplineFields');
            var entraineurFields = document.getElementById('entraineurFields');
            var equipeFields = document.getElementById('equipeFields');
            var chambreFields = document.getElementById('chambreFields');
            var competitionFields = document.getElementById('competitionFields');
            var athleteFields = document.getElementById('athleteFields');
        var resultatFields = document.getElementById('resultatFields');
        var se_joueFields = document.getElementById('se_joueFields');
        var rattacheFields = document.getElementById('rattacheFields');
        var joueFields = document.getElementById('joueFields');
        var inscritFields = document.getElementById('inscritFields');
        var logerFields = document.getElementById('logerFields');
        var possedeFields = document.getElementById('possedeFields');
        var palmaresFields = document.getElementById('palmaresFields');
        

            // Masquer tous les champs de formulaire
            participantFields.style.display = 'none';
            VilleFields.style.display = 'none';
            arbitreFields.style.display = 'none';
            personnelFields.style.display = 'none';
            categorieFields.style.display = 'none';
            pratiqueFields.style.display = 'none';
            disciplineFields.style.display = 'none';
            entraineurFields.style.display = 'none';
            equipeFields.style.display = 'none';
            chambreFields.style.display = 'none';
            competitionFields.style.display = 'none';
            athleteFields.style.display = 'none';
            resultatFields.style.display = 'none';
            se_joueFields.style.display = 'none';
                rattacheFields.style.display = 'none';
                joueFields.style.display = 'none';
                inscritFields.style.display = 'none';
                logerFields.style.display = 'none';
                possedeFields.style.display = 'none';
                palmaresFields.style.display = 'none';
            

            // Afficher les champs de formulaire en fonction de la table sélectionnée
            if (table === 'Participant') {
                participantFields.style.display = 'block';
            } else if (table === 'Ville') {
                VilleFields.style.display = 'block';
            } else if (table === 'arbitre') {
                arbitreFields.style.display = 'block';
            }  else if (table === 'Personnel') {
                personnelFields.style.display = 'block';
            } else if (table === 'Categorie') {
                categorieFields.style.display = 'block';
            } else if (table === 'pratique') {
                pratiqueFields.style.display = 'block';
            }else if (table === 'Discipline') {
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
            } else if (table === 'rattache') {
                rattacheFields.style.display = 'block';
            } else if (table === 'joue') {
                joueFields.style.display = 'block';
            } else if (table === 'inscrit') {
                inscritFields.style.display = 'block';
            }else if (table === 'loger') {
                logerFields.style.display = 'block';
            }else if (table === 'possede') {
                possedeFields.style.display = 'block';
            }else if (table === 'palmares') {
                palmaresFields.style.display = 'block';
            }
        });
    </script>
</body>
</html>