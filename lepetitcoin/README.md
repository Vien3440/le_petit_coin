blogPhotoGraff
===========


#Présentation Projet :

**Type** : Le pti coin est un "fork" du bon coin dans toute sa simplicitée
le Job est surtout le wireframe et la gestion des utilisateurs

##Navigation :

**Visiteur '' non connecté''**
Il peut juste naviguer sur les deux sections 

**Visiteur ''connecté''**
Il peut naviguer et choisir des article 

**Admin '' connecté''**
Il a les mêmes droits que les visiteurs avec un espace lui permettant d'ajouter et d'administrer
les postes (Supprimer/Modifier/Publier)

Nous sommes partis sur une architecture MVC en symfony 3 

**Security**
L' authentification se fait grâce à un formulaire qui vient s'appuyer sur une base de données qui contient les
informations du compte.  
 
---

#Langage & Framework

|   Langage     |
| ------------- |
|     HTML      |
|     CSS       |
|     PHP       |

|   Framework   |
| ------------- |
|    Bootstrap  |
|    Symfony    |




#Installation :  

  * installer les dépendances via composer : right-click project -> composer -> install (dev) sous ubuntu via netbeans.
  * Mettre un nom de base de données dans app -> config -> parameters.yml -> database_name: mettez votre votre mot de passe si vous en avez mis un au préalable.
  * Créer la base de données via ligne de commande : "php bin/console doctrine:database:create".
  * création base de données via doctrine "php bin/console doctrine:schema:create".
