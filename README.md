# NSIAGO AUSSR

## Description
NSIAGO AUSSR est une application web permettant aux membres de l'association Action'Elles, appelées "amazones", de proposer et vendre des assurances automobiles de NSIAGO'ASSUR afin de générer des revenus complémentaires. L'application offre une interface intuitive pour la simulation et la souscription de contrats d'assurance.

## Technologies Utilisées
- **Backend** : Laravel
- **Base de données** : MySQL
- **Authentification** : JWT (JSON Web Token)
- **Sécurité** : Rate limiting, protection CSRF


## Fonctionnalités
- **Gestion des utilisateurs** (inscription, connexion, réinitialisation de mot de passe, gestion des rôles Amazone/Admin)
- **Simulation des primes d'assurance** en fonction des caractéristiques du véhicule
- **Souscription d'assurance** avec génération d'attestation PDF
- **Gestion et suivi des souscriptions**
- **Tableau de bord administrateur** (gestion des utilisateurs et des souscriptions)

## Installation

### Prérequis
- PHP 8+
- Composer
- MySQL
- Laravel 10+
- Docker (optionnel)

### Configuration
1. Cloner le dépôt :
   ```sh
   git clone https://github.com/dylcorp89/frontend.git
   cd frontend
   ```
2. Installer les dépendances :
   ```sh
   composer install
   ```
3. Configurer l'environnement :
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
4. Lancer le serveur local :
   ```sh
   php artisan serve
   ```
   
 ```sh
 
 ROLE ADMIN

  login : admin
 password : chance@@@@##4599_


ROLE AMAZONE
   login :  user
   password : user123

   ```

## API
L'application consomme une API RESTful avec les routes suivantes :

| Méthode | Endpoint | Description |
|----------|---------|-------------|
| POST | /auth/register | Inscription utilisateur |
| POST | /auth/login | Connexion utilisateur |
| GET | /auth/liste | Liste utilisateur |
| GET | /api/v1/simulations | Liste des simulations |
| POST | /api/v1/simulations | Création d'une simulation |
| GET | /api/v1/subscriptions | Liste des souscriptions |
| POST | /api/v1/subscriptions | Souscription d'une assurance |
| GET | /api/v1/subscriptions/{id} | Détail d'une souscription |
| GET | /api/v1/subscriptions/{id}/attestation | Téléchargement de l'attestation PDF |



---


