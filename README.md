
# EhouDeka 🚗

### Plateforme de covoiturage local

EhouDeka est une application web de covoiturage local développée avec Laravel dans le cadre d'un travail pratique. Elle permet aux conducteurs de proposer leurs trajets et aux passagers de consulter les trajets disponibles afin de faciliter les déplacements quotidiens.

L'application vise à encourager la solidarité locale, à réduire les coûts de transport et à optimiser les déplacements, notamment dans les villes comme Lomé.

---

## 📌 Sommaire

- [Présentation du projet](#-présentation-du-projet)
- [Objectifs pédagogiques](#-objectifs-pédagogiques)
- [Fonctionnalités](#-fonctionnalités)
- [Règles de gestion](#-règles-de-gestion)
- [Sécurité](#-sécurité)
- [Technologies utilisées](#-technologies-utilisées)
- [Installation](#-installation)
- [Structure du projet](#-structure-du-projet)
- [Fonctionnalités complémentaires](#-fonctionnalités-complémentaires)
- [Contexte académique](#-contexte-académique)

---

## 📖 Présentation du projet

Dans les grandes villes, de nombreuses personnes effectuent quotidiennement les mêmes trajets : domicile-travail, domicile-école, marché, etc.

Le covoiturage constitue une solution intéressante pour partager les frais de déplacement, limiter les dépenses liées au transport et favoriser l'entraide entre les habitants.

**EhouDeka** répond à ce besoin en proposant une plateforme web sur laquelle :

- Les conducteurs peuvent enregistrer leur véhicule.
- Les conducteurs peuvent publier leurs trajets.
- Les visiteurs peuvent consulter les trajets disponibles.
- Les passagers peuvent accéder aux informations du conducteur et de son véhicule.
- Les utilisateurs peuvent gérer leurs propres trajets.

L'application est conçue autour d'un système d'authentification et de règles d'accès garantissant une utilisation sécurisée.

---

## 🎯 Objectifs pédagogiques

Ce projet permet de mettre en pratique les principales notions de développement web avec Laravel :

- Mise en place d'un système d'authentification.
- Gestion de profils utilisateurs personnalisés.
- Manipulation des relations entre les modèles.
- Création et validation de formulaires.
- Gestion de l'envoi et du stockage des images.
- Protection des routes et des fonctionnalités sensibles.
- Application des règles d'autorisation.
- Organisation et structuration d'un projet Laravel.

---

## ✨ Fonctionnalités

### 1. Authentification et gestion des utilisateurs

L'application dispose d'un système d'authentification permettant aux utilisateurs de :

- Créer un compte.
- Se connecter à leur espace personnel.
- Se déconnecter de manière sécurisée.
- Consulter leurs informations personnelles.
- Modifier leur prénom, leur nom et leur numéro de téléphone.

Informations demandées lors de l'inscription :

| Champ | Description |
|---|---|
| Prénom | Prénom de l'utilisateur |
| Nom | Nom de famille |
| Téléphone | Numéro de contact |
| Email | Adresse électronique |
| Mot de passe | Mot de passe du compte |

### 2. Gestion des véhicules

Chaque utilisateur peut enregistrer un seul véhicule.

Les informations du véhicule comprennent :

- Une photo du véhicule.
- Le numéro de plaque d'immatriculation.
- Une description précisant le modèle, la couleur et les particularités du véhicule.

**Règles appliquées :**

- Un utilisateur ne peut posséder qu'un seul véhicule enregistré dans l'application.
- L'enregistrement d'un véhicule est obligatoire avant la publication d'un trajet.
- La photo est stockée dans le système de fichiers de Laravel.
- Une image par défaut est affichée lorsqu'aucune photo personnalisée n'est disponible.

### 3. Consultation des trajets

La consultation des trajets est accessible publiquement, même sans connexion.

Chaque trajet présente les informations suivantes :

| Information | Description |
|---|---|
| Ville de départ | Ville depuis laquelle le conducteur part |
| Lieu de départ | Précision sur le point de départ |
| Ville d'arrivée | Destination du trajet |
| Lieu d'arrivée | Précision sur le point d'arrivée |
| Date et heure | Date et heure du départ |
| Places disponibles | Nombre de places proposées |
| Conducteur | Prénom et nom du conducteur |
| Téléphone | Numéro de contact du conducteur |
| Véhicule | Photo, plaque et description du véhicule |

Une page dédiée permet également de consulter les détails d'un trajet.

### 4. Publication des trajets

Un utilisateur connecté peut proposer un nouveau trajet.

Les informations à renseigner sont :

- Ville de départ.
- Lieu précis de départ.
- Ville d'arrivée.
- Lieu précis d'arrivée.
- Date et heure de départ.
- Nombre de places disponibles.

**Conditions de publication :**

- L'utilisateur doit être authentifié.
- Il doit avoir enregistré un véhicule.
- Les données du formulaire doivent respecter les règles de validation.
- La date du départ doit être ultérieure à la date actuelle.

### 5. Gestion des trajets personnels

Chaque utilisateur dispose d'un espace lui permettant de :

- Consulter ses propres trajets.
- Visualiser les informations de chaque trajet.
- Supprimer les trajets qu'il a publiés.

Un utilisateur ne peut pas supprimer le trajet d'un autre conducteur.

---

## ⚙️ Règles de gestion

L'application repose sur plusieurs règles métier :

| Fonctionnalité | Règle |
|---|---|
| Inscription | Les informations obligatoires doivent être renseignées. |
| Authentification | Certaines fonctionnalités nécessitent une connexion. |
| Véhicule | Un seul véhicule par utilisateur. |
| Publication | Un véhicule doit être enregistré avant de proposer un trajet. |
| Date | La date du départ doit être dans le futur. |
| Places | Le nombre de places doit être compris entre 1 et 8. |
| Suppression | Seul le propriétaire du trajet peut le supprimer. |
| Consultation | Les trajets peuvent être consultés sans authentification. |

---

## 🔐 Sécurité

La sécurité constitue un élément important de la conception d'EhouDeka.

Les mécanismes suivants sont utilisés :

- **Authentification :** protection des espaces réservés aux utilisateurs connectés.
- **Autorisation :** contrôle de la propriété des trajets avant leur suppression.
- **Validation :** vérification des données envoyées par les formulaires.
- **Protection CSRF :** protection des formulaires contre les soumissions intersites.
- **Gestion des images :** validation des fichiers envoyés et stockage via le système de fichiers Laravel.
- **Protection des routes :** utilisation des middlewares pour limiter l'accès aux fonctionnalités sensibles.
- **Gestion des erreurs :** pages personnalisées pour les erreurs HTTP courantes.

Les opérations sensibles ne doivent pas être accessibles aux utilisateurs non autorisés.

---

## 🛠️ Technologies utilisées

| Technologie | Utilisation |
|---|---|
| PHP | Langage de programmation côté serveur |
| Laravel | Framework PHP |
| MySQL| Système de gestion de base de données |
| Blade | Moteur de templates Laravel |
| HTML5 | Structure des pages |
| Tailwind CSS | Mise en forme et design |
| JavaScript | Interactions côté client |
| Laravel Breeze | Authentification |
| Git | Gestion des versions |

---

## 🚀 Installation

### Prérequis

Avant de commencer, assurez-vous de disposer des éléments suivants :

- PHP et ses extensions nécessaires à Laravel.
- Composer.
- Node.js et npm.
- MySQL ou MariaDB.
- Un environnement de développement local compatible avec Laravel.

### 1. Cloner le projet

```bash
git clone URL_DU_DEPOT
```

Accéder au dossier :

```bash
cd EhouDeka
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Installer les dépendances JavaScript

```bash
npm install
```

### 4. Configurer l'environnement

Créer le fichier `.env` à partir du fichier d'exemple :

```bash
cp .env.example .env
```

Sous Windows, il est également possible de copier manuellement `.env.example` et de renommer la copie en `.env`.

Générer la clé de l'application :

```bash
php artisan key:generate
```

### 5. Configurer la base de données

Créer une base de données MySQL ou MariaDB, puis renseigner les informations correspondantes dans le fichier `.env` :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ehoudeka
DB_USERNAME=root
DB_PASSWORD=
```

Adapter les identifiants selon votre environnement.

### 6. Exécuter les migrations

```bash
php artisan migrate
```

Cette commande permet de créer les tables nécessaires au fonctionnement de l'application.

### 7. Configurer le stockage des images

Créer le lien symbolique permettant d'accéder aux fichiers stockés :

```bash
php artisan storage:link
```

### 8. Compiler les ressources front-end

En mode développement :

```bash
npm run dev
```

Pour compiler les fichiers destinés à la production :

```bash
npm run build
```

### 9. Lancer l'application

Dans un terminal :

```bash
php artisan serve
```

L'application sera accessible à l'adresse :

```text
http://127.0.0.1:8000
```

---

## 📁 Structure du projet

Les principaux dossiers et fichiers utilisés dans l'application sont organisés selon la structure Laravel :

```text
EhouDeka/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Requests/
│   │   └── Middleware/
│   │
│   ├── Models/
│   │   ├── User.php
│   │   ├── Vehicle.php
│   │   └── Trip.php
│   │
│   └── Policies/
│
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
│
├── public/
│   └── images/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── layouts/
│       ├── auth/
│       ├── profile/
│       ├── vehicles/
│       ├── trips/
│       └── errors/
│
├── routes/
│   ├── web.php
│   └── auth.php
│
├── storage/
│   └── app/
│       └── public/
│           └── vehicles/
│
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

*Cette représentation indique les principaux emplacements du projet ; certains fichiers ou dossiers peuvent varier selon l'organisation réelle du code.*

---

## 🌟 Fonctionnalités complémentaires

En complément des fonctionnalités obligatoires du TP, EhouDeka intègre notamment :

- Pagination de la liste des trajets.
- Filtrage par ville de départ.
- Filtrage par ville d'arrivée.
- Filtrage par date de départ.
- Affichage d'une image par défaut pour les véhicules.
- Consultation détaillée d'un trajet.
- Interface adaptée aux appareils mobiles.
- Pages d'erreurs personnalisées.

---

## 🎓 Contexte académique

**Projet :** Application web de covoiturage local  
**Nom de l'application :** EhouDeka  
**Cadre :** Travail pratique de développement web avec Laravel  
**Objectif :** Concevoir une application de covoiturage fonctionnelle, structurée et sécurisée.

Ce projet constitue une mise en pratique des concepts fondamentaux de Laravel, notamment l'authentification, les relations entre modèles, la validation des données, la gestion des fichiers et la sécurisation des accès.

---

## 👨‍💻 Auteur

**Développement :** Projet réalisé dans le cadre d'un travail pratique en développement web.

---

## 📄 Licence

Projet réalisé à des fins pédagogiques.
