
# Projet de Site Web pour la Gestion des Participants des Jeux Olympiques 2024 Ce projet implémente un site web pour la gestion des utilisateurs d'un comité, permettant aux utilisateurs de se connecter, de modifier leurs informations personnelles et de gérer leur profil. 

## Objectif du projet L'objectif de ce projet est de fournir une interface web où les membres d'un comité peuvent se connecter et gérer leurs informations personnelles, telles que le mot de passe et la photo de profil. Ils peuvent également faire des recherches dans la base de données de l'organisation, ajouter des participants, des compétitions, les modifier ainsi que les supprimer. 

Le site utilise PHP pour le backend et intègre une base de données Oracle pour la gestion des données utilisateur et des participants. 
## Aperçu 
![Aperçu 4](./Apercu/4![Aperçu 3](https://github.com/user-attachments/assets/0fe7828c-7b6e-4521-bbe4-9d47e7fc2ec5)
![Aperçu 2](https://github.com/user-attachments/assets/e270eb81-0be6-4ad8-a5d6-edae8dba28f0)
![Aperçu 1](https://github.com/user-attachments/assets/ace25df0-f91a-4f46-bf0e-07ed72d5620a)
![Aperçu 6](https://github.com/user-attachments/assets/6cfede92-97cb-4296-acf3-778253a73c0a)
![Aperçu 5](https://github.com/user-attachments/assets/a6f75175-175d-47ca-9f0f-a3f1218d6177)
![Aperçu 4](https://github.com/user-attachments/assets/a6b43225-f242-43e7-bc42-ab55450d0af5)
.png) 


## Fonctionnalités 
  - **Connexion utilisateur** : Les utilisateurs peuvent se connecter à l'aide de leur identifiant et mot de passe.
  - **Modification du mot de passe** : Les utilisateurs peuvent changer leur mot de passe après vérification de l'ancien mot de passe.
  - **Changement de photo de profil** : Les utilisateurs peuvent télécharger une nouvelle photo de profil.
  - **Gestion de session** : Le site utilise des sessions pour garder les utilisateurs connectés pendant leur navigation. 
  - **Messages d'erreur** : Affichage de messages d'erreur appropriés lors des échecs de connexion ou des validations de formulaire. 
  - **Recherche de participants** : Les utilisateurs peuvent rechercher des athlètes et des compétitions par nom, date ou d'autres critères pertinents. 
  - **Gestion des participants** : Les utilisateurs peuvent ajouter, modifier ou supprimer des informations sur les participants aux Jeux Olympiques. 
  - **Navigation** : Menu permettant d'accéder aux différentes sections du site : Accueil, Recherche, Gérer, Données (avec image de profil), Déconnexion. 
  - **Affichage des résultats de recherche** : Présentation des résultats de recherche dans des tables dynamiques.
  - **Filtrage des données** : Options de filtrage pour les participants, équipes, et compétitions basées sur divers critères comme la nationalité et la fonction.
  - 
## Structure des fichiers
  - **login.php** : Page de connexion qui gère l'authentification des utilisateurs. 
  - **me.php** : Page principale après connexion où les utilisateurs peuvent voir et modifier leurs informations personnelles. 
  - **donnees.php** : Page pour traiter les modifications de mot de passe et de photo de profil. 
  - **gestion.php** : Page dédiée à la gestion des participants, permettant d'ajouter, modifier et supprimer des informations. 
  - **recherche.php** : Page pour effectuer des recherches dans la base de données des participants et des compétitions. 
  - **logout.php** : Gère la déconnexion des utilisateurs en détruisant la session. 
  - **style.css** : Feuille de style pour la mise en forme du site. 
  - **script.js** : Scripts JavaScript pour des fonctionnalités supplémentaires et des interactions dynamiques.

## Technologies Utilisées 
**PHP** : Langage de script pour le développement du backend. 
**HTML/CSS** : Technologies de base pour le développement de l'interface utilisateur. 
**JavaScript** : Utilisé pour des interactions dynamiques sur le site. 
**Oracle** : Système de gestion de base de données pour le stockage des informations utilisateur.

## Contributeurs 
- [amn-kchr](https://github.com/amn-kchr)
