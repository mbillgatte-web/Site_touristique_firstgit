# Application Web Touristique Bill

Bienvenue sur le dépôt du projet de site touristique. Ce projet est une application web dynamique développée en HTML, CSS, JavaScript et PHP, avec une base de données MySQL.

## 📋 Description du Projet

Cette plateforme permet aux utilisateurs de découvrir des destinations touristiques, de créer un compte, de se connecter et de gérer des réservations. Elle inclut également un espace d'administration ("Dashboard") pour la gestion globale de la plateforme.

## 🛠️ Technologies Utilisées

- **Front-end :** HTML5, CSS3, JavaScript, Bootstrap
- **Back-end :** PHP (PDO pour la base de données)
- **Base de données :** MySQL

## 🚀 Prérequis

Puisqu'il s'agit d'un projet dynamique (PHP/MySQL), l'utilisation d'une extension comme "Live Server" ne fonctionnera pas. Vous avez besoin d'un serveur local :
- [WampServer](https://www.wampserver.com/) (recommandé pour Windows)
- [XAMPP](https://www.apachefriends.org/fr/index.html)
- [MAMP](https://www.mamp.info/)

## ⚙️ Installation et Configuration

1. **Cloner le projet :**
   Clonez ce dépôt dans le répertoire de votre serveur local.
   - Pour WampServer : placez le dossier dans `C:\wamp64\www\`
   - Pour XAMPP : placez le dossier dans `C:\xampp\htdocs\`

2. **Base de Données :**
   Le projet inclut la base de données prête à l'emploi (`voyage.sql`).
   - Lancez votre serveur local (WampServer).
   - Ouvrez **phpMyAdmin** (généralement `http://localhost/phpmyadmin`).
   - Créez une nouvelle base de données nommée **`voyage`**.
   - Importez le fichier `voyage.sql` dans cette base de données pour recréer la structure et les données.

3. **Lancer l'application :**
   Ouvrez votre navigateur et accédez à :
   `http://localhost/Nom_Du_Dossier_Du_Projet/Pages/index.html`
   *(Note : L'adresse variera si le fichier index est déplacé à la racine).*

## 📁 Structure du Dossiergit 

- `/Assets/`, `/Css/` : Fichiers de style et frameworks.
- `/Image/` : Médias (vidéos, photos des destinations, bus, etc.).
- `/Include/` : Composants PHP réutilisables (barre de navigation, connexion à la BD, etc.).
- `/Pages/` : Les vues de l'application (connexion, accueil, etc.).
- `/Traitement_php/` : Scripts de traitement logique (authentification, inscription).
- `/Dashboard/` : Espace d'administration.
- `voyage.sql` : Fichier de sauvegarde de la base de données.

## 👥 Auteurs

Réalisé par Bill