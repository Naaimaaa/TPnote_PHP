# TP noté PHP

AKTHAR Naima  
VALIN Ophélie
Groupe 21A

## Commandes pour lancer l'application
##### Charger la base de données
- Se mettre dans le dossier `DataBase/` et executer : `php init_db.php`
##### Lancer le site
- Se mettre dans le dossier `templates/` et executer : `php -S localhost:8000 index.php`
##### Pour tester l'import de quizz
- Il y a des fichiers JSON dans le dossier `Data/`

## Contraintes imposées réalisées 
- Organisation dans une arborescence.
- Utilisation de namespaces.
- Utilisation d'un provider JSON.
- Utilisation d'un autoloader.
- Utilisation de sessions pour le score.
- Utilisation de classes PHP.
- Utilisation d'un contrôleur dans index.php avec $_REQUEST['action'].
- Utilisation de PDO avec base de données sqlite.


## Fonctionalitées implémentées
- Import de quizz grâce à un fichier JSON.
- Possibilité de choisir le nombre de questions (sauf pour les quizz importés).
- Possibilité de s'inscrire / se connecter / se déconnecter.
- Possibilité de consulter tous ses scores dans l'onglet "Statistiques".
- Possibilité de faire un quizz, voir son score et la correction.

## Documentations
- MCD de la base de données dans le dossier : `DataBase/MCD/`
- Diagramme des classes php dans le dossier : `diagramme/`
