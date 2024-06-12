# CINEFLIX

Développé avec le framework PHP Symfony, CINEFLIX est un site web permettant aux utilisateurs de rechercher, consulter et réserver des DVD de films et séries en ligne.

## Prérequis

- PHP 8.1 ou supérieur
- Composer
- Symfony CLI
- MySQL ou autre système de gestion de base de données compatible

## Installation

1. Clonez ce dépôt sur votre machine locale :

```
git clone https://github.com/Melanie-devv/Cineflix.git
```

2. Naviguez vers le répertoire du projet :

```
cd Cineflix
```

3. Installez les dépendances avec Composer :

```
composer install
```

4. Configurez les paramètres de la base de données dans le fichier `.env` ou `.env.local`.

5. Créez la base de données :

```
php bin/console doctrine:database:create
```

6. Exécutez les migrations pour créer les tables :

```
php bin/console doctrine:migrations:migrate
```

7. (Optionnel) Chargez les données de démonstration :

```
php bin/console doctrine:fixtures:load
```

8. Démarrez le serveur web Symfony :

```
symfony server:start
```

Vous pouvez maintenant accéder à l'application à l'adresse `http://localhost:8000`.


## Fonctionnalités

- Accédez à la page d'accueil pour vous inscrire ou vous connecter.
- Utilisez la barre de recherche pour trouver des films et séries.
- Consultez les détails d'un film ou d'une série et réservez un DVD si disponible.
- Envoyez des suggestions de contenu via le bouton "+".
- Connectez-vous en tant qu'administrateur pour accéder à l'interface d'administration et gérer le contenu du site.
