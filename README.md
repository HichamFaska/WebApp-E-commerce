# E-commerce App

## ⚙️ Configuration de l’environnement

Afin de gérer les informations sensibles de connexion à la base de données, il est recommandé d’utiliser un fichier **`.env`**.

### Étapes :

1. Crée un fichier nommé **`.env`** à la racine du projet (au même niveau que **`.gitignore`**).
2. Ajoute les informations de connexion à la base de données dans ce fichier :

```env
DB_HOST=localhost
DB_PORT=3306
DB_USER=root
DB_PASSWORD=O2H2sql
DB_NAME=MVC