# Maîtriser Laravel 10 avec un Projet Professionnel de A à Z

> **Objectif** : Acquérir une maîtrise approfondie de Laravel 10/11 en développant un projet complet et professionnel, tout en apprenant à écrire du code propre et structuré.

**Lien du cours Udemy** : [Maîtriser Laravel 10 avec un Projet Professionnel de A à Z](https://www.udemy.com/course/maitriser-laravel-10-avec-un-projet-professionnel-de-a-z/)  
**Lien du repository GitHub** : [Repository GitHub du Projet](https://github.com/Diam-98/laravel-new-portal-project.git)

## Description

Je suis convaincu que pour apprendre efficacement, il faut pratiquer et relever des défis avec des projets complexes. C'est ainsi que j'ai évolué dans le développement, et je propose ici à tous les développeurs PHP un apprentissage guidé des concepts clés de Laravel à travers la création d'un site d'actualité complet.

Ce projet est conçu pour vous immerger dans les fondamentaux et les fonctionnalités avancées de Laravel, étape par étape. Vous apprendrez non seulement à écrire du code performant, mais aussi à structurer un projet pour qu’il soit évolutif et maintenable.

### Ce que vous apprendrez :

1. **Installation et configuration des environnements de développement**
2. **Les fondamentaux de Laravel 10/11**
3. **Développement du projet principal :**
    - **Front Office** : Les utilisateurs peuvent consulter les articles, s'inscrire, se connecter et commenter.
    - **Back Office** : Les administrateurs peuvent créer, éditer et gérer des articles, utilisateurs (auteurs), catégories, réseaux sociaux, et commentaires. Les auteurs gèrent leurs propres articles et commentaires, et ont accès aux statistiques (nombre d'articles publiés, de commentaires, de vues, etc.).
    - **Gestion de profils** : Réinitialisation de mots de passe, modification des informations du profil, etc.
4. **Déploiement du projet** : Apprenez à mettre en ligne un projet Laravel sur un serveur de production.
5. **Exercices pratiques et challenges** : Quiz et ressources de code pour évaluer vos progrès et renforcer vos compétences.

### Objectif du Projet

L'objectif est de fournir toutes les notions essentielles de Laravel, tout en construisant un projet concret. À chaque étape, vous gagnerez en autonomie et serez prêt à réutiliser le code dans vos propres projets, en toute confiance.

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés :

-   **Laravel 10/11**
-   **MySQL**
-   **Composer**

## Installation et Configuration

1. **Clonez le repository**  
   `git clone https://github.com/Diam-98/laravel-new-portal-project.git`

    `cd laravel-new-portal-project`

2. **Installez les dépendances**  
   `composer install`

    `npm install`

3. **Configuration de l'environnement**  
   Copiez le fichier `.env.example` en `.env` et configurez vos informations de connexion à la base de données.

    `cp .env.example .env`

4. **Génération de la clé d'application**  
   `php artisan key:generate`

5. **Migration de la base de données**  
   `php artisan migrate`

## Lancer le Projet

Pour démarrer le serveur local :
`php artisan serve`

Accédez ensuite au projet via `http://localhost:8000`.

## Structure du Projet

-   **/app** : Logique principale de l'application.
-   **/config** : Fichiers de configuration.
-   **/public** : Fichiers accessibles publiquement (CSS, JS, images).
-   **/resources** : Vues et ressources front-end.
-   **/routes** : Définition des routes.
-   **/tests** : Tests unitaires et fonctionnels.

## Contribution

Les contributions sont les bienvenues ! Soumettez une `issue` ou une `pull request` pour des améliorations.

## Licence

Ce projet est sous licence libre. Consultez le fichier LICENSE pour plus de détails.
